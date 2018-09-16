<?php

class WrittenAgreementRequest extends Request implements IRequest
{
    private $template = 'accountant'. DIRECTORY_SEPARATOR . '_newWrittenAgreementRequest';
    private $approveTemplate = 'accountant'. DIRECTORY_SEPARATOR . '_approveWrittenAgreementRequest';
    private $rejectRequestTemplate = 'accountant'. DIRECTORY_SEPARATOR . '_cancelWrittenAgreementRequest';
    protected $requestType =  7;

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'agreement' => array(self::BELONGS_TO, 'UserAgreements', ['request_model_id'=>'id']),
            'coworkerChecked' => array(self::BELONGS_TO, 'StudentReg', ['action_user'=>'id']),
            'service' => [self::BELONGS_TO, 'Service', ['service_id' => 'service_id'], 'through' => 'agreement'],
            'requestUser' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),

        );
    }


    public function setChecked()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->user_checked = Yii::app()->user->getId();
        $this->date_checked = date("Y-m-d H:i:s");
        $this->save();
    }
    
    public function approve()
    {
        $this->action = self::STATUS_APPROVE;
        $this->action_user = Yii::app()->user->getId();
        $this->action_date = new CDbExpression('NOW()');
        if($this->save()){
         $this->notify($this->approveTemplate,array($user));
        };
    }


    public function title()
    {
        return "Запит на затвердження паперогво договору";
    }

    public function agreement()
    {
        return $this->id_agreement;
    }


    public function subject()
    {
        return "Запит на затвердженння паперового договору";
    }

    public function isApprovable()
    {
        return $this->status == self::STATUS_NEW;
    }

    public function cancel()
    {
        date_default_timezone_set(Config::getServerTimezone());
        $this->action = self::STATUS_CANCEL;
        $this->action_user = Yii::app()->user->getId();
        $this->action_date = new CDbExpression('NOW()');
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
     $this->notify($this->template,[$this->agreement,$this->requestUser],true);
    }
    return false;
   }

}