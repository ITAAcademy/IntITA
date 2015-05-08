<?php
/*@var $model TeachersTemp*/

class TeachersController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','teacherletter'),
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
		$model=new TeachersTemp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TeachersTemp']))
		{
			$model->attributes=$_POST['TeachersTemp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->teacher_id));
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

		if(isset($_POST['TeachersTemp']))
		{
			$model->attributes=$_POST['TeachersTemp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->teacher_id));
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
		$dataProvider=new CActiveDataProvider('TeachersTemp');

        $coursesID = $this->getCourses();
        $titles = $this->getTitles($coursesID);

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'coursesID' => $coursesID,
            'titles' => $titles,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TeachersTemp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TeachersTemp']))
			$model->attributes=$_GET['TeachersTemp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TeachersTemp the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TeachersTemp::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TeachersTemp $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='teachers-temp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionTeacherLetter()
    {
        $model=StudentReg::model()->findByPk(Yii::app()->user->id);

        if($_POST['sendletter']) {
            if(!empty($_POST['textname'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $year = $_POST['yearname'];
                $educ = $_POST['educationname'];
                $phone = $_POST['phonename'];
                $courses = $_POST['textname'];
                $title = "Teacher_Work ".$firstname." ".$lastname;
                $mess = "Ім'я: ".$firstname." ".$lastname."\r\n"."Дата народження: ".$year."\r\n"."Освіта: ".$educ."\r\n"."Телефон: ".$phone."\r\n"."Курси які готовий викладати: ".$courses;
                // $to - кому отправляем
                $to = Yii::app()->params['adminEmail'];
                // $from - от кого
                $from = $model->email;

                // функция, которая отправляет наше письмо.
                mail($to, $title, $mess, "Content-type: text/plain; charset=utf-8 \r\n" . "From:" . $from . "\r\n");
                Yii::app()->user->setFlash('messagemail','Ваше повідомлення відправлено');
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }

    public function getCourses(){
        //$modules = TeacherModule::model()->findAllBySql('select idModule from teacher_module where idTeacher = :idTeacher;',array(':idTeacher' => $this->idTeacher));
        $modules =[1,3, 7, 10];
        $criteria = new CDbCriteria();
        $criteria->select = 'course';
        $criteria->distinct = true;
        $criteria->addInCondition('course', $modules);
        $criteria->toArray();
        $courses = Module::model()->findAll($criteria);

        return $courses;
    }

    public function getTitles($courses){
        $titles =[];
        for($i = 0; $i < count($courses); $i++ ){
            $titles[$i]['title'] = Course::model()->findByPk($courses[$i]["course"])->course_name;
        }
        return $titles;
    }
}
