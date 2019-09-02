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
 * @property string $passport
 * @property string $document_type
 * @property string $document_issued_date
 * @property string $inn
 * @property string $passport_issued
 * @property integer $status
 * @property integer $id_corporate_entity
 * @property integer $id_checking_account
 * @property boolean $contract
 * @property integer $educForm
 * @property integer $start_date
 *
 * @property Service $service
 * @property StudentReg $user
 * @property PaymentScheme $paymentSchema
 * @property StudentReg $approvalUser
 * @property StudentReg $cancelUser
 * @property UserAgreementStatus $status0
 * @property Invoice[] invoice
 * @property CorporateEntity $corporateEntity
 * @property CheckingAccounts $checkingAccount
 * @property UserWrittenAgreement $actualWrittenAgreement
 */
class UserAgreements extends CActiveRecord {

    use withBelongsToOrganization;

    const PAYABLE_STATUS = 'payable';
    const PAID_STATUS = 'paid';
    const DELAY_STATUS = 'delay';
    const EXPIRED_STATUS = 'expired';
    const NO_AGREEMENT = 'no_agreement';

    const CREATED = 1;
    const APPROVED = 2;
    const CANCELED = 3;
    const SEND_REQUEST = 4;
    const ACCOUNT_APPROVED = 5;
    const USER_APPROVED = 6;
    const GENERATED = 7;

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
            array('user_id, service_id, payment_schema, id_checking_account, contract', 'required'),
            array('user_id, approval_user, cancel_user, status', 'numerical', 'integerOnly' => true),
            array('service_id, payment_schema', 'length', 'max' => 10),
            array('number', 'length', 'max' => 50),
            array('passport, document_type, inn', 'length', 'max' => 30),
            array('approval_date, cancel_date, close_date, educForm, start_date', 'safe'),
            // The following rule is used by search().
            array('id, user_id, summa, service_id, number, create_date, approval_user, approval_date, cancel_user,
			cancel_date, close_date, payment_schema, cancel_reason_type, passport, document_type, inn,
			document_issued_date, passport_issued, status, id_checking_account, contract, educForm, start_date', 'safe', 'on' => 'search'),
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
            'invoice' => array(self::HAS_MANY, 'Invoice', 'agreement_id', 'order' => 'invoice.expiration_date'),
            'user' => array(self::BELONGS_TO, 'StudentReg','user_id'),
            'approvalUser' => array(self::BELONGS_TO, 'StudentReg','approval_user'),
            'cancelUser' => array(self::BELONGS_TO, 'StudentReg','cancel_user'),
            'paymentSchema' => array(self::BELONGS_TO, 'SchemesName', 'payment_schema'),
            'status0' => array(self::BELONGS_TO, 'UserAgreementStatus', 'status'),
            'internalPayment' => [self::HAS_MANY, 'InternalPays', array('id'=>'invoice_id'), 'through' => 'invoice', 'order' => 'internalPayment.create_date DESC'],
            'corporateEntity' => [self::BELONGS_TO, 'CorporateEntity', 'id_corporate_entity'],
            'organization' => [self::BELONGS_TO, 'Organization', ['id_organization' => 'id'], 'through' => 'corporateEntity'],
            'checkingAccount' => [self::BELONGS_TO, 'CheckingAccounts', 'id_checking_account'],
            'actualWrittenAgreement' => [self::HAS_ONE, 'UserWrittenAgreement', ['id_agreement' => 'id'], 'scopes' => 'actualAgreement'],
            'userInfo' => array(self::BELONGS_TO, 'StudentInfo', ['user_id'=>'id_student']),
            'group' => array(self::HAS_MANY, 'OfflineStudents', ['id_user'=>'user_id']),
            'group_id' => array(self::HAS_MANY, 'OfflineSubgroups', ['id_subgroup'=>'id'], 'through'=>'group'),
            'group_name' => array(self::HAS_MANY, 'OfflineGroups', ['group'=>'id'], 'through'=>'group_id'),
            'studentTrainer' => array(self::HAS_ONE, 'TrainerStudent', array('student'=>'user_id'), 'on' => 'end_time IS NULL'),
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
            'passport' => 'Серія/номер паспорта',
            'inn' => 'ідентифікаційний номер',
            'document_type' => 'Тип документа, серія/номер якого зазначений в полі паспорт',
            'document_issued_date' => 'Дата видачі паспорта',
            'passport_issued' => 'Ким виданий (паспорт)',
            'id_checking_account' => 'Р/р',
            'contract' => 'контракт',
            'educForm' => 'форма(онлайн/офлайн)',
            'start_date' => 'Дата відкриття',
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
        $criteria->compare('passport', $this->passport, true);
        $criteria->compare('inn', $this->inn, true);
        $criteria->compare('document_type', $this->document_type, true);
        $criteria->compare('document_issued_date', $this->document_issued_date, true);
        $criteria->compare('passport_issued', $this->passport_issued, true);
        $criteria->compare('id_checking_account', $this->id_checking_account, true);
        $criteria->compare('contract', $this->contract, true);
        $criteria->compare('educForm', $this->educForm, true);
        $criteria->compare('start_date', $this->start_date, true);

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

    /**
     * @param IntITAUser $user
     * @return bool
     */
    public function confirm($user) {
        if ($this->approval_date == null) {
            $this->approval_user = $user->getId();
            $this->approval_date = new CDbExpression('NOW()');
            if ($this->save()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param IntITAUser $user
     * @return bool
     */
    public function cancel($user) {
        if ($this->canBeCanceled()) {
            $this->cancel_date = new CDbExpression('NOW()');
            $this->cancel_user = $user->getId();
            $this->status = self::CANCELED;
            if ($this->save()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function agreementByParams($type, $user, $module, $course, $schemaNum, $educForm)
    {
        $agreement = null;
        switch ($type){
            case 'Module':
                $agreement = UserAgreements::moduleAgreement($user, $module, $schemaNum, $educForm);
                break;
            case 'Course':
                $agreement = UserAgreements::courseAgreement($user, $course, $schemaNum, $educForm);
                break;
            default :
                $agreement = null;
                break;
        }

        return $agreement;
    }
    
    
    public static function courseAgreement($user, $course, $schema, $educForm)
    {
        $educFormModel = EducationForm::model()->findByPk($educForm);
        $service = CourseService::model()->getService($course, $educFormModel);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id,'cancel_date'=>null));
            if ($model) {
                return $model;
            }
        }
        return self::newAgreement($user, 'CourseService', $course, $schema, $educFormModel);
    }

    public static function courseAgreementExist($user, $course, $educForm)
    {
        $educFormModel = EducationForm::model()->findByPk($educForm);
        $service = CourseService::model()->getService($course, $educFormModel);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id,'cancel_date'=>null));
            if ($model) {
                return true;
            }
        }
        return false;
    }

    public static function moduleAgreement($user, $module, $schema, $educForm)
    {
        $educFormModel = EducationForm::model()->findByPk($educForm);
        $service = ModuleService::model()->getService($module, $educFormModel);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id,'cancel_date'=>null));
            if ($model) {
                return $model;
            }
        }
        return self::newAgreement($user, 'ModuleService', $module, $schema, $educFormModel);
    }

    public static function moduleAgreementExist($user, $module, $educForm)
    {
        $educFormModel = EducationForm::model()->findByPk($educForm);
        $service = ModuleService::model()->getService($module, $educFormModel);
        if ($service) {
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $service->service_id,'cancel_date'=>null));
            if ($model) {
                return true;
            }
        }
        return false;
    }

    private static function newAgreement($userId, $modelFactory, $param_id, $schemaId, EducationForm $educForm)
    {
        $transaction = null;
        if (Yii::app()->db->getCurrentTransaction() == null) {
            $transaction = Yii::app()->db->beginTransaction();
        }
        try {
            $user = StudentReg::model()->findByPk($userId);
            $modFuctory = new $modelFactory;
            $serviceModel = $modFuctory->getService($param_id, $educForm);
            if(!$serviceModel->checkServiceAccess()){
                throw new \application\components\Exceptions\IntItaException(500, 'Договір не вдалося створити. Статус сервісу: "В РОЗРОБЦІ"');
            }

            $billableObject = $serviceModel->getBillableObject();

            $schemas = PaymentScheme::model()->getPaymentScheme($user, $serviceModel);
            $calculators = $schemas->getSchemaCalculator($educForm);
            $calculator = array_filter($calculators, function($item) use ($schemaId) {
                return $item->id == $schemaId;
            });

            if($calculator){
                $billableObjectOrganization = $billableObject->organization;
                if (isset($schemas->id_template) && PaymentSchemeTemplate::model()->findByPk($schemas->id_template)->checkingAccount){
                    $checkingAccount = PaymentSchemeTemplate::model()->findByPk($schemas->id_template)->checkingAccount;;
                    $corporateEntity = $checkingAccount->corporateEntity;
                }else{
                    $corporateEntity = $billableObjectOrganization->getCorporateEntityFor($billableObject, $educForm);
                    var_dump($billableObject);
                    var_dump($educForm);die;
                    $checkingAccount = $billableObjectOrganization->getCheckingAccountFor($billableObject, $educForm);
                }
                $builder = new ContractingPartyBuilder();

                $contractingParty = $builder->makeCorporateEntity($corporateEntity, $checkingAccount);
                $calculator = array_values($calculator)[0];
                $model = new UserAgreements();
                $model->user_id = $userId;
                $model->payment_schema = $calculator->payCount;
                $model->service_id = $serviceModel->service_id;
                $model->id_corporate_entity = $corporateEntity->id;
                $model->id_checking_account = $checkingAccount->id;
                $model->contract = $calculator->contract;
                $model->educForm = $educForm->id;

                //create phantom billableObject model for converting object's price to UAH
                //used only in computing agreement and invoices price
                $billableObjectUAH = clone $billableObject->getModelUAH();

                //start date for offline service
                $startDate = ($educForm->id==EducationForm::OFFLINE && $calculator->start_date)?new DateTime($calculator->start_date):new DateTime();
                $endPaymentDate = null;
                if($educForm->id==EducationForm::OFFLINE && $calculator->start_date){
                    if(new DateTime($calculator->start_date) < new DateTime()){
                        $startDate = new DateTime($calculator->start_date);
                        $startPaymentDate = new DateTime();
                    }else {
                        $startDate = new DateTime($calculator->start_date);
                        $startPaymentDate = clone $startDate;
                    }
                }else{
                    $startDate = new DateTime();
                    $startPaymentDate = clone $startDate;
                }

                $model->summa = $calculator->getSumma($billableObjectUAH);
                $model->start_date = $startPaymentDate->format('Y-m-d');
                $model->close_date = $calculator->getCloseDate($billableObject, $startDate)->format(Yii::app()->params['dbDateFormat']);
                $model->status = 1;
                if ($model->save()) {
                    $contractingParty->bindToAgreement($model, ContractingParty::ROLE_COMPANY);
                    $invoicesList = $calculator->getInvoicesList($billableObjectUAH, $startPaymentDate);
                    $agreementId = $model->id;
                    $model->updateByPk($agreementId, array(
                        'number' => UserAgreements::generateNumber($billableObject, $agreementId
                        )));
                    Invoice::setInvoicesParamsAndSave($invoicesList, $userId, $agreementId);
                    $model->provideAccess();
                } else {
                    throw new \application\components\Exceptions\IntItaException(500, 'Договір не вдалося створити. Зверніться до адміністратора '.Config::getAdminEmail());
                }
            }
            if ($transaction) {
                $transaction->commit();
                return $model;
            }
        } catch (Exception $e) {
            if ($transaction) {
                $transaction->rollback();
            }
            throw new \application\components\Exceptions\IntItaException(500, $e->getMessage());
        }
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

    public function invoices()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('agreement_id='.$this->id);
        return Invoice::model()->findAll($criteria);
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
            $row["object"] = ($record->service)?CHtml::encode($record->service->description):"";
            $row["date"] = date("d.m.y", strtotime($record->create_date));
            $row["summa"] = ($record->summa != 0)?number_format($record->summa, 2, ",","&nbsp;"): "безкоштовно";
            $row["schema"] = CHtml::encode($record->getPaymentSchema()->name);
            $row["invoices"]["name"] = "Договір ".$record->number;
            $row["invoices"]["url"] = "'".Yii::app()->createUrl("/_teacher/_student/student/agreement", array("id" =>$record->id))."'";

            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public function getId(){
        return $this->id;
    }

    public function getPaymentSchema() {
        return array_values(PaymentScheme::model()->getPaymentScheme(null, null, $this->payment_schema))[0];
    }

    public function getFirstUnpaidInvoice() {
        $unpaidInvoice = null;
        $unpaidInvoiceDate = null;
        foreach ($this->invoice as $invoice) {
            if (!$invoice->isPaid()) {
                $currentInvoiceDate = new DateTime($invoice->expiration_date);
                if (!$unpaidInvoice) {
                    $unpaidInvoice = $invoice;
                    $unpaidInvoiceDate = new DateTime($unpaidInvoice->expiration_date);
                } else if ($unpaidInvoiceDate->diff($currentInvoiceDate)->invert) {
                    $unpaidInvoice = $invoice;
                    $unpaidInvoiceDate = $currentInvoiceDate;
                }
            }
        }
        return $unpaidInvoice;
    }

    public function getLastPaidInvoice() {
        $paidInvoice = null;
        $paidInvoiceDate = null;
        foreach ($this->invoice as $invoice) {
            if ($invoice->isPaid()) {
                $currentInvoiceDate = new DateTime($invoice->expiration_date);
                if (!$paidInvoice) {
                    $paidInvoice = $invoice;
                    $paidInvoiceDate = new DateTime($paidInvoice->expiration_date);
                } else if ($paidInvoiceDate < $currentInvoiceDate) {
                    $paidInvoice = $invoice;
                    $paidInvoiceDate = $currentInvoiceDate;
                }
            }
        }
        return $paidInvoice;
    }

    public function provideAccess() {
        $unpaidInvoice = $this->getFirstUnpaidInvoice();
        $firstInvoice = $this->getFirstInvoice();
        if ($unpaidInvoice) {
            $endDate = $unpaidInvoice->expiration_date;
        } else {
            $endDate = '3000-12-31 23:59:59';
        }

        if(!$firstInvoice || $unpaidInvoice!=$firstInvoice){
            $this->service->provideAccess($this->user_id, $endDate);
        }
    }

    public function updateNextInvoicesDate() {
        $lastPaidInvoice = $this->getLastPaidInvoice();
        if ($lastPaidInvoice && $lastPaidInvoice->isPaidWithOverdue()) {
            $newDate = $lastPaidInvoice->getFinallyPaymentDate();
            foreach ($this->invoice as $invoice) {
                if (!$invoice->isPaid()) {
                    $newDate = $invoice->setNewStartDate($newDate);
                }
            }
        }
    }

    public function getFirstInvoice() {
        $firstInvoice = null;
        
        if(isset($this->invoice[0]))
            $firstInvoice=$this->invoice[0];
        
        return $firstInvoice;
    }

    public function getAgreementPaidSum() {
        $sum=0;
        foreach ($this->invoice as $invoice) {
            $sum=$sum+$invoice->getPaidSum();
        }
        return $sum;
    }

    public function canBeCanceled() {
//        $this->getAgreementPaidSum()==0
        if ($this->corporateEntity->organization->id==Yii::app()->user->model->getCurrentOrganizationId()) {
           return true;
        } else {
            return false;
        }
    }

    public static function paymentServiceStatus($user, $course, $service)
    {
        $today = date("Y-m-d H:i:s");

        $educFormOnline = EducationForm::model()->findByPk(EducationForm::ONLINE);
        $educFormOffline = EducationForm::model()->findByPk(EducationForm::OFFLINE);
        switch ($service){
            case 'module':
                $serviceOnline = ModuleService::model()->getService($course, $educFormOnline);
                $serviceOffline = ModuleService::model()->getService($course, $educFormOffline);
                break;
            case 'course':
                $serviceOnline = CourseService::model()->getService($course, $educFormOnline);
                $serviceOffline = CourseService::model()->getService($course, $educFormOffline);
                break;
        }

        $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $serviceOnline->service_id, 'cancel_date' => null));
        if(!$model){
            $model = UserAgreements::model()->findByAttributes(array('user_id' => $user, 'service_id' => $serviceOffline->service_id, 'cancel_date' => null));
        }
        if (isset($model) && $model) {
            $firstUnpaidInvoice=$model->getFirstUnpaidInvoice();
            if($firstUnpaidInvoice){
                if ($today<$firstUnpaidInvoice->payment_date) {
                    return UserAgreements::PAYABLE_STATUS;
                }else if($today>=$firstUnpaidInvoice->payment_date &&
                    $today<=$firstUnpaidInvoice->expiration_date &&
                    $model->getFirstInvoice()->id!=$firstUnpaidInvoice->id)
                {
                    return UserAgreements::DELAY_STATUS;
                }else{
                    return UserAgreements::EXPIRED_STATUS;
                }
            }else{
                return UserAgreements::PAID_STATUS;
            }
        }
        return UserAgreements::NO_AGREEMENT;
    }

    /**
     * The method should return CDBCriteria to select entity belong to organisation
     * @param Organization $organization
     * @return CDbCriteria
     */
    public function getOrganizationCriteria(Organization $organization) {
        $criteria = new CDbCriteria([
            'condition' => 'organization.id = :organizationId',
            'params' => ['organizationId' => $organization->id],
            'with' => 'organization'
        ]);
        return $criteria;
    }

    public function checkAgreementView() {
        if(Yii::app()->user->model->isAuditor()){
            return true;
        }
        if(Yii::app()->user->model->isAccountant() || Yii::app()->user->model->isSupervisor() && $this->corporateEntity->id_organization==Yii::app()->user->model->getCurrentOrganizationId()){
            return true;
        }
        if(Yii::app()->user->model->isTrainer() && TrainerStudent::model()->findByAttributes(array(
                'student'=>$this->user_id,
                'trainer'=>Yii::app()->user->getId(),
                'id_organization'=>Yii::app()->user->model->getCurrentOrganization()->id,
                'end_time'=>null,
            ))==Yii::app()->user->model->getCurrentOrganizationId()){
            return true;
        }

        return false;
    }

    public function getActualWrittenTemplate()
    {
        $userWrittenAgreement=UserWrittenAgreement::model()->findByAttributes(array(
            'id_agreement'=>$this->id,
            'actual'=>UserWrittenAgreement::ACTUAL,
        ));
        if($userWrittenAgreement && $userWrittenAgreement->html_for_edit) {
            return ['id'=>0,'template'=>$userWrittenAgreement->html_for_edit];
        }else{
            return ['id'=>$this->service->written_agreement_template_id,'template'=>$this->service->writtenAgreementTemplate->template];
        }
    }

    public function checkAndGetWrittenAgreement($params) {
        if($this->actualWrittenAgreement) {
            $userWrittenAgreement = $this->actualWrittenAgreement;
        }else {
            $userWrittenAgreement=new UserWrittenAgreement();
        }
        $userWrittenAgreement->attributes=$params;
        $userWrittenAgreement->checked_by=Yii::app()->user->getId();
        $userWrittenAgreement->id_agreement=$this->id;
        $userWrittenAgreement->actual=UserWrittenAgreement::ACTUAL;
        $userWrittenAgreement->checked_by_accountant=UserWrittenAgreement::CHECKED;
        $userWrittenAgreement->checked=UserWrittenAgreement::CHECKED;
        $userWrittenAgreement->checked_date=new CDbExpression('NOW()');
        if(!$userWrittenAgreement->save()){
            throw new \application\components\Exceptions\IntItaException(403, 'Виникла помилка при затверджені паперового договору');
        }

        $userWrittenAgreement->notifyUserAboutGenerateAgreement();
        return $userWrittenAgreement;
    }

    public function sendAgreementRequestToUser($params, $id_template=null) {
        if($this->actualWrittenAgreement){
            $this->actualWrittenAgreement->attributes=$params;
            if($id_template)
                $this->actualWrittenAgreement->html_for_edit=WrittenAgreementTemplate::model()->findByPk($id_template)->template;
            $this->actualWrittenAgreement->checked_by=Yii::app()->user->getId();
            $this->actualWrittenAgreement->checked_by_accountant=UserWrittenAgreement::CHECKED;
            $this->actualWrittenAgreement->checked_date=new CDbExpression('NOW()');
            if(!$this->actualWrittenAgreement->save()){
                throw new \application\components\Exceptions\IntItaException(403, 'Виникла помилка при затверджені паперового договору');
            }

            $this->actualWrittenAgreement->notifyUserAboutAgreementRequest();
        }else{
            $userWrittenAgreement=new UserWrittenAgreement();
            $userWrittenAgreement->attributes=$params;
            if($id_template)
                $userWrittenAgreement->html_for_edit=WrittenAgreementTemplate::model()->findByPk($id_template)->template;
            $userWrittenAgreement->id_agreement=$this->id;
            $userWrittenAgreement->actual=UserWrittenAgreement::ACTUAL;
            $userWrittenAgreement->checked_by=Yii::app()->user->getId();
            $userWrittenAgreement->checked_by_accountant=UserWrittenAgreement::CHECKED;
            $userWrittenAgreement->checked_date=new CDbExpression('NOW()');
            if(!$userWrittenAgreement->save()){
                throw new \application\components\Exceptions\IntItaException(403, 'Виникла помилка при затверджені паперового договору');
            }

            $userWrittenAgreement->notifyUserAboutAgreementRequest();
        }
    }

    public function makePrivatePerson($sessionTime)
    {
        $transaction = null;
        if (Yii::app()->db->getCurrentTransaction() == null) {
            $transaction = Yii::app()->db->beginTransaction();
        }
        try {
            $builder = new ContractingPartyBuilder();
            $contractingParty = $builder->makePrivatePerson($this->user);
            $contractingParty->bindToAgreement($this, ContractingParty::ROLE_STUDENT);
            $this->user->checkedActualUserDocuments($sessionTime);

            if ($transaction) {
                $transaction->commit();
            }
        } catch (Exception $e) {
            if ($transaction) {
                $transaction->rollback();
            }
            throw new \application\components\Exceptions\IntItaException(500, $e->getMessage());
        }
    }

    public static function agreementByType($agreement,$request,$writtenAgreement)
    {
        $model = null;
        if($agreement){
            $model = UserAgreements::model()->findByPk($agreement);
        }elseif($request){
            $model = WrittenAgreementRequest::model()->findByPk($request)->agreement;
        }elseif($writtenAgreement){
            $model = UserWrittenAgreement::model()->findByPk($writtenAgreement)->agreement;
        }

        return $model;
    }

    public function setCreated() {
        $this->status = self::CREATED;
        $this->save();
    }

    public function setApproved() {
        $this->status = self::APPROVED;
        $this->save();
    }

    public function setCanceled() {
        $this->status = self::CANCELED;
        $this->save();
    }

    public function setSenRequest() {
        $this->status = self::SEND_REQUEST;
        $this->save();
    }

    public function setAccountApproved() {
        $this->status = self::ACCOUNT_APPROVED;
        $this->save();
    }

    public function setUserApproved() {
        $this->status = self::USER_APPROVED;
        $this->save();
    }

    public function setGenerated() {
        $this->status = self::GENERATED;
        $this->save();
    }
}


