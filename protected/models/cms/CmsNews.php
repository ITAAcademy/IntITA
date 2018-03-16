<?php

/**
 * This is the model class for table "cms_news".
 *
 * The followings are the available columns in table 'cms_news':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property string $img
 * @property integer $id_organization
 *
 * The followings are the available model relations:
 * @property Organization $idOrganization
 */
class CmsNews extends CActiveRecord
{
    use validationErrors;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('title, text, date, img, id_organization', 'required'),
            array('title, text, date', 'required'),
			array('id_organization', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('img', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, date, img, id_organization', 'safe', 'on'=>'search'),
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
			'idOrganization' => array(self::BELONGS_TO, 'Organization', 'id_organization'),
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
			'text' => 'Text',
			'date' => 'Date',
			'img' => 'Img',
			'id_organization' => 'Id Organization',
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
		$criteria->compare('text',$this->text,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('id_organization',$this->id_organization);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CmsNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
