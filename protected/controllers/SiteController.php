<?php

use application\components\Exceptions\ForumException;
use application\components\Exceptions\MailException;

class SiteController extends Controller
{
    /*
	 * Declares class-based actions.
	 */
    public $source;

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index1.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $slider = Carousel::model()->findAll();
        $aboutUsDataProvider = new CActiveDataProvider('AboutUs');
        $stepsDataProvider = new CActiveDataProvider('Step');

        usort($slider, function ($a, $b) {
            return strcmp($a->order, $b->order);
        });

        $this->render('index', array(
            'slider' => $slider,
            'aboutUsDataProvider' => $aboutUsDataProvider,
            'stepsDataProvider' => $stepsDataProvider,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        $error = Yii::app()->errorHandler->error;

        $isGotMessage = true;
        if(isset($error["errorCode"]) && $error["errorCode"] != 0){
            $code = $error["errorCode"];
        } else {
            $code = $error["code"];
            if(!isset($error["errorCode"])){
                $isGotMessage = false;
            }
        }

        switch ($code) {
            case '400':
                $breadcrumbs = Yii::t('breadcrumbs', '0781');
                if(!$isGotMessage)
                    $error["message"] = Yii::t('breadcrumbs', '0781');
                break;
            case '403':
                $breadcrumbs = Yii::t('error', '0590');
                if(!$isGotMessage)
                    $error["message"] = Yii::t('error', '0590');
                break;
            case '404':
                $breadcrumbs = Yii::t('breadcrumbs', '0782');
                if($isGotMessage)
                    $error["message"] = Yii::t('breadcrumbs', '0782');
                break;
            case '410':
                $breadcrumbs = Yii::t('breadcrumbs', '0785');
                if(!$isGotMessage)
                    $error["message"] = Yii::t('breadcrumbs', '0785');
                break;
            case '500':
                $breadcrumbs = Yii::t('breadcrumbs', '0783');
                if(!$isGotMessage)
                    $error["message"] = Yii::t('breadcrumbs', '0783');
                break;
            default:
                $breadcrumbs = Yii::t('breadcrumbs', '0784');
                if(!$isGotMessage)
                    $error["message"] = Yii::t('breadcrumbs', '0784');
        }

        if (Yii::app()->request->isAjaxRequest)
            echo $error['message'];
        else {
            $breadcrumbsArr = array(
                'breadMsg' => $breadcrumbs
            );
            $error = array_merge($error, $breadcrumbsArr);
            $this->render('error', $error);
        }
    }

    protected function performAjaxValidation($model, $formId)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $formId) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionChangeLang()
    {
        $new_lang = $_GET['lg'];
        if ($new_lang == "ua") {
            $new_lang = "uk";
            $_SESSION['current_language'] = null;
        } else {
            $_SESSION['current_language'] = $new_lang;
        }

        $id = null;

        foreach ($_SESSION as $key => $value) {
            if (strpos($key, '__id')) {
                $id = $value;
                break;
            }
        }

        if ($id) {
            $forumUser = ForumUser::model()->findByPk($id);

            if ($forumUser) {
                $forumUser->user_lang = $new_lang;
                $forumUser->save();
            } else
                throw new \application\components\Exceptions\ForumException('In forum user not change language');
        }

        $app = Yii::app();
        if (isset($_GET['lg'])) {
            $app->session['lg'] = $_GET['lg'];
        }
        if (isset($_SERVER["HTTP_REFERER"]))
            $this->redirect($_SERVER["HTTP_REFERER"]);
        else $this->redirect(Yii::app()->homeUrl);
    }

    /* Activation account*/
    public function actionAccActivation($token, $email, $lang)
    {
        $model = $this->getTokenAcc($token);
        $modelemail = StudentReg::model()->findByAttributes(array('email' => $email));
        if (!$modelemail)
            throw new \application\components\Exceptions\IntItaException('404', 'Посилання не є дійсним');
        if ($model->token == $modelemail->token) {
            $model->updateByPk($model->id, array('token' => null));
            $model->updateByPk($model->id, array('status' => 1));
            $app = Yii::app();
            $app->session['lg'] = $lang;
            $this->redirect(Yii::app()->createUrl('/site/activationaccount'));
        } else {
            throw new CHttpException(404, Yii::t('exception', '0237'));
        }
    }

    /* Token validation*/
    public function getTokenAcc($token)
    {
        $model = StudentReg::model()->findByAttributes(array('token' => $token));
        if ($model === null)
            throw new CHttpException(404, 'Сторінка не існує або вийшов термін дії посилання');
        else
            return $model;
    }

