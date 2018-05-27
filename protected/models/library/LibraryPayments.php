<?php

/**
 * This is the model class for table "library_payments".
 *
 * The followings are the available columns in table 'library_payments':
 * @property integer $id
 * @property string $order_id
 * @property integer $library_id
 * @property integer $user_id
 * @property string $amount
 * @property integer $status
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Library $library
 * @property StudentReg $user
 */
class LibraryPayments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'library_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, library_id, user_id, date', 'required'),
			array('library_id, user_id, status', 'numerical', 'integerOnly'=>true),
			array('order_id', 'length', 'max'=>128),
			array('amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, library_id, user_id, amount, status, date', 'safe', 'on'=>'search'),
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
			'library' => array(self::BELONGS_TO, 'Library', 'library_id'),
			'user' => array(self::BELONGS_TO, 'StudentReg', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'library_id' => 'Library',
			'user_id' => 'User',
			'amount' => 'Amount',
			'status' => 'Status',
			'date' => 'Date',
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
		$criteria->compare('order_id',$this->order_id,true);
		$criteria->compare('library_id',$this->library_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LibraryPayments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
