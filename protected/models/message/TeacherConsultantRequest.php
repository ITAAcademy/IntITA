<?php

class TeacherConsultantRequest extends Request implements IRequest
{
    protected $template = 'teacher_consultant'. DIRECTORY_SEPARATOR . '_teacherConsultantModuleRequest';
    protected $approveTemplate = 'teacher_consultant'. DIRECTORY_SEPARATOR . '_teacherConsultantApproved';
    protected $requestType =  6;
    private $module;
    private $author;
    private $teacher;

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

  public function getTableSchema()
   {
    $table = parent::getTableSchema();
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    return $table;
   }
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idModule' => array(self::BELONGS_TO, 'Module', ['comment'=>'module_ID']),
            'idTeacher' => array(self::BELONGS_TO, 'StudentReg', ['model_id'=>'id']),
            'userApproved' => array(self::BELONGS_TO, 'StudentReg', ['action_user'=>'id']),
            'requestUser' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),
        );
    }

    public function approve()
    {
        $user = RegisteredUser::userById($this->request_user);
        //add rights to edit module
        $role = new TeacherConsultant();
        if (!$role->checkModule($this->id_teacher, $this->id_module)) {
            if ($user->setRoleAttribute(UserRoles::TEACHER_CONSULTANT, 'module', $this->id_module)) {
                date_default_timezone_set(Config::getServerTimezone());
                //update current request, set approved status
                $this->action_user = Yii::app()->user->id;
                $this->action_date = date("Y-m-d H:i:s");
                $this->action = self::STATUS_APPROVE;
                if ($this->save()) {
                    $this->notify($this->approveTemplate,array($user->registrationData));
                    return "Запит успішно підтверджений.";
                }
            }
            return "Операцію не вдалося виконати";

        } else return "Обраний викладач вже призначений викладачем-консультантом по даному модулю.";
    }

    public function title()
    {
        return "Запит на призначення консультанта";
    }

    public function module()
    {
        return $this->idModule;
    }

    public function subject(){
        return "Запит на призначення викладача-консультанта для модуля";
    }

    // return true if message read by $receiver (param "read" is NULL)

    public function cancel()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->action = self::STATUS_CANCEL;
        $this->action_user = Yii::app()->user->id;
        $this->action_date = date("Y-m-d H:i:s");
        if ($this->save()) {
            return "Операцію успішно виконано.";
        } else {
            return "Операцію не вдалося виконати.";
        }
    }

  public function newRequest($requestedModel)
   {
    $this->request_model_id = $requestedModel;
    $this->action = Request::STATUS_NEW;
    if ($this->save()){
     $this->notify($this->template,[$this->idModule,$this->requestUser,$this->idTeacher],true);
    }
    return false;
   }

}
