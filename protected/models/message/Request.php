<?php

/**
 * This is the model class for table "requests".
 *
 * The followings are the available columns in table 'requests':
 * @property integer $id
 * @property integer $type
 * @property integer $request_model_id
 * @property integer $request_user
 * @property integer $action
 * @property integer $checked_date
 * @property string $action_date
 * @property integer $action_user
 * @property string $comment
 * @property integer $deleted
 * @property integer $organization

 */
class Request extends CActiveRecord
{

 /**
  * Request types
  */
 const AUTHOR_REQUESTS              = 1;
 const COWORKER_REQUESTS            = 2;
 const MODULE_REVISION_REQUESTS     = 3;
 const REVISION_REQUESTS            = 4;
 const PAYMENT_REQUESTS             = 5;
 const TEACHER_CONSULTANT_REQESTS   = 6;
 const WRITTEN_AGREEMENTS_REQUESTS  = 7;
 const SCHEMAS_REQUESES             = 8;

 /**
  * Request statuses
  */
 const STATUS_NEW     = 0;
 const STATUS_CANCEL  = 1;
 const STATUS_APPROVE = 2;

 protected $viewPath = 'application.views.mail';

 /**
  * Message template
  * Override in inheritor
  * @var string
  */
  protected $template;

  /**
  * Message approved template
  * Override in inheritor
  * @var string
  */
  protected $approveTemplate;
 /**
  * Message cancelled template
  * Override in inheritor
  * @var string
  */
  protected $cancelTemplate;
 /**
  * Message text
  * Override in inheritor
  * @var string
  */
  protected $message;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, request_model_id, request_user', 'required'),
			array('type, request_model_id, action, action_user, request_user, deleted, organization', 'numerical','integerOnly'=>true),
			array('comment', 'length', 'max'=>255),
			array('action_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, request_model_id, action, action_date, checked_date, action_user, comment', 'safe', 'on'=>'search'),
		);
	}

  public function getTableSchema()
   {
    $table = parent::getTableSchema();
    $table->columns['action_user']->isForeignKey = true;
    $table->foreignKeys['action_user'] = array('StudentReg', 'id');
    $table->columns['request_user']->isForeignKey = true;
    $table->foreignKeys['request_user'] = array('StudentReg', 'id');
    return $table;
   }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
      'actionUser' => array(self::BELONGS_TO, 'StudentReg', 'action_user'),
      'requestUser' => array(self::BELONGS_TO, 'StudentReg', 'request_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'request_model_id' => 'Request Model',
			'action' => 'Action',
			'action_date' => 'Action Date',
			'action_user' => 'Action User',
			'comment' => 'Comment',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type',$this->type);
		$criteria->compare('request_model_id',$this->request_model_id);
		$criteria->compare('action',$this->action);
		$criteria->compare('action_date',$this->action_date,true);
		$criteria->compare('action_user',$this->action_user);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

  public function notifyReveiverUser($viewParams,$emailNotify = false){
    $message = new IntitaMessages();
    $message->subject = $this->notificationTemlpates[$this->type]['notification']['subject'];

  }

  public function beforeSave(){
	   if($this->isNewRecord){
	    $this->organization = Yii::app()->user->model->getCurrentOrganizationId();
    }
	   return parent::beforeSave();
  }

  public function delete(){
	   $this->deleted = 1;
	   $this->save();
  }

  public function read(){
    date_default_timezone_set(Config::getServerTimezone());
	   $this->checked_date = date("Y-m-d H:i:s");;
	   $this->save();
  }

  public function setApproved()
   {
    date_default_timezone_set(Config::getServerTimezone());
    $this->action = self::STATUS_APPROVE;
    $this->action_user = Yii::app()->user->getId();
    $this->action_date = date("Y-m-d H:i:s");
    $this->save();
   }

  public function statusToString()
   {
    if ($this->isDeleted()) {
     return 'видалений';
    } else {
     if ($this->isApproved()) {
      return 'підтверджений';
     } else {
      return 'очікує затвердження';
     }
    }
   }

 /**
  * Return true when request is deleted
  * @return bool
  */
  public function isDeleted()
   {
    return ($this->deleted == 1);
   }

 /**
  * Return true when request is readed or checked
  * @return bool
  */
  public function isRead(){
   return ($this->checked_date != null);
  }

 /**
  * Return true when request is approved
  * @return bool
  */
  public function isApproved()
   {
    return ($this->action == self::STATUS_APPROVE);
   }
 /**
  * Return true when request is rejected
  * @return bool
  */

  public function isRejected()
   {
    return ($this->action == self::STATUS_CANCEL);
   }

 /**
  * Return true when request is open
  * @return bool
  */
  public function isRequestOpen()
   {
    return ($this->action == self::STATUS_NEW);
   }

  public function approvedByToString()
   {
    if ($this->isApproved()) {
     return 'Підтверджено: ' . $this->actionUser->userNameWithEmail() . ' ' . date("d.m.Y H:i", strtotime($this->action_date));
    } else {
     return '';
    }
   }

  public function rejectedByToString()
   {
    if ($this->isRejected()) {
     return 'Відхилено: ' . $this->actionUser->userNameWithEmail() . ' ' . date("d.m.Y H:i", strtotime($this->action_date));
    } else {
     return '';
    }
   }

  public function renderNotifyMessage($template,$params){
   $this->viewPath = ($dir = Yii::getPathOfAlias($this->viewPath)) ? $dir : Yii::app()->viewPath . DIRECTORY_SEPARATOR . 'mail';
   return Yii::app()->controller->renderFile($this->viewPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $template . '.php', array(
       'params' => $params,
   ), true);
  }

  public function notify($template, $params, $emailNotify = false)
   {
    $message = new Messages();
    $message->sender = Yii::app()->user->getId();
    $message->subject = $this->subject();
    $message->receiver = $this->request_user;
    $message->message_text = $this->renderNotifyMessage($template,$params);
    $message->save();
    if ($emailNotify){
     $receiverUser = StudentReg::model()->findByPk($this->request_user);
     $mailSender = new MailTransport();
     $mailText = $this->renderNotifyMessage($template,$params);
     $mailSender->send($receiverUser->email,'IntITA',$this->subject(),$mailText);
    }
   }

  public function type(){
   return $this->type;
  }

  public function user(){
   return $this->requestUser;
  }

  public function notApprovedRequests()
   {
    return $this->findAll('action = 0');
   }

  public function save($runValidation = true, $attributes = null)
   {
    if ($this->isNewRecord){
     $this->request_user = Yii::app()->user->id;
     $this->type = $this->requestType;
     $this->organization = Yii::app()->user->model->getCurrentOrganizationId();
     $this->notify($this->template,array($this->module, $this->request_user));
    }
    return parent::save($runValidation, $attributes);
   }

  public function findByAttributes($attributes,$condition='',$params=array()){
   $attributes = array_merge($attributes,['type'=>$this->requestType]);
   return parent::findByAttributes($attributes,$condition='',$params=array());
  }

  public function findAll($condition='',$params=array()){
   if ($condition instanceof CDbCriteria){
    $condition->addCondition('type = '.$this->requestType);
   }
   elseif($condition == ''){
    $condition = 'type = '.$this->requestType;
   }
   else{
    $condition = 'type = '.$this->requestType.' AND '.$condition;
   }
   return parent::findAll($condition,$params=array());
  }

  public static function model($className=__CLASS__)
   {
    return parent::model($className);
   }

 }

