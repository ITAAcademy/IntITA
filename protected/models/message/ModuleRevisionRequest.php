<?php

class ModuleRevisionRequest extends Request implements IRequest
{
    protected $template = 'revision'. DIRECTORY_SEPARATOR . '_moduleRevisionRequest';
    protected $approvedTemplate = 'revision'. DIRECTORY_SEPARATOR . '_moduleRevisionRequestApproved';
    protected $cancelledTemplate = 'revision'. DIRECTORY_SEPARATOR . '_moduleRevisionRequestCancelled';
  protected $requestType =  3;

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

  public function getTableSchema()
   {
    $table = parent::getTableSchema();

    $table->columns['request_model_id']->isForeignKey = true;
    $table->foreignKeys['request_model_id'] = array('RevisionModule', 'module_ID');
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    return $table;
   }
    public function relations()
    {
        return array(
            'userApproved' => array(self::BELONGS_TO, 'StudentReg', 'action_user'),
            'userRejected' => array(self::BELONGS_TO, 'StudentReg', 'action_user'),
            'idRevision' => array(self::BELONGS_TO, 'RevisionModule', 'request_model_id'),
            'requestUser' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),
        );
    }

    public function approve()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->idRevision->state->changeTo('approved', Yii::app()->user);
        $this->action_user = Yii::app()->user->id;
        $this->action_date = date("Y-m-d H:i:s");
        $this->action = self::STATUS_APPROVE;
        if ($this->save()) {
            $this->notify($this->approvedTemplate,array($this->idRevision));
            return "Запит успішно підтверджений.";
        }

        return "Операцію не вдалося виконати";
    }

    public function cancel()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->idRevision->state->changeTo('rejected', Yii::app()->user);
        $this->action_user = Yii::app()->user->id;
        $this->action_date = date("Y-m-d H:i:s");
        $this->action = self::STATUS_CANCEL;

     if ($this->save()) {
            return "Операцію успішно виконано.";
        } else {
            return "Операцію не вдалося виконати.";
        }
    }

    public function title()
    {
        return "Запит на затвердження ревізії модуля";
    }

    public function module()
    {
        return Module::model()->findByPk($this->idRevision->id_module);
    }

    public function subject()
    {
        return "Запит на призначення викладача-консультанта для модуля";
    }

}

