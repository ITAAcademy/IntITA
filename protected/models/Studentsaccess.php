<?php

/**
 * This is the model class for table "studentsaccess".
 *
 * The followings are the available columns in table 'studentsaccess':
 * @property integer $id_access
 * @property integer $student_id
 * @property integer $course_id
 * @property integer $module_id
 * @property integer $lecture_id
 * @property string $date_of_change
 *
 * The followings are the available model relations:
 * @property Students $student
 * @property Course $course
 * @property Lectures $lecture
 * @property Modules $module
 */
class Studentsaccess extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'studentsaccess';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, course_id, module_id, lecture_id, date_of_change', 'required'),
			array('student_id, course_id, module_id, lecture_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_access, student_id, course_id, module_id, lecture_id, date_of_change', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Students', 'student_id'),
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'lecture' => array(self::BELONGS_TO, 'Lectures', 'lecture_id'),
			'module' => array(self::BELONGS_TO, 'Modules', 'module_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_access' => 'Id Access',
			'student_id' => 'Student',
			'course_id' => 'Course',
			'module_id' => 'Module',
			'lecture_id' => 'Lecture',
			'date_of_change' => 'Date Of Change',
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

		$criteria->compare('id_access',$this->id_access);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('module_id',$this->module_id);
		$criteria->compare('lecture_id',$this->lecture_id);
		$criteria->compare('date_of_change',$this->date_of_change,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Studentsaccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function isAccessable (integer $student_id, integer $course_id, integer $module_id,  integer $lecture_id)
	{
		return true;
	}

	public function setAccess()
	{
		return true;
	}
}
