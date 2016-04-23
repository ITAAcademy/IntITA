<?php

/**
 * This is the model class for table "address_city".
 *
 * The followings are the available columns in table 'address_city':
 * @property integer $id
 * @property integer $country
 * @property string $title_ua
 * @property string $title_ru
 * @property string $title_en
 *
 * The followings are the available model relations:
 * @property AddressCountry $country0
 * @property StudentReg[] $users
 */
class AddressCity extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'address_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country', 'required'),
			array('country', 'numerical', 'integerOnly'=>true),
			array('title_ua, title_ru, title_en', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, country, title_ua, title_ru, title_en', 'safe', 'on'=>'search'),
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
			'country0' => array(self::BELONGS_TO, 'AddressCountry', 'country'),
			'users' => array(self::HAS_MANY, 'User', 'city'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'country' => 'Country',
			'title_ua' => 'Title Ua',
			'title_ru' => 'Title Ru',
			'title_en' => 'Title En',
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
		$criteria->compare('country',$this->country);
		$criteria->compare('title_ua',$this->title_ua,true);
		$criteria->compare('title_ru',$this->title_ru,true);
		$criteria->compare('title_en',$this->title_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AddressCity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function newUserCity($oldId, $newTitle, $country)
    {
        $param = "title_" . Yii::app()->session["lg"];
        $oldModel = AddressCity::model()->findByPk($oldId);
        if (!$oldModel) {
            $model = new AddressCity();
            $model->$param = $newTitle;
			$model->country = $country;
            if ($model->save()) {
                return Yii::app()->db->lastInsertID;
            }
        } else {
            if ($oldModel->$param == $newTitle) {
                return $oldId;
            } else {
                if ($exist = AddressCity::model()->findByAttributes(array($param => $newTitle, 'country' => $country))) {
                    return $exist->id;
                } else {
                    $model = new AddressCity();
                    $model->$param = $newTitle;
					$model->country = $country;
                    if ($model->save()) {
                        return Yii::app()->db->lastInsertID;
                    }
                }
            }
        }
        return null;
    }

	public static function citiesList(){
        $cities = AddressCity::model()->findAll();
        $return = array('data' => array());

        foreach ($cities as $record) {
            $row = array();

            $row["id"] = $record->id;
            $row["country"] = $record->country0->title_ua;
            $row["title_ua"] = CHtml::encode($record->title_ua);
            $row["title_ru"] = CHtml::encode($record->title_ru);
            $row["title_en"] = CHtml::encode($record->title_en);

            array_push($return['data'], $row);
        }

        return json_encode($return);
	}
}
