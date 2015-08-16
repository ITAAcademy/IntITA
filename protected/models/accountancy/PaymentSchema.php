<?php

/**
 * This is the model class for table "acc_payment_schema".
 *
 * The followings are the available columns in table 'acc_payment_schema':
 * @property string $id
 * @property string $discount
 * @property integer $pay_count
 * @property string $loan
 * @property string $name
 * @property integer $monthpay
 *
 * The followings are the available model relations:
 * @property UserAgreements[] $userAgreements
 */
class PaymentSchema extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'acc_payment_schema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('pay_count, monthpay', 'numerical', 'integerOnly'=>true),
			array('discount, loan', 'length', 'max'=>10),
			array('name', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, discount, pay_count, loan, name, monthpay', 'safe', 'on'=>'search'),
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
			'userAgreements' => array(self::HAS_MANY, 'UserAgreements', 'payment_scheme'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'discount' => 'відсоток знижки',
			'pay_count' => 'кількість проплат',
			'loan' => 'відсоток',
			'name' => 'опис',
			'monthpay' => 'Monthpay',
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
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('pay_count',$this->pay_count);
		$criteria->compare('loan',$this->loan,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('monthpay',$this->monthpay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentSchema the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function generatePaymentPlan(UserAgreements $agreement) 
        {
            $price = $agreement->getAgreementPrice();
            if($this->discount > 0)
            {
                $price = $price - ($price*$this->discount/100);
            }
            $pay_part = $price / $this->pay_count;
            $time = strtotime(date("Y-m-d"));
            if($this->monthpay)
            {
                $payperiod = "+1 month";
            }
            else 
            {
                $payperiod = "";
            }
            for($i = 0; $i < $this->pay_count; $i++)
            {
                $paymentPlan = new AgreementPaymentPlan();
                $paymentPlan->agreement_id = $agreement->id;
                $paymentPlan->pay_date = $time;
                $time = date("Y-m-d", strtotime($payperiod, $time));
                $paymentPlan->summa = $pay_part;
                $paymentPlan->save();
            }
        }
}
