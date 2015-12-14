<?php

/**
 * This is the model class for table "lectures".
 *
 * The followings are the available columns in table 'lectures':
 * @property integer $id
 * @property string $image
 * @property string $alias
 * @property integer $idModule
 * @property integer $order
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 * @property integer $idType
 * @property integer $durationInMinutes
 * @property integer $preLecture
 * @property integer $nextLecture
 * @property integer $isFree
 * @property integer $rate
 * @property integer $verified
 *
 * The followings are the available model relations:
 * @property LectureType $type
 */
class Lecture extends CActiveRecord
{
    const MAX_RAIT = 6;
    public $logo = array();
    public $oldLogo;

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
            array('idModule, order, title_ua, durationInMinutes', 'required', 'message' => Yii::t('validation', '0576')),
            array('idModule, order, idType, rate, verified', 'numerical', 'integerOnly' => true),
            array('durationInMinutes', 'numerical', 'integerOnly' => true, 'min' => 0, "tooSmall" => Yii::t('validation', '057'), 'message' => Yii::t('validation', '0577')),
            array('image', 'length', 'max' => 255),
            array('alias', 'length', 'max' => 10),
            array('image', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
            array('title_ua, title_ru, title_en', 'length', 'max' => 255),
            array('title_ua, title_ru, title_en', 'match', 'pattern' => "/^[=а-яА-ЯёЁa-zA-Z0-9ЄєІіЇї.,\/<>:;`'?!~* ()+-]+$/u", 'message' => Yii::t('error', '0416')),
            // The following rule is used by search().
            array('id, image, alias, idModule, order, title_ua, title_ru, title_en, idType, verified, durationInMinutes, isFree, ModuleTitle, rate', 'safe', 'on' => 'search'),
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
            'lectureEl' => array(self::HAS_MANY, 'LectureElement', 'id_lecture'),
            'ModuleTitle' => array(self::BELONGS_TO, 'Module', 'idModule'),

            'module' => array(self::BELONGS_TO, 'Module', 'idModule'),
            'type' => array(self::BELONGS_TO, 'LectureType', 'idType'),
            'pages' => array(self::HAS_MANY, 'LecturePage', 'id_lecture'),
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
            'alias' => 'Псевдонім',
            'idModule' => 'Модуль',
            'order' => 'Порядок',
            'title_ua' => 'Назва українською',
            'title_ru' => 'Назва російською',
            'title_en' => 'Назва англійською',
            'idType' => 'Тип',
            'isFree' => 'Безкоштовно',
            'durationInMinutes' => 'Тривалість лекції(хв)',
            'rate' => 'Рейтинг заняття',
            'verified' => 'Підтверджено адміністратором',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('idModule', $this->idModule, true);
        $criteria->compare('order', $this->order, true);
        $criteria->compare('title_ua', $this->title_ua, true);
        $criteria->compare('title_ru', $this->title_ru, true);
        $criteria->compare('title_en', $this->title_en, true);
        $criteria->compare('idType', $this->idType, true);
        $criteria->compare('isFree', $this->isFree, true);
        $criteria->compare('durationInMinutes', $this->durationInMinutes, true);
        $criteria->compare('rate', $this->rate);
        $criteria->compare('verified', $this->verified);

        $criteria->with=array('ModuleTitle');
        $criteria->compare('ModuleTitle.title_ua',$this->ModuleTitle,true);//???? ModuleTitle.module_name change on ModuleTitle.title_ua
        $criteria->addCondition('`order`>0');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => '50',
            ),
            'sort' => array('attributes' => array(
                'defaultOrder' => array(
                    'order' => CSort::SORT_ASC,
                ),
                'ModuleTitle' => array(
                    'asc' => $expr = 'ModuleTitle.title_ua',
                    'desc' => $expr . ' DESC',
                ),
                'order' => array(
                    'asc' => $expr = '`order`',
                    'desc' => $expr . ' DESC',
                ),
                'title_ua' => array(
                    'asc' => $expr = 'title_ua',
                    'desc' => $expr . ' DESC',
                ),
                'title_ru' => array(
                    'asc' => $expr = 'title_ru',
                    'desc' => $expr . ' DESC',
                ),
                'title_en' => array(
                    'asc' => $expr = 'title_en',
                    'desc' => $expr . ' DESC',
                ),
                'idType' => array(
                    'asc' => $expr = 'idType',
                    'desc' => $expr . ' DESC',
                ),
                'isFree' => array(
                    'asc' => $expr = 'isFree',
                    'desc' => $expr . ' DESC',
                ),
            )),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Lecture the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function pagesList()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('id_lecture=' . $this->id);
        $criteria->order = 'page_order ASC';
        return LecturePage::model()->findAll($criteria);
    }

    public function loadContent($id = 1)
    {
        $lectureElements = LectureElement::model()->findAll(array(
            'select' => 'id_lecture, block_order',
            'condition' => 'id_lecture =:id',
            'params' => array(':id' => $id),
            'order' => 'block_order ASC',
        ));

        if (count($lectureElements) == 0) {
            return false;
        } else {
            $contentList = array();
            for ($i = count($lectureElements); $i > 0; $i--) {
                array_push($contentList,
                    LectureElement::model()->findByPk(array('id_lecture' => $id, 'block_order' => $i))
                );
            }
            return $contentList;
        }

    }

    public static function addNewLesson($module, $title_ua, $title_ru, $title_en, $teacher)
    {
        $lecture = new Lecture();
        $lecture->title_ua = $title_ua;
        $lecture->title_ru = $title_ru;
        $lecture->title_en = $title_en;
        $lecture->idModule = $module;
        $order = Lecture::model()->count("idModule=$module and `order`>0");
        $lecture->order = ++$order;
        $lecture->idTeacher = $teacher;
        $lecture->alias = 'lecture' . $order;

        $lecture->save();

        return $order;
    }

    public function getLecturesTitles($id)
    {
        $list = Lecture::model()->findAllByAttributes(array('idModule' => $id));
        $titles = array();
        $titleParam = Lecture::getTypeTitleParam();
        foreach ($list as $item) {
            array_push($titles, $item->$titleParam);
        }
        return $titles;
    }

    public static function unableLecture($idLecture)
    {

        Lecture::model()->updateByPk($idLecture, array('order' => 0));
    }

    public static function getLessonCont($id)
    {
        $summary = [];

        $criteria = new CDbCriteria;
        $criteria->alias = 'lecture_page';
        $criteria->addCondition('id_lecture=' . $id);
        $criteria->order = 'page_order ASC';
        $cont = LecturePage::model()->findAll($criteria);
        $i = 0;
        foreach ($cont as $type) {
            $summary[$i] = $type->page_title;
            $i++;
        }
        return $summary;
    }

    public function getAllLecturePages()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('id_lecture=' . $this->id);

        return LecturePage::model()->findAll($criteria);
    }

    public static function getTextList($idLecture, $order)
    {
        $idElement = LectureElement::model()->findByAttributes(array('id_lecture' => $idLecture, 'block_order' => $order))->id_block;
        $page = Yii::app()->db->createCommand()
            ->select('page')
            ->from('lecture_element_lecture_page')
            ->where('element=:element', array(':element' => $idElement))
            ->queryScalar();
        $model = LecturePage::model()->findByPk($page);
        return $model->getBlocksListById();
    }

    public static function getLectureIdByModuleOrder($idModule, $order)
    {
        return Lecture::model()->findByAttributes(array(
            'idModule' => $idModule,
            'order' => $order
        ));
    }

    public static function getAllNotVerifiedLectures()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('idModule > 0 and `order` > 0 and `verified` = 0');

        return Lecture::model()->findAll($criteria);
    }

    public function isVerified()
    {
        return $this->verified;
    }

    public static function getAllVerifiedLectures()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('idModule > 0 and `order` > 0 and `verified` = 1');

        return Lecture::model()->findAll($criteria);
    }

    protected function afterSave()
    {
        if ($this->verified == 1) {
            $this->verified = 0;
            $this->save();
        }
    }

    /*Провіряємо чи доступна користувачу лекція. Якщо є попередні лекції з непройденими фінальними завданнями - то лекція не доступна
Перевірка відбувається за допомогою зрівнювання порядку даної лекції з порядком першої лекції з фінальним завданням яке не пройдене
Якщо $order>$enabledOrder то недоступна*/
    public static function accessLecture($id, $order, $enabledOrder)
    {
        $lecture = Lecture::model()->findByPk($id);
        $editMode = PayModules::checkEditMode($lecture->idModule, Yii::app()->user->getId());
        $user = Yii::app()->user->getId();
        if (StudentReg::isAdmin() || $editMode) {
            return true;
        }
        if (Yii::app()->user->isGuest) {
            return false;
        }
        if (!($lecture->isFree)) {
            $modulePermission = new PayModules();
            if (!$modulePermission->checkModulePermission($user, $lecture->idModule, array('read')) || $order > $enabledOrder) {
                return false;
            }
        } else {
            if ($order > $enabledOrder)
                return false;
        }
        return true;
    }

    public static function getTheme($dp)
    {
        $model = Lecture::model()->findByPk($dp->lecture_id);
        if ($model)
            $result = $model->title();
        else $result = Yii::t('profile', '0717');

        return $result;
    }

    public function isFinished($idUser)
    {
        $passedPages = $this->getFinishedPages($idUser);
        $passedLecture = Lecture::isPassedLecture($passedPages);

        return $passedLecture;
    }

    public function lectureTeacher()
    {
        $criteria = new CDbCriteria();
        $criteria->select = "teacher_id";
        $criteria->addCondition("isPrint=1");
        $criteria->order = 'rating ASC';
        $teachers = Teacher::model()->findAll($criteria);

        foreach ($teachers as $key) {
            if (TeacherModule::model()->exists('idTeacher=:idTeacher and idModule=:idModule', array(
                ':idTeacher' => $key->teacher_id,
                ':idModule' => $this->idModule
            ))
            ) {
                return $key;
            }
        }
        return null;
    }

    public function getFinishedPages($user)
    {
        $pages = $this->pages;

        $result = [];
        for ($i = 0, $count = count($pages); $i < $count; $i++) {
            $result[$i]['order'] = $pages[$i]->page_order;
            $result[$i]['isDone'] = LecturePage::isQuizDone($pages[$i]->quiz, $user);
            $result[$i]['title'] = $pages[$i]->page_title;

            if (LecturePage::isQuizDone($pages[$i]->quiz, $user) == false) {
                $result = LecturePage::setNoAccessPages($result, $count, $i, $pages);
                break;
            }
        }
        return $result;
    }

    public static function isPassedLecture($passedPages)
    {
        for ($i = 0, $count = count($passedPages); $i < $count; $i++) {
            if (!$passedPages[$i]['isDone']) return false;
        }
        return true;
    }

    public static function getLectureDuration($id)
    {
        return Lecture::model()->findByPk($id)->durationInMinutes . Yii::t('lecture', '0076');
    }

    public static function getLastEnabledLessonOrder($idModule)
    {
        $user = Yii::app()->user->getId();

        $criteria = new CDbCriteria();
        $criteria->alias = 'lectures';
        $criteria->addCondition('idModule=' . $idModule . ' and `order`>0');
        $criteria->order = '`order` ASC';
        $sortedLectures = Lecture::model()->findAll($criteria);

        $lecturesCount = count($sortedLectures);
        foreach ($sortedLectures as $lecture) {
            if (!$lecture->isFinished($user)) {
                return $lecture->order;
            }
        }
        return $lecturesCount;
    }

    public static function getLectureTitle($id)
    {
        $titleParam = Lecture::getTypeTitleParam();
        $title = Lecture::model()->findByPk($id)->$titleParam;
        if ($title == '') {
            return Lecture::model()->findByPk($id)->title_ua;
        } else {
            return $title;
        }
    }


    public function accessPages($user, $editMode = 0, $isAdmin = 0)
    {
        /*Sort page_order by Ascending*/
        $criteria = new CDbCriteria;
        $criteria->alias = 'lecture_page';
        $criteria->order = 'page_order ASC';
        $criteria->condition = 'id_lecture=' . $this->id;

        $pages = LecturePage::model()->findAll($criteria);

        $result = [];
        if ($editMode || $isAdmin) {
            for ($i = 0, $count = count($pages); $i < $count; $i++) {
                $result[$i]['order'] = $pages[$i]->page_order;
                $result[$i]['isDone'] = true;
                $result[$i]['isQuizDone'] = LecturePage::isQuizDone($pages[$i]->quiz, $user);
                $result[$i]['title'] = $pages[$i]->page_title;
            }
        } else {
            for ($i = 0, $count = count($pages); $i < $count; $i++) {
                $result[$i]['order'] = $pages[$i]->page_order;
                $result[$i]['isDone'] = LecturePage::isQuizDone($pages[$i]->quiz, $user);
                $result[$i]['isQuizDone'] = $result[$i]['isDone'];
                $result[$i]['title'] = $pages[$i]->page_title;

                if (LecturePage::isQuizDone($pages[$i]->quiz, $user) == false) {
                    $result[$i]['isDone'] = true;
                    $result = LecturePage::setNoAccessPages($result, $count, $i + 1, $pages);
                    break;
                }
            }
        }

        return $result;
    }


    public function title()
    {
        $titleParam = "title_" . CommonHelper::getLanguage();
        if ($this->$titleParam == '') {
            return $this->title_ua;
        } else {
            return $this->$titleParam;
        }
    }

    public static function getLectureTypeTitle($idType)
    {
        if (LectureType::model()->exists('id=:idType', array(':idType' => $idType))) {
            $titleParam = Lecture::getTypeTitleParam();
            return LectureType::model()->findByPk($idType)->$titleParam;
        } else {
            return '';
        }
    }

    public static function getTypeTitleParam()
    {
        $lang = (Yii::app()->session['lg']) ? Yii::app()->session['lg'] : 'ua';
        $title = "title_" . $lang;
        return $title;
    }

    public static function getNextId($id)
    {
        $current = Lecture::model()->findByPk($id);
        return Lecture::model()->findByAttributes(array('order' => $current->order + 1, 'idModule' => $current->idModule))->id;
    }
}
