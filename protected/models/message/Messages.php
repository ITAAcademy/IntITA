<?php

/**
 * This is the model class for table "intita_messages".
 *
 * The followings are the available columns in table 'intita_messages':
 * @property integer $id
 * @property integer $type
 * @property string $create_date
 * @property integer $sender
 * @property integer $receiver
 * @property string $subject
 * @property string $message_text
 * @property string $read_date
 * @property string $receiver_delete_date
 * @property string $sender_delete_date
 * @property integer $parent_id
 *
 */
class Messages extends CActiveRecord
{

 use mailSender;
 const SYSTEM_MESSAGE = 2;
 const USER_MESSAGE = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'intita_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, create_date, receiver', 'required'),
			array('type, sender, receiver, parent_id', 'numerical', 'integerOnly'=>true),
			array('subject', 'length', 'max'=>255),
			array('message_text, read_date, sender_delete_date, receiver_delete_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, create_date, sender, receiver, subject, message_text, read_date, delete_date, parent_id', 'safe', 'on'=>'search'),
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
			'userReceiver' => array(self::BELONGS_TO, 'StudentReg', 'receiver'),
			'userSender' => array(self::BELONGS_TO, 'StudentReg', 'sender'),
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
			'create_date' => 'Create Date',
			'sender' => 'Sender',
			'receiver' => 'Receiver',
			'subject' => 'Subject',
			'message_text' => 'Message Text',
			'read_date' => 'Read Date',
			'sender_delete_date' => 'Delete Date',
			'receiver_delete_date' => 'Delete Date',
			'parent_id' => 'Parent',
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
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('sender',$this->sender);
		$criteria->compare('receiver',$this->receiver);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message_text',$this->message_text,true);
		$criteria->compare('read_date',$this->read_date,true);
		$criteria->compare('sender_delete_date',$this->sender_delete_date,true);
		$criteria->compare('receiver_delete_date',$this->receiver_delete_date,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Messages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

 public function renderMessage(){
	 if ($this->type == 1)
	  return $this->message_text = htmlentities($this->message_text);
 }

  public function buildDialog(){
	   $messages = [];
	   if($this->parent_id !=0){
	    $message = $this->with(['userSender','userReceiver'])->find($this->parent_id);
	    $message->buildDialog();
    }
   array_push($messages, $this);
	  return $messages;
  }

  public function subject(){
	    return $this->subject;
	}

  public function isDeleted(){
	   if ($this->receiver == Yii::app()->user->getId()){
	    return !is_null($this->receiver_delete_date);
    }
   if ($this->sender == Yii::app()->user->getId()){
    return !is_null($this->sender_delete_date);
   }
  }

  public function isRead(){
    return !is_null($this->read_date);
  }

  public function read(){
	  $this->read_date = date("Y-m-d H:i:s");
	  $this->save(false);
  }

  public function sendMessage($receiver,$subject,$text, $parent_id = 0){
	   $this->type = self::USER_MESSAGE;
	   $this->receiver = $receiver;
	   $this->subject = $subject;
	   $this->parent_id = $parent_id;
	   $this->sender = Yii::app()->user->getId();
    $this->message_text = $text;

     $this->create_date = date("Y-m-d H:i:s");
	   return $this->save();
  }

  public function delete(){
   if ($this->receiver == Yii::app()->user->getId()){
    $this->receiver_delete_date = date("Y-m-d H:i:s");
   }
   if ($this->sender == Yii::app()->user->getId()){
    $this->sender_delete_date = date("Y-m-d H:i:s");

   }
   return $this->save(false);
  }

  public function notify(){
	   $message = Yii::app()->controller->renderFile(Yii::app()->viewPath . DIRECTORY_SEPARATOR . 'mail'. DIRECTORY_SEPARATOR .'templates' . DIRECTORY_SEPARATOR . '_newMessage.php', array(
        'params' => [$this->userSender],
    ), true);
   $this->sendmail(null,
               null,
                        $this->userReceiver->email,
                        'Нове приватне повідомлення',
                                $message);
  }

}
