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

    public function getTasksSimpleCondition($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null';
        $allUserTasksCondidtionParams = [':id_user' => $userId];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

    public function getTasksByUserName($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and firstName LIKE :userName';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and firstName LIKE :userName';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':userName' => $params['filter']['idUser.fullName']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':userName' => $params['filter']['idUser.fullName']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];      
    }

    public function getTasksByName($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ct.name LIKE :taskName';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ct.name LIKE :taskName';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':taskName' => '%'.$params['filter']['idTask.name'].'%'];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':taskName' => '%'.$params['filter']['idTask.name'].'%'];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];   
    }

    public function getTasksById($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ct.id = :taskId';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ct.id = :taskId';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':taskId' => $params['filter']['idTask.id']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':taskId' => $params['filter']['idTask.id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];   
    }

    public function getTasksByPriority($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ctp.id = :priorityId';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ctp.id = :priorityId';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':priorityId' => $params['filter']['idTask.priority']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':priorityId' => $params['filter']['idTask.priority']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];   
    }

    public function getTasksByType($params, $userId)
    {
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ctt.id = :typeId';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ctt.id = :typeId';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':typeId' => $params['filter']['idTask.type']];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':typeId' => $params['filter']['idTask.type']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }

    public function getTasksByParentType($params, $userId)
    {
        $parentType = intval($params['filter']['idTask.parentType']) === 1 ? ' and ct.id_parent is null' : ' and ct.id_parent is not null';
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null'.$parentType;
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null'.$parentType;
        $allUserTasksCondidtionParams = [':id_user' => $userId];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id']];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];   
    }

    public function getTasksByGroupName($params, $userId)
    {
        $subQuery = 'SELECT id_task FROM intita.crm_subgroup_roles_tasks as csrt
                    join intita.offline_subgroups as os on os.id = csrt.id_subgroup
                    join intita.offline_groups as og on og.id = os.group 
                    where og.id = '.$params['filter']['idTask.groupsNames'];
        $allUserTasksCondidtion = 'crt.id_user = :id_user and crt.cancelled_by is null and ct.cancelled_by is null and ct.id = :taskId';
        $userTasksByRoleCondition = 'crt.id_user = :id_user and crt.role = :id_role and crt.cancelled_by is null and ct.cancelled_by is null and ct.id = :taskId';
        $allUserTasksCondidtionParams = [':id_user' => $userId, ':taskId' => $subQuery];
        $userTasksByRoleConditionParams = [':id_user' => $userId, ':id_role' => $params['id'], ':taskId' => $subQuery];
        $isAllTasks = intval($params['id']) === 0;
        return [
            'whereCondition' => $isAllTasks ? $allUserTasksCondidtion : $userTasksByRoleCondition,
            'whereConditionParams' => $isAllTasks ? $allUserTasksCondidtionParams : $userTasksByRoleConditionParams
        ];
    }
}