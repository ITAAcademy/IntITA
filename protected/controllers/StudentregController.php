<?php

class StudentRegController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view','edit','profile','sendletter','rewrite'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new StudentReg;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
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
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */

    public function actionIndex()
    {

        $model=new StudentReg('reguser');
        if(isset($_POST['StudentReg']))
        {
            if(is_null($_POST['StudentReg']['firstName']))
                $this->redirect('courses');

            if(isset($_POST['StudentReg']))
            {
                if(($_POST['StudentReg']['educform'][0]=='Онлайн') && (!isset($_POST['StudentReg']['educform'][1]))){
                    $_POST['StudentReg']['educform']='Онлайн';
                }
                if(($_POST['StudentReg']['educform'][1]!=='Онлайн') && ($_POST['StudentReg']['educform'][0]=='Офлайн')){
                    $_POST['StudentReg']['educform']='Офлайн';
                }
                if(($_POST['StudentReg']['educform'][0]=='Онлайн') && ($_POST['StudentReg']['educform'][1]=='Офлайн')){
                    $_POST['StudentReg']['educform']='Онлайн/Офлайн';
                }
                if($_POST['StudentReg']['educform'][0]== Null){
                    $_POST['StudentReg']['educform']='Не вибрано';
                }
            }

            $model->attributes=$_POST['StudentReg'];
            if($model->validate())
            {
                if ($model->model()->count("email = :email", array(':email' => $model->email)))
                {
                    // Указанный email уже занят. Создаем ошибку и передаем в форму
                    $model->addError('email', 'Email уже зайнятий');
                    $this->render("studentreg", array('model' => $model));
                }else
                {
                    if($_FILES["upload"]["size"] > 1024*1024*0.5)
                    {
                        Yii::app()->user->setFlash('avatarmessage','Розмір файла перевищує 512кб');
                    }elseif (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
                        $ext = substr(strrchr( $_FILES["upload"]["name"],'.'), 1);
                        $_FILES["upload"]["name"]=$_POST['StudentReg']['email'].'.'.$ext;
                        copy($_FILES['upload']['tmp_name'], Yii::getpathOfAlias('webroot')."/css/images/avatars/".$_FILES['upload']['name']);
                        $model->avatar="/css/images/avatars/".$_FILES["upload"]["name"];
                    }
                    $model->save();
                    Yii::app()->user->setFlash('forminfo', 'Ви успішно зареєструвалися. Введіть дані для авторизації');
                    $this->redirect(Yii::app()->request->baseUrl . '/site#form');
                }
            } else {
                $this->render("studentreg", array('model'=>$model));
            }
        }else {
            $model->addError('empty', 'Дані не введені');
            $this->render("studentreg", array('model'=>$model));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new StudentReg('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['StudentReg']))
            $model->attributes=$_GET['StudentReg'];

        $this->render('admin',array(
            'model'=>$model,
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
        $model=StudentReg::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param StudentReg $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='student-profile-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionProfile()
    {
        $model=new StudentReg();

        $this->render("studentprofile", array('model'=>$model));

    }
    public function actionSendletter()
    {
        $model=StudentReg::model()->findByPk(1);

        if($_POST['submit']) {
            if(!empty($_POST['send_letter'])) {
                $title = $_POST['letterTheme'];
                $mess = $_POST['send_letter'];
                // $to - кому отправляем
                $to = 'Wizlightdragon@gmail.com';
                // $from - от кого
                $from = $model->email;
                // функция, которая отправляет наше письмо.
                mail($to, $title, $mess, "Content-type: text/html; charset=utf-8 \r\n" . "From:" . $from . "\r\n");
                Yii::app()->user->setFlash('messagemail','Ваше повідомлення відправлено');
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
    public function actionEdit()
    {
        $model=new StudentReg();

        $this->render("studentprofileedit", array('model'=>$model));

    }
    public function actionRewrite()
    {
        $model=new StudentReg();
        $id=$_POST['id'];

            StudentReg::model()->updateByPk($id, array('firstName' => $_POST['StudentReg']['firstName']));

            StudentReg::model()->updateByPk($id, array('secondName' => $_POST['StudentReg']['secondName']));

            StudentReg::model()->updateByPk($id, array('nickname' => $_POST['StudentReg']['nickname']));

            StudentReg::model()->updateByPk($id, array('birthday' => $_POST['StudentReg']['birthday']));

            StudentReg::model()->updateByPk($id, array('phone' => $_POST['StudentReg']['phone']));

            StudentReg::model()->updateByPk($id, array('email' => $_POST['StudentReg']['email']));

        if(!empty($_POST['StudentReg']['password'])&& sha1($_POST['StudentReg']['password'])==sha1($_POST['StudentReg']['password_repeat']))
            StudentReg::model()->updateByPk($id, array('password' => sha1($_POST['StudentReg']['password'])));

            StudentReg::model()->updateByPk($id, array('phone' => $_POST['StudentReg']['phone']));

            StudentReg::model()->updateByPk($id, array('address' => $_POST['StudentReg']['address']));

            StudentReg::model()->updateByPk($id, array('education' => $_POST['StudentReg']['education']));

            StudentReg::model()->updateByPk($id, array('interests' => $_POST['StudentReg']['interests']));

            StudentReg::model()->updateByPk($id, array('aboutUs' => $_POST['StudentReg']['aboutUs']));

            StudentReg::model()->updateByPk($id, array('aboutMy' => $_POST['StudentReg']['aboutMy']));

        if(!empty($_FILES["upload"])) {
            if($_FILES["upload"]["size"] > 1024*1024*0.5)
            {
                Yii::app()->user->setFlash('avatarmessage','Розмір файла перевищує 512кб');
            }elseif (is_uploaded_file($_FILES["upload"]["tmp_name"])) {
                $ext = substr(strrchr( $_FILES["upload"]["name"],'.'), 1);
                $_FILES["upload"]["name"]=$_POST['StudentReg']['email'].'.'. $ext;
                copy($_FILES['upload']['tmp_name'], Yii::getpathOfAlias('webroot')."/css/images/avatars/".$_FILES['upload']['name']);
                StudentReg::model()->updateByPk($id, array('avatar' => "/css/images/avatars/".$_FILES["upload"]["name"]));
                Yii::app()->user->setFlash('messageedit', 'Оновлено' );
            }
        }
        header ('location: '. Yii::app()->request->baseUrl.'/index.php/?r=studentreg/profile');
    }
}
