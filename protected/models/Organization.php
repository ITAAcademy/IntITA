<?php

/**
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $id
 * @property string $name
 *
 * Relations
 * @property Course[] $courses
 * @property Module[] $modules
 * @property Course[] $coursesWithCorporateEntity
 * @property Module[] $modulesWithCorporateEntity
 * @property CorporateEntity[] $corporateEntity
 * @property CorporateEntity $latestCorporateEntity
 * @property CorporateEntity $latestCheckingAccount
 *
 */
class Organization extends CActiveRecord {
    const MAIN_ORGANIZATION = 1;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'organization';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 128),
            // The following rule is used by search().
            array('name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return [
            'corporateEntity' => [self::HAS_MANY, 'CorporateEntity', 'id_organization'],
            'courses' => [self::HAS_MANY, 'Course', 'id_organization'],
            'modules' => [self::HAS_MANY, 'Module', 'id_organization'],
            'coursesWithCorporateEntity' => [self::HAS_MANY, 'Course', 'id_organization', 'with' => array('corporateEntityOffline', 'corporateEntityOnline', 'checkingAccountOnline', 'checkingAccountOffline')],
            'modulesWithCorporateEntity' => [self::HAS_MANY, 'Module', 'id_organization', 'with' => array('corporateEntityOffline', 'corporateEntityOnline', 'checkingAccountOnline', 'checkingAccountOffline')],
            'latestCorporateEntity' => [self::HAS_ONE, 'CorporateEntity', 'id_organization', 'scopes' => 'latest'],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
        );
    }

    public function behaviors() {
        return [
            'ngTable' => [
                'class' => 'NgTableProviderOrganization'
            ]
        ];
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
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Organization the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return Course[]|Module[]
     */
    public function getCoursesAndModulesWithCorporateEntity() {
        return array_merge($this->coursesWithCorporateEntity, $this->modulesWithCorporateEntity);
    }

    private function getDefaultAgreementCorporateEntity() {
        return $this->latestCorporateEntity;
    }

    private function getDefaultAgreementCheckingAccount() {
        return $this->latestCorporateEntity->latestCheckingAccount;
    }

    public function getCorporateEntityFor(IServiceableWithEducationForm $model, EducationForm $educationForm) {
        $service = $model->getService($educationForm);
        $corporateEntity = $service->corporateEntity;
        if (!$corporateEntity) {
            $corporateEntity = $this->getDefaultAgreementCorporateEntity();
        }
        return $corporateEntity;
    }

    public function getCheckingAccountFor(IServiceableWithEducationForm $model, EducationForm $educationForm) {
        $service = $model->getService($educationForm);
        $checkingAccount = $service->checkingAccount;
        if (!$checkingAccount) {
            $checkingAccount = $this->getDefaultAgreementCheckingAccount();
        }
        return $checkingAccount;
    }
}
