<?php

/**
 * This is the model class for table "vc_lecture_page".
 *
 * The followings are the available columns in table 'vc_lecture_page':
 * @property integer $id
 * @property integer $id_page
 * @property integer $id_parent_page
 * @property integer $id_revision
 * @property string $page_title
 * @property integer $page_order
 * @property integer $video
 * @property integer $quiz
 * The followings are the available model relations:
 * @property RevisionLectureElement[] $lectureElements
 * @property RevisionLecture $idRevision
 */

class RevisionLecturePage extends CActiveRecord
{
    const TEXT          = LectureElement::TEXT;
    const VIDEO	        = LectureElement::VIDEO;
    const CODE          = LectureElement::CODE;
    const EXAMPLE       = LectureElement::EXAMPLE;
    const TASK          = LectureElement::TASK;
    const PLAIN_TASK    = LectureElement::PLAIN_TASK;
    const INSTRUCTION   = LectureElement::INSTRUCTION;
    const LABEL	        = LectureElement::LABEL;
    const SKIP_TASK     = LectureElement::SKIP_TASK;
    const FORMULA       = LectureElement::FINAL_TEST;
    const TABLE         = LectureElement::TABLE;
    const TEST          = LectureElement::TEST;
    const FINAL_TEST    = LectureElement::FINAL_TEST;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vc_lecture_page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_revision, page_order', 'required'),
			array('id_page, id_parent_page, id_revision, page_order, video, quiz', 'numerical', 'integerOnly'=>true),
			array('page_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_page, id_parent_page, id_revision, page_title, page_order, video, quiz', 'safe', 'on'=>'search'),
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
            //todo IN condition doesn't work!;
			'lectureElements' => array(self::HAS_MANY, 'RevisionLectureElement', 'id_page',
                                                        'condition' => 'id_type=:type_text OR id_type=:type_code OR id_type=:type_example OR id_type=:type_instruction',
                                                        'params' => array(":type_text" => self::TEXT,
                                                                          ":type_code" => self::CODE,
                                                                          ":type_example" => self::EXAMPLE,
                                                                          ":type_instruction" => self::INSTRUCTION),
                                                        'order' => 'block_order ASC',
            ),
			'revision' => array(self::BELONGS_TO, 'RevisionLecture', 'id_revision'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'id_page' => 'Id Page',
            'id_parent_page' => 'Id Parent Page',
			'id_revision' => 'Id Revision',
			'page_title' => 'Page Title',
			'page_order' => 'Page Order',
			'video' => 'Video',
			'quiz' => 'Quiz',
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
		$criteria->compare('id_page',$this->id_page);
		$criteria->compare('id_parent_page',$this->id_parent_page);
		$criteria->compare('id_revision',$this->id_revision);
		$criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('page_order',$this->page_order);
		$criteria->compare('video',$this->video);
		$criteria->compare('quiz',$this->quiz);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RevisionLecturePage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Save page model with error checking
     * @throws RevisionLectureException
     */
    public function saveCheck($runValidation=true,$attributes=null) {
        if(!$this->save($runValidation,$attributes)) {
            throw new RevisionLecturePageException(implode("; ", $this->getErrors()));
        }
    }

    /**
     * Initialises page
     * @param $idRevision
     * @param $user
     * @param int $order
     * @throws RevisionLecturePageException
     */
    public function initialize($idRevision, $user, $order=1) {
		//default values
		$this->page_title = "";
		$this->video = null;
		$this->quiz = null;
        $this->id_parent_page = null;

        $this->page_order = $order;

		$this->id_revision = $idRevision;

		$this->saveCheck();
	}

    /**
     * Clone revision
     * Returns new page instance or current instance if the page is not cloneable
     * @param $user
     * @param null $idNewRevision
     * @return RevisionLecturePage
     * @throws RevisionLecturePageException
     * @throws Exception
     */
    public function clonePage($user, $idNewRevision = null) {

        if ($idNewRevision == null) {
            $idNewRevision = $this->id_revision;
        }

        $connection = Yii::app()->db;
        $transaction = null;

        if ($connection->getCurrentTransaction() == null) {
            $transaction = $connection->beginTransaction();
        }

        try {
            $newRevision = new RevisionLecturePage();

            $newRevision->id_page = $this->id_page;
            $newRevision->id_parent_page = $this->id;
            $newRevision->id_revision = $idNewRevision;
            $newRevision->page_title = $this->page_title;
            $newRevision->page_order = $this->page_order;

            $newRevision->saveCheck();

            //todo copy elements - quiz;

            $quiz = $this->getQuiz();
            if ($quiz != null) {
                $newQuiz = $quiz->cloneQuiz($newRevision->id);
                $newRevision->quiz = $newQuiz->id;
            }

            if ($this->video != null) {
                $newVideo = RevisionLectureElement::model()->findByPk($this->video)->cloneVideo($newRevision->id);
                $newRevision->video = $newVideo->id;
            }

            foreach ($this->lectureElements as $lectureElement) {
                $newLectureElement = $lectureElement->cloneText($newRevision->id);
            }

            $newRevision->saveCheck();


            if ($transaction != null) {
                $transaction->commit();
            }
        } catch (Exception $e) {
            if ($transaction != null) {
                $transaction->rollback();
            }
            throw $e;
        }

        return $newRevision;
	}

    /**
     * Returns lecture elements which contains in lecture body.
     * Doesn't return quiz and video instance.
     * @return RevisionLectureElement[]
     */
    public function getLectureBody(){
        return $this->lectureElements;
    }

    /**
     * Adds video block or edit if the video bloc exists
     * @param $url
     * @throws RevisionLectureElementException
     * @throws RevisionLecturePageException
     */
    public function saveVideo($url, $user) {
        if ($this->video != null) {
            $videoElement = RevisionLectureElement::model()->findByPk($this->video);
            $videoElement->html_block = $url;
            $videoElement->saveCheck();
        } else {
            $videoElement = new RevisionLectureElement();
            $videoElement->initVideoElement($url, $this->id);
            $this->video = $videoElement->id;
            $this->saveCheck();
        }
    }

    /**
     * Sets or update title
     * @param $title
     * @throws RevisionLecturePageException
     */
    public function setTitle($title, $user) {
        $this->page_title = $title;
        $this->saveCheck();
    }

    /**
     * Adds text block
     * @param $idType
     * @param $html_block
     * @return RevisionLectureElement
     * @throws RevisionLectureElementException
     * @throws RevisionLecturePageException
     */
    public function addTextBlock($idType, $html_block, $user) {
        $order = $this->getNextOrder();

        $element = new RevisionLectureElement();
        $element->id_type = $idType;
        $element->block_order = $order;
        $element->html_block = $html_block;
        $element->id_page = $this->id;
        $element->saveCheck();
        return $element;
    }

    /**
     * Moves page up
     * @throws RevisionLecturePageException
     */
    public function moveUp($user) {

        $criteria = new CDbCriteria(array(
            "condition" => "page_order<:page_order AND id_revision=:id_revision",
            "params" => array(':page_order' => $this->page_order, ':id_revision' => $this->id_revision),
            'limit' => '1'
        ));

        $prevPage = RevisionLecturePage::model()->find($criteria);

        if ($prevPage) {
            $this->swapPageOrder($this, $prevPage);
            $this->page_order = ($this->page_order>1?$this->page_order-1:1);
            $this->saveCheck();
        }
    }

    /**
     * Move page down
     * @throws RevisionLecturePageException
     */
    public function moveDown($user) {

        $criteria = new CDbCriteria(array(
            "condition" => "page_order<:page_order AND id_revision=:id_revision",
            "params" => array(':page_order' => $this->page_order, ':id_revision' => $this->id_revision),
            'limit' => '1'
        ));

        $nextPage = RevisionLecturePage::model()->find($criteria);

        if ($nextPage) {
            $this->swapPageOrder($this, $nextPage);
            $this->page_order = ($this->page_order>1?$this->page_order-1:1);
            $this->saveCheck();
        }

        $this->page_order = $this->page_order+1;
        $this->saveCheck();
    }

    /**
     * Returns quiz instance
     * @return RevisionLectureElement
     */
    public function getQuiz() {
        return RevisionLectureElement::model()->findByPk($this->quiz);
    }

    /**
     * Returns video instance
     * @return static
     */
    public function getVideo() {
        return RevisionLectureElement::model()->findByPk($this->video);
    }

    /**
     * Shift element up
     * @param $idElement
     */
    public function upElement($idElement, $user) {
        foreach ($this->lectureElements as $key => $lectureElement) {
            if ($lectureElement->id == $idElement) {
                if ($key == 0) {
                    return;
                }
                $this->swapElements($lectureElement, $this->lectureElements[$key-1]);
                return;
            }
        }
    }

    /**
     * Shift element down
     * @param $idElement
     */
    public function downElement($idElement, $user) {
        foreach ($this->lectureElements as $key => $lectureElement) {
            if ($lectureElement->id == $idElement) {
                if ($key == count($this->lectureElements)-1) {
                    return;
                }

                $this->swapElements($lectureElement, $this->lectureElements[$key+1]);

            }
        }
    }

    /**
     * Deletes lecture element
     * @param $idElement
     * @param $user
     * @throws CDbException
     */
    public function deleteElement($idElement, $user) {
       foreach ($this->lectureElements as $lectureElement) {
           if ($lectureElement->id == $idElement) {
               $lectureElement->delete();
               return;
           }
       }
    }

    /**
     * @param $idNewLecture
     * @param $idUserCreated
     * @return LecturePage
     */
    public function savePageModelToRegularDB($idNewLecture, $idUserCreated) {
        $newPage = new LecturePage();
        $newPage->id_lecture = $idNewLecture;
        $newPage->page_title = $this->page_title;
        $newPage->page_order = $this->page_order;

        //video
        if ($this->video != null) {
            $video = $this->getVideo();
            $newVideo = $video->saveElementModelToRegularDB($idNewLecture);
            $newPage->video = $newVideo->id_block;
        }

        $newPage->save();

        $idNewPage = $newPage->id;

        $idNewElements = array();

        //lecture elements
        foreach ($this->lectureElements as $element) {
            $newElement = $element->saveElementModelToRegularDB($idNewLecture);
            array_push($idNewElements, array('page'=>$idNewPage, 'element'=>$newElement->id_block));
        }

        //todo quiz
        $quiz = $this->getQuiz();
        if ($quiz) {
            $newQuiz = $quiz->saveElementModelToRegularDB($idNewLecture, $idUserCreated);
            $newPage->quiz = $newQuiz->id_block;
            $newPage->save();
        }

        //lecture_page_lecture_element
        if (!empty($idNewElements)) {
            $builder = Yii::app()->db->schema->getCommandBuilder();
            $command = $builder->createMultipleInsertCommand('lecture_element_lecture_page', $idNewElements);
            $command->query();
        }

        return $newPage;
    }

    /**
     * Swaps elements order
     * @param RevisionLectureElement $a
     * @param RevisionLectureElement $b
     */
    private function swapElements($a, $b) {
        if ($a != null && $b != null) {
            $swap = $a->block_order;
            $a->block_order = $b->block_order;
            $b->block_order = $swap;
            $a->saveCheck();
            $b->saveCheck();
        }
    }

    /**
     * Returns next order for lectureElements
     * @return int
     */
    private function getNextOrder() {
        if (count($this->lectureElements) == 0)
            return 1;
        return $this->lectureElements[count($this->lectureElements)-1]->block_order+1;
    }

    /**
     * @param RevisionLecturePage $a
     * @param RevisionLecturePage $b
     */
    private function swapPageOrder($a, $b) {
        if ($a != null && $b != null) {
            $swap = $a->page_order;
            $a->page_order = $b->page_order;
            $b->page_order = $swap;
            $a->saveCheck();
            $b->saveCheck();
        }
    }

}
