<?php

/**
 * This is the model class for table "library".
 *
 * The followings are the available columns in table 'library':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $language
 * @property string $link
 * @property string $logo
 *
 * The followings are the available model relations:
 * @property LibraryDependsBookCategory[] $libraryDependsBookCategories
 */
class Library extends CActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'library';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('title, language', 'length', 'max'=>50),
			array('description, link, logo', 'length', 'max'=>256),
			array('price', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, price, language, status, link, logo', 'safe', 'on'=>'search'),
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
            'libraryDependsBookCategories' => array(self::HAS_MANY, 'LibraryDependsBookCategory', 'id_book'),
            'category' => array(self::MANY_MANY, 'LibraryCategory', 'library_depends_book_category(id_book,id_category)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'price' => 'Price',
			'language' => 'Language',
			'status'=>'Status',
			'link' => 'Link',
			'logo' => 'Logo',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('language',$this->language,true);
        $criteria->compare('status',$this->status,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('logo',$this->logo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public static function getLibraryList(){
        $requestParam = $_GET;
        $criteria=new CDbCriteria;
        $criteria->with = ['libraryDependsBookCategories','libraryDependsBookCategories.idCategory'];
        $criteria->join = 'left join library_depends_book_category as bc ON bc.id_book = t.id';
        if (isset($requestParam['filter']['libraryDependsBookCategories.id'])){
            $criteria->addCondition('bc.id_category='.$requestParam['filter']['libraryDependsBookCategories.id']);
            unset($requestParam['filter']['libraryDependsBookCategories.id']);
        }

        $adapter = new NgTableAdapter('Library',$requestParam);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }
    public static function addBook($data){
	    $book = new Library();
	    $book->attributes = $data;
	    $book->status = $data["status"];
        if($book->save()&&$data["category"]!==""){
            $depends = ["id_book"=>$book["id"],"id_category"=>$data["category"]];
            LibraryDependsBookCategory::addInfo($depends);
        }
    }
    public static function updateBook($data){
        $id = $data['id'];
        $book = Library::model()->findByPk($id);
        if(file_exists(Yii::getPathOfAlias('webroot')."/images/library/".basename($book["logo"]))&&$data["logo"] !== $book["logo"]&&$data["logo"]!==""&&$book["logo"]!==""){
            unlink(Yii::getPathOfAlias('webroot')."/images/library/".basename($book["logo"]));
        };
        if(file_exists(Yii::getPathOfAlias('webroot')."/files/library/".basename($book["link"]))&&$data["link"] !== $book["link"]&&$data["link"]!==""&&$book["link"]){
            unlink(Yii::getPathOfAlias('webroot')."/files/library/".basename($book["link"]));
        };
        $book->attributes=$data;
        $book->status = $data["status"];
        if($book->update()){
            $depends = ["id_book"=>$book["id"],"id_category"=>$data["category"]];
            LibraryDependsBookCategory::updateInfo($depends);
        }
    }
    public static function removeBook(){
        if(!is_null(LibraryDependsBookCategory::model()->findByAttributes(['id_book'=>$_POST['id']]))){
            LibraryDependsBookCategory::model()->findByAttributes(['id_book'=>$_POST['id']])->deleteAll();
                $deletedBook = Library::model()->findByPk($_POST['id']);
                if ($deletedBook["logo"]!==""){
                    if (file_exists(Yii::getPathOfAlias('webroot')."/images/library/".basename($deletedBook["logo"]))){
                        unlink(Yii::getPathOfAlias('webroot')."/images/library/".basename($deletedBook["logo"]));
                    }
                };
                if ($deletedBook["link"]!==""){
                    if (file_exists(Yii::getPathOfAlias('webroot')."/files/library/".basename($deletedBook["link"]))){
                        unlink(Yii::getPathOfAlias('webroot')."/files/library/".basename($deletedBook["link"]));
                    }
                }
                Library::model()->deleteByPk($_POST['id']);
        }
        else{
                $deletedBook = Library::model()->findByPk($_POST['id']);
                if ($deletedBook["logo"]!==""){
                    if (file_exists(Yii::getPathOfAlias('webroot')."/images/library/".basename($deletedBook["logo"]))){
                        unlink(Yii::getPathOfAlias('webroot')."/images/library/".basename($deletedBook["logo"]));
                    };
                };
                if ($deletedBook["link"]!==""){
                    if (file_exists(Yii::getPathOfAlias('webroot')."/files/library/".basename($deletedBook["link"]))){
                        unlink(Yii::getPathOfAlias('webroot')."/files/library/".basename($deletedBook["link"]));
                    }
                }
                Library::model()->deleteByPk($_POST['id']);
            }
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Library the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
