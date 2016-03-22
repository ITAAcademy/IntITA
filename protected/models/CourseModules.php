<?php

/**
 * This is the model class for table "course_modules".
 *
 * The followings are the available columns in table 'course_modules':
 * @property integer $id_course
 * @property integer $id_module
 * @property integer $order
 * @property integer $mandatory_modules
 * @property integer $price_in_course
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Module $moduleInCourse
 * @property Module $mandatory
 */
class CourseModules extends CActiveRecord
{
    public $durationInMonths;
    public $lessonCount;
    public $start;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course_modules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_course, id_module, order', 'required'),
			array('id_course, id_module, order, mandatory_modules, lessonCount, durationInMonths,
			price_in_course', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			array('id_course, id_module, order, mandatory_modules, durationInMonths, lessonCount, price_in_course',
                'safe', 'on'=>'search'),
            //array('on' => 'activeModule'),
		);
	}

	/**
	 * @return array relational rules.
	 */
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'mandatory' => array(self::HAS_ONE, 'Module', array('module_ID' => 'mandatory_modules')),
            'moduleInCourse' => array(self::HAS_ONE, 'Module', array('module_ID' => 'id_module')),
            'course' => array(self::HAS_ONE, 'Course', array('course_ID' => 'id_course')),
        );
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_course' => 'Id Course',
			'id_module' => 'Id Module',
            'mandatory_modules' => 'Попередні модулі(обов`язкові)',
			'order' => 'Order',
            'price_in_course' => 'Ціна модуля у курсі'
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
	public function search($id)
	{

		$criteria = new CDbCriteria;

        $criteria->addCondition('id_course='.$id);

		$criteria->compare('id_course',$this->id_course);
		$criteria->compare('id_module',$this->id_module);
		$criteria->compare('order',$this->order);
        $criteria->compare('mandatory_modules',$this->mandatory_modules);
        $criteria->compare('price_in_course',$this->price_in_course);
        $criteria->with = array('moduleInCourse');

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>false,
            'sort'=>array(
                'defaultOrder'=>array(
                    'order'=>CSort::SORT_ASC,
                )
            )
		));

	}

    public function activeModules($id)
    {
        $criteria = new CDbCriteria;

        $criteria->addCondition('id_course='.$id);
        $criteria->compare('id_course',$this->id_course);
        $criteria->compare('id_module',$this->id_module);
        $criteria->compare('order',$this->order);
        $criteria->compare('mandatory_modules',$this->mandatory_modules);
        $criteria->compare('price_in_course',$this->price_in_course);
        $criteria->with = array('moduleInCourse');
        $criteria->alias = 'module';
        $criteria->addCondition('cancelled = 0');


        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>false,
            'sort'=>array(
                'defaultOrder'=>array(
                    'order'=>CSort::SORT_ASC,
                )
            )
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CourseModules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function primaryKey()
    {
        return array('id_course', 'id_module');
    }

    public static function addNewRecord($idModule, $idCourse){
        $model = new CourseModules();

        $model->id_course = $idCourse;
        $model->id_module = $idModule;

        $model->order = CourseModules::getLastModuleOrder($idCourse) + 1;

        return $model->save();
    }

    public static function getLastModuleOrder($idCourse){
        $lastOrder = Yii::app()->db
            ->createCommand("SELECT MAX(`order`) FROM course_modules where id_course=".$idCourse)
            ->queryScalar();

        return $lastOrder;
    }

    public static function getPrevModule($idCourse, $order){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_module, `order`';
        $criteria->condition = 'id_course='.$idCourse.' and `order`<'.$order;
        $criteria->order = '`order` DESC';
        $criteria->limit = 1;

        $result = CourseModules::model()->find($criteria)->id_module;

        return $result;
    }

    public static function getNextModule($idCourse, $order){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_module, `order`';
        $criteria->condition = 'id_course='.$idCourse.' and `order`>'.$order;
        $criteria->order = '`order` ASC';
        $criteria->limit = 1;

        $result = CourseModules::model()->find($criteria)->id_module;

        return $result;
    }

    public static function sortByModuleDuration($idCourse, $modules)
    {
        for($i = 0,  $count = count($modules); $i < $count; $i++){
            $modules[$i]['lessonCount'] = Module::getLessonsCount($modules[$i]["id_module"]);
            $modules[$i]['durationInMonths'] = (integer)CourseModules::getModuleDurationMonths($modules[$i]["id_module"]);
            $modules[$i]['start'] = CourseModules::startMonth($idCourse, $modules[$i]["id_module"]);
        }
        usort($modules, 'CourseModules::sortByMandatoryModules');

        return $modules;
    }

    public static function sortByMandatoryModules($a, $b)
    {
        $startA = $a->start;
        $startB = $b->start;
        if ($startA == $startB) {
            $lessonCountA = $a->lessonCount;
            $lessonCountB = $b->lessonCount;
            if ($lessonCountA == $lessonCountB){
                $durationA = $a->durationInMonths;
                $durationB = $b->durationInMonths;
                if ($durationA == $durationB){
                    return ($lessonCountA < $lessonCountB) ? +1 : -1;
                } else {
                    return ($durationA < $durationB) ? +1 : -1;
                }
            } else {
                return 0;
            }
        } else {
            return ($startA < $startB) ? +1 : -1;
        }
    }

    public static function startMonth($idCourse, $idModule){
        $mandatory_module = CourseModules::model()->findByAttributes(array(
            'id_course' => $idCourse,
            'id_module' => $idModule
        ))->mandatory_modules;
        if ($mandatory_module == 0){
            return 0;
        } else {
            return CourseModules::startMonth($idCourse, $mandatory_module) +
            CourseModules::getModuleDurationMonths($mandatory_module);
        }
    }

    public static function getModuleDurationMonths($idModule){
        $lectureHoursInMonth = Module::lessonsInMonth($idModule);

        $lectureCount = Module::getLessonsCount($idModule);
        if($lectureHoursInMonth != 0){
            return ceil($lectureCount/$lectureHoursInMonth);
        } else {
            return 0;
        }
    }

    public static function checkModuleInCourse($idModule,$idCourse)
    {
        $module = CourseModules::model()->findByAttributes(array('id_module'=> $idModule,'id_course' =>$idCourse));

        if($module)
            return true;
        else return false;

    }
    public static function getCoursesListName($idModule){
        $courses = CourseModules::model()->findAllByAttributes(array(
            'id_module' => $idModule
        ));
        $coursesCount=count($courses);
        if($coursesCount==0){
            return false;
        }else{
            $list = [];
            for ($i = 0; $i < $coursesCount; $i++) {
                array_push($list, Course::getCourseName($courses[$i]->id_course));
            }
            return $list;
        }
    }

    public static function availableMandatoryModules($course, $module){
        $criteria = new CDbCriteria();
        $criteria->alias = 'm';
        $criteria->distinct = true;
        $criteria->join = 'LEFT JOIN course_modules cm ON cm.id_module = m.module_ID';
        $criteria->condition = 'cm.id_course='.$course.' and cm.id_module<>'.$module;

        return Module::model()->findAll($criteria);
    }
}
