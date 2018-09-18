<?php

class CrmHelper
{
    static function getUsersCrmTasks($user, $active=true, $role=false, $completed = false)
    {
        $tasksIds = CrmHelper::getIndividualUsersCrmTasks($user, $active, $role, $completed);
        $subgroupsTasksIds = CrmHelper::getSubgroupsCrmTasks($user, $active, $role, $completed);

        $ids = array_unique(array_merge($tasksIds, $subgroupsTasksIds));
        return $ids;
    }

    static function getIndividualUsersCrmTasks($user, $active=false, $role=false, $completed = false)
    {
        $active_user_sql='';
        $role_sql='';
        $completed_sql='';
        if($active) $active_user_sql=' and t.cancelled_date is null and ct.cancelled_date is null';
        if($role) $role_sql=' and t.role=' . $role;
        if($completed) $completed_sql=' and ct.id_state!=' . CrmTaskStatus::COMPLETED;
        $sql_tasks="SELECT DISTINCT `id_task` FROM crm_roles_tasks as t LEFT JOIN crm_tasks ct
							ON ct.id = t.id_task WHERE t.id_user=".$user.$active_user_sql.$role_sql.$completed_sql;
        $tasks=CrmRolesTasks::model()->findAllBySql($sql_tasks);
        $ids=array();
        foreach($tasks as $task):
            $ids[]=$task->id_task;
        endforeach;

        return $ids;
    }

    static function getSubgroupsCrmTasks($user, $active=false, $role=false, $completed = false)
    {
        $subgroupsIds = array_map(function ($model) {
            return $model->id;
        }, RegisteredUser::userById($user)->offlineSubGroups);
        $userSubgroups = !empty($subgroupsIds)?'('.implode(',',$subgroupsIds).')':'(0)';
        $active_user_sql='';
        $role_sql='';
        $completed_sql='';
        if($active) $active_user_sql=' and t.cancelled_date is null and ct.cancelled_date is null';
        if($role) $role_sql=' and t.role=' . $role;
        if($completed) $completed_sql=' and ct.id_state!=' . CrmTaskStatus::COMPLETED;
        $sql_tasks="SELECT DISTINCT `id_task` FROM crm_subgroup_roles_tasks as t LEFT JOIN crm_tasks ct
							ON ct.id = t.id_task WHERE id_subgroup in ".$userSubgroups.$active_user_sql.$role_sql.$completed_sql.' and t.cancelled_date is null';
        $tasks=CrmSubgroupRolesTasks::model()->findAllBySql($sql_tasks);

        $ids=array();
        foreach($tasks as $task):
            $ids[]=$task->id_task;
        endforeach;

        return $ids;
    }

    static function getMainTasksIds()
    {
        $sql_tasks="SELECT DISTINCT `id_parent` FROM crm_tasks WHERE id_parent is not null and cancelled_date is null";
        $tasks = Yii::app()->db->createCommand($sql_tasks)->queryAll();
        $ids=array();
        foreach($tasks as $task):
            $ids[]=$task['id_parent'];
        endforeach;

        return $ids;
    }

    static function getSubgroupTaskIds($group)
    {
        $ids=array();
        $sql_tasks="SELECT DISTINCT `id_task` FROM crm_subgroup_roles_tasks LEFT JOIN offline_subgroups os ON os.id = id_subgroup 
        LEFT JOIN offline_groups og ON og.id = os.group WHERE og.id = ".$group;
        $tasks = Yii::app()->db->createCommand($sql_tasks)->queryAll();
        foreach($tasks as $task):
            $ids[]=$task['id_task'];
        endforeach;

        return $ids;
    }

    // raw DB query

