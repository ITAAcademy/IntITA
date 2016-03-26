<?php

/**
 * This is the model class for table "lecture_page".
 *
 * The followings are the available columns in table 'lecture_page':
 * @property integer $id
 * @property integer $id_lecture
 * @property integer $page_order
 * @property integer $video
 * @property integer $quiz
 *  @property string $page_title
 *
 *  @property Lecture $lecture
 */
class LecturePage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lecture_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lecture', 'required'),
			array('id_lecture, page_order, video, quiz', 'numerical', 'integerOnly'=>true),
            array('page_title', 'length', 'max' => 85),

			array('id, id_lecture, page_order, video, quiz, page_title', 'safe', 'on'=>'search'),
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
            'lecture' => array(self::BELONGS_TO,'Lecture','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_lecture' => 'Id Lecture',
			'page_order' => 'Page Order',
			'video' => 'Video',
			'quiz' => 'Quiz',
            'page_title' => 'Title',
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
		$criteria->compare('id_lecture',$this->id_lecture);
		$criteria->compare('page_order',$this->page_order);
		$criteria->compare('video',$this->video);
		$criteria->compare('quiz',$this->quiz);
        $criteria->compare('page_title',$this->page_title);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                'defaultOrder'=>array(
                    'page_order'=>CSort::SORT_ASC,
                )
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LecturePage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getBlocksListById(){
        $blocks = Yii::app()->db->createCommand()
            ->select('element')
            ->from('lecture_element_lecture_page')
            ->where('page=:page', array(':page'=>$this->id))
            ->queryAll();
        $result = [];
        for ($i = 0, $count = count($blocks); $i < $count; $i++ ){
            $result[$i] = $blocks[$i]["element"];
        }
        return $result;
    }

    public static function addTextBlock($element, $page){
        Yii::app()->db->createCommand()->insert('lecture_element_lecture_page', array(
            'element'=>$element,
            'page'=>$page,
        ));
    }

    public static function getAccessPages($idLecture, $user, $editMode=0, $isAdmin=0){
        /*Sort page_order by Ascending*/
        $criteria= new CDbCriteria;
        $criteria->alias='lecture_page';
        $criteria->order = 'page_order ASC';
        $criteria->condition = 'id_lecture='.$idLecture;

        $pages = LecturePage::model()->findAll($criteria);

        $result = [];
        if($editMode || $isAdmin){
            for ($i = 0, $count = count($pages); $i < $count; $i++ ){
                $result[$i]['order'] = $pages[$i]->page_order;
                $result[$i]['isDone'] = true;
                $result[$i]['isQuizDone'] = LecturePage::isQuizDone($pages[$i]->quiz, $user);
                $result[$i]['title'] = $pages[$i]->page_title;
            }
        }else{
            for ($i = 0, $count = count($pages); $i < $count; $i++ ){
                $result[$i]['order'] = $pages[$i]->page_order;
                $result[$i]['isDone'] = LecturePage::isQuizDone($pages[$i]->quiz, $user);
                $result[$i]['isQuizDone'] =$result[$i]['isDone'];
                $result[$i]['title'] = $pages[$i]->page_title;

                if(LecturePage::isQuizDone($pages[$i]->quiz, $user) == false){
                    $result[$i]['isDone'] = true;
                    $result = LecturePage::setNoAccessPages($result, $count, $i+1,$pages);
                    break;
                }
            }
        }

        return $result;
    }

    public static function setNoAccessPages($result, $count, $order, $pages){
        for ($i = $order; $i < $count; $i++ ){
            $result[$i]['order'] = ++$order;
            $result[$i]['isDone'] = false;
            $result[$i]['title'] = $pages[$i]->page_title;
        }
        return $result;
    }

    public static function isQuizDone($quiz){
        if (!$quiz){
            return true;
        }
        $user = Yii::app()->user->getId();
        if ($user != 0){
            if(LectureElement::model()->findByPk($quiz)){
            switch(LectureElement::model()->findByPk($quiz)->id_type){
                case '5':
                    $test = Task::model()->findByAttributes(array('condition' => $quiz));
                    if($test){
                        $testMark = TaskMarks::isTaskDone($user,$test->id);
                        if($testMark) return $testMark;
                    }
                    break;
                case '6':
                    $task = PlainTask::model()->findByAttributes(array('block_element' => $quiz));
                    return $testMark = PlainTaskMarks::isTaskDone($user,$task->id);
                    break;
                case '9':
                    $skipTask = SkipTask::model()->findByAttributes(array('condition' => $quiz));
                    if($skipTask){
                        $testMark = SkipTaskMarks::isTaskDone($user,$skipTask->id);
                        if($testMark) return $testMark;
                    }
                    break;
                case '12':
                case '13':
                    $test = Tests::model()->findByAttributes(array('block_element' => $quiz));
                    $testMark = TestsMarks::isTestDone($user, $test->id);
                    if($testMark)  return $testMark;
                break;

                default:
                    break;
            }
        }
        }

        return false;
    }

    public  static function addNewPage($lecture, $pageOrder){
        $model = new LecturePage();
        $model->id_lecture = $lecture;
        $model->page_order = $pageOrder;

        $model->save();
        Lecture::setLectureNotVerified($lecture);

        return $model;
    }

    public static function addVideo($pageId, $block){
        $model = LecturePage::model()->findByPk($pageId);
        $model->video = $block;
        $model->save();
    }

    public static function deletePage($idLecture, $pageOrder){
        $model = LecturePage::model()->findByAttributes(array('id_lecture' => $idLecture, 'page_order' => $pageOrder));
        $model->delete();
        Lecture::setLectureNotVerified($idLecture);
    }

    public static function addQuiz($pageId, $blockElement){
        $model = LecturePage::model()->findByPk($pageId);
        $model->quiz = $blockElement;
        $model->save();
        Lecture::setLectureNotVerified($model->id_lecture);
    }

    public static function unableQuiz($pageId){
        if($pageId != 0){
            $model = LecturePage::model()->findByPk($pageId);
            $model->quiz = null;
            if($model->validate()){
                $model->save();
                Lecture::setLectureNotVerified($model->id_lecture);
                return true;
            }

        }
        return false;
    }

    public static function getNextPage($id, $page){
        if ($page >= LecturePage::getNumberLecturePages($id)) {
            $page = LecturePage::getNumberLecturePages($id);
        }
        else {
            $page = $page + 1;
        }
        return $page;
    }

    public function getPageTextList(){
        $textList = $this->getBlocksListById();
        $criteria = new CDbCriteria();
        $criteria->addInCondition('id_block', $textList);

        $dataProvider = new CActiveDataProvider('LectureElement');
        $dataProvider->criteria = $criteria;
        $criteria->order = 'block_order ASC';
        $dataProvider->setPagination(array(
                'pageSize' => '200',
            )
        );

        return $dataProvider;
    }

    public static function swapLecturePages($lecture, $page)
    {
        $pagesCount = LecturePage::model()->count('id_lecture=:id', array(':id' => $lecture));
        for ($i = $page; $i <= $pagesCount; $i++) {
            $model = LecturePage::model()->findByAttributes(array('id_lecture' => $lecture, 'page_order' => $i));
            $model->attributes = array('page_order' => $i + 1);
            $model->save();
        }
    }

    public static function swapPages($idLecture, $first, $second)
    {
        //find blocks id's for first and second pages
        $firstId = LecturePage::model()->findByAttributes(array('id_lecture' => $idLecture, 'page_order' => $first))->id;
        $secondId = LecturePage::model()->findByAttributes(array('id_lecture' => $idLecture, 'page_order' => $second))->id;
        //swap blocks - rewrite page order in DB
        LecturePage::model()->updateByPk($secondId, array('page_order' => $first));
        LecturePage::model()->updateByPk($firstId, array('page_order' => $second));
        Lecture::setLectureNotVerified($idLecture);
    }

    public static function reorderPages($idLecture, $pageOrder)
    {
        $countPages = LecturePage::model()->count('id_lecture = :id', array(':id' => $idLecture));
        $countPages++;

        for ($i = $pageOrder + 1; $i <= $countPages; $i++) {
            $id = LecturePage::model()->findByAttributes(array('id_lecture' => $idLecture, 'page_order' => $i))->id;
            LecturePage::model()->updateByPk($id, array('page_order' => $i - 1));
        }
    }

    //reorder blocks on lesson page - up block
    public static function reorderLecturePagesDown($lecture, $page)
    {
        if ($page > 1) {
            LecturePage::swapLecturePages($lecture, $page);
        }
    }

    public function getLecturePageVideo()
    {
        $videoLink = str_replace("watch?v=", "embed/", LectureElement::model()->findByPk($this->video)->html_block);
        $videoLink = str_replace("&feature=youtu.be", "", $videoLink);
        return $videoLink;
    }

    public static function getPageQuiz($pageId)
    {
        $element = LecturePage::model()->findByPk($pageId)->quiz;
        if ($element) {
            return LectureElement::model()->findByPk($element);
        } else {
            return '';
        }
    }

    public static function getNumberLecturePages($idLecture)
    {
        return LecturePage::model()->count('id_lecture=:id', array(':id' => $idLecture));
    }

    public static function getFirstQuiz($firstLectureId)
    {
        $criteria = new CDbCriteria;
        $criteria->alias = 'lecture_page';
        $criteria->order = 'page_order ASC';
        $criteria->condition = 'id_lecture=' . $firstLectureId . ' and quiz>0';
        if(isset(LecturePage::model()->find($criteria)->quiz))
            return LecturePage::model()->find($criteria)->quiz;
        else return false;
    }

    public static function getLastQuiz($lastLectureId)
    {
        $criteria = new CDbCriteria;
        $criteria->alias = 'lecture_page';
        $criteria->order = 'page_order DESC';
        $criteria->condition = 'id_lecture=' . $lastLectureId . ' and quiz>0';
        if(isset(LecturePage::model()->find($criteria)->quiz))
            return LecturePage::model()->find($criteria)->quiz;
        else return false;
    }

    /*Assign class press pages if there are at*/
    public static function lastAccessPage($passedPages)
    {
        for ($i = 0, $count = count($passedPages); $i < $count; $i++) {
            if ($i == $count - 1 && $passedPages[$i]['isDone'])
                return $i;
            if ($passedPages[$i]['isDone'] && !$passedPages[$i + 1]['isDone'])
                return $i;
        }
        return 0;

    }
    public static function checkLastQuiz($quizId)
    {
        $lecturePage=LecturePage::model()->findByAttributes(array('quiz' => $quizId));
        $pageOrder = $lecturePage->page_order;
        $lectureId = $lecturePage->id_lecture;
        $criteria=new CDbCriteria;
        $criteria->alias='lecture_page';
        $criteria->select='page_order';
        $criteria->condition = 'id_lecture = '.$lectureId;
        $criteria->order = 'page_order DESC';
        $lastPage=LecturePage::model()->find($criteria)->page_order;
        if($pageOrder!=$lastPage)
            return 0;
        else return 1;
    }

    public function getLectureElements() {
        $elementsList = Yii::app()->db->createCommand()->
            select("element")->
            from("lecture_element_lecture_page")->
            where("page=".$this->id)->
            queryAll();

        $elementsList = array_map(function($element){
            return $element['element'];
        }, $elementsList);

        return LectureElement::model()->findAllByPk($elementsList);
    }
}
