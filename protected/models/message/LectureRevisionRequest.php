<?php


class LectureRevisionRequest extends Request implements IRequest
{

  protected $requestType =  4;

  protected $template = 'revision'. DIRECTORY_SEPARATOR . '_revisionRequest';
  protected $approveTemplate = 'revision'. DIRECTORY_SEPARATOR . '_revisionRequestApproved';
  protected $cancelTemplate = 'revision'. DIRECTORY_SEPARATOR . '_revisionRequestCancelled';

  public function getTableSchema()
   {
    $table = parent::getTableSchema();

    $table->columns['request_model_id']->isForeignKey = true;
    $table->foreignKeys['request_model_id'] = array('RevisionLecture', 'module_ID');
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    return $table;
   }
  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

  public function relations()
   {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array_merge(parent::relations(),array(
        'idRevision' => array(self::BELONGS_TO, 'RevisionLecture', 'request_model_id'),
        'requestUser' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),
    ));
   }

    public function approve()
    {
     date_default_timezone_set(Config::getServerTimezone());
     $this->idRevision->state->changeTo('approved', Yii::app()->user);
     $this->action_user = Yii::app()->user->id;
     $this->action_date = date("Y-m-d H:i:s");
     $this->action = self::STATUS_APPROVE;
     if ($this->save()) {
      $this->notify($this->approveTemplate,$this->idRevision);
      return "Запит успішно підтверджений.";
     }

     return "Операцію не вдалося виконати";
    }

  public function cancel()
   {
    date_default_timezone_set(Config::getServerTimezone());
    $this->idRevision->state->changeTo('rejected', Yii::app()->user);
    $this->action_user = Yii::app()->user_id;
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
        return "Запит на затвердження ревізії лекції";
    }

    public function subject()
    {
        return "Запит на затвердження ревізії лекції успішно підтверджено";
    }

  public function module(){
   return $this->idRevision->module;
  }

 }