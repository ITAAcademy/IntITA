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

    protected function taskByFilterWithinGroup($roles, $param = '')
    {
        $rolesCase = empty($roles) ? '' : ' and csrtByGroup.role = :id_role';
        return '(SELECT csrtByGroup.id_task
            FROM crm_subgroup_roles_tasks as csrtByGroup
            join crm_roles_tasks as crtByGroupWithRoles on crtByGroupWithRoles.id_task = csrtByGroup.id_task
            join crm_tasks as ctByGroup on ctByGroup.id = crtByGroupWithRoles.id_task
            where csrtByGroup.id_subgroup in (
                    SELECT osByGroup.id_subgroup FROM offline_students as osByGroup
                    where osByGroup.id_user = :id_user and osByGroup.end_date is null
                ) and ctByGroup.cancelled_date is null'.$param.$rolesCase.'
            group by csrtByGroup.id_task)';
    }

    protected function taskByFilterWithinUser($roles, $param = '')
    {
        $rolesCase = empty($roles) ? '' : ' and crtByUser.role = :id_role ';

        return '(select crtByUser.id_task 
                from crm_roles_tasks as crtByUser
                where crtByUser.id_user = :id_user and crtByUser.cancelled_date is null'.$param.$rolesCase.'
            group by crtByUser.id_task)';
    }

    protected function backBoneForCRMQuery($params, $userId, $paramStr = '', $conditionParams = null)
    {
        $allUserTasksCondidtion = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramStr).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramStr).' and ctMain.cancelled_date is null and crtMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in '.$this->taskByFilterWithinGroup($params['id'], $paramStr).' or ctMain.id in '.$this->taskByFilterWithinUser($params['id'], $paramStr).'and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = $conditionParams === null ? [':id_user' => $userId] : $conditionParams['allUserTasksCondidtionParams'];
        $userTasksByRoleConditionParams = $conditionParams === null ? [':id_user' => $userId, ':id_role' => $params['id']] : $conditionParams['userTasksByRoleConditionParams'];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

    protected function getTasksSimpleCondition($params, $userId)
    {
        return $this->backBoneForCRMQuery($params, $userId);
    }

// kanban CRM filter by fullName and email participants (users)
    protected function idTaskByDifferentUsers($param, $id_role, $id_user)
    {
        $rolesCase = empty($id_role) ? [
            'subQuerySecond' => '',
            'subQueryFirst' => ''
        ] : [
            'subQuerySecond' => ' and crtSecUserFilter.role = :id_role',
            'subQueryFirst' => ' and csrtFirstUserFilter.role = :id_role'
        ];

        $rolesCaseParam = empty($id_role) ? [
            ':id_user' => $id_user
        ] : [
            ':id_role' => $id_role, ':id_user' => $id_user
        ];

        $rolesCaseUnionParam = empty($id_role) ? [
            ':param' => $param,
            ':id_user' => $id_user
        ] : [
            ':param' => $param,
            ':id_role' => $id_role,
            ':id_user' => $id_user
        ];

        $subQuerySecond = Yii::app()->db->createCommand()
        ->select('crtSecUserFilter.id_task')
        ->from('crm_roles_tasks as crtSecUserFilter')
        ->where('crtSecUserFilter.id_user = :id_user and crtSecUserFilter.cancelled_date is null'.$rolesCase['subQuerySecond'], $rolesCaseParam)
        ->group('crtSecUserFilter.id_task')
        ->getText();

        $whereSelectToSubQueryFirst = Yii::app()->db->createCommand()
        ->select('osFirstUserFilter.id_subgroup')
        ->from('offline_students as osFirstUserFilter')
        ->where('osFirstUserFilter.id_user = :id_user', [':id_user' => $id_user])
        ->getText();

        $subQueryFirst = Yii::app()->db->createCommand()
        ->select('csrtFirstUserFilter.id_task')
        ->from('crm_subgroup_roles_tasks as csrtFirstUserFilter')
        ->join('crm_roles_tasks crtFirstUserFilter', 'crtFirstUserFilter.id_task = csrtFirstUserFilter.id_task')
        ->join('crm_tasks ctFirstUserFilter', 'ctFirstUserFilter.id = crtFirstUserFilter.id_task')
        ->where('csrtFirstUserFilter.id_subgroup in ('.$whereSelectToSubQueryFirst.') and ctFirstUserFilter.cancelled_date is null'.$rolesCase['subQueryFirst'], $rolesCaseParam)
        ->group('csrtFirstUserFilter.id_task')
        ->union($subQuerySecond)
        ->getText();

        $unionWhereSelect = Yii::app()->db->createCommand()
        ->select('crtThirdUserFilter.id_task')
        ->from('user as uThirdUserFilter')
        ->join('crm_roles_tasks crtThirdUserFilter', 'crtThirdUserFilter.id_user = uThirdUserFilter.id')
        ->where('uThirdUserFilter.firstName like :param or uThirdUserFilter.middleName like :param or uThirdUserFilter.secondName like :param or uThirdUserFilter.email like :param and crtThirdUserFilter.cancelled_date is null', [':param' => $param])
        ->group('crtThirdUserFilter.id_task')
        ->getText();

        return Yii::app()->db->createCommand()
        ->select('id_task')
        ->from('('.$subQueryFirst.') as unionFirst')
        ->where('id_task in ('.$unionWhereSelect.')', $rolesCaseUnionParam)
        ->getText();
    }

    protected function getTasksByUserName($params, $userId)
    {
        $paramData = "%".$params['filter']['idUser.fullName']."%";
        $allUserTasksCondidtion = 'ctMain.id in ('.$this->idTaskByDifferentUsers($paramData, $params['id'], $userId).') and crtMain.cancelled_date is null and ctMain.cancelled_date is null';
        $userTasksByRoleCondition = 'ctMain.id in ('.$this->idTaskByDifferentUsers($paramData, $params['id'], $userId).') and crtMain.cancelled_date is null and ctMain.cancelled_date is null and crtMain.role = :id_role';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':param' => $paramData];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':param' => $paramData];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];      
    }

