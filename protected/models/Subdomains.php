<?php

 /**
  * This is the model class for table "subdomains".
  *
  * The followings are the available columns in table 'subdomains':
  * @property integer $id
  * @property string $domain_name
  * @property integer $organization
  * @property integer $active
  */
 class Subdomains extends CActiveRecord
  {
  /**
   * @return string the associated database table name
   */
   public function tableName()
    {
     return 'subdomains';
    }

  /**
   * @return array validation rules for model attributes.
   */
   public function rules()
    {
     // NOTE: you should only define rules for those attributes that
     // will receive user inputs.
     return array(
         array('domain_name', 'required'),
         array('domain_name', 'match', 'pattern' => "/^[a-zA-Z0-9_]{1,15}+$/u", 'message' => 'Допустимі символи: латинські літери, цифри та знак "_"'),
         array('domain_name', 'unique'),
         array('organization, active', 'numerical', 'integerOnly' => true),
         array('domain_name', 'length', 'max' => 255),
         // The following rule is used by search().
         // @todo Please remove those attributes that should not be searched.
         array('id, domain_name, organization, active', 'safe', 'on' => 'search'),
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
         'organization' => [self::BELONGS_TO, 'Organization', ['organization' => 'id']],
     );
    }

  /**
   * @return array customized attribute labels (name=>label)
   */
   public function attributeLabels()
    {
     return array(
         'id'           => 'ID',
         'domain_name'  => 'Domain Name',
         'organization' => 'Organization',
         'active'       => 'Active',
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

     $criteria = new CDbCriteria;

     $criteria->compare('id', $this->id);
     $criteria->compare('domain_name', $this->domain_name, true);
     $criteria->compare('organization', $this->organization);
     $criteria->compare('active', $this->active);

     return new CActiveDataProvider($this, array(
         'criteria' => $criteria,
     ));
    }

  /**
   * Returns the static model of the specified AR class.
   * Please note that you should have this exact method in all your CActiveRecord descendants!
   * @param string $className active record class name.
   * @return Subdomains the static model class
   */
   public static function model($className = __CLASS__)
    {
     return parent::model($className);
    }

   public function save($runValidation = true, $attributes = null)
    {
     $this->exportSubdomainsList();
     $result = parent::save($runValidation, $attributes);
     if ($result === true)
      {
       $this->makeDomainDirectory();
       $this->exportSubdomainsList();
      }

     return $result;

    }

   private function exportSubdomainsList()
    {
       $mainDomain = Config::getBaseUrlWithoutSchema();
       $domains = $this->findAll('active = 1');
       $domainsArray = array_map(function ($item) use($mainDomain){
        return "{$item->domain_name}.{$mainDomain}";
       },$domains);

     $fileContent = '<?php'.PHP_EOL.'$activeDomains='.var_export($domainsArray,true).';'.PHP_EOL.'?>';
       file_put_contents(Yii::app()->basePath . '/../domains/activeDomains.php',$fileContent);
    }

   private function makeDomainDirectory()
    {
     if (!is_dir(Yii::app()->basePath . '/../domains/' . $this->domain_name.'.'.Config::getBaseUrlWithoutSchema()))
      {
       mkdir(Yii::app()->basePath . '/../domains/' . $this->domain_name.'.'.Config::getBaseUrlWithoutSchema(), 0777, true);
      }
    }

  }
