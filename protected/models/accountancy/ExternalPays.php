<?php

/**
 * This is the model class for table "acc_external_pays".
 *
 * The followings are the available columns in table 'acc_external_pays':
 * @property string $id
 * @property string $create_date
 * @property integer $create_user
 * @property string $source_id
 * @property integer $user_id
 * @property string $pay_date
 * @property string $summa
 * @property string $description
 *
 * The followings are the available model relations:
 * @property StudentReg $createUser
 * @property ExternalSources $source
 * @property StudentReg $user
 */
class ExternalPays extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'acc_external_pays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_user, source_id, user_id, pay_date, summa', 'required'),
			array('create_user, user_id', 'numerical', 'integerOnly'=>true),
			array('source_id, summa', 'length', 'max'=>10),
			array('description', 'length', 'max'=>512),
			// The following rule is used by search().
			array('id, create_date, create_user, source_id, user_id, pay_date, summa, description', 'safe', 'on'=>'search'),
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
            'source' => array(self::BELONGS_TO, 'ExternalSources', 'source_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
            'id' => 'Pay code',
            'create_date' => 'Дата створення ',
            'create_user' => 'Хто створив',
            'source_id' => 'Зовнішні джерела',
            'user_id' => 'Хто платить',
            'pay_date' => 'Дата створення платежу',
            'summa' => 'Сумма до сплати',
            'description' => 'Пояснення платежу',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('source_id',$this->source_id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('pay_date',$this->pay_date,true);
		$criteria->compare('summa',$this->summa,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExternalPays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function addNewExternalPay(Operation $operation){
        $invoicesDescription = '';
        foreach($operation->invoicesList as $invoice){
            $invoicesDescription .= $invoice->description();
        }

        $model = new ExternalPays();
        $model->create_user = $operation->user_create;
        $model->source_id = $operation->externalSource;
        $model->user_id = $operation->user_create;
        $model->pay_date = $operation->date_create;
        $model->summa = $operation->summa;

         $model->description = $operation->type->description.". ".
            $invoicesDescription.". Сплачено ".date("d.m.y", strtotime($model->pay_date));

        if ($model->validate()){
            $model->save();
            return true;
        }

        return false;
    }
}
