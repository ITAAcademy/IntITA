<?php

/**
 * This is the model class for table "teachers".
 *
 * The followings are the available columns in table 'teachers':
 * @property integer $teacher_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $foto_url
 * @property string $tel
 * @property integer $gender
 * @property integer $date_of_birth
 * @property string $subjects
 * @property string $job_title
 * @property string $education
 * @property string $degree
 * @property string $articles
 * @property string $other_teacher_detailes
 *
 * The followings are the available model relations:
 * @property Users $email0
 */
class Teachers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teachers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, middle_name, last_name, email, foto_url, tel, articles, other_teacher_detailes', 'required'),
			array('gender, date_of_birth', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name, email', 'length', 'max'=>35),
			array('foto_url, education', 'length', 'max'=>100),
			array('tel', 'length', 'max'=>15),
			array('subjects, job_title, degree', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('teacher_id, first_name, middle_name, last_name, email, foto_url, tel, gender, date_of_birth, subjects, job_title, education, degree, articles, other_teacher_detailes', 'safe', 'on'=>'search'),
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
			'email0' => array(self::BELONGS_TO, 'Users', 'email'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teacher_id' => 'Teacher',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'foto_url' => 'Foto Url',
			'tel' => 'Tel',
			'gender' => 'Gender',
			'date_of_birth' => 'Date Of Birth',
			'subjects' => 'Subjects',
			'job_title' => 'Job Title',
			'education' => 'Education',
			'degree' => 'Degree',
			'articles' => 'Articles',
			'other_teacher_detailes' => 'Other Teacher Detailes',
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

		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('foto_url',$this->foto_url,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('date_of_birth',$this->date_of_birth);
		$criteria->compare('subjects',$this->subjects,true);
		$criteria->compare('job_title',$this->job_title,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('articles',$this->articles,true);
		$criteria->compare('other_teacher_detailes',$this->other_teacher_detailes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teachers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