    public function actionLogin()
    {
        $model = new StudentReg('loginuser');
        // if it is ajax validation request
        $this->performAjaxValidation($model, 'authForm');
        // collect user input data
        if (isset($_POST['StudentReg'])) {
            $model->attributes = $_POST['StudentReg'];
            $statusmodel = StudentReg::model()->findByAttributes(array('email' => $model->email));
            // validate user input and redirect to the previous page if valid
            if ($statusmodel->status == 1) {
                if ($model->login()) {
                    $userModel = StudentReg::model()->findByPk(Yii::app()->user->getId());
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                    Forum login

                    if (!ForumUser::login($userModel))
                        throw new ForumException('Forum user not save!!!');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    if (!isset($_COOKIE['cookie_key'])) {
                        foreach ($_SESSION as $key => $value) {
                            if (strpos($key, '__id')) {
                                $cookie_key = substr($key, 0, strpos($key, '_'));
                                setcookie("cookie_key", $cookie_key, time() + (10 * 365 * 24 * 60 * 60), "/");
                                break;
                            }
                        }
                    };

                    if (isset($_SERVER["HTTP_REFERER"])) {
                        if ($_SERVER["HTTP_REFERER"] == Config::getOpenDialogPath()) $this->redirect(Yii::app()->homeUrl);
                        if (isset($_GET['dialog'])) $this->redirect(Yii::app()->homeUrl);
                        $this->redirect($_SERVER["HTTP_REFERER"]);
                    } else $this->redirect(Yii::app()->request->homeUrl);
                }
            } else $this->redirect(Yii::app()->createUrl('/site/notactivated', array('email' => $model->email)));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        $id = 0;
        foreach ($_SESSION as $key => $value) {
            if (strpos($key, '__id')) {
                $id = $value;
                break;
            }
        }

        ForumUser::logout();

        Yii::app()->user->logout();

        /*delete cookies*/
        setcookie("openProfileTab", '', 1, '/');
        setcookie("openEditTab", '', 1, '/');
        setcookie("openRegistrationTab", '', 1, '/');
        setcookie("idModule", '', 1, '/');
        setcookie("idCourse", '', 1, '/');
        setcookie("lessonTab", '', 1, '/');

        if (isset($_SERVER["HTTP_REFERER"]))
            $this->redirect($_SERVER["HTTP_REFERER"]);
        else $this->redirect(Yii::app()->homeUrl);
    }

    public function actionSocialLogin()
    {
        $model = new StudentReg('socialLogin');

        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);

        /*network validation when network don't have email(have number phone)*/
        if (!isset($user['email']) && $model->exists('identity=:identity', array(':identity' => $user['identity']))) {
            $model = $model->findByAttributes(array('identity' => $user['identity']));
            if ($model->status == 1 && $model->socialLogin()) {

                $this->setNetworkData($user, $model);
                if ($model->validate()) $model->save();

                $this->forumAuthentication($model);

                if (isset($_SERVER["HTTP_REFERER"])) {
                    if ($_SERVER["HTTP_REFERER"] == Config::getOpenDialogPath()) $this->redirect(Yii::app()->homeUrl);
                    $this->redirect($_SERVER["HTTP_REFERER"]);
                    echo 150;
                } else $this->redirect(Yii::app()->homeUrl);
            } else {
                $this->redirect(Yii::app()->createUrl('/site/notactivated', array('email' => $model->email)));
            }
        } else if (!isset($user['email']) && !$model->exists('identity=:identity', array(':identity' => $user['identity']))) {
            $this->redirect(Yii::app()->createUrl('/site/networkIdentity', array('identity' => $user['identity'])));
        }
        /*network validation when network don't have email(have number phone)*/
        $model->email = $user['email'];
        if ($model->socialLogin()) {
            if (isset($user['network']) && StudentReg::isNewNetwork($user['network'], $user['profile'], $model)) {
                $modelId = $model->findByAttributes(array('email' => $model->email))->id;
                $model->updateByPk($modelId, array($user['network'] => $user['profile']));
            }
            $this->forumAuthentication($model);

            if (isset($_SERVER["HTTP_REFERER"])) {
                if ($_SERVER["HTTP_REFERER"] == Config::getOpenDialogPath()) $this->redirect(Yii::app()->homeUrl);
                $this->redirect($_SERVER["HTTP_REFERER"]);
                echo 150;
            } else $this->redirect(Yii::app()->homeUrl);
        } else {
            $this->setNetworkData($user, $model);
            $model->status = 1;
            if ($model->validate()) {
                $model->save();
                $model = new StudentReg();
                $model->email = $user['email'];
                if ($model->socialLogin()) {
                    $this->forumAuthentication($model);

                    if (isset($_SERVER["HTTP_REFERER"])) {
                        if ($_SERVER["HTTP_REFERER"] == Config::getOpenDialogPath()) $this->redirect(Yii::app()->homeUrl);
                        $this->redirect($_SERVER["HTTP_REFERER"]);
                    } else $this->redirect(Yii::app()->homeUrl);
                }
            }

        }

    }

