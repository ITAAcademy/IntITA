<?php

/**
 * This is the model class for table "messages_payment".
 *
 * The followings are the available columns in table 'messages_payment':
 * @property integer $id_message
 * @property integer $operation_id
 * @property integer $service_id
 *
 * The followings are the available model relations:
 * @property Operation $operation
 * @property Messages $message0
 */
class PaymentRequest extends Request implements IRequest
{
    private $message;
    private $template;
    private $subject;
    private $receiver;
    private $billableObject;
    protected $requestType = 5;

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'operation' => array(self::BELONGS_TO, 'Operation', ['model_id'=>'id']),
		);
	}

//    public function build($operation, StudentReg $user, IBillableObject $billableObject, $educForm = EducationForm::ONLINE,
//						  $chained = null, $original = null)
//    {
//        //create and init parent model
//		$educFormModel = EducationForm::model()->findByPk($educForm);
//        $this->message = new Messages();
//        $this->message->buildMessage(Config::getAdminId(), self::TYPE, $chained, $original);
//
//        $this->operation_id = ($operation)?$operation->id:null;
//        $this->subject = $billableObject->paymentMailTheme();
//        $this->template = $billableObject->paymentMailTemplate();
//        $this->billableObject = $billableObject;
//        $this->receiver = $user;
//        $this->service_id = ($billableObject->getType() == 'K')?CourseService::getService($billableObject->course_ID, $educFormModel)->service_id:
//        ModuleService::model()->getService($billableObject->module_ID, $educFormModel)->service_id;
//    }

	public function create(){
        $this->message->save();
        $this->id_message =  $this->message->id;
        $this->id_message;

        $this->save();
        return $this;
	}

	public function send(IMailSender $sender){
        $sender->renderBodyTemplate($this->template, array($this->billableObject));

		if ($this->addReceiver($this->receiver)) {
			$sender->send($this->receiver->email, '', $this->subject, '');
            $this->notifyUser('newMessages-'.$this->receiver->id,['messages'=>1]);
		}

        $this->message->draft = 0;
        return $this->message->save();
	}

    public function subject(){
        if(!$this->billableObject){
            if($this->service_id == null) {
                return "Доступ до лекцій";
            } else {
                $service = AbstractIntITAService::getServiceById($this->service_id);
                $this->billableObject = $service->getBillableObject();
            }
        }
        return $this->billableObject->paymentMailTheme();
    }


    public function text(){
        if(!$this->billableObject){
            if($this->service_id == null) {
                return "Вітаємо!<br> Тобі надано доступ до лекцій модуля N!.";
            } else {
                $service = AbstractIntITAService::getServiceById($this->service_id);
                $this->billableObject = $service->getBillableObject();
            }
        }
        $this->notify($this->billableObject->paymentMailTemplate(), array($this->billableObject));
    }

  public function approve()
   {
    // TODO: Implement approve() method.
   }

  public function cancel()
   {
    // TODO: Implement cancel() method.
   }

  public function title()
   {
    // TODO: Implement title() method.
   }
   public function newRequest($requestedModel)
    {
     $this->request_model_id = $requestedModel;
     $this->action = Request::STATUS_NEW;
     if ($this->save()){
      $this->notify($this->template,[$this->requestUser,$this->idRevision],true);
     }
     return false;
    }
 }
