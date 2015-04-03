<?php

/**
 * This is the model class for table "lecture".
 *
 * The followings are the available columns in table 'lecture':
 * @property integer $id
 * @property string $image
 * @property string $alias
 * @property string $language
 * @property integer $idModule
 * @property integer $order
 * @property string $title
 * @property integer $idType
 * @property integer $durationInMinutes
 * @property integer $maxNumber
 * @property string $iconIsDone
 * @property integer $preLecture
 * @property integer $nextLecture
 * @property string $idTeacher
 * @property string $lectureUnwatchedImage
 * @property string $lectureTimeImage
 * @property string $lectureOverlookedImage
 */
class Lecture extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lecture';
	}

	function init ()
	{
		/*$id = 1;
		$this->image=Yii::app()->request->baseUrl.$this->findByPk($id)->image;
		$this->idModule=$this->findByPk($id)->idModule;
		$this->order=$this->findByPk($id)->order;
		$this->title=$this->findByPk($id)->title;
		$this->idType=$this->findByPk($id)->idType;
		$this->durationInMinutes=$this->findByPk($id)->durationInMinutes;
		$this->iconIsDone=Yii::app()->request->baseUrl.$this->findByPk($id)->iconIsDone;
		$this->idTeacher = $this->findByPk($id)->idTeacher;
		$this->language = $this->findByPk($id)->language;
		$this->preLecture = $this->findByPk($id)->preLecture;
		$this->nextLecture = $this->findByPk($id)->nextLecture;*/
		return $this->findByPk(1);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, alias, language, module, order, title, idType, durationInMinutes, maxNumber, iconIsDone, preLecture, nextLecture, idTeacher, lectureUnwatchedImage', 'required'),
			array('idModule, order, idType, durationInMinutes, maxNumber, preLecture, nextLecture', 'numerical', 'integerOnly'=>true),
			array('image, iconIsDone, lectureUnwatchedImage', 'length', 'max'=>255),
			array('alias', 'length', 'max'=>10),
			array('language', 'length', 'max'=>6),
			array('title', 'length', 'max'=>100),
			array('idTeacher', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image, alias, language, idModule, order, title, idType, durationInMinutes, maxNumber, iconIsDone, preLecture, nextLecture, idTeacher, lectureUnwatchedImage, lectureOverlookedImage', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'image' => 'Image',
			'alias' => 'Alias',
			'language' => 'Language',
			'idModule' => 'Module',
			'order' => 'Order',
			'title' => 'Title',
			'idType' => 'Id Type',
			'durationInMinutes' => 'Duration In Minutes',
			'maxNumber' => 'Max Number',
			'iconIsDone' => 'Icon Is Done',
			'preLecture' => 'Pre Lecture',
			'nextLecture' => 'Next Lecture',
			'idTeacher' => 'Id Teacher',
			'lectureUnwatchedImage' => 'Lecture Unwatched Image',
			'lectureOverlookedImage' => 'lecture Overlooked Image',
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
		$criteria->compare('language',$this->language,true);
		$criteria->compare('idModule',$this->idModule);
		$criteria->compare('order',$this->order);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('idType',$this->idType);
		$criteria->compare('durationInMinutes',$this->durationInMinutes);
		$criteria->compare('maxNumber',$this->maxNumber);
		$criteria->compare('iconIsDone',$this->iconIsDone,true);
		$criteria->compare('preLecture',$this->preLecture);
		$criteria->compare('nextLecture',$this->nextLecture);
		$criteria->compare('idTeacher',$this->idTeacher,true);
		$criteria->compare('lectureUnwatchedImage',$this->lectureUnwatchedImage,true);
		$criteria->compare('lectureOverlookedImage',$this->lectureOverlookedImage,true);
		$criteria->compare('lectureTimeImage',$this->lectureTimeImage,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lecture the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function getPost()  {
		if ( isset( $this->postLessonInfo))
		{
			return 'True';  // Існування елемента
		}
	}

	function getPre()  {
		if ( isset( $this->preLessonInfo))
		{
			return 'True';  // Існування елемента
		}
	}

	public function getModuleInfoById($id){
		$module = new Module();
		$module->findByPk($id);
		return array(
			'moduleTitle' => $module->module_name,
			'countLessons' =>  $module->lesson_count,
			'idCourse' => $module->course,
		);
	}

	public function getCourseInfoById($id){
	$course = new Course;
		$course->findByPk($id);
	return array(
		'courseTitle' => $course->course_name,
		'courseLang' =>  $course->language,
		);
	}

	public function getLectureInfoByOrder($order){
		$lecture = Lecture::model()->findBySql('order=:order',	array(':order' == $order));
		return array(
			'order' => $lecture->order,
			'title' =>  $lecture->title,
			'typeImage' => $this->getTypeInfo($lecture->idType)[0],
			'typeText' => $this->getTypeInfo($lecture->idType)[1],
			'duration' => $lecture->durationInMinutes,
		);
	}

	public function getTypeInfo($id){
		$type = Lecturetype::model()->findByPk($id);
		return array(
			'image' => $type->image,
			'text' => $type->text,
		);
	}

	public function getTeacherInfoById($id){
		$teacher = TeachersTemp::model()->findByPk($id);
		return array(
			'full_name' => $teacher->first_name.$teacher->middle_name.$teacher->last_name,
			'email' =>  $teacher->email,
			'tel' => $teacher->tel,
			'skype' => $teacher->skype,
			'readMoreLink' => $teacher->readMoreLink,
			'photo' => $teacher->smallImage,
		);
	}



}
