<?php

/**
 * This is the model class for table "vacation_type".
 *
 * The followings are the available columns in table 'vacation_type':
 * @property integer $id
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 * @property integer $position
 *
 * The followings are the available model relations:
 * @property Vacation $vacation_type_id
 */
class VacationType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vacation_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_ua, title_ru, title_en, position', 'required'),
			array('title_ua, title_ru, title_en', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_ua, title_ru, title_en, position', 'safe', 'on'=>'search'),
		);
	}

		/**
	 * @return array relational rules.
	 */
	// public function relations()
	// {
	// 	// NOTE: you may need to adjust the relation name and the related
	// 	// class name for the relations automatically generated below.
	// 	return array(
	// 		'idBook' => array(self::BELONGS_TO, 'Vacation', 'vacation_type_id'),
	// 	);
	// }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'id' => 'ID',
            'title_ua' => 'Title ua',
            'title_ru' => 'Title ru',
            'title_en' => 'Title en',
            'position' => 'Position',
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
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('position', $this->position, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VacationType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getTypesName($vacation_type_id){
        return CJSON::encode(VacationType::model()->findByPk($vacation_type_id));
    }
}