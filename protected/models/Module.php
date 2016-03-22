<?php

/**
 * This is the model class for table "module".
 *
 * The followings are the available columns in table 'module':
 * @property integer $module_ID
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 * @property string $alias
 * @property string $language
 * @property integer $module_duration_hours
 * @property integer $module_duration_days
 * @property integer $lesson_count
 * @property string $module_price
 * @property string $for_whom
 * @property string $what_you_learn
 * @property string $what_you_get
 * @property string $module_img
 * @property integer $hours_in_day
 * @property integer $days_in_week
 * @property integer $level
 * @property integer $rating
 * @property integer $module_number
 * @property integer $cancelled
 *
 * The followings are the available model relations:
 * @property Course $Course
 * @property CourseModules $inCourses
 * @property Level $level0
 * @property Lecture[] $lectures
 * @property Teacher $teacher
 */

const EDITOR_ENABLED = 1;
const EDITOR_DISABLED = 0;
 
class Module extends CActiveRecord implements IBillableObject
{
    public $logo = array();
    public $oldLogo;
    const READY = 0;
    const DEVELOP = 1;
    const ACTIVE = 0;
    const DELETED = 1;


    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'module';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status', 'required'),
            array('language, title_ua, level', 'required'),
            array('alias,module_number','unique'),
            array('module_duration_hours, module_duration_days, lesson_count, hours_in_day, days_in_week,
            module_number, cancelled, level', 'numerical', 'integerOnly' => true, 'message' => Yii::t('module', '0413')),
            array('module_price', 'length', 'max' => 10),
            array('module_number', 'unique', 'message' => 'Номер модуля повинен бути унікальним. Такий номер модуля вже існує.'),
            array('alias', 'length', 'max' => 30),
            array('language', 'length', 'max' => 6),
            array('title_ua', 'match',
                'pattern' => "/^[=а-еж-щьюяА-ЕЖ-ЩЬЮЯa-zA-Z0-9ЄєІіЇї.,\/<>:;`'?!~* ()+-]+$/u",
                'message' => 'Тільки українські символи!','on' => 'insert'),
            array('module_img, title_ua, title_ru, title_en', 'length', 'max' => 255),
            array('module_img', 'file', 'types' => 'jpg, gif, png, jpeg', 'allowEmpty' => true),
            array('for_whom, what_you_learn, what_you_get, days_in_week, hours_in_day, level,days_in_week, hours_in_day, level, rating', 'safe'),
            array('title_ua, title_ru, title_en, level,hours_in_day, days_in_week', 'required', 'message' => Yii::t('module', '0412'), 'on' => 'canedit'),
            array('hours_in_day, days_in_week', 'numerical', 'integerOnly' => true, 'min' => 1, "tooSmall" => Yii::t('module', '0413'), 'message' => Yii::t('module', '0413'), 'on' => 'canedit'),
            array('module_price', 'numerical', 'integerOnly' => true, 'min' => 0, "tooSmall" => Yii::t('module', '0413'), 'message' => Yii::t('module', '0413'), 'on' => 'canedit'),
            // The following rule is used by search().
            array('module_ID, title_ua, title_ru, title_en, alias, language, lesson_count, module_price, for_whom,
            what_you_learn, what_you_get, module_img,
			days_in_week, hours_in_day, level, module_number, cancelled', 'safe', 'on' => 'search'),
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
            'ModuleId' => array(self::BELONGS_TO, 'Lecture', 'idModule'),
            'Course' => array(self::MANY_MANY,'Course','course_modules(id_module,id_course)'),
            'lectures' => array(self::HAS_MANY, 'Lecture','idModule',
                                                'order' => 'lectures.order ASC'),
            'teacher' => array(self::MANY_MANY, 'Teacher','teacher_module(idModule,idTeacher)',
                                                'on' => 'teacher.isPrint=1', 'condition'=>'end_time IS NULL'),
            'level0' => array(self::BELONGS_TO, 'Level', 'level'),
            'inCourses' => array(self::MANY_MANY, 'CourseModules', 'course_modules(id_course,id_module)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'module_ID' => 'Module',
            'title_ua' => 'Назва українською',
            'title_ru' => 'Назва російською',
            'title_en' => 'Назва англійською',
            'alias' => 'Псевдонім',
            'language' => 'Мова',
//            'module_duration_hours' => 'Тривалість модуля (години)',
//            'module_duration_days' => 'Тривалість модуля (дні)',
            'lesson_count' => 'Кількість лекцій',
            'module_price' => 'Ціна',
            'for_whom' => 'Для кого',
            'what_you_learn' => 'Що ти вивчиш',
            'what_you_get' => 'Що ти отримаєш',
            'module_img' => 'Фото',
            'module_number' => 'Номер модуля',
            'cancelled' => 'Видалений',
            'status' => 'Статус',
            'hours_in_day' => 'Годин в день (рекомендований графік занять)',
            'days_in_week' => 'Днів у тиждень (рекомендований графік занять)',

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
        $criteria = new CDbCriteria;

        $criteria->compare('module_ID', $this->module_ID);
        $criteria->compare('title_ua', $this->title_ua, true);
        $criteria->compare('title_ru', $this->title_ru, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('language', $this->language, true);
//        $criteria->compare('module_duration_hours', $this->module_duration_hours);
//        $criteria->compare('module_duration_days', $this->module_duration_days);
        $criteria->compare('lesson_count', $this->lesson_count);
        $criteria->compare('module_price', $this->module_price, true);
        $criteria->compare('for_whom', $this->for_whom, true);
        $criteria->compare('what_you_learn', $this->what_you_learn, true);
        $criteria->compare('what_you_get', $this->what_you_get, true);
        $criteria->compare('module_img', $this->module_img, true);
        $criteria->compare('days_in_week', $this->days_in_week, true);
        $criteria->compare('hours_in_day', $this->hours_in_day, true);
        $criteria->compare('level', $this->level, true);
        $criteria->compare('rating', $this->rating, true);
        $criteria->compare('module_number', $this->module_number, true);
        $criteria->compare('cancelled', $this->cancelled, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Module the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getBasePrice()
    {
        return $this->module_price;
    }

    public function getDuration()
    {
        return $this->getModuleDuration();
    }

    public function getHoursTermination($num)
    {
        //Оставляем две последние цифры от $num
        $number = substr($num, -2);

        //Если 2 последние цифры входят в диапазон от 11 до 14
        //Тогда подставляем окончание "ЕВ"
        if ($number > 10 and $number < 15) {
            $term = "";
        } else {

            $number = substr($number, -1);

            if ($number == 0) {
                $term = "";
            }
            if ($number == 1) {
                $term = "а";
            }
            if ($number > 1) {
                $term = "и";
            }
            if ($number > 4) {
                $term = "";
            }
        }

        echo ' годин' . $term;
    }

    public function getLessonsTermination($num)
    {
        //Оставляем две последние цифры от $num
        $number = substr($num, -2);

        //Если 2 последние цифры входят в диапазон от 11 до 14
        //Тогда подставляем окончание "ЕВ"
        if ($number > 10 and $number < 15) {
            $term = "ь";
        } else {

            $number = substr($number, -1);

            if ($number == 0) {
                $term = "ь";
            }
            if ($number == 1) {
                $term = "тя";
            }
            if ($number > 1) {
                $term = "тя";
            }
            if ($number > 4) {
                $term = "ь";
            }
        }

        echo ' занят' . $term;
    }

    public function getByAlias($alias)
    {
        return $this->find('alias=:alias', array(':alias' == $alias))->module_ID;
    }

    public function level(){
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        return $this->level0->$title;
    }

    public function rate(){
        return $this->level0->id;
    }


    /**
     * Creating module processes in initNewModule function.
     * Deprecated.
     */
//    public function addNewModule($idCourse, $titleUa, $titleRu, $titleEn, $lang)
//    {
//        $module = new Module();
//        $courseModule = new CourseModules();
//        $module->level = Course::model()->findByPk($idCourse)->level;
//        $module->language = $lang;
//        $module->title_ua = $titleUa;
//        $module->title_ru = $titleRu;
//        $module->title_en = $titleEn;
//        if ($module->validate()) {
//            if($module->save()){
//                $idModule = Yii::app()->db->createCommand("SELECT max(module_ID) from module")->queryScalar();
//                $module->alias = $idModule;
//                $module->save();
//                $order = count(Yii::app()->db->createCommand("SELECT DISTINCT id_module FROM course_modules WHERE id_course =" . $idCourse
//                )->queryAll());
//                Module::model()->updateByPk($module->module_ID, array('module_img' => 'module.png'));
//                if(!file_exists(Yii::app()->basePath . "/../content/module_".$idModule)){
//                    mkdir(Yii::app()->basePath . "/../content/module_".$idModule);
//                }
//                $courseModule->id_course = $idCourse;
//                $courseModule->id_module = $idModule;
//                $courseModule->order = $order + 1;
//                if ($courseModule->validate()) {
//                    $courseModule->save();
//                    return true;
//                }
//            }
//        }
//        return false;
//    }

//    public static function getModules($id)
//    {
//        $modules = Yii::app()->db->createCommand()
//            ->select('module_ID')
//            ->from('module')
//            ->order('module_ID DESC')
//            ->where('course=' . $id)
//            ->queryAll();
//        $result = [];
//        for ($i = count($modules) - 1; $i > 0; $i--) {
//            array_push($result, $modules[$i]["module_ID"]);
//        }
//        return $result;
//    }

    public static function getModuleAlias($idModule, $idCourse)
    {
        if ($alias = Module::model()->findByPk($idModule)->alias) {
            return $alias;
        } else {
            if ($idCourse != '') {
                return CourseModules::model()->findByAttributes(array(
                    'id_course' => $idCourse,
                    'id_module' => $idModule
                ))->order;
            } else {
                return $idModule;
            }
        }
    }

    public static function getModuleByAlias($alias, $idCourse)
    {

        if ($module = Module::model()->find(array(
            'condition' => 'alias = :alias',
            'params' => array('alias' => $alias),
        ))
        ) {
            return $module;
        } else {
            if ($idCourse != null) {
                if(!CourseModules::model()->exists('id_course = :course and `order` = :order', array(
                    'course' => $idCourse,
                    'order' => $alias
                )))
                    throw new \application\components\Exceptions\IntItaException(404, 'Такого модуля у цьому курсі немає.');

                $idModule = CourseModules::model()->findByAttributes(array(
                    'id_course' => $idCourse,
                    'order' => $alias
                ))->id_module;
                return Module::model()->findByPk($idModule);
            } else {
                return Module::model()->findByPk($alias);
            }
        }
    }

    public function monthsCount(){
        return round($this->getLecturesCount() * 7 / ($this->hours_in_day * $this->days_in_week));
    }

    public static function lessonsInMonth($idModule)
    {
        $model = Module::model()->findByPk($idModule);

        $lesson = $model->getModuleDuration() * 4; //умножаем на уроки в день

        return $lesson;

    }

    public function getModuleDuration()
    {
        $hours = ($this->hours_in_day != 0) ? $this->hours_in_day : 3;
        $days = ($this->days_in_week != 0) ? $this->days_in_week : 2;

        return round($hours * $days);
    }

    public function statusTitle()
    {
        if ($this->status == 0) return 'в розробці';
        if ($this->status == 1) return 'готовий';
        else return false;
    }

    public function cancelledTitle()
    {
        if ($this->cancelled == 0) return 'доступний';
        if ($this->cancelled == 1) return 'видалений';
        else return false;
    }

    public function getNumber(){
        return $this->module_number;
    }

    public function getType(){
        return 'M';
    }

//    public static function showAvailableModule($course)
//    {
//        $first = '<select name="module" class="form-control" id="payModuleList" required="true">';
//
//        $modulelist = [];
//
//        $criteria = new CDbCriteria;
//        $criteria->alias = 'course_modules';
//        $criteria->select = 'id_module';
//        $criteria->order = '`order` ASC';
//        $criteria->addCondition('id_course=' . $course);
//        $temp = CourseModules::model()->findAll($criteria);
//        for ($i = 0; $i < count($temp); $i++) {
//            array_push($modulelist, $temp[$i]->id_module);
//        }
//        $titleParam = Module::getModuleTitleParam();
//
//        $criteriaData = new CDbCriteria;
//        $criteriaData->alias = 'module';
//        $criteriaData->addNotInCondition('module_ID', $modulelist);
//
//        $rows = Module::model()->findAll($criteriaData);
//        $result = $first . '<optgroup label="' . Yii::t('payments', '0607') . '">';
//        foreach ($rows as $numRow => $row) {
//            if ($row[$titleParam] == '')
//                $title = 'title_ua';
//            else $title = $titleParam;
//            $result = $result . '<option value="' . $row['module_ID'] . '">' . $row[$title]." (".$row['language'].") ".'</option>';
//        };
//        $last = '</select>';
//        return $result . $last;
//    }


    public static function getResourceDescription($id)
    {
        $module = Module::model()->findByPk($id);
        return "Module" . " " . $module->module_ID . ". " . $module->title_ua;
    }


    public static function getLessonsCount($idModule)
    {
        return count(Lecture::model()->findAllByAttributes(array('idModule' => $idModule)));
    }

//    public static function getTeacherModules($teacher, $modules)
//    {
//        $result = [];
//        for ($i = 0; $i < count($modules); $i++) {
//            if ($id = TeacherModule::model()->exists('idTeacher=:teacher AND idModule=:module', array(
//                ':teacher' => $teacher,
//                ':module' => $modules[$i],
//            ))
//            ) {
//                array_push($result, $modules[$i]);
//            }
//        }
//        return $result;
//    }

    public function getTitle()
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        $moduleTitle = $this->$title;
        if ($moduleTitle == "") {
            $moduleTitle = $this->title_ua;
        }
        return CHtml::encode($moduleTitle);
    }
    public function getTitleForBreadcrumbs()
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        $moduleTitle = $this->$title;
        if ($moduleTitle == "") {
            $moduleTitle = $this->title_ua;
        }
        return $moduleTitle;
    }
    public static function getModuleName($id)
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';

        $title = "title_" . $lang;
        $moduleTitle = Module::model()->findByPk($id)->$title;
        if ($moduleTitle == "") {
            $moduleTitle = Module::model()->findByPk($id)->title_ua;
        }
        return $moduleTitle;
    }

    public static function getModuleDurationFormat($countless, $hours, $hInDay, $daysInWeek)
    {
        if ($countless == 0) {
            return '';
        }
        return ", " . Yii::t('module', '0217') . " - <b>" . round($countless * 7 / ($hInDay * $daysInWeek)) . " " . Yii::t('module', '0218') . "</b> (" . $hInDay . " " . Yii::t('module', '0219') . ", " . $daysInWeek . " " . Yii::t('module', '0220') . ")";
    }

    public static function getModulePrice($moduleId, $idCourse=0)
    {
        if ($idCourse > 0) {
            $price = CourseModules::model()->findByAttributes(array('id_module' => $moduleId,
                'id_course' => $idCourse))->price_in_course;
            if ($price <= 0) {
                $price = Module::model()->findByPk($moduleId)->module_price;
            }
        } else {
            $price = Module::model()->findByPk($moduleId)->module_price * Config::getCoeffIndependentModule();
        }
        if ($price == 0) {
            return '<span class="colorGreen">' . Yii::t('module', '0421') . '</span>';
        }
    }

    public function lecturesCount()
    {
        return Lecture::model()->count("idModule=$this->module_ID and `order`>0");
    }

    public static function getModuleTitleParam()
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        return $title;
    }

    public function titleParam()
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        return $title;
    }