    /* Checking the existence of a token  and lifetime*/
    public function getToken($token)
    {
        $time = date("Y-m-d H:i:s");
        $model = StudentReg::model()->findByAttributes(array('token' => $token));
        if ($model === null)
            throw new CHttpException(404, Yii::t('exception', '0237'));
        elseif (strtotime($time) - strtotime($model->activkey_lifetime) > 1800) {
            $model->updateByPk($model->id, array('token' => null));
            $model->updateByPk($model->id, array('activkey_lifetime' => null));
            throw new CHttpException(404, Yii::t('exception', '0238'));
        } else
            return $model;
    }

    /* Change password if token true*/
    public function actionVerToken($token)
    {
        $model = $this->getToken($token);
        $model->setScenario('recoverypass');
        $this->performAjaxValidation($model, 'changep-form');
        if (Yii::app()->request->getPost('StudentReg')) {
            $post = Yii::app()->request->getPost('StudentReg');
            if ($model->token == Yii::app()->request->getPost('tokenhid')) {
                $model->attributes = Yii::app()->request->getPost('StudentReg');
                $model->password = $post['new_password'];
                $model->token = null;
                $model->activkey_lifetime = null;
                $model->status = 1;
                if ($model->validate()) {
                    $model->save();
                    $modellogin = new StudentReg('loginuser');
                    $modellogin->password = $post['new_password'];
                    $modellogin->email = $model->email;
                    if (Yii::app()->user->isGuest && $modellogin->login())
                        $this->redirect(Yii::app()->createUrl('site/index'));
                    else $this->redirect(Yii::app()->createUrl('studentreg/edit'));
                }
            }
        } else {
            $this->render('resetpass', array(
                'model' => $model,
            ));
        }
    }

    public function actionVerEmail($token, $email)
    {
        $model = $this->getToken($token);
        if ($model) {
            //XOR email hash
            $key = 'ababagalamaga';
            $mailDeHash = Mail::strcode(base64_decode($email), $key);
            $hashModel = new StudentReg('resetemail');
            $hashModel->email = $mailDeHash;
            if (!$hashModel->validate())
                throw new \application\components\Exceptions\IntItaException('403', 'Змінити email не вдалося. Некоректний email');

            $model->updateByPk($model->id, array('email' => $mailDeHash));
            $model->updateByPk($model->id, array('token' => null));
            $model->updateByPk($model->id, array('activkey_lifetime' => null));

            $userModel = StudentReg::model()->findByAttributes(array('email' => $mailDeHash));
            $firstName = ($userModel->firstName) ? $userModel->firstName : '';
            $secondName = ($userModel->secondName) ? $userModel->secondName : '';
            $name = $firstName . ' ' . $secondName;
            Yii::app()->dbForum->createCommand()->update('phpbb_users', array(
                'username_clean' => $name . $mailDeHash,
            ), 'user_id=:id', array(':id' => $userModel->id));

            if (Yii::app()->user->isGuest && $model->login())
                $this->redirect(Yii::app()->createUrl('/site/resetemailinfo'));
            else $this->redirect(Yii::app()->createUrl('/site/resetemailinfo'));
        } else {
            $this->render('resetpass', array(
                'model' => $model,
            ));
        }
    }

    public function actionRecoveryPass()
    {
        $model = new StudentReg('recovery');
        // if it is ajax validation request
        $this->performAjaxValidation($model, 'recovery-form');
        // collect user input data
        $model->attributes = Yii::app()->request->getPost('StudentReg');
        $getModel = StudentReg::model()->findByAttributes(array('email' => $model->email));
        if (Yii::app()->request->getPost('StudentReg')) {
            $getTime = $this->setToken($getModel);
        }
        if ($getModel->validate()) {
            $getModel->activkey_lifetime = $getTime;
            $getModel->save();
            $sender = new MailTransport();
            $sender->renderBodyTemplate('_recoveryPassMail', array($getModel));
            if (!$sender->send($model->email, '', Yii::t('recovery', '0281'), ''))
                throw new MailException('The letter was not sent');
            $this->redirect(Yii::app()->createUrl('/site/resetpassinfo', array('email' => $model->email)));
        }
    }

