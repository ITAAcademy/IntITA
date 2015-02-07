<?php

/**
 * This is the model class for table "lectures".
 *
 * The followings are the available columns in table 'lectures':
 * @property integer $lecture_ID
 * @property integer $fkcourse_ID
 * @property integer $fkmodule_ID
 * @property string $name_classes
 * @property string $goal_of_classes
 * @property integer $total_number_of_items
 * @property integer $duration_in_hours
 */
class Lectures extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lectures';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkcourse_ID, fkmodule_ID, name_classes, goal_of_classes, total_number_of_items, duration_in_hours', 'required'),
			array('fkcourse_ID, fkmodule_ID, total_number_of_items, duration_in_hours', 'numerical', 'integerOnly'=>true),
			array('name_classes, goal_of_classes', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('lecture_ID, fkcourse_ID, fkmodule_ID, name_classes, goal_of_classes, total_number_of_items, duration_in_hours', 'safe', 'on'=>'search'),
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
			'lecture_ID' => 'Lecture',
			'fkcourse_ID' => 'Fkcourse',
			'fkmodule_ID' => 'Fkmodule',
			'name_classes' => 'Name Classes',
			'goal_of_classes' => 'Goal Of Classes',
			'total_number_of_items' => 'Total Number Of Items',
			'duration_in_hours' => 'Duration In Hours',
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

		$criteria->compare('lecture_ID',$this->lecture_ID);
		$criteria->compare('fkcourse_ID',$this->fkcourse_ID);
		$criteria->compare('fkmodule_ID',$this->fkmodule_ID);
		$criteria->compare('name_classes',$this->name_classes,true);
		$criteria->compare('goal_of_classes',$this->goal_of_classes,true);
		$criteria->compare('total_number_of_items',$this->total_number_of_items);
		$criteria->compare('duration_in_hours',$this->duration_in_hours);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lectures the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
