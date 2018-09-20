<?php

/**
 * This is the model class for table "crm_tasks".
 *
 * The followings are the available columns in table 'crm_tasks':
 * @property integer $id
 * @property string $name
 * @property string $body
 * @property string $startTask
 * @property string $endTask
 * @property string $deadline
 * @property integer $id_state
 * @property integer $created_by
 * @property string $created_date
 * @property integer $cancelled_by
 * @property string $cancelled_date
 * @property string $change_date
 * @property integer $changed_by
 * @property integer $priority
 * @property integer $id_parent
 * @property integer $type
 * @property integer $expected_time
 *
 * The followings are the available model relations:
 * @property CrmRolesTasks[] $crmRolesTasks
 * @property StudentReg $cancelledBy
 * @property StudentReg $createdBy
 * @property CrmTaskStatus $taskState
 */
class CrmTasks extends CTaskUnitActiveRecord
{
    use NotifySubscribedUsers;

    const EXECUTANT = 1;
    const PRODUCER = 2;
    const COLLABORATOR = 3;
    const OBSERVER = 4;

    const MAIN_TASK = 1;
    const SUBTASK = 2;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'crm_tasks';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, body, created_by, priority', 'required', 'message' => '{attribute} обов\'язкове для заповнення'),
            array('id_state, created_by, cancelled_by', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('endTask, deadline, cancelled_date, expected_time, type, changed_by', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, body, startTask, endTask, deadline, id_state, created_by, created_date, cancelled_by, cancelled_date, change_date, priority, id_parent, expected_time, type, changed_by', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'crmRolesTasks' => array(self::HAS_MANY, 'CrmRolesTasks', 'id_task'),
            'cancelledBy' => array(self::BELONGS_TO, 'StudentReg', 'cancelled_by'),
            'changedBy' => array(self::BELONGS_TO, 'StudentReg', 'changed_by'),
            'createdBy' => array(self::BELONGS_TO, 'StudentReg', 'created_by'),
            'taskState' => array(self::BELONGS_TO, 'CrmTaskStatus', 'id_state'),
            'executant' => array(self::HAS_ONE, 'CrmRolesTasks', 'id_task', 'on' => 'executant.cancelled_date IS NULL and executant.role = ' . CrmTasks::EXECUTANT),
            'executantName' => array(self::BELONGS_TO, 'StudentReg', ['id_user'=>'id'], 'through' => 'executant'),
            'producer' => array(self::HAS_ONE, 'CrmRolesTasks', 'id_task', 'on' => 'producer.cancelled_date IS NULL and producer.role = ' . CrmTasks::PRODUCER),
            'producerName' => array(self::BELONGS_TO, 'StudentReg', ['id_user'=>'id'], 'through' => 'producer'),
            'collaborators' => array(self::HAS_MANY, 'CrmRolesTasks', 'id_task', 'on' => 'collaborators.cancelled_date IS NULL and collaborators.role = ' . CrmTasks::COLLABORATOR),
            'observers' => array(self::HAS_MANY, 'CrmRolesTasks', 'id_task', 'on' => 'observers.cancelled_date IS NULL and observers.role = ' . CrmTasks::OBSERVER),
            'parentTask' => array(self::BELONGS_TO, 'CrmTasks', 'id_parent'),
            'priorityModel' => array(self::BELONGS_TO, 'CrmTaskPriority', 'priority'),
            'taskType' => array(self::BELONGS_TO, 'CrmTaskType', 'type'),
            'subgroupCollaborators' => array(self::HAS_MANY, 'CrmSubgroupRolesTasks', 'id_task', 'on' => 'subgroupCollaborators.cancelled_date IS NULL and subgroupCollaborators.role = ' . CrmTasks::COLLABORATOR),
            'subgroupObservers' => array(self::HAS_MANY, 'CrmSubgroupRolesTasks', 'id_task', 'on' => 'subgroupObservers.cancelled_date IS NULL and subgroupObservers.role = ' . CrmTasks::OBSERVER),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Назва завдання',
            'body' => 'Текст завдання',
            'startTask' => 'Початок завдання',
            'endTask' => 'Завершення завдання',
            'deadline' => 'Крайній термін',
            'id_state' => 'Статус',
            'created_by' => 'Створено користувачем',
            'created_date' => 'Дата створення',
            'cancelled_by' => 'Скасовано користувачем',
            'changed_by' => 'Оновлено користувачем',
            'cancelled_date' => 'Дата скасування',
            'change_date' => 'Дата оновлення',
            'priority' => 'Пріоритет',
            'id_parent' => 'Батьківське завдання',
            'type' => 'Категорія',
            'expected_time' => 'Очікуваний час виконання',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('startTask', $this->startTask, true);
        $criteria->compare('endTask', $this->endTask, true);
        $criteria->compare('deadline', $this->deadline, true);
        $criteria->compare('id_state', $this->id_state);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('cancelled_by', $this->cancelled_by);
        $criteria->compare('cancelled_date', $this->cancelled_date, true);
        $criteria->compare('change_date', $this->change_date, true);
        $criteria->compare('priority', $this->priority, true);
        $criteria->compare('id_parent', $this->id_parent, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('expected_time', $this->expected_time, true);
        $criteria->compare('changed_by', $this->changed_by, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CrmTasks the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getValidationErrors()
    {
        $errors = [];
        foreach ($this->getErrors() as $key => $attribute) {
            foreach ($attribute as $error) {
                array_push($errors, $error);
            }
        }
        return implode(", ", $errors);
    }

    /**
     * Initialize crm task
     * @param $params
     */
    public function initialize($params)
    {
        $this->attributes = $params;
        $this->created_by = Yii::app()->user->getId();
        $this->id_state = TaskState::ExpectsToExecute;

        $this->saveCheck();
    }

    public function setRoles($roles)
    {
        foreach ($roles as $key => $role) {
            if (is_null($role)) $role = [];
            switch ($key) {
                case 'executant':
                    $roleId = self::EXECUTANT;
                    break;
                case 'producer';
                    $roleId = self::PRODUCER;
                    break;
                case 'collaborator';
                    $roleId = self::COLLABORATOR;
                    break;
                case 'observer';
                    $roleId = self::OBSERVER;
                    break;
                default:
                    $roleId = self::EXECUTANT;
                    break;
            };
            $oldUsers = [];
            $newUsers = [];
            foreach (CrmRolesTasks::model()->findAllByAttributes(array('id_task' => $this->id, 'role' => $roleId, 'cancelled_date' => null)) as $item) {
                array_push($oldUsers, $item->id_user);
            }

            if ($roleId == self::PRODUCER || $roleId == self::EXECUTANT) {
                $user = isset($role['id']) ? $role['id'] : Yii::app()->user->getId();
                array_push($newUsers, $user);
            } else {
                foreach ($role as $item) {
                    array_push($newUsers, $item['id']);
                }
            }

            $addUsers = array_diff($newUsers, $oldUsers);
            $cancelUsers = array_diff($oldUsers, $newUsers);
            $this->setRolesTask($addUsers, $roleId);
            $this->cancelRolesTask($cancelUsers, $roleId);

            if ($roleId == self::EXECUTANT) {
                if (!count(CrmRolesTasks::model()->findAllByAttributes(array('id_task' => $this->id, 'role' => $roleId, 'cancelled_date' => null)))){
                    $this->setRolesTask([Yii::app()->user->getId()], $roleId);
                }
            }
        }
    }

    public function setSubgroupRoles($roles)
    {
        foreach ($roles as $key => $role) {
            if (is_null($role)) $role = [];
            switch ($key) {
                case 'collaborator';
                    $roleId = self::COLLABORATOR;
                    break;
                case 'observer';
                    $roleId = self::OBSERVER;
                    break;
                default:
                    $roleId = self::COLLABORATOR;
                    break;
            };
            $oldSubGroups = [];
            $newSubGroups = [];
            foreach (CrmSubgroupRolesTasks::model()->findAllByAttributes(array('id_task' => $this->id, 'role' => $roleId, 'cancelled_date' => null)) as $item) {
                array_push($oldSubGroups, $item->id_subgroup);
            }

            foreach ($role as $item) {
                array_push($newSubGroups, $item['id']);
            }
            $addSubGroups = array_diff($newSubGroups, $oldSubGroups);
            $cancelSubGroups = array_diff($oldSubGroups, $newSubGroups);
            $this->setSubGroupRolesTask($addSubGroups, $roleId);
            $this->cancelSubGroupRolesTask($cancelSubGroups, $roleId);
        }
    }

    public function setRolesTask($usersId, $role)
    {
        foreach ($usersId as $user) {
            $model = new CrmRolesTasks();
            $model->id_task = $this->id;
            $model->id_user = $user;
            $model->role = $role;
            $model->assigned_by = Yii::app()->user->getId();
            $model->save();
            $this->notifyUser('changeTaskRole-'.$user,[]);
        }
    }

    public function cancelRolesTask($usersId, $role)
    {
        foreach ($usersId as $user) {
            $model = CrmRolesTasks::model()->findByAttributes(array('id_task' => $this->id, 'id_user' => $user, 'role' => $role, 'cancelled_date' => null));
            $model->cancelled_by = Yii::app()->user->getId();
            $model->cancelled_date = new CDbExpression('NOW()');
            $model->save();
            $this->notifyUser('changeTaskRole-'.$user,[]);
        }
    }

    public function setSubGroupRolesTask($subgroupsId, $role)
    {
        foreach ($subgroupsId as $subgroup) {
            $model = new CrmSubgroupRolesTasks();
            $model->id_task = $this->id;
            $model->id_subgroup = $subgroup;
            $model->role = $role;
            $model->assigned_by = Yii::app()->user->getId();
            $model->save();
//            $this->notifyUser('changeTaskRole-'.$subgroup,[]);
        }
    }

    public function cancelSubGroupRolesTask($subgroupsId, $role)
    {
        foreach ($subgroupsId as $subgroup) {
            $model = CrmSubgroupRolesTasks::model()->findByAttributes(array('id_task' => $this->id, 'id_subgroup' => $subgroup, 'role' => $role, 'cancelled_date' => null));
            $model->cancelled_by = Yii::app()->user->getId();
            $model->cancelled_date = new CDbExpression('NOW()');
            $model->save();
//            $this->notifyUser('changeTaskRole-'.$subgroup,[]);
        }
    }

    /**
     * Save crmTasks model with error checking
     * @throws Exception
     */
    public function saveCheck()
    {
        if (!$this->save()) {
            throw new Exception(json_encode($this->getValidationErrors()));
        }
    }

    public function getStringState($id)
    {
        switch ($id) {
            case 1:
                $state = 'ExpectToExecute';
                break;
            case 2;
                $state =  'Executed';
                break;
            case 3;
                $state =  'Paused';
                break;
            case 4;
                $state =  'Completed';
                break;
            default:
                $state =  'ExpectToExecute';
                break;
        };

        return $state;
    }

    /**
     * @param $chanelName
     * @param $thisUser
     */
    public function notifyUsers($chanelName, $thisUser=true)
    {
        $condition='id_user!='.Yii::app()->user->getId();
        if($thisUser) {
            $condition='';
        }
        $signatories=CrmRolesTasks::model()->findAllByAttributes(array('id_task'=>$this->id),array(
            'condition'=>$condition,
            'select'=>'id_user',
            'distinct'=>true,
        ));
        foreach ($signatories as $signatory){
            $this->notifyUser($chanelName.'-'.$signatory->id_user,[]);
        }
    }

    public function notifyByEmail($notificationParams, $task){
        $notifyMessage = Newsletters::model()->find('related_model_id=:task',['task'=>(int)$task]);
        if (!$notifyMessage){
            $notifyMessage = new Newsletters();
            $schedulerTask = new SchedulerTasks();
        }
        else{
            $schedulerTask = SchedulerTasks::model()->find('related_model_id=:newsletterId AND type=:type',
                            ['newsletterId'=>$notifyMessage->id,'type'=>TaskFactory::NEWSLETTER]);
            if(!$schedulerTask){
                $schedulerTask = new SchedulerTasks();
            }
            else{
                if (!$notificationParams['notify']){
                    $schedulerTask->status = SchedulerTasks::STATUSOK;
                    $schedulerTask->save(false);
                    return false;
                }
            }
        }
        $notifyMessage->setScenario('crmTaskNotification');
        $notifyMessageTemplate = MailTemplates::model()->findByPk((int)$notificationParams['template']['id']);
        $notifyMessage->newsletter_email = Config::getNewsletterMailAddress();
        $notifyMessage->template_id = $notifyMessageTemplate->id;
        $notifyMessage->template_params = $notifyMessageTemplate->parameters;
        $notifyMessage->recipients = $notificationParams['users'];
        $notifyMessage->type = 'taskNotification';
        $notifyMessage->created_by = Yii::app()->user->id;
        $notifyMessage->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
        $notifyMessage->related_model_id = $task;
        $schedulerTask->type = TaskFactory::NEWSLETTER;
        date_default_timezone_set(Config::getServerTimezone());
        if (isset($notificationParams['oneTimeNotification']) && $notificationParams['oneTimeNotification']){
            $schedulerTask->repeat_type = SchedulerTasks::ONCETASK;
            $schedulerTask->parameters = null;
            $dayOffset = 0;
            $currentDayOfWeek = date('N');
            if (!empty($notificationParams['weekdays']) ){
                $dayOffset = $notificationParams['weekdays'][0] - $currentDayOfWeek;
                if ($dayOffset < 0){
                    $dayOffset = $dayOffset + 7;
                }
            }
            $schedulerTask->start_time =  date('Y-m-d H:i:s',strtotime("+{$dayOffset} days {$notificationParams['time']}"));
        }
        else{
            $schedulerTask->repeat_type = SchedulerTasks::WEEKDAYS;
            $schedulerTask->parameters = $notificationParams['weekdays'];
            $schedulerTask->start_time =  date('Y-m-d H:i:s',strtotime($notificationParams['time']));
        }
        $schedulerTask->end_time =  null;
        if ($notifyMessage->validate() && $schedulerTask->validate()){
            $notifyMessage->save(false);
            $schedulerTask->related_model_id = $notifyMessage->id;
            $schedulerTask->save(false);
            return false;
        }
        else{
            return array_merge($notifyMessage->getErrors(),$schedulerTask->getErrors());
        }
    }

    public function getTaskUsersByRole($role, $onlyActive = true){
        $criteria = new CDbCriteria();
        $criteria->with = ['idUser'];
        $criteria->addCondition('id_task=:taskId');
        $criteria->addCondition('t.role=:role');
        $criteria->params = ['taskId'=>$this->id,'role'=>$role];

        if($onlyActive){
            $criteria->addCondition('cancelled_date IS NULL');
        }
        $users = CrmRolesTasks::model()->findAll($criteria);
        $subgroups = CrmSubgroupRolesTasks::model()->findAll('id_task =:id_task AND role=:role AND cancelled_date IS NULL',['id_task' =>$this->id,'role' => $role ]);
        foreach ($subgroups as $subgroup){
            $students = OfflineStudents::model()->findAll('id_subgroup=:subgroup AND end_date IS NULL',['subgroup' =>$subgroup->id_subgroup]);
            foreach ($students as $student){
                array_push($users, $student);
            }
            unset($student);
            unset($students);
        }
        return $users;


    }

    /**
     * @param $query string - query from typeahead
     * @return string - json for typeahead field in user manage page
     */
    public function subTasksList($query)
    {
        $criteria = new CDbCriteria();
        $criteria->alias = "st";
        $criteria->addSearchCondition('name', $query, true, "OR", "LIKE");
        $criteria->addCondition('st.id_parent IS NULL and st.cancelled_date is NULL');
        return CrmTasks::model()->findAll($criteria);
    }

    public function taskListQuery($conditions, $params)
    {
        return Yii::app()->db->createCommand()
        ->select('ctMain.id as id_task, ctMain.name as title, ctMain.body as task_description, ctMain.id_state as idState, ctMain.endTask as endTask, ctMain.deadline as deadline, ctpMain.title as priorityTitle, ctpMain.description as priorityDescription, cttMain.title_ua as typeTitle, ctMain.created_date, ctsMain.description as stateDescription')
        ->from('crm_roles_tasks as crtMain')
        ->join('crm_tasks ctMain', 'ctMain.id = crtMain.id_task')
        ->join('crm_task_type cttMain', 'cttMain.id = ctMain.type')
        ->join('crm_task_priority as ctpMain', 'ctpMain.id = ctMain.priority')
        ->join('crm_task_status as ctsMain', 'ctsMain.id = ctMain.id_state')
        ->where($conditions, $params)
        ->group('crtMain.id_task')
        ->order('ctMain.priority desc');
    }

}