    public function actionResetEmail()
    {
        if (!Yii::app()->user->isGuest) {
            $model = StudentReg::model()->findByPk(Yii::app()->user->id);

            $modelReset = new StudentReg('resetemail');
            // if it is ajax validation request
            $this->performAjaxValidation($modelReset, 'resetemail-form');
            // collect user input data
            $modelReset->attributes = Yii::app()->request->getPost('StudentReg');
            if (Yii::app()->request->getPost('StudentReg')) {
                $getTime = $this->setToken($model);
            }
            $key = 'ababagalamaga';
            $mailHash = base64_encode(Mail::strcode($modelReset->email, $key));
            if ($model->validate()) {
                $model->updateByPk($model->id, array('token' => $model->token, 'activkey_lifetime' => $getTime));

                $sender = new MailTransport();
                $sender->renderBodyTemplate('_resetMail', array($model, $mailHash));
                if (!$sender->send($modelReset->email, "", Yii::t('recovery', '0282'), ""))
                    throw new MailException('The letter was not sent');

                $this->redirect(Yii::app()->createUrl('/site/changeemailinfo', array('email' => $modelReset->email)));
            }
        }
    }

    public function actionNetworkIdentity($identity)
    {
        $this->render('networkIdentity', array(
            'identity' => $identity,
        ));
    }

    public function actionActivationinfo($email)
    {
        $this->render('activationinfo', array(
            'email' => $email,
        ));
    }

    public function actionLinkingEmailInfo($email, $network)
    {
        $this->render('linkinginfo', array(
            'email' => $email, 'network' => $network,
        ));
    }

    public function actionReactivationInfo($email)
    {
        $this->render('reactivationInfo', array(
            'email' => $email,
        ));
    }

    public function actionChangeemailinfo($email)
    {
        $this->render('changeemailinfo', array(
            'email' => $email,
        ));
    }

    public function actionResetpassinfo($email)
    {
        $this->render('resetpassinfo', array(
            'email' => $email,
        ));
    }

    public function actionResetemailinfo()
    {
        $this->render('resetemail');
    }

    public function actionNotactivated($email)
    {
        $this->render('notactivated', array(
            'email' => $email,
        ));
    }

    public function actionActivationaccount()
    {
        $this->render('activationaccount');
    }

    public function actionNotice()
    {
        $this->renderPartial('notice');
    }

    public function actionNetworkActivation()
    {
        $this->render('networkActivation');
    }

    public function actionNetworkLinking($email, $network)
    {
        $this->render('networkLinking', array(
            'email' => $email, 'network' => $network,
        ));
    }

    public function forumAuthentication($model)
    {
        $userModel = StudentReg::model()->findByPk(Yii::app()->user->getId());

        if (!ForumUser::login($userModel))
            throw new \application\components\Exceptions\ForumException('Forum user not save !!!');

        if (!isset($_COOKIE['cookie_key']) || !$_COOKIE['cookie_key']) {
            foreach ($_SESSION as $key => $value) {
                if (strpos($key, '__id')) {
                    $cookie_key = substr($key, 0, strpos($key, '_'));
                    setcookie("cookie_key", $cookie_key, time() + (10 * 365 * 24 * 60 * 60), "/");
                    break;
                }
            }
        };
    }

    private static function setToken($model)
    {
        $getToken = rand(0, 99999);
        $getTime = date("Y-m-d H:i:s");
        $model->token = sha1($getToken . $getTime);

        return $getTime;
    }

