<?php

/**
 * This is the model class for table "acc_user_agreements".
 *
 * The followings are the available columns in table 'acc_user_agreements':
 * @property integer $id
 * @property integer $user_id
 * @property string $service_id
 * @property string $create_date
 * @property integer $approval_user
 * @property string $approval_date
 * @property integer $cancel_user
 * @property string $cancel_date
 * @property string $close_date
 * @property string $payment_schema
 * @property string $number
 * @property float $summa
 * @property integer $cancel_reason_type
 *
 * @property Service $service
 * @property StudentReg $user
 * @property PaymentScheme $paymentSchema
 * @property StudentReg $approvalUser
 * @property StudentReg $cancelUser
 */
class UserAgreements extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'acc_user_agreements';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, service_id, payment_schema', 'required'),
            array('user_id, approval_user, cancel_user', 'numerical', 'integerOnly' => true),
            array('service_id, payment_schema', 'length', 'max' => 10),
            array('number', 'length', 'max' => 50),
            array('approval_date, cancel_date, close_date', 'safe'),
            // The following rule is used by search().
            array('id, user_id, summa, service_id, number, create_date, approval_user, approval_date, cancel_user,
			cancel_date, close_date, payment_schema, cancel_reason_type', 'safe', 'on' => 'search'),
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
            'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
            'invoice' => array(self::HAS_MANY, 'Invoice', 'agreement_id'),
            'user' => array(self::BELONGS_TO, 'StudentReg','user_id'),
            'approvalUser' => array(self::BELONGS_TO, 'StudentReg','approval_user'),
            'cancelUser' => array(self::BELONGS_TO, 'StudentReg','cancel_user'),
            'paymentSchema' => array(self::BELONGS_TO, 'PaymentScheme', 'payment_schema'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID договору',//'User account',
            'user_id' => 'Користувач',//'User which have agreement',
            'service_id' => 'Service',//'Service for this agreement',
            'create_date' => 'Дата створення',//'Create Date',
            'approval_user' => 'Підтверджено користувачем',//'user who underscribe agreement',
            'approval_date' => 'Дата підтвердження',//'date when agreement was approved',
            'cancel_user' => 'Закрив договір',//'Is agreement cancelled',
            'cancel_date' => 'Дата відміни',//'date when agreement was cancelled',
            'close_date' => 'Дата закриття',//'Date when agreement should be closed',
            'payment_schema' => 'Схема оплати',//'Payment scheme',
            'number' => 'Номер',
            'summa' => 'Сума',
            'cancel_reason_type' => 'Причина закриття',
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
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('service_id', $this->service_id, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('approval_user', $this->approval_user);
        $criteria->compare('approval_date', $this->approval_date, true);
        $criteria->compare('cancel_user', $this->cancel_user);
        $criteria->compare('number', $this->number);
        $criteria->compare('cancel_date', $this->cancel_date, true);
        $criteria->compare('close_date', $this->close_date, true);
        $criteria->compare('payment_schema', $this->payment_schema, true);
        $criteria->compare('summa', $this->summa, true);
        $criteria->compare('cancel_reason_type', $this->cancel_reason_type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserAgreements the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    
    public static function agreementByParams($type, $user, $module, $course, $schemaNum)
    {
        $agreement = null;
        switch ($type){
            case 'Module':
                $agreement = UserAgreements::moduleAgreement($user, $module, 1);
                break;
            case 'Course':
                $agreement = UserAgreements::courseAgreement($user, $course, $schemaNum);
                break;
            default :
                $agreement = null;
                break;
        }
        return $agreement;
    }
    
    
    public static function courseAgreement($user, $course, $schema)
    {
        $service = CourseService::getService($course);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id));
            if ($model) {
                return $model;
            }
        }
        return self::newAgreement($user, 'CourseService', $course, $schema);
    }

    public static function courseAgreementExist($user, $course)
    {
        $service = CourseService::getService($course);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id));
            if ($model) {
                return true;
            }
        }
        return false;
    }

    public static function moduleAgreement($user, $module, $schema)
    {
        $service = ModuleService::getService($module);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id));
            if ($model) {
                return $model;
            }
        }
        return self::newAgreement($user, 'ModuleService', $module, $schema);
    }

    public static function moduleAgreementExist($user, $module)
    {
        $service = ModuleService::getService($module);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id));
            if ($model) {
                return true;
            }
        }
        return false;
    }

    private static function newAgreement($user, $modelFactory, $param_id, $schemaId)
    {
        $schema = PaymentScheme::getSchema($schemaId);
        $serviceModel = $modelFactory::getService($param_id);
        $billableObject = $serviceModel->getBillableObject();

        $model = new UserAgreements();
        $model->user_id = $user;
        $model->payment_schema = $schemaId;
        $model->service_id = $serviceModel->service_id;

        $model->summa = $schema->getSumma($billableObject);
        $startDate = new DateTime();
        $model->close_date = $schema->getCloseDate($billableObject, $startDate);

        if ($model->save()) {
            $invoicesList = $schema->getInvoicesList($billableObject, $startDate);
            $agreementId = $model->id;
            $model->updateByPk($agreementId, array(
                'number' => UserAgreements::generateNumber($billableObject, $agreementId
                )));
            Invoice::setInvoicesParamsAndSave($invoicesList, $user, $agreementId);
        } else {
            throw new CException('Договір не заведено!');
        }
        return $model;
    }

    public function afterSave()
    {
        parent::afterSave();
        $this->id = Yii::app()->db->getLastInsertID();
    }

    private static function generateNumber($serviceModel, $agreement)
    {
        return $serviceModel->getNumber() . ' - ' . sprintf("%06d", $agreement) . ' - ' . $serviceModel->getType();
    }

    public static function getNumber($id)
    {
        return UserAgreements::model()->findByPk($id)->number;
    }

    public static function getAllAgreements()
    {
        return UserAgreements::model()->findAll();
    }

    public static function getAllCoursesList()
    {
        $criteria = new CDbCriteria;
        $criteria->mergeWith(array(
            'join' => 'LEFT JOIN acc_course_service cs ON cs.service_id = t.service_id',
            'condition' => 'cs.service_id = t.service_id'
        ));
        return UserAgreements::model()->findAll($criteria);
    }

    public static function getAllModulesList()
    {
        $criteria = new CDbCriteria;
        $criteria->mergeWith(array(
            'join' => 'LEFT JOIN acc_module_service ms ON ms.service_id = t.service_id',
            'condition' => 'ms.service_id = t.service_id'
        ));
        return UserAgreements::model()->findAll($criteria);
    }


    public static function getInvoicesList($id)
    {
        $criteria = new CDbCriteria;
        $criteria->condition = 'agreement_id = ' . $id;

        $dataProvider = new CActiveDataProvider('Invoice', array(
            'criteria' => $criteria,
            'pagination' => false,
        ));

        return $dataProvider;
    }

    public function getInvoices()
    {
        return $this->invoice;
    }

    public static function findLikeAgreement($agreement)
    {
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('number', $agreement);
        $agr = UserAgreements::model()->findAll($criteria);
        return $agr;
    }

    public static function findAgreementByUser($userId)
    {
        return UserAgreements::model()->findAllByAttributes(array('user_id'=> $userId));

    }
    public function getUserName()
    {
        return $this->user->email;
    }

    public function getFirstName()
    {
        return $this->user->firstName;

    }
    
    public function invoicesDataProvider()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('agreement_id='.$this->id);

        $dataProvider = new CActiveDataProvider('Invoice');
        $dataProvider->criteria = $criteria;
        $dataProvider->setPagination(array(
                'pageSize' => 60,
            )
        );
        return $dataProvider;
    }


    public function cancelOperation()
    {
        $results = Yii::app()->db->createCommand()
            ->delete('service_user', 'user_id=:id', array(':id'=>$this->user_id));
        return $results;
    }


    public static function getAgreementByInvoices(Array $invoiceArr)
    {
        $userAgreements = [];
        foreach ($invoiceArr as $invoice) {
            $model = Invoice::model()->findByPk($invoice->id);
            $userAgreementId = $model->agreement->id;
            if ($userAgreementId)
                array_push($userAgreements, $userAgreementId);
    }
        return array_unique($userAgreements);
    }
    public function insertServiceUserData()
    {
        $agreements = UserAgreements::model()->findAllByAttributes(array('id' =>$this->id));

        foreach($agreements as $agreement)
        {
            $results = Yii::app()->db->createCommand()
                ->insert('service_user',
                    array('service_id' => $agreement->service_id,'user_id'=>$agreement->user_id));
        }
        if($results)
            return true;
        else return false;
    }

    public static function agreementsListByUser(){
        $criteria = new CDbCriteria;
        $criteria->addCondition('user_id=' . Yii::app()->user->getId());
        $agreements = UserAgreements::model()->findAll($criteria);
        $return = array('data' => array());

        foreach ($agreements as $record) {
            $row = array();
            $row["title"]["name"] = "Договір ".$record->number;
            $row["title"]["url"] = "'".Yii::app()->createUrl("/_teacher/_student/student/agreement", array("id" =>$record->id))."'";
            $row["date"] = date("d.m.y", strtotime($record->create_date));
            $row["summa"] = ($record->summa != 0)?$record->summa: "безкоштовно";
            $row["schema"] = CHtml::encode($record->paymentSchema->name);
            $row["invoices"]["name"] = "Договір ".$record->number;
            $row["invoices"]["url"] = "'".Yii::app()->createUrl("/_teacher/_student/student/agreement", array("id" =>$record->id))."'";

            array_push($return['data'], $row);
        }

        return json_encode($return);
    }
}