// kanban CRM filter by task name

    protected function getTasksByName($params, $userId)
    {
        $paramData = '%'.$params['filter']['idTask.name'].'%';
        $paramToWhere = ' and ctMain.name LIKE :taskName';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':taskName' => $paramData],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':taskName' => $paramData]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramToWhere, $conditionParams);
    }

// kanban CRM filter by task ID

    protected function getTasksById($params, $userId)
    {
        $paramData = ' and ctMain.id = :taskId';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':taskId' => $params['filter']['idTask.id']],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':taskId' => $params['filter']['idTask.id']]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramData, $conditionParams);
    }

// kanban CRM filter by task Priority

    protected function getTasksByPriority($params, $userId)
    {
        $paramData = ' and ctpMain.id = :priorityId';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':priorityId' => $params['filter']['crmPriority.id']],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':priorityId' => $params['filter']['crmPriority.id']]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramData, $conditionParams);
    }

// kanban CRM filter by task Type

    protected function getTasksByType($params, $userId)
    {
        $paramData = ' and cttMain.id = :typeId';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':typeId' => $params['filter']['crmType.id']],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':typeId' => $params['filter']['crmType.id']]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramData, $conditionParams);
    }

// kanban CRM filter by task Parent Type

    protected function getTasksByParentType($params, $userId)
    {
        $parentType = intval($params['filter']['idTask.parentType']) === 1 ? ' and ctMain.id_parent is null' : ' and ctMain.id_parent is not null';
        
        return $this->backBoneForCRMQuery($params, $userId, $parentType);
    }

// kanban CRM filter by task Group Name

    protected function getTasksByGroupName($params, $userId)
    {
        $subQuery = ' and ctMain.id in (SELECT id_task FROM crm_subgroup_roles_tasks as csrt
                            join offline_subgroups as os on os.id = csrt.id_subgroup
                            join offline_groups as og on og.id = os.group 
                            where og.id = '.$params['filter']['idTask.groupsNames'].')';
        return $this->backBoneForCRMQuery($params, $userId, $subQuery);
    }

// table CRM filter by task created date

    protected function getTasksByCreatedDate($params, $userId)
    {
        $paramData = '%'.$params['filter']['idTask.created_date'].'%';
        $paramToWhere = ' and ctMain.created_date LIKE :taskDate';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':taskDate' => $paramData],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':taskDate' => $paramData]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramToWhere, $conditionParams);
    }

// table CRM filter by task State

    protected function getTasksByState($params, $userId)
    {
        $paramData = ' and ctsMain.id = :stateId';
        $conditionParams = [
            'allUserTasksCondidtionParams' => [':id_user' => $userId, ':stateId' => $params['filter']['crmStates.id']],
            'userTasksByRoleConditionParams' => [':id_user' => $userId, ':id_role' => $params['id'], ':stateId' => $params['filter']['crmStates.id']]
        ];
        return $this->backBoneForCRMQuery($params, $userId, $paramData, $conditionParams);
    }

// this connection with task controller actionGetTasks

    public function getTasksWhereConditions($params, $userId)
    {
        if(isset($params['filter'])) {
            switch (key($params['filter'])) {
                case 'idUser.fullName':
                    return [
                        'data' => $this->getTasksByUserName($params, $userId),
                        'isFilter' => true
                    ];
                case 'idTask.name':
                    return [
                        'data' => $this->getTasksByName($params, $userId),
                        'isFilter' => true
                    ];
                case 'idTask.id':
                    return [
                        'data' => $this->getTasksById($params, $userId),
                        'isFilter' => true
                    ];
                case 'crmPriority.id':
                    return [
                        'data' => $this->getTasksByPriority($params, $userId),
                        'isFilter' => true
                    ];
                case 'crmType.id':
                    return [
                        'data' => $this->getTasksByType($params, $userId),
                        'isFilter' => true
                    ];
                case 'idTask.parentType':
                    return [
                        'data' => $this->getTasksByParentType($params, $userId),
                        'isFilter' => true
                    ];
                case 'idTask.groupsNames':
                    return [
                        'data' => $this->getTasksByGroupName($params, $userId),
                        'isFilter' => true
                    ];
                case 'idTask.created_date':
                    return [
                        'data' => $this->getTasksByCreatedDate($params, $userId),
                        'isFilter' => true
                    ];
                case 'crmStates.id':
                    return [
                        'data' => $this->getTasksByState($params, $userId),
                        'isFilter' => true
                    ];
            }
        } else {
            return [
                'data' => $this->getTasksSimpleCondition($params, $userId),
                'isFilter' => false
            ];
        }
    }
}