    /*verification email when network do not have email */
    public function actionEmailVerification()
    {
        $model = new StudentReg('network_identity');
        $this->performAjaxValidation($model, 'emailVerification-form');

        if (isset($_POST['StudentReg'])) {
            $model->attributes = $_POST['StudentReg'];
            $getToken = rand(0, 99999);
            $getTime = date("Y-m-d H:i:s");
            $model->token = sha1($getToken . $getTime);
            if (Yii::app()->session['lg']) $lang = Yii::app()->session['lg'];
            else $lang = 'ua';

            if ($model->validate()) {
                if (StudentReg::model()->exists('email=:email', array(':email' => $model->email))) {
                    //linking exist email to network
                    $existModel = StudentReg::model()->findByAttributes(array('email' => $model->email));
                    $key = 'codename41';
                    $mailHash = base64_encode(Mail::strcode($model->email, $key));
                    $sender = new MailTransport();
                    $sender->renderBodyTemplate('_linkingEmailMail', array($model, $mailHash, $lang));
                    if (!$sender->send($model->email, "", 'Приєднання соціальної мережі до електронної адреси', ""))
                        throw new MailException('The letter was not sent');
                    $model->updateByPk($existModel->id, array('token' => $model->token));
                    $model->updateByPk($existModel->id, array('network' => $model->identity));
                    $this->redirect(Yii::app()->createUrl('/site/linkingemailinfo', array('email' => $model->email, 'network' => $model->identity)));
                } else {
                    //linking new email to network
                    $model->save();
                    $sender = new MailTransport();
                    $sender->renderBodyTemplate('_verificationEmailMail', array($model, $lang));

                    if (!$sender->send($model->email, "", Yii::t('activeemail', '0298'), ""))
                        throw new MailException('The letter was not sent');
                    $this->redirect(Yii::app()->createUrl('/site/activationinfo', array('email' => $model->email)));
                }
            } else {
                Yii::app()->user->setFlash('forminfo', Yii::t('error', '0300'));
                $this->redirect(Yii::app()->request->baseUrl . '/site#form');
            }
        }
    }

    public function actionLinkingEmailToNetwork($network, $token, $email, $lang)
    {
        $model = $this->getTokenAcc($token);
        $key = 'codename41';
        $mailDeHash = Mail::strcode(base64_decode($email), $key);
        $hashModel = new StudentReg('resetemail');
        $hashModel->email = $mailDeHash;
        if (!$hashModel->validate())
            throw new \application\components\Exceptions\IntItaException('403', 'Змінити email не вдалося. Некоректний email');

        $modelEmail = StudentReg::model()->findByAttributes(array('email' => $mailDeHash));
        if ($model->token == $modelEmail->token && $model->network == $network) {
            $model->updateByPk($model->id, array('token' => null));
            $model->updateByPk($model->id, array('status' => 1));
            $model->updateByPk($model->id, array('identity' => $network));
            $model->updateByPk($model->id, array('network' => null));

            $app = Yii::app();
            $app->session['lg'] = $lang;

            $this->redirect(Yii::app()->createUrl('/site/networkLinking', array(
                'email' => $mailDeHash, 'network' => $network,
            )));
        } else {
            throw new CHttpException(404, Yii::t('exception', '0237'));
        }
    }

    public function actionSuccessVerification($token, $email, $lang)
    {
        $model = $this->getTokenAcc($token);

        $modelEmail = StudentReg::model()->findByAttributes(array('email' => $email));
        if (!$modelEmail)
            throw new \application\components\Exceptions\IntItaException('404', 'Посилання не є дійсним');
        if ($model->token == $modelEmail->token) {
            $model->updateByPk($model->id, array('token' => null));
            $model->updateByPk($model->id, array('status' => 1));

            $app = Yii::app();
            $app->session['lg'] = $lang;

            $this->redirect(Yii::app()->createUrl('/site/networkActivation'));
        } else {
            throw new CHttpException(404, Yii::t('exception', '0237'));
        }
    }

    /* set data from network*/
    public function setNetworkData($user, $model)
    {
        if (isset($user['first_name'])) $model->firstName = $user['first_name'];
        if (isset($user['last_name'])) $model->secondName = $user['last_name'];
        if (isset($user['nickname'])) $model->nickname = $user['nickname'];
        if (isset($user['bdate'])) $model->birthday = $user['bdate'];
        if (isset($user['phone'])) $model->phone = $user['phone'];
        if (isset($user['photo_big'])) {
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $filesName = uniqid() . '.jpg';
            file_put_contents(Yii::getpathOfAlias('webroot') . "/images/avatars/" . $filesName, file_get_contents($user['photo_big'], false, stream_context_create($arrContextOptions)));
            $model->avatar = $filesName;
        }
        if (isset($user['city'])) $model->address = $user['city'];
        if (isset($user['network'])) {
            switch ($user['network']) {
                case 'facebook':
                    $model->facebook = $user['profile'];
                    break;
                case 'googleplus':
                    $model->googleplus = $user['profile'];
                    break;
                case 'linkedin':
                    $model->linkedin = $user['profile'];
                    break;
                case 'vkontakte':
                    $model->vkontakte = $user['profile'];
                    break;
                case 'twitter':
                    $model->twitter = $user['profile'];
                    break;
                default:
                    break;
            }
        }

        return $model;
    }

