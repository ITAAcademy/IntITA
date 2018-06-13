<?php

/**
 * This is the model class for table "acc_corporate_entity".
 *
 * The followings are the available columns in table 'acc_corporate_entity':
 * @property integer $id
 * @property string $EDPNOU
 * @property string $title
 * @property string $edpnou_issue_date
 * @property string $certificate_of_vat
 * @property string $certificate_of_vat_issue_date
 * @property string $tax_certificate
 * @property string $tax_certificate_issue_date
 * @property string $legal_address
 * @property integer $legal_address_city_code
 * @property string $actual_address
 * @property integer $actual_address_city_code
 * @property integer $id_organization
 * @property integer $contacts
 * @property string $license_number
 * @property string $license_issued
 * @property string $license_issued_date
 * @property string $kved
 *
 * The followings are the available model relations:
 * @property AddressCity $legalCity
 * @property AddressCity $actualCity
 * @property CorporateEntityService[] $corporateEntityServices
 * @property Service[] $services
 * @property ModuleService[] $modulesService
 * @property CourseService[] $coursesService
 * @property Module[] $modules
 * @property Course[] $courses
 * @property Organization $organization
 * @property CheckingAccounts[] $corporateCheckingAccounts
 * @property CheckingAccounts $latestCheckingAccount
 * @property CorporateEntityRepresentatives[] actualRepresentatives
 */
class CorporateEntity extends CActiveRecord {

