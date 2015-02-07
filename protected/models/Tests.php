<?php

/**
 * This is the model class for table "tests".
 *
 * The followings are the available columns in table 'tests':
 * @property integer $test_ID
 * @property integer $fkmodule_ID
 * @property integer $fklecture_ID
 * @property string $test_title
 * @property string $test_description
 * @property string $test_url
 */
class Tests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkmodule_ID, fklecture_ID, test_title, test_description, test_url', 'required'),
			array('fkmodule_ID, fklecture_ID', 'numerical', 'integerOnly'=>true),
			array('test_title, test_description, test_url', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('test_ID, fkmodule_ID, fklecture_ID, test_title, test_description, test_url', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'test_ID' => 'Test',
			'fkmodule_ID' => 'Fkmodule',
			'fklecture_ID' => 'Fklecture',
			'test_title' => 'Test Title',
			'test_description' => 'Test Description',
			'test_url' => 'Test Url',
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

		$criteria->compare('test_ID',$this->test_ID);
		$criteria->compare('fkmodule_ID',$this->fkmodule_ID);
		$criteria->compare('fklecture_ID',$this->fklecture_ID);
		$criteria->compare('test_title',$this->test_title,true);
		$criteria->compare('test_description',$this->test_description,true);
		$criteria->compare('test_url',$this->test_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