    protected $idTasksByGroup = '(SELECT csrtByGroup.id_task
            FROM crm_subgroup_roles_tasks as csrtByGroup
            join crm_tasks as ctByGroup on ctByGroup.id = csrtByGroup.id_task
            where csrtByGroup.id_subgroup in (
                    SELECT osByGroup.id_subgroup FROM offline_students as osByGroup
                    where osByGroup.id_user = :id_user
                ) 
            and ctByGroup.cancelled_date is null
            group by csrtByGroup.id_task)';

    protected $idTaskByUser = '(select crtByUser.id_task 
                from crm_roles_tasks as crtByUser
                where crtByUser.id_user = :id_user
            group by crtByUser.id_task)';

    protected $idTasksByGroupWithRoles = '(SELECT ctByGroupWithRoles.id
            FROM crm_subgroup_roles_tasks as csrtByGroupWithRoles
            join crm_tasks as ctByGroupWithRoles on ctByGroupWithRoles.id = csrtByGroupWithRoles.id_task
            join crm_roles_tasks as crtByGroupWithRoles on crtByGroupWithRoles.id_task = ctByGroupWithRoles.id
            where csrtByGroupWithRoles.id_subgroup in (
                SELECT osByGroupWithRoles.id_subgroup FROM offline_students as osByGroupWithRoles
                where osByGroupWithRoles.id_user = :id_user
            ) and ctByGroupWithRoles.cancelled_date is null and crtByGroupWithRoles.role = :id_role
            group by ctByGroupWithRoles.id)';

    protected $idTasksByUserWithRoles = '(
                select crtByUserWithRoles.id_task 
                from crm_roles_tasks as crtByUserWithRoles
                where crtByUserWithRoles.id_user = :id_user and crtByUserWithRoles.role = :id_role
            group by crtByUserWithRoles.id_task)';

    // protected $idTaskByDifferentUsers = '';

    public function getTasksSimpleCondition($params, $userId)
    {
        $allUserTasksCondidtion = 'ctMain.id in '.$this->idTasksByGroup.' or ctMain.id in '.$this->idTaskByUser.' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->idTasksByGroupWithRoles.' or ctMain.id in '.$this->idTasksByUserWithRoles.'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by fullName and email participants (users)
    protected function idTaskByDifferentUsersWithRoles($param, $id_role, $id_user)
    {
        $subQuerySecond = Yii::app()->db->createCommand()
        ->select('crtSecUserFilter.id_task')
        ->from('crm_roles_tasks as crtSecUserFilter')
        ->where('crtSecUserFilter.id_user = :id_user and crtSecUserFilter.role = :id_role', [':id_role' => $id_role, ':id_user' => $id_user])
        ->group('crtSecUserFilter.id_task')
        ->getText();

        $whereSelectToSubQueryFirst = Yii::app()->db->createCommand()
        ->select('osFirstUserFilter.id_subgroup')
        ->from('offline_students as osFirstUserFilter')
        ->where('osFirstUserFilter.id_user = :id_user', [':id_user' => $id_user])
        ->getText();

        $subQueryFirst = Yii::app()->db->createCommand()
        ->select('ctFirstUserFilter.id')
        ->from('crm_subgroup_roles_tasks as csrtFirstUserFilter')
        ->join('crm_tasks ctFirstUserFilter', 'ctFirstUserFilter.id = csrtFirstUserFilter.id_task')
        ->join('crm_roles_tasks crtFirstUserFilter', 'crtFirstUserFilter.id_task = ctFirstUserFilter.id')
        ->where('csrtFirstUserFilter.id_subgroup in ('.$whereSelectToSubQueryFirst.') and ctFirstUserFilter.cancelled_date is null and crtFirstUserFilter.role = :id_role', [':id_role' => $id_role, ':id_user' => $id_user])
        ->group('ctFirstUserFilter.id')
        ->union($subQuerySecond)
        ->getText();

        $unionWhereSelect = Yii::app()->db->createCommand()
        ->select('crtThirdUserFilter.id_task')
        ->from('user as uThirdUserFilter')
        ->join('crm_roles_tasks crtThirdUserFilter', 'crtThirdUserFilter.id_user = uThirdUserFilter.id')
        ->where('uThirdUserFilter.firstName like :param or uThirdUserFilter.middleName like :param or uThirdUserFilter.secondName like :param or uThirdUserFilter.email like :param', [':param' => $param])
        ->group('crtThirdUserFilter.id_task')
        ->getText();

        return Yii::app()->db->createCommand()
        ->select('id')
        ->from('('.$subQueryFirst.') as unionFirst')
        ->where('id in ('.$unionWhereSelect.')', [':param' => $param, ':id_role' => $id_role, ':id_user' => $id_user])
        ->getText();
    }

    protected function idTaskByDifferentUsers($param, $id_role, $id_user)
    {
        $subQuerySecond = Yii::app()->db->createCommand()
        ->select('crtSecUserFilter.id_task')
        ->from('crm_roles_tasks as crtSecUserFilter')
        ->where('crtSecUserFilter.id_user = :id_user', [':id_user' => $id_user])
        ->group('crtSecUserFilter.id_task')
        ->getText();

        $whereSelectToSubQueryFirst = Yii::app()->db->createCommand()
        ->select('osFirstUserFilter.id_subgroup')
        ->from('offline_students as osFirstUserFilter')
        ->where('osFirstUserFilter.id_user = :id_user', [':id_user' => $id_user])
        ->getText();

        $subQueryFirst = Yii::app()->db->createCommand()
        ->select('ctFirstUserFilter.id')
        ->from('crm_subgroup_roles_tasks as csrtFirstUserFilter')
        ->join('crm_tasks ctFirstUserFilter', 'ctFirstUserFilter.id = csrtFirstUserFilter.id_task')
        ->join('crm_roles_tasks crtFirstUserFilter', 'crtFirstUserFilter.id_task = ctFirstUserFilter.id')
        ->where('csrtFirstUserFilter.id_subgroup in ('.$whereSelectToSubQueryFirst.') and ctFirstUserFilter.cancelled_date is null', [':id_user' => $id_user])
        ->group('ctFirstUserFilter.id')
        ->union($subQuerySecond)
        ->getText();

        $unionWhereSelect = Yii::app()->db->createCommand()
        ->select('crtThirdUserFilter.id_task')
        ->from('user as uThirdUserFilter')
        ->join('crm_roles_tasks crtThirdUserFilter', 'crtThirdUserFilter.id_user = uThirdUserFilter.id')
        ->where('uThirdUserFilter.firstName like :param or uThirdUserFilter.middleName like :param or uThirdUserFilter.secondName like :param or uThirdUserFilter.email like :param', [':param' => $param])
        ->group('crtThirdUserFilter.id_task')
        ->getText();

        return Yii::app()->db->createCommand()
        ->select('id')
        ->from('('.$subQueryFirst.') as unionFirst')
        ->where('id in ('.$unionWhereSelect.')', [':param' => $param, ':id_user' => $id_user])
        ->getText();
    }

    public function getTasksByUserName($params, $userId)
    {
        $paramData = "%".$params['filter']['idUser.fullName']."%";
        $allUserTasksCondidtion = 'ctMain.id in ('.$this->idTaskByDifferentUsers($paramData, $params['id'], $userId).') and crtMain.cancelled_date is null and ctMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in ('.$this->idTaskByDifferentUsersWithRoles($paramData, $params['id'], $userId).') and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':param' => $paramData];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':param' => $paramData];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];      
    }
    
// kanban CRM filter by task name
    
    protected function taskByFilterWithinGroup($roles, $param)
    {
        $rolesCase = empty($roles) ? [
            'join' => '',
            'where' => ''
        ] : [
            'join' => ' join crm_roles_tasks as crtByGroupWithRoles on crtByGroupWithRoles.id_task = ctByGroup.id ',
            'where' => ' and crtByGroupWithRoles.role = :id_role'
        ];
        return '(SELECT csrtByGroup.id_task
            FROM crm_subgroup_roles_tasks as csrtByGroup
            join crm_tasks as ctByGroup on ctByGroup.id = csrtByGroup.id_task'.$rolesCase['join'].'
            where csrtByGroup.id_subgroup in (
                    SELECT osByGroup.id_subgroup FROM offline_students as osByGroup
                    where osByGroup.id_user = :id_user
                ) 
            and ctByGroup.cancelled_date is null and '.$param.$rolesCase['where'].'
            group by csrtByGroup.id_task)';
    }

    protected function taskByFilterWithinUser($roles, $param)
    {
        $rolesCase = empty($roles) ? '' : ' and crtByUser.role = :id_role ';

        return '(select crtByUser.id_task 
                from crm_roles_tasks as crtByUser
                where crtByUser.id_user = :id_user and '.$param.$rolesCase.'
            group by crtByUser.id_task)';
    }

    public function getTasksByName($params, $userId)
    {
        $paramData = '%'.$params['filter']['idTask.name'].'%';
        $paramToWhere = 'ctMain.name LIKE :taskName';
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramToWhere).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramToWhere).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramToWhere).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramToWhere).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':taskName' => $paramData];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':taskName' => $paramData];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by task ID

    public function getTasksById($params, $userId)
    {
        $paramData = 'ctMain.id = :taskId';
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':taskId' => $params['filter']['idTask.id']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':taskId' => $params['filter']['idTask.id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by task Priority

    public function getTasksByPriority($params, $userId)
    {
        $paramData = 'ctpMain.id = :priorityId';
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':priorityId' => $params['filter']['idTask.priority']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':priorityId' => $params['filter']['idTask.priority']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by task Type

    public function getTasksByType($params, $userId)
    {
        $paramData = 'cttMain.id = :typeId';
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramData).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramData).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':typeId' => $params['filter']['idTask.type']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':typeId' => $params['filter']['idTask.type']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by task Parent Type

    public function getTasksByParentType($params, $userId)
    {
        $parentType = intval($params['filter']['idTask.parentType']) === 1 ? 'ctMain.id_parent is null' : 'ctMain.id_parent is not null';
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $parentType).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $parentType).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $parentType).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $parentType).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

// kanban CRM filter by task Group Name

    public function getTasksByGroupName($params, $userId)
    {
        $subQuery = '(SELECT id_task FROM intita.crm_subgroup_roles_tasks as csrt
                            join intita.offline_subgroups as os on os.id = csrt.id_subgroup
                            join intita.offline_groups as og on og.id = os.group 
                            where og.id = '.$params['filter']['idTask.groupsNames'].')';
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ct.id in '.$subQuery;
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ct.id in '.$subQuery;
        $allUserTasksCondidtionParams = [':id_user' => $userId];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }
}