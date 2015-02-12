<?php

/**
 * This is the model class for table "theoreticalsmaterials".
 *
 * The followings are the available columns in table 'theoreticalsmaterials':
 * @property integer $tm_ID
 * @property integer $fkmodule_ID
 * @property integer $fklecture_ID
 * @property string $TM_name
 * @property string $TM_description
 * @property string $TM_url
 */
class Theoreticalsmaterials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'theoreticalsmaterials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkmodule_ID, fklecture_ID, TM_name, TM_description, TM_url', 'required'),
			array('fkmodule_ID, fklecture_ID', 'numerical', 'integerOnly'=>true),
			array('TM_name, TM_description', 'length', 'max'=>45),
			array('TM_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tm_ID, fkmodule_ID, fklecture_ID, TM_name, TM_description, TM_url', 'safe', 'on'=>'search'),
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
			'tm_ID' => 'Tm',
			'fkmodule_ID' => 'Fkmodule',
			'fklecture_ID' => 'Fklecture',
			'TM_name' => 'Tm Name',
			'TM_description' => 'Tm Description',
			'TM_url' => 'Tm Url',
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

		$criteria->compare('tm_ID',$this->tm_ID);
		$criteria->compare('fkmodule_ID',$this->fkmodule_ID);
		$criteria->compare('fklecture_ID',$this->fklecture_ID);
		$criteria->compare('TM_name',$this->TM_name,true);
		$criteria->compare('TM_description',$this->TM_description,true);
		$criteria->compare('TM_url',$this->TM_url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Theoreticalsmaterials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
