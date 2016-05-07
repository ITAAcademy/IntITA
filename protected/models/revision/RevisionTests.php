<?php

/**
 * This is the model class for table "vc_tests".
 *
 * The followings are the available columns in table 'vc_tests':
 * @property integer $id
 * @property integer $id_lecture_element
 * @property string $title
 * @property integer $id_test
 *
 * The followings are the available model relations:
 * @property RevisionLectureElement $lectureElement
 * @property RevisionTestsAnswers[] $testsAnswers
 */
class RevisionTests extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vc_tests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_lecture_element', 'required'),
			array('id_lecture_element, id_test', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_lecture_element, title, id_test', 'safe', 'on'=>'search'),
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
			'lectureElement' => array(self::BELONGS_TO, 'RevisionLectureElement', 'id_lecture_element'),
			'testsAnswers' => array(self::HAS_MANY, 'RevisionTestsAnswers', 'id_test'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_lecture_element' => 'Id Lecture Element',
			'title' => 'Title',
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
		$criteria->compare('id_lecture_element',$this->id_lecture_element);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('id_test',$this->id_test);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RevisionTests the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function saveCheck($runValidation=true, $attributes=null) {
        if(!$this->save($runValidation,$attributes)) {
            throw new RevisionTestsException(implode("; ", $this->getErrors()));
        }
    }

    public static function createTest($idLectureElement, $title, $answers, $idTest=null) {
        $newTest = new RevisionTests();
        $newTest->id_lecture_element = $idLectureElement;
        $newTest->title = $title;
        $newTest->id_test = $idTest;
        $newTest->saveCheck();

        foreach ($answers as $answer) {
            RevisionTestsAnswers::createAnswer($newTest->id, $answer);
        }

        return $newTest;
    }

    public function cloneTest($idLectureElement) {
        $newTest = new RevisionTests();
        $newTest->id_lecture_element = $idLectureElement;
        $newTest->title = $this->title;
        $newTest->saveCheck();

        foreach ($this->testsAnswers as $answer) {
            $answer->cloneTestAnswer($newTest->id);
        }
        return $newTest;
    }

    public function editTest($title, $answers) {
        $this->title = $title;
        $this->update(array('title'));

        $testAnswers = RevisionTestsAnswers::model()->findAllByAttributes(array('id_test'=>$this->id));

        $oldAnswersCount = count($testAnswers);
        $newAnswersCount = count($answers);
        $length = min($oldAnswersCount, $newAnswersCount);

        $i = 0;
        for (; $i < $length; $i++) {
            $testAnswers[$i]->edit($answers[$i]['answer'], $answers[$i]['is_valid']);
        }

        if ($oldAnswersCount < $newAnswersCount) {
            //if needs to add new answers
            for (; $i < $newAnswersCount; $i++) {
                RevisionTestsAnswers::createAnswer($this->id, $answers[$i]);
            }
        } elseif($oldAnswersCount > $newAnswersCount) {
            //if needs to delete odd answers
            $pkToDelete = [];
            for (; $i < $oldAnswersCount; $i++) {
                array_push($pkToDelete, $this->testsAnswers[$i]->id);
            }
            RevisionTestsAnswers::model()->deleteByPk($pkToDelete);
        }
    }

    /**
     * @return bool|void
     * @throws CDbException
     */
    protected function beforeDelete() {
        foreach ($this->testsAnswers as $testAnswer) {
            if (!$testAnswer->delete()) {
                return false;
            }
        }
        return parent::beforeDelete();
    }

    public function deleteTest() {
        $testAnswers = RevisionTestsAnswers::model()->findAllByAttributes(array('id_test'=>$this->id));
        foreach ($testAnswers as $testAnswer) {
            $testAnswer->delete();
        }
        return true;
    }

    public function saveToRegularDB($lectureElementId, $idUserCreated) {
        $newTest = new Tests();
        $newTest->block_element = $lectureElementId;
        $newTest->author = $idUserCreated;
        $newTest->title = $this->title;
        $newTest->save();

        foreach ($this->testsAnswers as $testsAnswer) {
            $testsAnswer->saveToRegularDB($newTest->id);
        }

        if ($this->id_test) {
            //copy test marks
            TestsMarks::model()->updateAll(array('id_test' => $newTest->id), 'id_test=:id_test', array(':id_test' => $this->id_test));
        }

        $this->id_test = $newTest->id;
        $this->save();

        return $newTest;
    }
	public static function getTestAnswers($idLectureElement){
		$answers=[];
		$test = RevisionTestsAnswers::model()->findAllByAttributes(array('id_test' => RevisionTests::getTestId($idLectureElement)));
		foreach($test as $answer){
			array_push($answers, $answer->answer);
		}
		return $answers;
	}
	public static function getTestId($idLectureElement){
		return RevisionTests::model()->findByAttributes(array('id_lecture_element' => $idLectureElement))->id;
	}
    public function getTestType() {
        $criteria = new CDbCriteria();
        $criteria->select = 'answer';
        $criteria->addCondition('id_test = :id_test and is_valid = 1');
        $criteria->params = array(':id_test' => $this->id);
        $count = RevisionTestsAnswers::model()->count($criteria);

        return ($count > 1)?2:1;
    }
    public function testAnswers(){
        $answers=[];
        $test = RevisionTestsAnswers::model()->findAllByAttributes(array('id_test' => $this->id));
        foreach($test as $key=>$answer){
            $row = array();
            $row['id']=$answer->id;
            $row['answer']=$answer->answer;
            array_push($answers, $row);
        }
        return $answers;
    }

}
