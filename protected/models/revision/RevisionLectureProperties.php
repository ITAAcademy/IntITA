<?php

/**
 * This is the model class for table "vc_lecture_properties".
 *
 * The followings are the available columns in table 'vc_lecture_properties':
 * @property integer $id
 * @property string $image
 * @property string $alias
 * @property integer $order
 * @property integer $id_type
 * @property integer $is_free
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 * @property string $start_date
 * @property integer $id_user_created
 * @property string $update_date
 * @property integer $id_user_updated
 * @property string $send_approval_date
 * @property integer $id_user_sended_approval
 * @property string $reject_date
 * @property integer $id_user_rejected
 * @property string $approve_date
 * @property integer $id_user_approved
 * @property string $end_date
 * @property integer $id_user_cancelled
 *
 * The followings are the available model relations:
 * @property Lecture[] $lectures
 */
class RevisionLectureProperties extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vc_lecture_properties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order, id_type, is_free, start_date', 'required'),
			array('order, id_type, is_free, id_user_created, id_user_updated, id_user_sended_approval, id_user_rejected, id_user_approved, id_user_cancelled', 'numerical', 'integerOnly'=>true),
			array('image, title_ua, title_ru, title_en', 'length', 'max'=>255),
			array('title_ua, title_ru, title_en', 'match', 'pattern' => "/^[=а-яА-ЯёЁa-zA-Z0-9ЄєІіЇї.,\/<>:;`&'?!~* ()+-]+$/u", 'message' => Yii::t('error', '0416')),
			array('alias', 'length', 'max'=>10),
			array('update_date, send_approval_date, reject_date, approve_date, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image, alias, order, id_type, is_free, title_ua, title_ru, title_en, start_date, id_user_created, update_date, id_user_updated, send_approval_date, id_user_sended_approval, reject_date, id_user_rejected, approve_date, id_user_approved, end_date, id_user_cancelled', 'safe', 'on'=>'search'),
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
			'lecture' => array(self::BELONGS_TO, 'Lecture', 'id_properties'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'image' => 'Image',
			'alias' => 'Alias',
			'order' => 'Order',
			'id_type' => 'Id Type',
			'is_free' => 'Is Free',
			'title_ua' => 'Title Ua',
			'title_ru' => 'Title Ru',
			'title_en' => 'Title En',
			'start_date' => 'Start Date',
			'id_user_created' => 'Id User Created',
            'update_date' => 'Update Date',
            'id_user_updated' => 'Id User Updated',
			'reject_date' => 'Reject Date',
			'id_user_rejected' => 'Id User Rejected',
			'approve_date' => 'Approve Date',
			'id_user_approved' => 'Id User Approved',
			'end_date' => 'End Date',
			'id_user_cancelled' => 'Id User Cancelled',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('id_type',$this->id_type);
		$criteria->compare('is_free',$this->is_free);
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('id_user_created',$this->id_user_created);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('id_user_updated',$this->id_user_updated);
		$criteria->compare('send_approval_date',$this->send_approval_date,true);
		$criteria->compare('id_user_sended_approval',$this->id_user_sended_approval);
		$criteria->compare('reject_date',$this->reject_date,true);
		$criteria->compare('id_user_rejected',$this->id_user_rejected);
		$criteria->compare('approve_date',$this->approve_date,true);
		$criteria->compare('id_user_approved',$this->id_user_approved);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('id_user_cancelled',$this->id_user_cancelled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RevisionLectureProperties the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Save properties model with error checking
     * @throws RevisionLectureException
     */
    public function saveCheck() {
        if(!$this->save()) {
            throw new RevisionLecturePropertiesException('400',$this->getValidationErrors());
        }
    }

    /**
     * Initialize lecture properties
     * @param $order
     * @param $titleUa
     * @param $titleEn
     * @param $titleRu
     * @param $user
     * @throws RevisionLecturePropertiesException
     */
    public function initialize($order, $titleUa, $titleEn, $titleRu, $user){
		//ktodo refactor default values
		$this->image = "lectureImage.png";
		$this->alias = "lecture" . $order;
		$this->id_type = 1;
		$this->is_free = 0;

		$this->order = $order;
		$this->title_ua = $titleUa;
		$this->title_ru = $titleRu;
		$this->title_en = $titleEn;
		$this->start_date = new CDbExpression('NOW()');
		$this->id_user_created = $user->getId();

        $this->saveCheck();
	}

    /**
     * Clone properties
     * @param $user
     * @return RevisionLectureProperties
     * @throws RevisionLecturePropertiesException
     */
    public function cloneProperties($user) {
        $newProperties = new RevisionLectureProperties();
        $newProperties->image = $this->image;
        $newProperties->alias = $this->alias;
        $newProperties->id_type = $this->id_type;
        $newProperties->is_free = $this->is_free;
        $newProperties->order = $this->order;
        $newProperties->title_ua = $this->title_ua;
        $newProperties->title_ru = $this->title_ru;
        $newProperties->title_en = $this->title_en;

        $newProperties->start_date = new CDbExpression('NOW()');
        $newProperties->id_user_created = $user->getId();

        $newProperties->saveCheck();

        return $newProperties;
    }

    /**
     * Sets update date and id user.
     * @param $user - current user model
     * @param bool $isSave - true (default) if need to save of false if no need to save
     * @throws RevisionLecturePageException
     */
    public function setUpdateDate($user, $isSave = true) {
        $this->update_date = new CDbExpression('NOW()');
        $this->id_user_updated = $user->getId();
        if ($isSave) {
            $this->saveCheck();
        }
    }

	public function getValidationErrors() {
		$errors=[];
		foreach($this->getErrors() as $attribute){
			foreach($attribute as $error){
				array_push($errors,$error);
			}
		}
		return $errors[0];
	}
}