    public function actionSignInSignUp()
    {
        $post = Yii::app()->request->getPost('StudentReg');
        $signMode = Yii::app()->request->getPost('signMode');
        $extended = Yii::app()->request->getPost('isExtended');
        $formId = Yii::app()->request->getPost('formId');
        $callBack = Yii::app()->request->getPost('callBack');

        $model = new StudentReg();
        if ($signMode == 'signUp') //            SignUp
        {
            if (isset($extended))
                $model = new StudentReg('fromraptoext');
            else $model = new StudentReg('repidreg');

            $this->performAjaxValidation($model, $formId);
            if (isset($extended)) {
                $this->redirect(Yii::app()->createUrl('studentreg/index', array('email' => $post['email'])));
            }
            if (isset($post)) {
                $model->attributes = $post;
                $getToken = rand(0, 99999);
                $getTime = date("Y-m-d H:i:s");
                $model->token = sha1($getToken . $getTime);
                if (Yii::app()->session['lg']) $lang = Yii::app()->session['lg'];
                else $lang = 'ua';
                if ($model->validate()) {
                    $model->save();
                    $sender = new MailTransport();
                    $sender->renderBodyTemplate('_rapidReg', array($model, $lang));
                    $model->updateByPk($model->id, array('avatar' => 'noname.png'));
                    if (!$sender->send($model->email, "", Yii::t('activeemail', '0298'), ""))
                        throw new MailException('The letter was not sent');
                    $this->redirect(Yii::app()->createUrl('/site/activationinfo', array('email' => $model->email)));
                } else {
                    $this->redirect($_SERVER["HTTP_REFERER"]);
                }
            }
        } else {
            //            SignIn
            $model->setScenario('loginuser');
            $this->performAjaxValidation($model, $formId);
            if (isset($post)) {
                $model->attributes = $post;
                $statusmodel = StudentReg::model()->findByAttributes(array('email' => $model->email));
                if ($statusmodel->status == 1) {
                    if ($model->login()) {
                        $userModel = StudentReg::model()->findByPk(Yii::app()->user->getId());
                        //                        Forum login
                        if (!ForumUser::login($userModel))
                            throw new ForumException('Forum user not save!!!');
                        if (!isset($_COOKIE['cookie_key'])) {
                            foreach ($_SESSION as $key => $value) {
                                if (strpos($key, '__id')) {
                                    $cookie_key = substr($key, 0, strpos($key, '_'));
                                    setcookie("cookie_key", $cookie_key, time() + (10 * 365 * 24 * 60 * 60), "/");
                                    break;
                                }
                            }
                        };
//                                                Forum login
                        if (!empty($callBack)) {
                            $this->redirect($callBack);
                        }
                        if (isset($_SERVER["HTTP_REFERER"])) {
                            if ($_SERVER["HTTP_REFERER"] == Config::getOpenDialogPath()) $this->redirect(Yii::app()->homeUrl);
                            if (isset($_GET['dialog'])) $this->redirect(Yii::app()->homeUrl);
                            $this->redirect($_SERVER["HTTP_REFERER"]);
                        } else $this->redirect(Yii::app()->request->homeUrl);
                    }
                } else  $this->redirect(Yii::app()->createUrl('/site/notactivated', array('email' => $model->email)));
            }
        }
    }

    public function actionReactivation()
    {
        $email = Yii::app()->request->getPost('email');
        $getToken = rand(0, 99999);
        $getTime = date("Y-m-d H:i:s");
        $model = StudentReg::model()->findByAttributes(array('email' => $email));
        StudentReg::model()->updateByPk($model->id, array('token' => sha1($getToken . $getTime)));
        $model = StudentReg::model()->findByPk($model->id);
        if (Yii::app()->session['lg']) $lang = Yii::app()->session['lg'];
        else $lang = 'ua';

        $sender = new MailTransport();
        $sender->renderBodyTemplate('_rapidReg', array($model, $lang));
        if (!$sender->send($model->email, "", Yii::t('activeemail', '0298'), ""))
            throw new MailException('The letter was not sent');
        $this->redirect(Yii::app()->createUrl('/site/reactivationInfo', array('email' => $email)));
    }
}