    public static function getDefaultModuleName($moduleName)
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;

        if ($moduleName == "")
            return 'title_ua';
        else return $title;
    }

    public function getCourseOfModule()
    {
        if (CourseModules::model()->exists('id_module=:id', array(':id' => $this->module_ID))) {
            $courseId = CourseModules::model()->find('id_module =' . $this->module_ID)->id_course;
            return $courseId;
        } else {
            return false;
        }
    }

    public static function getModuleLang($idModule)
    {
        return Module::model()->findByPk($idModule)->language;
    }

    public static function getModuleNumber($idModule)
    {
        return Module::model()->findByPk($idModule)->module_number;
    }

    public static function getModuleSumma($moduleId, $idCourse = 0)
    {
        if ($idCourse > 0) {
            $price = CourseModules::model()->findByAttributes(array('id_module' => $moduleId,
                'id_course' => $idCourse))->price_in_course;
            if ($price <= 0) {
                return round(Module::model()->findByPk($moduleId)->module_price);
            } else {
                return $price;
            }
        } else {
            return round(Module::model()->findByPk($moduleId)->module_price * Config::getCoeffIndependentModule());
        }
    }


    //todo refactor
    public static function getModulePricePayment($idModule, $discount = 0, $idCourse)
    {
        $price = Module::getModuleSumma($idModule, $idCourse);
        if ($price == 0) {
            return '<span style="display: inline-block;margin-top: 3px" class="colorGreen">' . Yii::t('module', '0421') . '</span>';
        }
        if ($discount == 0) {
            return
                '<table class="mainPay">
                    <tr>
                    <td class="icoPay"><img class="icoNoCheck" src="' .
                StaticFilesHelper::createPath('image', 'course', 'wallet.png') . '"><img class="icoCheck" src="' .
                StaticFilesHelper::createPath('image', 'course', 'checkWallet.png') . '"></td>
                    <td>
                        <table>
                            <tr><td><div>' . Yii::t('payment', '0661') . '</div></td></tr>
                            <tr><td><span class="coursePriceStatus2">' . $price . " " . Yii::t('courses', '0322') . '</span></td></tr>
                        </table>
                    </td>
                    </tr>
                </table>';
        }
        return
            '<table class="mainPay">
                <tr>
                <td class="icoPay"><img class="icoNoCheck" src="' .
            StaticFilesHelper::createPath('image', 'course', 'wallet.png') . '"><img class="icoCheck" src="' .
            StaticFilesHelper::createPath('image', 'course', 'checkWallet.png') . '"></td>
                <td>
                    <table>
                        <tr><td><div>' . Yii::t('course', '0197') . '</div></td></tr>
                        <tr><td>
                            <div class="numbers"><span class="coursePriceStatus1">' . $price . " " . Yii::t('courses', '0322') . '</span>
                            &nbsp<span class="coursePriceStatus2">' . PaymentHelper::discountedPrice($price, $discount) . " " . Yii::t('courses', '0322') . '</span><br>
                            <span id="discount"> <img style="text-align:right" src="' . StaticFilesHelper::createPath('image', 'course', 'pig.png') . '">(' . Yii::t('courses', '0144') . ' - ' . $discount . '%)</span>
                            </div>
                        </td></tr>
                    </table>
                </td>
                </tr>
            </table>';
    }

    public static function getAverageModuleDuration($lesson_count, $hours_in_day, $days_in_week)
    {
        return round($lesson_count * 7 / ($hours_in_day * $days_in_week));
    }

    public function averageModuleDuration()
    {
        return round($this->lesson_count * 7 / ($this->hours_in_day * $this->days_in_week));
    }

    public static function getTimeAnsweredQuiz($quiz, $user)
    {
        switch (LectureElement::model()->findByPk($quiz)->id_type) {
            case '5':
                return TaskMarks::taskTime($user, Task::model()->findByAttributes(array('condition' => $quiz))->id);
                break;
            case '6':
                $plain=PlainTask::model()->findByAttributes(array('block_element' => $quiz))->id;
                $isAnswer=PlainTaskAnswer::model()->findByAttributes(array('id_plain_task' =>$plain,'id_student'=>$user));
                if($isAnswer) return $isAnswer->date;
                else return false;
                break;
            case '12':
                return TestsMarks::testTime($user, Tests::model()->findByAttributes(array('block_element' => $quiz))->id);
                break;
            case '9':
                return SkipTaskMarks::taskTime($user, SkipTask::model()->findByAttributes(array('condition' => $quiz))->id);
                break;
            default:
                return false;
                break;
        }
    }

    //true if $pathString is a module alias
    public static function checkModuleAlias($pathString)
    {
        if (in_array($pathString, array('index', 'saveLesson', 'saveModule', 'unableLesson', 'upLesson',
            'downLesson', 'lecturesUpdate', 'updateModuleAttribute', 'updateModuleImage'
        ))) {
            return false;
        } else {
            return true;
        }
    }

    public static function getTeacherByModule($idModule)
    {
        $module = Module::model()->findByPk($idModule);

        return $module->teacher;
    }

    /**
     * Checks if model can be editable by current user
     * @return int "1" if model editable by current user, "0" if does not editable
     */
    public function isEditableByUser($authId) {
        if ($this->teacher == null) {
            $this->getRelated('teacher');
        }
        foreach ($this->teacher as $teacher){
            if ($teacher->user_id == $authId) { //if teacher's user_id correspond to authorized user_id
                return EDITOR_ENABLED;
                break;
            }
        }
        return EDITOR_DISABLED;
    }

    /**
     * Returns CArrayDataProvider of lectures.
     * @return CArrayDataProvider
     */
    public function getLecturesDataProvider($reloadLectures = false) {
        if ($this->lectures == null || $reloadLectures) {
            $this->getRelated('lectures');
        }
        return new CArrayDataProvider($this->lectures, array(
            'pagination' => false
        ));
    }

    /**
     * Creates new lecture.
     * @param array $params must include fields 'titleUa', 'titleRu', 'titleEn', 'order';
     * @return Lecture - created lecture instance.
     */

    public function addLecture($params) {

        $teacher = Teacher::model()->find('user_id=:user', array(':user' => Yii::app()->user->getId()));

        //todo: rafactor static method
        $lecture = Lecture::model()->addNewLesson(
            $this->module_ID,
            $params['titleUa'],
            $params['titleRu'],
            $params['titleEn'],
            $teacher->teacher_id
        );

        $this->lesson_count = $this->getLecturesCount(true);
        $this->update(array('lesson_count'));

        LecturePage::addNewPage($lecture->id, 1);

        return $lecture;
    }

    /**
     * Returns count of lectures in the module
     * @return int
     * @throws CDbException
     */

    public function getLecturesCount($reloadLectures = false) {
        if (!isset($this->lectures) || $reloadLectures){
            $this->getRelated('lectures');
        }
        return count($this->lectures);
    }


    /**
     * Disables lecture from the module and shifting order of lessons;
     * @param $idLecture
     * @throws CDbException
     */
    public function disableLesson($idLecture) {

        $lecture = Lecture::model()->findByPk($idLecture);

        $oldLecturePosition = $lecture->order;

        $count =  $this->getLecturesCount();

        $lecture->idModule = 0;
        $lecture->order = 0;
        $lecture->update(array('idModule', 'order'));

        for ($i = $oldLecturePosition; $i < $count; $i++) {
            $this->lectures[$i]->decreaseOrderByOne();
        }

        $this->lesson_count = $count-1;
        $this->update(array('lesson_count'));
    }

    /**
     * Initialises a new module and returns its instance.
     * @param $course
     * @param $titleUa
     * @param $titleRu
     * @param $titleEn
     * @param $lang
     * @return $this|null
     * @throws CDbException
     * @throws \application\components\Exceptions\ModuleValidationException
     */
    public function initNewModule($course, $titleUa, $titleRu, $titleEn, $lang) {

        $this->level = $course->level;
        $this->language = $lang;
        $this->title_ua = $titleUa;
        $this->title_ru = $titleRu;
        $this->title_en = $titleEn;

        if ($this->save()) {
            $this->alias = $this->module_ID;
            $this->module_img = "module.png";
            $this->update(array('alias', 'module_img'));

            if(!file_exists(Yii::app()->basePath . "/../content/module_".$this->module_ID)){
                mkdir(Yii::app()->basePath . "/../content/module_".$this->module_ID);
            }

            $courseModule = new CourseModules();
            $courseModule->id_course = $course->course_ID;
            $courseModule->id_module = $this->module_ID;
            $courseModule->order = $course->getModuleCount() + 1;
            if ($courseModule->save()) {
                return $this;
            }
        }
        else {
            $errors = "";
            foreach ($this->getErrors() as $field => $errorMessages) {
                $errors .= $field ;
                if (is_array($errorMessages)){
                    $errors .= ':';
                    foreach ($errorMessages as $message) {
                        $errors .= ' ' . $message;
                    }
                }
                $errors .= ', ';
            }

            throw new \application\components\Exceptions\ModuleValidationException($errors);
        }
    }

    /**
     * Level ups the lecture.
     * @param $idLecture
     */
    public function upLecture($idLecture) {
        if ($this->lectures === null) {
            $this->getRelated('lectures');
        }

        foreach ($this->lectures as $index => $lecture) {
            if ($lecture->id == $idLecture) {
                // if the first lecture do nothing
                if ($index == 0) {
                    return;
                }

                $this->swapLecturesOrder($lecture, $this->lectures[$index-1]);
                return;
            }
        }
    }

    /**
     * Level downs the lecture.
     * @param $idLecture
     * @throws CDbException
     */
    public function downLecture($idLecture) {
        if ($this->lectures === null) {
            $this->getRelated('lectures');
        }

        $count = $this->getLecturesCount();

        foreach ($this->lectures as $index => $lecture) {

            if ($lecture->id == $idLecture) {
                // if the last lecture do nothing
                if ($index == $count-1) {
                    return;
                }
                $this->swapLecturesOrder($lecture, $this->lectures[$index+1]);
                return;
            }
        }
    }

    /**
     * Swaps lectures order.
     * @param $lectureA
     * @param $lectureB
     */
    private function swapLecturesOrder($lectureA, $lectureB) {
        $orderA = $lectureA->order;
        $lectureA->order = $lectureB->order;
        $lectureB->order = $orderA;

        $lectureA->update(array('order'));
        $lectureB->update(array('order'));
    }


    public static function canAccess($idModule,$userId)
    {
        $services_user = Module::findService($userId);

        if($services_user)
        {
            foreach ($services_user as $service_user) {
                $service = AbstractIntITAService::getServiceById($service_user['service_id']);
                if($service)
                {
                    return $service->checkAccess($idModule);
                }
            }

        }

        else return false;
    }

    private static function findService($userId)
    {
        $service_user = Yii::app()->db->createCommand()
            ->select('service_id, user_id')
            ->from('service_user')
            ->where('user_id = :user_id',array(':user_id' => $userId))
            ->queryAll();

        return $service_user;
    }

    public static function allModules($query){
        $criteria = new CDbCriteria();
        $criteria->select = "module_ID, title_ua, title_ru, title_en, language";
        $criteria->alias = "s";
        $criteria->addSearchCondition('title_ua', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('title_ru', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('title_en', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('module_ID', $query, true, "OR", "LIKE");

        $data = Module::model()->findAll($criteria);

        $result = array();
        $lang =(Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $titleParam = "title_".$lang;
        foreach ($data as $key=>$record) {
            $result["results"][$key]["id"] = $record->module_ID;
            $result["results"][$key]["title"] = $record->$titleParam." (".$record->language.")";
        }

        return json_encode($result);
    }
    /**
     * Returns id of last quiz in the module.
     * Direct queries to database uses for greater performance
     * @return bool $lectureElement->idBlock or false if nothing found
     * @throws CDbException
     */
    public function getLastQuizId() {
        $sqlPagesList =
            "SELECT id FROM lectures WHERE idModule=" . $this->module_ID . " ORDER BY `order` DESC;";

        $lecturePagesIdList = Yii::app()->db->createCommand($sqlPagesList)->queryall();

        $length = count($lecturePagesIdList);
        for ($i = 0; $i < $length; $i++) {
            $sqlGetLastQuizId =
                "SELECT lecture_page.quiz FROM lecture_page WHERE id_lecture = " . $lecturePagesIdList[$i]['id'] . " AND quiz IS NOT NULL ORDER BY page_order DESC LIMIT 1;";
            $idBlock = Yii::app()->db->createCommand($sqlGetLastQuizId)->queryScalar();
            if ($idBlock) {
                return $idBlock;
            }
        }
        return false;
    }

    /**
     * Returns id of first quiz in the module.
     * Direct queries to database uses for greater performance
     * @return bool $lectureElement->idBlock or false if nothing found
     * @throws CDbException
     */
    public function getFirstQuizId() {
        $sqlPagesList =
            "SELECT id FROM lectures WHERE idModule=" . $this->module_ID . " ORDER BY `order` ASC;";

        $lecturePagesIdList = Yii::app()->db->createCommand($sqlPagesList)->queryall();

        $length = count($lecturePagesIdList);
        for ($i = 0; $i < $length; $i++) {
            $sqlGetLastQuizId =
                "SELECT lecture_page.quiz FROM lecture_page WHERE id_lecture = " . $lecturePagesIdList[$i]['id'] . " AND quiz IS NOT NULL ORDER BY page_order ASC LIMIT 1;";
            $idBlock = Yii::app()->db->createCommand($sqlGetLastQuizId)->queryScalar();
            if ($idBlock) {
                return $idBlock;
            }
        }
        return false;
    }

    public function paymentMailTemplate(){
        return '_payModuleMail';
    }

    public function paymentMailTheme(){
        return 'Доступ до модуля';
    }

    public static function modulesList(){
        $courses = Module::model()->findAll();
        $return = array('data' => array());

        foreach ($courses as $record) {
            $row = array();

            $row["id"] = $record->module_ID;
            $row["alias"] = $record->alias;
            $row["lang"] = $record->language;
            $row["title"]["name"] = CHtml::encode($record->title_ua);
            $row["title"]["header"] = "'Модуль ".CHtml::encode($record->title_ua)."'";
            $row["status"] = $record->statusLabel();
            $row["level"] = $record->level0->title_ua;
            $row["title"]["link"] = "'".Yii::app()->createUrl("/_teacher/_admin/module/view", array("id"=>$record->module_ID))."'";
            $row["cancelled"] = $record->cancelledLabel();
            $row["addAuthorLink"] = "'".Yii::app()->createUrl("/_teacher/_admin/module/addTeacher", array("id"=>$record->module_ID))."'";

            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public static function modulesNotInDefinedCourse($query, $course){
        $criteria = new CDbCriteria();
        $criteria->select = "module_ID, title_ua, title_ru, title_en, language";
        $criteria->alias = "m";
        $criteria->distinct = true;
        $criteria->addSearchCondition('title_ua', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('title_ru', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('title_en', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('module_ID', $query, true, "OR", "LIKE");
        $criteria->join = 'JOIN course_modules cm ON cm.id_module = m.module_ID';
        $criteria->addCondition('cm.id_course <>'.$course);
        $data = Module::model()->findAll($criteria);

        $result = array();
        $lang =(Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $titleParam = "title_".$lang;
        foreach ($data as $key=>$record) {
            $result["results"][$key]["id"] = $record->module_ID;
            $result["results"][$key]["title"] = $record->$titleParam." (".$record->language.")";
        }

        return json_encode($result);
    }

    public function isReady(){
        return $this->status == Module::READY;
    }

    public function isCancelled(){
        return $this->cancelled == Module::ACTIVE;
    }

    public function statusLabel(){
        return ($this->isReady())?'готовий':'в розробці';
    }

    public function cancelledLabel(){
        return ($this->isCancelled())? 'доступний' : 'видалений';
    }
    public function lastLectureID()
    {
        $criteria = new CDbCriteria;
        $criteria->alias = 'lecture';
        $criteria->order = '`order` DESC';
        $criteria->condition = 'idModule=' . $this->module_ID . ' and `order`>0';
        if (isset(Lecture::model()->find($criteria)->id))
            return Lecture::model()->find($criteria)->id;
        else return false;
    }

    public static function isAliasUnique($alias){
        return Module::model()->exists('alias=:alias', array(':alias' => $alias)) == false;
    }
}
