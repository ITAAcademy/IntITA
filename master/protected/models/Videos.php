<?php

/**
 * This is the model class for table "videos".
 *
 * The followings are the available columns in table 'videos':
 * @property integer $VideoID
 * @property integer $fkModuleID
 * @property integer $fkLectureID
 * @property string $VideoName
 * @property string $VideoDescription
 * @property string $VideoURL
 * @property integer $VideoDuration
 */
class Videos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'videos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkModuleID, fkLectureID, VideoName, VideoDescription, VideoURL, VideoDurationSeconds', 'required'),
			array('VideoID, fkModuleID, fkLectureID, VideoDurationSeconds', 'numerical', 'integerOnly'=>true),
			array('VideoName, VideoDescription, VideoURL', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('VideoID, fkModuleID, fkLectureID, VideoName, VideoDescription, VideoURL, VideoDurationSeconds', 'safe', 'on'=>'search'),
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
			'VideoID' => 'Video ID',
			'fkModuleID' => 'Module',
			'fkLectureID' => 'Lecture',
			'VideoName' => 'Video Title',
			'VideoDescription' => 'Video description',
			'VideoURL' => 'Video URL',
			'VideoDurationSeconds' => 'Video duration (seconds)',
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

		$criteria->compare('VideoID',$this->VideoID);
		$criteria->compare('fkModuleID',$this->fkModuleID);
		$criteria->compare('fkLectureID',$this->fkLectureID);
		$criteria->compare('VideoName',$this->VideoName,true);
		$criteria->compare('VideoDescription',$this->VideoDescription,true);
		$criteria->compare('VideoURL',$this->VideoURL,true);
		$criteria->compare('VideoDurationSeconds',$this->VideoDurationSeconds);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Videos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
