<?php

class CoworkerRequests extends Request implements IRequest
{
    protected $template =  'coworker'. DIRECTORY_SEPARATOR . '_newCoworkerRequest';
    protected $approveTemplate = 'coworker'. DIRECTORY_SEPARATOR . '_approveCoworkerRequest';
    protected $cancelTemplate = 'coworker'. DIRECTORY_SEPARATOR . '_cancelCoworkerRequest';
    protected $assignCoworkerTemplate = '_assignCoworker';
    protected $cancelCoworkerTemplate = '_assignCoworker';

    protected $requestType =  2;

  public function getTableSchema()
   {
    $table = parent::getTableSchema();

    $table->columns['request_model_id']->isForeignKey = true;
    $table->foreignKeys['request_model_id'] = array('StudentReg', 'id_teacher');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    return $table;
   }
  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'idTeacher' => array(self::BELONGS_TO, 'StudentReg', ['id_teacher'=>'request_model_id']),
            'userApproved' => array(self::BELONGS_TO, 'StudentReg', ['request_user'=>'id']),
        );
    }

    public function approve()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->action_user = Yii::app()->user->id;
        $this->action_date = date("Y-m-d H:i:s");
        $this->action = self::STATUS_APPROVE;
        if ($this->save()) {
            $this->notify($this->approveTemplate, array($this->idTeacher));
                return true;
        }
        return false;
    }

    public function content()
    {
        return false;
    }

    public function title()
    {
        return "Запит на призначення співробітника";
    }

    public function subject()
    {
        return "Запит на призначення співробітника";
    }

    public function teacher(){
        return $this->idTeacher;
    }

    public function cancel()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->action = self::STATUS_CANCEL;
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
     $this->notify($this->template,[$this->idTeacher,$this->userApproved],true);
    }
    return false;
   }
}
