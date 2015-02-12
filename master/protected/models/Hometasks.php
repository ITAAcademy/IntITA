<?php

/**
 * This is the model class for table "hometasks".
 *
 * The followings are the available columns in table 'hometasks':
 * @property integer $hometask_ID
 * @property integer $fkmodule_ID
 * @property integer $fklecture_ID
 * @property string $hometask_name
 * @property string $hometask_description
 * @property string $hometask_url
 */
class Hometasks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hometasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkmodule_ID, fklecture_ID, hometask_name, hometask_description, hometask_url', 'required'),
			array('fkmodule_ID, fklecture_ID', 'numerical', 'integerOnly'=>true),
			array('hometask_name, hometask_description', 'length', 'max'=>45),
			array('hometask_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('hometask_ID, fkmodule_ID, fklecture_ID, hometask_name, hometask_description, hometask_url', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'hometask_ID' => 'Hometask',
			'fkmodule_ID' => 'Fkmodule',
			'fklecture_ID' => 'Fklecture',
			'hometask_name' => 'Hometask Name',
			'hometask_description' => 'Hometask Description',
			'hometask_url' => 'Hometask Url',
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

		$criteria->compare('hometask_ID',$this->hometask_ID);
		$criteria->compare('fkmodule_ID',$this->fkmodule_ID);
		$criteria->compare('fklecture_ID',$this->fklecture_ID);
		$criteria->compare('hometask_name',$this->hometask_name,true);
		$criteria->compare('hometask_description',$this->hometask_description,true);
		$criteria->compare('hometask_url',$this->hometask_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hometasks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
