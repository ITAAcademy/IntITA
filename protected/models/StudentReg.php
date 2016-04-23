<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $firstName
 * @property string $middleName
 * @property string $secondName
 * @property string $nickname
 * @property string $birthday
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $address
 * @property string $education
 * @property string $educform
 * @property string $interests
 * @property string $aboutUs
 * @property string $aboutMy
 * @property integer $role
 * @property string $isExtended
 * @property string $network
 * @property string $facebook
 * @property string $googleplus
 * @property string $linkedin
 * @property string $vkontakte
 * @property string $twitter
 * @property string $token
 * @property string $activkey_lifetime
 * @property string $status
 * @property string $reg_time
 * @property string $avatar
 * @property string $identity
 * @property string $skype
 * @property integer $country
 * @property integer $city
 *
 * @property AddressCountry $country0
 * @property AddressCity $city0
 */
class StudentReg extends CActiveRecord
{
    public $password_repeat;
    public $send_letter;
    public $upload;
    public $letterTheme;
    public $network;
    public $new_password;
    public $new_password_repeat;

    private $_identity;

    public function getDbConnection()
    {
        return Yii::app()->db;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('facebook, googleplus, linkedin, vkontakte, twitter', 'networkValidation'),
            array('avatar', 'file', 'types' => 'jpg, gif, png, jpeg', 'maxSize' => 1024 * 1024 * 5, 'allowEmpty' => true, 'tooLarge' => Yii::t('error', '0302'), 'on' => 'reguser,edit', 'except' => 'socialLogin'),
            array('email, password, password_repeat', 'required', 'message' => Yii::t('error', '0268'), 'on' => 'reguser'),
            array('email', 'required', 'message' => Yii::t('error', '0268'), 'on' => 'recovery,resetemail,linkingemail'),
            array('email', 'email', 'message' => Yii::t('error', '0271'), 'on' => 'recovery,resetemail,fromraptoext,linkingemail'),
            array('email', 'authenticateEmail', 'on' => 'recovery'),
            array('password, new_password_repeat, new_password', 'required', 'message' => Yii::t('error', '0268'), 'on' => 'changepass'),
            array('new_password_repeat, new_password', 'required', 'message' => Yii::t('error', '0268'), 'on' => 'recoverypass'),
            array('new_password', 'compare', 'compareAttribute' => 'new_password_repeat', 'message' => Yii::t('error', '0269'), 'on' => 'changepass,recoverypass'),
            array('password', 'authenticatePass', 'on' => 'changepass'),
            array('email', 'required', 'message' => '{attribute} ' . Yii::t('error', '0270'), 'on' => 'edit'),
            array('email, password', 'required', 'message' => Yii::t('error', '0268'), 'on' => 'repidreg,loginuser'),
            array('email', 'email', 'message' => Yii::t('error', '0271')),
            array('email', 'unique', 'caseSensitive' => true, 'allowEmpty' => true, 'message' => Yii::t('error', '0272'), 'on' => 'resetemail, repidreg,reguser,edit,fromraptoext'),
            array('password', 'authenticate', 'on' => 'loginuser'),
            array('password_repeat', 'passdiff', 'on' => 'edit'),
            array('birthday', 'date', 'format' => 'dd/MM/yyyy', 'message' => Yii::t('error', '0427'), 'on' => 'reguser,edit'),
            array('password', 'compare', 'compareAttribute' => 'password_repeat', 'message' => Yii::t('error', '0269'), 'on' => 'reguser'),
            array('firstName, secondName, nickname, email, password, education', 'length', 'max' => 255),
            array('birthday', 'length', 'max' => 11),
            array('phone', 'match', 'pattern' => '^\+\d{2}\(\d{3}\)\d{3}\d{2}\d{2}$^', 'message' => 'Введіть коректний номер'),
            array('phone', 'length', 'max' => 15),
            array('phone', 'length', 'min' => 15),
            array('educform', 'length', 'max' => 60),
            array('firstName, secondName', 'match', 'pattern' => '/^[a-zа-яіїёA-ZА-ЯІЇЁєЄ\s\'’]+$/u', 'message' => Yii::t('error', '0416')),
            array('address, interests, aboutUs,send_letter, role, educform, aboutMy, avatar, network, facebook, country, city, education, googleplus, linkedin, vkontakte, twitter,token,activkey_lifetime, status, identity, skype', 'safe'),
            // The following rule is used by search().
            array('id, firstName, secondName, nickname, birthday, email, password, phone, address, country, city, education, educform, interests, aboutUs, password_repeat, middleName,aboutMy, avatar, upload, role, reg_time, identity, skype', 'safe', 'on' => 'search'),
        );
    }

    public function networkValidation($attribute)
    {
        /*if value not Roman alphabet or url not validation = error*/
        $value = $this->$attribute;
        if (!empty($value)) {
            if (!StudentReg::isNetworkURL($value, $attribute))
                $this->addError($attribute, Yii::t('validation', '0636'));
            else
                if (preg_match('/[^\x20-\x7f]/', $value) || !StudentReg::getCorrectURl($value))
                    $this->addError($attribute, Yii::t('validation', '0636'));
        }
    }

    public function authenticate()
    {
        $this->_identity = new UserIdentity($this->email, $this->password);
        if (!$this->_identity->authenticate())
            $this->addError('password', Yii::t('error', '0273'));
    }

    public function authenticatePass()
    {
        $model = StudentReg::model()->findByPk(Yii::app()->user->id);
        if (sha1($this->password) !== $model->password)
            $this->addError('password', Yii::t('error', '0274'));
    }

    public function authenticateEmail()
    {
        $model = StudentReg::model()->find("email=:e", array('e' => $this->email));
        if (!$model)
            $this->addError('email', Yii::t('error', '0301'));
    }

    public function passdiff()
    {
        $model = StudentReg::model()->findByPk(Yii::app()->user->id);
        if (!empty($model->password)) {
            return;
        }
        if (isset($this->password) || isset($this->password_repeat)) {
            if ($this->password !== $this->password_repeat)
                $this->addError('password', Yii::t('error', '0268'));
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'teacher' => array(self::HAS_ONE, 'Teacher', 'user_id'),
            'trainer' => array(self::HAS_ONE, 'TrainerStudent', 'student'),
            'country0' => array(self::HAS_ONE, 'AddressCountry', 'id'),
            'city0' => array(self::HAS_ONE, 'AddressCity', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'firstName' => Yii::t('regexp', '0160'),
            'middleName' => 'По-батькові',
            'secondName' => Yii::t('regexp', '0162'),
            'nickname' => Yii::t('regexp', '0163'),
            'birthday' => Yii::t('regexp', '0164'),
            'email' => Yii::t('regexp', '0242'),
            'password' => Yii::t('regexp', '0171'),
            'password_repeat' => Yii::t('regexp', '0172'),
            'phone' => Yii::t('regexp', '0165'),
            'address' => Yii::t('regexp', '0166'),
            'education' => Yii::t('regexp', '0167'),
            'educform' => Yii::t('regexp', '0168'),
            'interests' => Yii::t('regexp', '0169'),
            'aboutUs' => 'Звідки про нас?',
            'send_letter' => 'Повідомлення',
            'letterTheme' => 'Тема',
            'aboutMy' => Yii::t('regexp', '0170'),
            'avatar' => 'Аватар',
            'upload' => 'Up',
            'role' => Yii::t('regexp', '0161'),
            'network' => 'Network:',
            'facebook' => 'Facebook',
            'googleplus' => 'Google+',
            'linkedin' => 'LinkedIn',
            'vkontakte' => 'VK',
            'twitter' => 'Twitter',
            'reg_time' => 'Registration Time',
            'skype' => 'Skype',
            'country' => Yii::t('regexp', '0817'),
            'city' => Yii::t('regexp', '0818'),
        );
    }

    public function login()
    {
        if ($this->_identity === null) {
            $this->_identity = new UserIdentity($this->email, $this->password);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
            $duration = 3600 * 24; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
    }

    public function socialLogin()
    {
        if ($this->_identity === null) {
            $this->_identity = new SocialUserIdentity($this->email, $this->email);
            $this->_identity->authenticate();
        }
        if ($this->_identity->errorCode === SocialUserIdentity::ERROR_NONE) {
            $duration = 3600 * 24; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else
            return false;
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

        $criteria->compare('t.id', $this->id);
        $criteria->compare('firstName', $this->firstName, true);
        $criteria->compare('middleName', $this->middleName, true);
        $criteria->compare('secondName', $this->secondName, true);
        $criteria->compare('nickname', $this->nickname, true);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('education', $this->education, true);
        $criteria->compare('educform', $this->educform, true);
        $criteria->compare('interests', $this->interests, true);
        $criteria->compare('aboutUs', $this->aboutUs, true);
        $criteria->compare('aboutMy', $this->aboutMy, true);
        $criteria->compare('send_letter', $this->send_letter, true);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('upload', $this->upload, true);
        $criteria->compare('role', $this->role, true);
        $criteria->compare('network', $this->network, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('googleplus', $this->googleplus, true);
        $criteria->compare('linkedin', $this->linkedin, true);
        $criteria->compare('vkontakte', $this->vkontakte, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('token', $this->token, true);
        $criteria->compare('activkey_lifetime', $this->activkey_lifetime, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('reg_time', $this->reg_time, true);
        $criteria->compare('skype', $this->skype, true);
        $criteria->compare('t.country', $this->country, true);
        $criteria->compare('t.city', $this->city, true);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    protected function beforeSave()
    {
        if ($this->password !== Null)
            $this->password = sha1($this->password);
        $this->reg_time = time();
        return parent::beforeSave();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return StudentReg the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getAdressYears($birthday, $adress = '')
    {
        $brthAdr = ", ". $adress;
        if (!empty($adress) && !empty($birthday)) $brthAdr = $brthAdr . ", ";

        $myAge = $birthday;
        $myAge = str_replace("/", ".", $myAge);
        $date_a = new DateTime($myAge);
        $date_b = new DateTime();
        $interval = $date_b->diff($date_a);
        if ($interval->format("%y") !== '0') {
            $brthAdr = $brthAdr . $interval->format("%y") . ' ' . CommonHelper::getYearsTermination($interval->format("%Y"));
        }
        return $brthAdr;
    }

    public static function getEdForm($edForm)
    {
        if (isset($edForm) &&
            $edForm == 'Онлайн/Офлайн'
        ) {
            $val = 'checked';
        } else {
            $val = '';
        }
        return $val;
    }

    public static function getRole($id)
    {
        $user = RegisteredUser::userById($id);
        if ($user->isTeacher())
            return true;
        else return false;
    }

    public function getProfileRole()
    {
        if ($this->teacher)
            echo Yii::t('profile', '0241');
        else  echo Yii::t('profile', '0095');
    }

    # Функция для проверки существования страницы
    public static function getCorrectURl($url)
    {
        # Устанавливаем данные для запроса
        stream_context_set_default(array(
            'http' => array(
                'header' => 'User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:37.0) Gecko/20100101 Firefox/37.0'
            )
        ));

        # Получаем заголовки
        $headers = get_headers($url);

        # Возвращаем результат
        return
            !substr_count($headers[0], '404');
    }

    public static function isNetworkURL($value, $network)
    {
        $result = false;
        switch ($network) {
            case 'facebook':
                $domainPartPos = strpos($value, 'https://www.facebook.com/');
                if ($domainPartPos !== 0) $domainPartPos = strpos($value, 'http://www.facebook.com/');
                if ($domainPartPos === 0)
                    $result = true;
                break;
            case 'googleplus':
                $domainPartPos = strpos($value, 'https://plus.google.com/');
                if ($domainPartPos !== 0) $domainPartPos = strpos($value, 'http://plus.google.com/');
                if ($domainPartPos === 0)
                    $result = true;
                break;
            case 'linkedin':
                $domainPartPos = strpos($value, 'https://www.linkedin.com/');
                if ($domainPartPos !== 0) $domainPartPos = strpos($value, 'http://www.linkedin.com/');
                if ($domainPartPos === 0)
                    $result = true;
                break;
            case 'vkontakte':
                $domainPartPos = strpos($value, 'http://vk.com/');
                if ($domainPartPos !== 0) $domainPartPos = strpos($value, 'https://vk.com/');
                if ($domainPartPos === 0)
                    $result = true;
                break;
            case 'twitter':
                $domainPartPos = strpos($value, 'https://twitter.com/');
                if ($domainPartPos !== 0) $domainPartPos = strpos($value, 'http://twitter.com/');
                if ($domainPartPos === 0)
                    $result = true;
                break;
            default:
                $result = false;
        }
        return $result;
    }

    public static function isNewNetwork($network, $profile, $model)
    {
        $result = false;
        switch ($network) {
            case 'facebook':
                if ($model->facebook != $profile)
                    $result = true;
                break;
            case 'googleplus':
                if ($model->googleplus != $profile)
                    $result = true;
                break;
            case 'linkedin':
                if ($model->linkedin != $profile)
                    $result = true;
                break;
            case 'vkontakte':
                if ($model->vkontakte != $profile)
                    $result = true;
                break;
            case 'twitter':
                if ($model->twitter != $profile)
                    $result = true;
                break;
            default:
                $result = false;
        }
        return $result;
    }

    public function validatePassword($password)
    {
        return CPasswordHelper::verifyPassword($password, $this->password);
    }

    public function hashPassword($password)
    {
        return CPasswordHelper::hashPassword($password);
    }

    public function avatarPath(){
        if ($this->avatar != '')
            return StaticFilesHelper::createAvatarsPath($this->avatar);
        else return StaticFilesHelper::createAvatarsPath('noname.png');
    }

    public function getDataProfile()
    {
        $criteria = new CDbCriteria;
        $criteria->alias = 'consultationscalendar';
        if ($this->teacher)
            $criteria->addCondition('teacher_id=' . $this->id);
        else
            $criteria->addCondition('user_id=' . $this->id);

        $dataProvider = new CActiveDataProvider('Consultationscalendar', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
            'sort' => array(
                'defaultOrder' => 'date_cons DESC',
                'attributes' => array('date_cons'),
            ),
        ));

        return $dataProvider;
    }

    public function getTeachersResponseId()
    {
        $teacherResponse = Yii::app()->db->createCommand()
            ->select('id_response')
            ->from('teacher_response')
            ->where('id_teacher=:id', array(':id' => $this->id))
            ->queryAll();
        $result = [];
        for ($i = 0, $count = count($teacherResponse); $i < $count; $i++) {
            $result[$i] = $teacherResponse[$i]["id_response"];
        }
        return $result;
    }

    public function responseDataProvider()
    {
        $responsesIdList = $this->getTeachersResponseId();

        $criteria = new CDbCriteria();
        $criteria->alias = 'response';
        $criteria->order = 'date DESC';
        $criteria->condition = "is_checked = 1";
        $criteria->addInCondition('id', $responsesIdList);

        $dataProvider = new CActiveDataProvider('Response');
        $dataProvider->criteria = $criteria;
        $dataProvider->setPagination(array(
                'pageSize' => 5,
            )
        );
        return $dataProvider;
    }

    public function getMarkProviderData()
    {
        $markCriteria = new CDbCriteria;
        $markCriteria->alias = 'response';
        $markCriteria->addCondition('who=' . $this->id);
        $markCriteria->addCondition('rate>0');

        $markProvider = new CActiveDataProvider('Response', array(
            'criteria' => $markCriteria,
            'pagination' => false,
        ));

        return $markProvider;
    }

    public static function getUserNamePayment($id)
    {
        if ($id) {
            $model = StudentReg::model()->findByPk($id);
            if ($model) {
                if ($model->secondName == '' && $model->firstName == '') {
                    return $model->email;
                } else {
                    return $model->secondName . " " . $model->firstName . ", " . $model->email;
                }
            }
        }
    }

    public function getTeacherId()
    {
        $teacherId = $this->teacher;
        if($teacherId)
        return $teacherId->teacher_id;
    }

    public static function findLikeEmail($userEmail)
    {

        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('email', $userEmail);
        $result = StudentReg::model()->findAll($criteria);

        return $result;
    }

    public function getTeacherModel()
    {
        return $this->teacher;
    }

    public function isAccountant()
    {
        $sql = 'SELECT COUNT(id_user) FROM user_accountant WHERE id_user=' . $this->id.' and end_date IS NULL';
        $result = Yii::app()->db->createCommand($sql)->queryScalar();
        return ($result != 0) ? true : false;
    }

    public function isTeacher()
    {
        return Teacher::model()->exists('user_id=' . $this->id);
    }

    public static function getUserName($id)
    {
        $model = StudentReg::model()->findByPk($id);
        $name = addslashes($model->firstName . " " . $model->secondName);
        return trim($name);
    }

    public function userName()
    {
        $name = $this->firstName . " " . $this->secondName;
        return trim($name);
    }

    public function userNameWithEmail()
    {
        $name = $this->firstName . " " . $this->secondName;
        if ($name == "") {
            return $this->email;
        } else {
            return trim(CHtml::encode($name). ", ".$this->email);
        }
    }

    public static function getUserInfo()
    {
        $criteria = new CDbCriteria();
        $criteria->select = array('id', 'firstName', 'secondName', 'email');
        $criteria->toArray();
        $count = StudentReg::model()->count();
        $info = Studentreg::model()->findAll($criteria);
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[$info[$i]["id"]] = $info[$i]["email"] . "; " . $info[$i]["firstName"] . " " . $info[$i]["secondName"];
        }
        return $result;
    }

    public static function isAdmin()
    {
        if (Yii::app()->user->isGuest) {
            return false;
        }
        $user = StudentReg::model()->findByPk(Yii::app()->user->getId());
        $sql = 'SELECT COUNT(id_user) FROM user_admin WHERE id_user=' . $user->id.' and end_date IS NULL';
        $result = Yii::app()->db->createCommand($sql)->queryScalar();
        return ($result != 0) ? true : false;
    }

    public static function canAddConsultation()
    {
        if (Yii::app()->user->isGuest) {
            return false;
        }
        $user = StudentReg::model()->findByPk(Yii::app()->user->getId());
        return $user->isStudent();
    }

    public function isStudent()
    {
        return Yii::app()->user->model->isStudent();
    }

    public static function generateUsersList()
    {
        $users = StudentReg::model()->findAll();
        $count = count($users);
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[$i]['id'] = $users[$i]->id;
            $result[$i]['alias'] = $users[$i]->firstName . " " . $users[$i]->secondName . ", " . $users[$i]->email;
        }
        return $result;
    }

    public static function isHasAccessFileShare()
    {
        if (Yii::app()->user->isGuest) {
            return false;
        }
        $user = Yii::app()->user->model;
        if ($user->isAdmin() || $user->isTeacher()) {
            return true;
        }
        return false;
    }

    public static function linkInMouseLine()
    {
        if (Yii::app()->user->isGuest)
            return "href='#form'";
        else return "";
    }

    public static function getUserTitle($idUser)
    {
        $teacher = Teacher::model()->find("user_id=:user_id", array(':user_id' => $idUser));

        if ($teacher)
            $result = Yii::t('profile', '0715');
        else
            $result = Yii::t('profile', '0129');
        return $result;
    }

    public static function getProfileLinkByRole($id, $dp)
    {
        $user = RegisteredUser::userById($id);
        if (!StudentReg::model()->exists('id=:user', array(':user' => $dp->user_id))) {
            $result = Yii::t('profile', '0716');
            return $result;
        }
        $teacher = $user->getTeacher();
        if ($teacher) {
            if (StudentReg::model()->exists('id=:user', array(':user' => $dp->user_id))) {
                $dpUser = StudentReg::model()->findByPk($dp->user_id);
                $result = $dpUser->firstName . " " . $dpUser->secondName;
                if ($result == ' ')
                    $result = $dpUser->email;
            } else {
                $result =$teacher->firstName() . " " . $teacher->lastName();
            }
            return CHtml::link($result,array("/studentreg/profile", "idUser" => $dp->user_id),array("target"=>"_blank"));
        } else {
            $dpTeacher = Teacher::model()->findByAttributes(array('user_id' => $dp->teacher_id));
            $result = $dpTeacher->firstName()." ".$dpTeacher->lastName();
            return CHtml::link($result,array("/profile/index", "idTeacher" => $dpTeacher->teacher_id),array("target"=>"_blank"));
        }
    }

    public static function getNameEmail()
    {
        if (Yii::app()->user->isGuest) {
            $nameEmail = '';
        } else {
            $user = StudentReg::model()->findByPk(Yii::app()->user->id);
            $nameEmail = '&name=' . $user->firstName . '&email=' . $user->email;
        }
        return $nameEmail;
    }

    public function getPaymentsModules()
    {
        $modulesCriteria = new CDbCriteria;
        $modulesCriteria->alias = 'pay_modules';
        $modulesCriteria->addCondition('id_user=' . $this->id);
        $paymentsModules = new CActiveDataProvider('PayModules', array(
            'criteria' => $modulesCriteria,
            'pagination' => false,
        ));
        return $paymentsModules;
    }

    public function getPaymentsCourses()
    {
        $coursesCriteria = new CDbCriteria;
        $coursesCriteria->alias = 'pay_courses';
        $coursesCriteria->addCondition('id_user=' . $this->id);

        $paymentsCourses = new CActiveDataProvider('PayCourses', array(
            'criteria' => $coursesCriteria,
            'pagination' => false,
        ));

        return $paymentsCourses;
    }

    public function getSentLettersData()
    {
        $sentLettersCriteria = new CDbCriteria;
        $sentLettersCriteria->alias = 'letters';
        $sentLettersCriteria->addCondition('sender_id=' . $this->id);

        $sentLettersProvider = new CActiveDataProvider('Letters', array(
            'criteria' => $sentLettersCriteria,
            'pagination' => array(
                'pageSize' => 100,
            ),
            'sort' => array(
                'defaultOrder' => 'date DESC',
                'attributes' => array('date'),
            ),
        ));
        return $sentLettersProvider;
    }

    public function getReceivedLettersData()
    {
        $receivedLettersCriteria = new CDbCriteria;
        $receivedLettersCriteria->alias = 'letters';
        $receivedLettersCriteria->addCondition('addressee_id=' . $this->id);

        $receivedLettersProvider = new CActiveDataProvider('Letters', array(
            'criteria' => $receivedLettersCriteria,
            'pagination' => array(
                'pageSize' => 100,
            ),
            'sort' => array(
                'defaultOrder' => 'date DESC',
                'attributes' => array('date'),
            ),
        ));
        return $receivedLettersProvider;
    }

    public static function userLetterReceivers()
    {
        return StudentReg::model()->findAll(
            array('condition' => 'role<>0 and id<>' . Yii::app()->user->getId() . ' and id<>1', 'order' => 'id'));
    }

    public static function receivers()
    {
        return StudentReg::model()->findAll(
            array('condition' => 'role<>0 and id<>' . Yii::app()->user->getId() . ' and id<>1', 'order' => 'id'));
    }

    public function receivedMessages(){
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->alias = 'm';
        $criteria->order = 'm.id_message DESC';
        $criteria->join = 'JOIN message_receiver r ON r.id_message = m.id_message';
        $criteria->addCondition('r.id_receiver =:id and r.deleted IS NULL');
        $criteria->params = array(':id' => $this->id);

        $userMessages = UserMessages::model()->findAll($criteria);
        $paymentMessages = MessagesPayment::model()->findAll($criteria);

        $all = array_merge($userMessages, $paymentMessages);
        $user = Yii::app()->user->model;
//        if($user->isAdmin() || $user->isContentManager()){
//            $criteria1 = new CDbCriteria();
//            $criteria1->select = '*';
//            $criteria1->alias = 'm';
//            $criteria1->order = 'm.id_message DESC';
//            $criteria1->join = 'JOIN message_receiver r ON r.id_message = m.id_message';
//            $criteria1->addCondition('r.id_receiver =:id and r.deleted IS NULL and m.cancelled=0');
//            $criteria1->params = array(':id' => $this->id);
//
//            $authorRequests = MessagesAuthorRequest::model()->findAll($criteria1);
//            $teacherConsultantRequests = MessagesTeacherConsultantRequest::model()->findAll($criteria1);
//            $all =  array_merge($all, $authorRequests, $teacherConsultantRequests);
//        }

        function sortById($a, $b)
        {
            if ($a->id_message == $b->id_message) {
                return 0;
            }
            return ($a->id_message < $b->id_message) ? 1 : -1;
        }

        usort($all, "sortById");

        return $all;
    }

    public function newReceivedMessages(){
        $criteria = new CDbCriteria();
        $criteria->alias = 'm';
        $criteria->order = 'm.id DESC';
        $criteria->join = 'JOIN message_receiver r ON r.id_message = m.id';
        $criteria->addCondition ('r.deleted IS NULL AND r.read IS NULL and r.id_receiver ='.$this->id.' and
        (m.type='.MessagesType::USER.' or m.type='.MessagesType::PAYMENT.')');

        return Messages::model()->findAll($criteria);
    }

    public function newMessages($newReceivedMessages){
        $result = [];
        foreach($newReceivedMessages as $key=>$message){
            array_push($result, MessagesFactory::getInstance($message));
            if($key == 4) break;
        }
        return $result;
    }

    public function sentMessages(){
        $criteria = new CDbCriteria();
        $criteria->alias = 'um';
        $criteria->join = 'LEFT JOIN messages as m ON um.id_message = m.id';
        $criteria->order = 'm.create_date DESC';
        $criteria->addCondition ('m.sender = '.$this->id);

        return UserMessages::model()->findAll($criteria);
    }

    public function getNameOrEmail()
    {
        if (!empty($this->firstName) || !empty($this->secondName))
            return $this->firstName . ' ' . $this->secondName;
        else return $this->email;
    }

    public static function getStudentsList($startDate, $endDate) {

        $sql = 'select user.id,concat(IFNULL(user.firstName, ""), " ", IFNULL(user.secondName, "")) as studentName, user.email, us.start_date, u.id as trainer, IF((ts.end_time IS NULL), concat(IFNULL(u.firstName, ""), " ", IFNULL(u.secondName, "")," ",IFNULL(u.email, "")), "") as trainerName
              from user inner join user_student us on user.id = us.id_user
              left join trainer_student ts on us.id_user=ts.student
              left join user u on ts.trainer = u.id where (ts.end_time IS NULL or (ts.end_time IS NOT NULL and ts.student IS NOT NULL))';

        if (isset($startDate) && isset($endDate)){
            $sql .= " and TIMESTAMP(start_date) BETWEEN " . "'$startDate'". " AND " . "'$endDate' ";
        }
        $sql .= ' group by user.id';
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $return = array('data' => array());

        foreach ($result as $record) {
            $row = array();

            $row["student-name"] = $record["studentName"];
            $row["email"] = $record["email"];
            $row["date"] = date("d.m.Y h:i:s",strtotime($record["start_date"]));
            $row["trainer-name"] = $record["trainerName"];
            $row["url"] = (!$record["trainer"])?Yii::app()->createUrl('/_teacher/_admin/users/addTrainer', array('id' => $record["id"])):
                Yii::app()->createUrl('/_teacher/_admin/users/changeTrainer', array('id' => $record["id"], 'oldTrainerId' => $record["trainer"]));
            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public static function countTeachers()
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'user';
        $criteria->join = 'LEFT JOIN teacher ON teacher.user_id = user.id';
        $criteria->addCondition('teacher.user_id = user.id');
        return StudentReg::model()->count($criteria);
    }

    /**
     * @param $query string - query from typeahead
     * @return string - json for typeahead field in user manage page (cabinet, add)
     */
    public static function usersWithoutAccountants($query)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "id, secondName, firstName, middleName, email, avatar";
        $criteria->alias = "s";
        $criteria->addSearchCondition('firstName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('secondName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('middleName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('email', $query, true, "OR", "LIKE");
        $criteria->join = 'LEFT JOIN user_accountant u ON u.id_user = s.id';
        $criteria->addCondition('u.id_user IS NULL or u.end_date IS NOT NULL');

        $data = StudentReg::model()->findAll($criteria);

        $result = [];
        foreach ($data as $key=>$model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["name"] = $model->secondName . " " . $model->firstName . " " . $model->middleName;
            $result["results"][$key]["email"] = $model->email;
            $result["results"][$key]["url"] = $model->avatarPath();
        }
        return json_encode($result);
    }

    /**
     * @param $query string - query from typeahead
     * @return string - json for typeahead field in user manage page (cabinet, add)
     */
    public static function allUsers($query, $id=0)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "id, secondName, firstName, middleName, email, avatar";
        $criteria->alias = "s";
        $criteria->addSearchCondition('firstName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('secondName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('middleName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('email', $query, true, "OR", "LIKE");

        $data = StudentReg::model()->findAll($criteria);

        $result = array();
        foreach ($data as $key=>$model) {
            if($model->id != $id) {
                $result["results"][$key]["id"] = $model->id;
                $result["results"][$key]["name"] = $model->secondName . " " . $model->firstName . " " . $model->middleName;
                $result["results"][$key]["email"] = $model->email;
                $result["results"][$key]["url"] = $model->avatarPath();
            }
        }
        return json_encode($result);
    }

    public function deletedMessages(){
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->alias = 'm';
        $criteria->order = 'm.id_message DESC';
        $criteria->join = 'JOIN message_receiver r ON r.id_message = m.id_message';
        $criteria->addCondition('r.id_receiver =:id');
        $criteria->addCondition('r.deleted IS NOT NULL');
        $criteria->params = array(':id' => $this->id);

        return UserMessages::model()->findAll($criteria);
    }

    public function getSenders(){
        $criteria = new CDbCriteria();
        $criteria->alias = 'u';
        $criteria->join = ' LEFT JOIN message_receiver as r ON r.id_receiver = u.id';
        $criteria->join .= ' LEFT JOIN messages as m ON r.id_message = m.id';
        $criteria->group = 'm.sender';
        $criteria->distinct = true;
        $criteria->order = 'm.create_date DESC';
        $criteria->addCondition ('r.id_receiver='.$this->id.' and u.id = m.sender');

        return StudentReg::model()->findAll($criteria);
    }

    public static function usersList(){
        $users = StudentReg::model()->findAll();
        $return = array('data' => array());

        foreach ($users as $record) {
            $row = array();
            $row["name"] = $record->secondName." ".$record->firstName." ".$record->middleName;
            $row["email"] = $record->email;
            $row["register"] = ($record["reg_time"] > 0) ? date("d.m.Y", $record["reg_time"]):'<em>невідомо</em>';
            $row["profile"] = Config::getBaseUrl()."/profile/".$record->id;
            $row["mailto"] = Yii::app()->createUrl('/_teacher/cabinet/index', array(
                    'scenario' => 'message',
                    'receiver' => $record->id
                ));
            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public static function adminsData(){
        $sql = 'select * from user as u, user_admin as ua where u.id = ua.id_user';
        $admins = Yii::app()->db->createCommand($sql)->queryAll();
        $return = array('data' => array());

        foreach ($admins as $record) {
            $row = array();
            $row["name"] = $record["secondName"]." ".$record["firstName"]." ".$record["middleName"];
            $row["email"] = $record["email"];
            $row["register"] = ($record["start_date"] > 0) ? date("d.m.Y",  strtotime($record["start_date"])):"невідомо";
            $row["cancelDate"] = ($record["end_date"]) ? date("d.m.Y", strtotime($record["end_date"])) : "";
            $row["profile"] = Config::getBaseUrl()."/profile/".$record["id"];
            $row["mailto"] = Yii::app()->createUrl('/_teacher/cabinet/index', array(
                'scenario' => 'message',
                'receiver' => $record["id"]
            ));
            $row["cancel"] = "'".Yii::app()->createUrl('/_teacher/_admin/users/cancelRole')."'".", 'admin', '".$record["id"]."', '3'";
            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public static function accountantsData(){
        $sql = 'select * from user as u, user_accountant as ua where u.id = ua.id_user';
        $admins = Yii::app()->db->createCommand($sql)->queryAll();
        $return = array('data' => array());

        foreach ($admins as $record) {
            $row = array();
            $row["name"] = $record["secondName"]." ".$record["firstName"]." ".$record["middleName"];
            $row["email"] = $record["email"];
            $row["register"] = ($record["start_date"] > 0) ? date("d.m.Y",  strtotime($record["start_date"])):"невідомо";
            $row["cancelDate"] = ($record["end_date"]) ? date("d.m.Y", strtotime($record["end_date"])) : "";
            $row["profile"] = Config::getBaseUrl()."/profile/".$record["id"];
            $row["mailto"] = Yii::app()->createUrl('/_teacher/cabinet/index', array(
                'scenario' => 'message',
                'receiver' => $record["id"]
            ));
            $row["cancel"] = "'".Yii::app()->createUrl('/_teacher/_admin/users/cancelRole')."'".", 'accountant', '".$record["id"]."', '3'";
            array_push($return['data'], $row);
        }

        return json_encode($return);
    }

    public static function usersWithoutTeachers($query)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "id, secondName, firstName, middleName, email, phone, skype, avatar";
        $criteria->alias = "s";
        $criteria->addSearchCondition('firstName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('secondName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('middleName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('email', $query, true, "OR", "LIKE");
        $criteria->join = 'LEFT JOIN teacher t ON t.user_id = s.id';
        $criteria->addCondition('t.user_id IS NULL');
        $data = StudentReg::model()->findAll($criteria);
        $result = array();
        foreach ($data as $key => $model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["firstName"] = ($model->firstName) ? $model->firstName : "";
            $result["results"][$key]["lastName"] = ($model->secondName) ? $model->secondName : "";
            $result["results"][$key]["middleName"] = ($model->middleName) ? $model->middleName : "";
            $result["results"][$key]["email"] = $model->email;
            $result["results"][$key]["tel"] = $model->phone;
            $result["results"][$key]["skype"] = $model->skype;
            $result["results"][$key]["url"] = $model->avatarPath();
        }
        return json_encode($result);
    }

    /**
     * @param $query string - query from typeahead
     * @return string - json for typeahead field in user manage page (cabinet, add)
     */
    public static function usersWithoutAssignedTrainers($query)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "id, secondName, firstName, middleName, email, avatar";
        $criteria->alias = "s";
        $criteria->distinct = true;
        $criteria->addSearchCondition('firstName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('secondName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('middleName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('email', $query, true, "OR", "LIKE");
        $criteria->join = 'LEFT JOIN trainer_student ts ON ts.student = s.id';
        $criteria->addCondition('ts.student IS NULL or ts.end_time IS NOT NULL');

        $data = StudentReg::model()->findAll($criteria);

        $result = [];
        foreach ($data as $key=>$model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["name"] = $model->secondName . " " . $model->firstName . " " . $model->middleName;
            $result["results"][$key]["email"] = $model->email;
            $result["results"][$key]["url"] = $model->avatarPath();
        }
        return json_encode($result);
    }

    public static function authRedirect($callBack)
    {
        if($callBack && isset($_SERVER["HTTP_REFERER"])){
            $callBack=$_SERVER["HTTP_REFERER"];
        }else if($callBack && !isset($_SERVER["HTTP_REFERER"])){
            $callBack=Yii::app()->request->baseUrl;
        }else $callBack='';
        return $callBack;
    }
}
