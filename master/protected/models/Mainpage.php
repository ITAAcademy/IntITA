<?php

/**
 * This is the model class for table "mainpage".
 *
 * The followings are the available columns in table 'mainpage':
 * @property integer $mainpage_id
 * @property string $title
 * @property integer $carousel_id
 * @property string $header1
 * @property string $subheader1
 * @property integer $block1
 * @property integer $block2
 * @property integer $block3
 * @property string $header2
 * @property string $subheader2
 * @property integer $step1
 * @property integer $step2
 * @property integer $step3
 * @property integer $step4
 * @property integer $step5
 *
 * The followings are the available model relations:
 * @property Block $block10
 * @property Block $block20
 * @property Block $block30
 * @property Carousel $carousel
 * @property Step $step10
 * @property Step $step20
 * @property Step $step30
 * @property Step $step40
 * @property Step $step50
 */
class Mainpage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mainpage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mainpage_id, title, carousel_id, header1, subheader1, block1, block2, block3, header2, subheader2, step1, step2, step3, step4, step5', 'required'),
			array('mainpage_id, carousel_id, block1, block2, block3, step1, step2, step3, step4, step5', 'numerical', 'integerOnly'=>true),
			array('title, subheader1, subheader2', 'length', 'max'=>100),
			array('header1, header2', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mainpage_id, title, carousel_id, header1, subheader1, block1, block2, block3, header2, subheader2, step1, step2, step3, step4, step5', 'safe', 'on'=>'search'),
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
			'block10' => array(self::BELONGS_TO, 'Block', 'block1'),
			'block20' => array(self::BELONGS_TO, 'Block', 'block2'),
			'block30' => array(self::BELONGS_TO, 'Block', 'block3'),
			'carousel' => array(self::BELONGS_TO, 'Carousel', 'carousel_id'),
			'step10' => array(self::BELONGS_TO, 'Step', 'step1'),
			'step20' => array(self::BELONGS_TO, 'Step', 'step2'),
			'step30' => array(self::BELONGS_TO, 'Step', 'step3'),
			'step40' => array(self::BELONGS_TO, 'Step', 'step4'),
			'step50' => array(self::BELONGS_TO, 'Step', 'step5'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mainpage_id' => 'Mainpage',
			'title' => 'Title',
			'carousel_id' => 'Carousel',
			'header1' => 'Header1',
			'subheader1' => 'Subheader1',
			'block1' => 'Block1',
			'block2' => 'Block2',
			'block3' => 'Block3',
			'header2' => 'Header2',
			'subheader2' => 'Subheader2',
			'step1' => 'Step1',
			'step2' => 'Step2',
			'step3' => 'Step3',
			'step4' => 'Step4',
			'step5' => 'Step5',
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

		$criteria->compare('mainpage_id',$this->mainpage_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('carousel_id',$this->carousel_id);
		$criteria->compare('header1',$this->header1,true);
		$criteria->compare('subheader1',$this->subheader1,true);
		$criteria->compare('block1',$this->block1);
		$criteria->compare('block2',$this->block2);
		$criteria->compare('block3',$this->block3);
		$criteria->compare('header2',$this->header2,true);
		$criteria->compare('subheader2',$this->subheader2,true);
		$criteria->compare('step1',$this->step1);
		$criteria->compare('step2',$this->step2);
		$criteria->compare('step3',$this->step3);
		$criteria->compare('step4',$this->step4);
		$criteria->compare('step5',$this->step5);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mainpage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
