<?php

/**
 * This is the model class for table "library_depends_book_category".
 *
 * The followings are the available columns in table 'library_depends_book_category':
 * @property integer $id
 * @property integer $id_book
 * @property integer $id_category
 *
 * The followings are the available model relations:
 * @property Library $idBook
 * @property LibraryCategory $idCategory
 */
class LibraryDependsBookCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'library_depends_book_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_book, id_category', 'required'),
			array('id_book, id_category', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_book, id_category', 'safe', 'on'=>'search'),
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
            'idBook' => array(self::BELONGS_TO, 'Library', 'id_book'),
            'idCategory' => array(self::BELONGS_TO, 'LibraryCategory', 'id_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_book' => 'id_book',
			'id_category' => 'id_category',
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
		$criteria->compare('id_book',$this->id_book);
		$criteria->compare('id_category',$this->id_category);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LibraryDependsBookCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function addInfo($depends){
        for($i=0;$i<count($depends["id_category"]);$i++){
            $newDependency = new LibraryDependsBookCategory();
            $newDependency->id_book = $depends["id_book"];
            $newDependency->id_category = $depends["id_category"][$i]["id"];
            $newDependency->save();
        }
    }
    public static function updateInfo($depends){
	    $id = $depends["id_book"];
	    LibraryDependsBookCategory::model()->deleteAllByAttributes(["id_book"=>$id]);
        for($i=0;$i<count($depends["id_category"]);$i++){
            $newDependency = new LibraryDependsBookCategory();
            $newDependency->id_book = $depends["id_book"];
            $newDependency->id_category = $depends["id_category"][$i]["id"];
            $newDependency->save();
        }
    }
}
