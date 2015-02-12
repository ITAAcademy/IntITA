<?php

/**
 * This is the model class for table "step".
 *
 * The followings are the available columns in table 'step':
 * @property integer $step_id
 * @property integer $order
 * @property string $title
 * @property string $picture_url
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Mainpage[] $mainpages
 * @property Mainpage[] $mainpages1
 * @property Mainpage[] $mainpages2
 * @property Mainpage[] $mainpages3
 * @property Mainpage[] $mainpages4
 */
class NewStep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order, title, picture_url, text', 'required'),
			array('order', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('picture_url, text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('step_id, order, title, picture_url, text', 'safe', 'on'=>'search'),
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
			'mainpages' => array(self::HAS_MANY, 'Mainpage', 'step1'),
			'mainpages1' => array(self::HAS_MANY, 'Mainpage', 'step2'),
			'mainpages2' => array(self::HAS_MANY, 'Mainpage', 'step3'),
			'mainpages3' => array(self::HAS_MANY, 'Mainpage', 'step4'),
			'mainpages4' => array(self::HAS_MANY, 'Mainpage', 'step5'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'step_id' => 'Step',
			'order' => 'Order',
			'title' => 'Title',
			'picture_url' => 'Picture Url',
			'text' => 'Text',
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

		$criteria->compare('step_id',$this->step_id);
		$criteria->compare('order',$this->order);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('picture_url',$this->picture_url,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NewStep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
