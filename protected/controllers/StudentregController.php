<?php
use application\components\Exceptions\IntItaException as IntitaException;

class StudentRegController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actionCountryAutoComplete($term, $lang)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('title_'.$lang, $term, true);
        $model = new AddressCountry();
        $results = [];
        $param = "title_".$lang;
        foreach ($model->findAll($criteria) as $m) {
            $results[] = array('id'=>$m->id, 'value'=>$m->$param);
        }
        echo CJSON::encode($results);
    }

    public function actionCityAutoComplete($country, $term)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('country', $country, true);
        $criteria->compare('title_ua', $term, true);
        $model = new AddressCity();
        $result = [];
        foreach ($model->findAll($criteria) as $m) {
            $result[] = array('id'=>$m->id, 'value'=>$m->title_ua);
        }
        echo CJSON::encode($result);
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new StudentReg;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['StudentReg'])) {
            $model->attributes = $_POST['StudentReg'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['StudentReg'])) {
            $model->attributes = $_POST['StudentReg'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex($email = '')
    {
        if (!Yii::app()->user->isGuest) {
            throw new \application\components\Exceptions\IntItaException('403', 'Ти вже зареєстрований');
        }
        $model = new StudentReg('reguser');
        $this->render("studentreg", array('model' => $model, 'email' => $email));
    }

    public function actionRegistration()
    {
        $model = new StudentReg('reguser');

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['StudentReg'])) {
            if (isset($_POST['educformOff']) && $_POST['educformOff'] == '1')
                $_POST['StudentReg']['educform'] = 'Онлайн/Офлайн';
            else $_POST['StudentReg']['educform'] = 'Онлайн';

            $model->attributes = $_POST['StudentReg'];

            $getToken = rand(0, 99999);
            $getTime = date("Y-m-d H:i:s");
            $model->token = sha1($getToken . $getTime);

            if (isset($model->avatar)) $model->avatar = CUploadedFile::getInstance($model, 'avatar');
            if ($model->validate()) {
                if (isset($model->avatar)) {
                    Avatar::saveStudentAvatar($model);
                }

                if (Yii::app()->session['lg']) $lang = Yii::app()->session['lg'];
                else $lang = 'ua';
                $model->save();
                if ($model->avatar == Null) {
                    $thisModel = new StudentReg();
                    $thisModel->updateByPk($model->id, array('avatar' => 'noname.png'));
                }
                $sender = new MailTransport();
                $sender->renderBodyTemplate('_registrationMail', array($model, $lang));
                if (!$sender->send($model->email, "", Yii::t('activeemail', '0298'), ""))
                    throw new \application\components\Exceptions\MailException('The letter was not sent ');

                $this->redirect(Yii::app()->createUrl('/site/activationinfo', array('email' => $model->email)));
            } else {

                $this->render("studentreg", array('model' => $model));

            }
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new StudentReg('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['StudentReg']))
            $model->attributes = $_GET['StudentReg'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return StudentReg the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = StudentReg::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param StudentReg $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'student-profile-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionProfile($idUser, $course = 0, $schema = 1, $module = 0)
    {
        if (Yii::app()->user->isGuest) {
            $this->render('/site/authorize');
            die();
        }
        if (Yii::app()->user->isGuest || $idUser == 0)
            throw new \application\components\Exceptions\IntItaException('403', 'Гість не може проглядати профіль користувача');
        $user = RegisteredUser::userById($idUser);
        $model = $user->registrationData;
        $addressString = $model->addressString();
        if (!$model)
            throw new \application\components\Exceptions\IntItaException('403', 'Користувача з таким ідентифікатором не існує');
        $dataProvider = $model->getDataProfile();
        $markProvider = $model->getMarkProviderData();
        $paymentsCourses = $model->getPaymentsCourses();
        if ($course != 0 || $module != 0) {
            if (!$user->isStudent()) {
                UserStudent::addStudent($model);
            }
        }
        if ($course != 0 && !Course::model()->exists('course_ID=' . $course)) {
            throw new \application\components\Exceptions\IntItaException('400', "Такого курса немає. Список усіх курсів доступний на сторінці Курси.");
        }
        if ($idUser == Yii::app()->user->getId()) {

            $this->render("studentprofile", array(
                'dataProvider' => $dataProvider,
                'post' => $model,
                'user' => $user,
                'markProvider' => $markProvider,
                'paymentsCourses' => $paymentsCourses,
                'addressString' => $addressString,
                'course' => $course,
                'schema' => $schema,
                'module' => $module,
                'owner' => 'true'
            ));
        } else {
            $this->render("profile", array(
                'dataProvider' => $dataProvider,
                'post' => $model,
                'user' => $user,
                'addressString' => $addressString,
                'markProvider' => $markProvider,
                'paymentsCourses' => $paymentsCourses,
                'owner' => 'false'
            ));
        }
    }

    public function actionEdit()
    {
        if (Yii::app()->user->isGuest) {
            $this->render('/site/authorize');
            die();
        }
        $model = new StudentReg('edit');

        $this->render("studentprofileedit", array('model' => $model));

    }

    public function actionRewrite()
    {
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $model->setScenario('edit');

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'editProfile-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['educformOff']) && $_POST['educformOff'] == '1')
            $_POST['StudentReg']['educform'] = 'Онлайн/Офлайн';
        else $_POST['StudentReg']['educform'] = 'Онлайн';

        $model->attributes = $_POST['StudentReg'];
        if (isset($model->avatar)) $model->avatar = CUploadedFile::getInstance($model, 'avatar');
        if ($model->validate()) {
            if (isset($model->avatar)) {
                Avatar::saveStudentAvatar($model);
            }

            $model->updateByPk($id, array('firstName' => $_POST['StudentReg']['firstName']));
            $model->updateByPk($id, array('secondName' => $_POST['StudentReg']['secondName']));
            $model->updateByPk($id, array('nickname' => $_POST['StudentReg']['nickname']));
            $model->updateByPk($id, array('birthday' => $_POST['StudentReg']['birthday']));
            $model->updateByPk($id, array('phone' => $_POST['StudentReg']['phone']));
            $model->updateByPk($id, array('address' => $_POST['StudentReg']['address']));
            $model->updateByPk($id, array('education' => $_POST['StudentReg']['education']));
            $model->updateByPk($id, array('educform' => $_POST['StudentReg']['educform']));
            $model->updateByPk($id, array('interests' => $_POST['StudentReg']['interests']));
            $model->updateByPk($id, array('aboutUs' => $_POST['StudentReg']['aboutUs']));
            $model->updateByPk($id, array('aboutMy' => $_POST['StudentReg']['aboutMy']));
            $model->updateByPk($id, array('facebook' => $_POST['StudentReg']['facebook']));
            $model->updateByPk($id, array('googleplus' => $_POST['StudentReg']['googleplus']));
            $model->updateByPk($id, array('linkedin' => $_POST['StudentReg']['linkedin']));
            $model->updateByPk($id, array('vkontakte' => $_POST['StudentReg']['vkontakte']));
            $model->updateByPk($id, array('twitter' => $_POST['StudentReg']['twitter']));
            $model->updateByPk($id, array('skype' => $_POST['StudentReg']['skype']));

            if (isset($_POST['StudentReg']['country'])) {
                $newCountryId = AddressCountry::newUserCountry($_POST['StudentReg']['country'], $_POST['countryTypeahead']);
                $model->updateByPk($id, array('country' => $newCountryId));

                if (isset($_POST['StudentReg']['city'])) {
                    $newCityId = AddressCity::newUserCity($_POST['StudentReg']['city'], $_POST['cityTypeahead'], $newCountryId);
                    $model->updateByPk($id, array('city' => $newCityId));
                }
            }

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (!empty($_POST['StudentReg']['password']) && sha1($_POST['StudentReg']['password']) == sha1($_POST['StudentReg']['password_repeat']))
                $model->updateByPk($id, array('password' => sha1($_POST['StudentReg']['password'])));

            $this->redirect(Yii::app()->createUrl('/studentreg/profile', array('idUser' => Yii::app()->user->id)));
        } else
            $this->render("studentprofileedit", array('model' => $model));
    }

    public function actionChangepass()
    {
        $modeltest = new StudentReg('changepass');
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'change-form') {
            echo CActiveForm::validate($modeltest);
            Yii::app()->end();
        }
        $id = Yii::app()->user->id;
        $model = StudentReg::model()->findByPk($id);
        $atr = Yii::app()->request->getPost('StudentReg');
        $pass = $atr ['password'];
        if ($model->password == sha1($pass)) {
            if (isset($_POST['StudentReg'])) {
                $model->updateByPk($id, array('password' => sha1($_POST['StudentReg']['new_password'])));
                $this->redirect(Yii::app()->createUrl('studentreg/profile', array('idUser' => Yii::app()->user->getId())));
            }
        }
    }

    public function actionDeleteavatar()
    {
        Avatar::deleteStudentAvatar();

        $this->redirect(Yii::app()->createUrl('studentreg/edit'));
    }

    public function actionTimetableProvider($user, $tab, $owner)
    {
        $teacher = Teacher::model()->find("user_id=:user_id", array(':user_id' => $user));

        $data = Teacher::getTeacherSchedule($teacher, $user, $tab);

        $this->renderPartial('_timetableprovider', array('dataProvider' => $data, 'userId' => $user, 'owner' => $owner));
    }

    public function actionGetProfileData()
    {
        $id = Yii::app()->request->getPost('id', 0);
        $model = RegisteredUser::userById($id);
        if ($model->isTeacher()) {
            $role = array('teacher' => true);
        } else {
            $role = array('teacher' => false);
        }
        $data = array_merge($model->attributes, $role);
        echo json_encode($data);
    }
}