    use withBelongsToOrganization;
    use withCollectAttributes;
    use withToArray;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'acc_corporate_entity';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('EDPNOU, legal_address, legal_address_city_code, id_organization', 'required'),
            array('legal_address_city_code, actual_address_city_code, id_organization', 'numerical', 'integerOnly' => true),
            array('EDPNOU, certificate_of_vat, tax_certificate', 'length', 'max' => 14),
            array('legal_address, actual_address, title', 'length', 'max' => 255),
            array('edpnou_issue_date, certificate_of_vat_issue_date, tax_certificate_issue_date, contacts,license_number,license_issued,license_issued_date, kved', 'safe'),
            // The following rule is used by search().
            array('id, EDPNOU, title, edpnou_issue_date, certificate_of_vat, certificate_of_vat_issue_date, tax_certificate, 
            tax_certificate_issue_date, legal_address, legal_address_city_code, actual_address, actual_address_city_code, contacts,
            license_number,license_issued,license_issued_date, kved', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.

        return array(
            'legalCity' => array(self::BELONGS_TO, 'AddressCity', 'legal_address_city_code'),
            'actualCity' => array(self::BELONGS_TO, 'AddressCity', 'actual_address_city_code'),
            'corporateEntityServices' => [self::HAS_MANY, 'CorporateEntityService', 'corporateEntityId', 'on' => 'corporateEntityServices.deletedAt IS NULL OR corporateEntityServices.deletedAt > NOW()'],
            'services' => [self::HAS_MANY, 'Service', ['serviceId' => 'service_id'], 'through' => 'corporateEntityServices'],
            'modulesService' => [self::HAS_MANY, 'ModuleService', ['service_id' => 'service_id'], 'through' => 'services'],
            'coursesService' => [self::HAS_MANY, 'CourseService', ['service_id' => 'service_id'], 'through' => 'services'],
            'modules' => [self::HAS_MANY, 'Module', ['module_id' => 'module_ID'], 'through' => 'modulesService'],
            'courses' => [self::HAS_MANY, 'Course', ['course_id' => 'course_ID'], 'through' => 'coursesService'],
            'organization' => [self::BELONGS_TO, 'Organization', 'id_organization'],
            'corporateCheckingAccounts' => [self::HAS_MANY, 'CheckingAccounts', ['corporate_entity' => 'id'], 'on' => 'corporateCheckingAccounts.deletedAt IS NULL OR corporateCheckingAccounts.deletedAt > NOW()'],
            'latestCheckingAccount' => [self::HAS_ONE, 'CheckingAccounts', ['corporate_entity' => 'id'], 'scopes' => 'latestCheckingAccount'],
            'actualRepresentatives' => [self::HAS_MANY, 'CorporateEntityRepresentatives', 'corporate_entity',
                'on' => 'NOW() BETWEEN actualRepresentatives.createdAt AND actualRepresentatives.deletedAt',
                'order' => 'representative_order'
            ]
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Company name',
            'EDPNOU' => 'National State Registry of Ukrainian Enterprises and Organizations',
            'edpnou_issue_date' => 'Дата видачі  ЄДРПОУ',
            'certificate_of_vat' => 'Свідоцтво платника ПДВ',
            'certificate_of_vat_issue_date' => 'Дата видачі свідоцтва платника ПДВ',
            'tax_certificate' => 'Свідоцтво платника податку',
            'tax_certificate_issue_date' => 'Дата видачі свідоцтва платника податку',
            'legal_address' => 'Юридична адреса',
            'legal_address_city_code' => 'Код міста (юридична адреса)',
            'actual_address' => 'Фактична адреса',
            'actual_address_city_code' => 'Код міста (фактична адреса)',
            'id_organization' => 'Id Organization',
            'contacts' => 'Contacts',
            'license_number' => 'Номер ліцензії',
            'license_issued' => 'Ліцензія видана',
            'license_issued_date' => 'Дата видачі ліцензії',
            'kved' => 'КВЕД',
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
    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title);
        $criteria->compare('EDPNOU', $this->EDPNOU, true);
        $criteria->compare('edpnou_issue_date', $this->edpnou_issue_date, true);
        $criteria->compare('certificate_of_vat', $this->certificate_of_vat, true);
        $criteria->compare('certificate_of_vat_issue_date', $this->certificate_of_vat_issue_date, true);
        $criteria->compare('tax_certificate', $this->tax_certificate, true);
        $criteria->compare('tax_certificate_issue_date', $this->tax_certificate_issue_date, true);
        $criteria->compare('legal_address', $this->legal_address, true);
        $criteria->compare('legal_address_city_code', $this->legal_address_city_code);
        $criteria->compare('actual_address', $this->actual_address, true);
        $criteria->compare('actual_address_city_code', $this->actual_address_city_code);
        $criteria->compare('id_organization', $this->id_organization);
        $criteria->compare('contacts', $this->contacts);
        $criteria->compare('license_number', $this->license_number);
        $criteria->compare('license_issued', $this->license_issued);
        $criteria->compare('license_issued_date', $this->license_issued_date);
        $criteria->compare('kved', $this->kved);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CorporateEntity the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function scopes() {
        return [
          'latest' => [
              'alias' => 'ce',
              'order' => 'ce.id DESC',
              'limit' => 1
          ]
        ];
    }

    public static function companiesList($params) {
        $adapter = new NgTableAdapter('CorporateEntity', $params);
        return json_encode($adapter->getData());
    }

    public static function companiesByQuery($query) {
        $criteria = new CDbCriteria();
        $criteria->select = "id, title, EDPNOU";
        $criteria->addSearchCondition('id', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('LOWER(title)', strtolower($query), true, "OR", "LIKE");
        $criteria->addSearchCondition('EDPNOU', $query, true, "OR", "LIKE");

        $data = CorporateEntity::model()->findAll($criteria);

        $result = [];
        foreach ($data as $key => $model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["title"] = $model->title;
            $result["results"][$key]["edpnou"] = $model->EDPNOU;
        }
        return json_encode($result);
    }

    public function representativesList() {
        $sql = "SELECT * FROM acc_corporate_entity_representatives WHERE corporate_entity = " . $this->id;
        return Yii::app()->db->createCommand($sql)->queryAll();
    }

    /**
     * @param Organization $organization
     * @return CDbCriteria
     */
    public function getOrganizationCriteria(Organization $organization) {
        $criteria = new CDbCriteria([
            'condition' => 't.id_organization = :organizationId',
            'params' => ['organizationId' => $organization->id]
        ]);
        return $criteria;
    }

    /**
     * @param Service $service
     * @param CheckingAccounts $checkingAccount
     * @return CorporateEntityService
     */
    public function bindService(Service $service, CheckingAccounts $checkingAccount) {
        return CorporateEntityService::model()->createBinding($this, $service, $checkingAccount);
    }

    /**
     * @param IServiceableWithEducationForm $model
     * @param EducationForm $educationForm
     * @param CheckingAccounts $checkingAccount
     * @return CorporateEntityService
     */
    public function bindServiceByEducationUnit(IServiceableWithEducationForm $model, EducationForm $educationForm, CheckingAccounts $checkingAccount) {
        $service = $model->getService($educationForm);
        return $this->bindService($service, $checkingAccount);
    }

    /**
     * @param Service $service
     * @return CorporateEntityService
     */
    public function getActiveServiceBinging(Service $service) {
        return array_reduce($this->corporateEntityServices, function ($prev, $item) use ($service) {
            if (!$prev) {
                if ($item->serviceId == $service->service_id) {
                    $prev = $item;
                }
            }
            return $prev;
        });
    }

    /**
     * @param Service $service
     * @return CorporateEntityService
     * @throws Exception
     */
    public function unBindService(Service $service) {
        $model = $this->getActiveServiceBinging($service);
        if ($model) {
            $model->deletedAt = new CDbExpression('NOW()');
            if ($model->validate()) {
                $model->save(false);
            } else {
                throw new Exception('Validation error');
            }
        }
        return $model;
    }
}
