<?php

class LibraryController extends Controller
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
				'actions'=>array('index','view','libraryPay','getBook','liqpayStatus','getDemoBook'),
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
		$model=new Library;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Library']))
		{
			$model->attributes=$_POST['Library'];
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

		if(isset($_POST['Library']))
		{
			$model->attributes=$_POST['Library'];
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
        $criteria = new CDbCriteria;
        $criteria->addCondition('status=' . Library::ACTIVE);
        $criteria->order = 'position';
	    $dataProvider=new CActiveDataProvider('Library',array(
            'criteria' => $criteria,
        ));

        if (!Yii::app()->session['lg'] || Yii::app()->session['lg']=='ua')
            $lang = 'uk';
        else $lang = Yii::app()->session['lg'];

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'lang'=>$lang
        ));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Library('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Library']))
			$model->attributes=$_GET['Library'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Library the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Library::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Library $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='library-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    function actionLibraryPay($id, $order_id){
        $library = Library::model()->findByPk($id);
        $library->createPayment($order_id);
        $library->sendTicket($order_id);
        $this->redirect(Yii::app()->createUrl('/library/index'));
    }

    function actionLiqpayStatus($id, $order_id){
        Yii::log('Liqpay id-'.$id,CLogger::LEVEL_INFO,'liqpay');
        $library = Library::model()->findByPk($id);
        $library->createPayment($order_id);
        $library->sendTicket($order_id);
    }

//    public function actionGetBook($id){
//        $book = Library::model()->findByPk($id);
//        $userId = Yii::app()->user->getId();
//        $payment = LibraryPayments::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'library_id'=>$book->id, 'status'=>1));
//        if ($book && $payment){
//         $bookFile = Yii::app()->getBasePath() . "/../files/library/buy/{$userId}/{$book->link}";
//         if(file_exists($bookFile) && is_file($bookFile)){
//          return   Yii::app()->request->xSendFile("/files/library/buy/{$userId}/{$book->link}",[
//              'forceDownload'=>true,
//              'xHeader'=>'X-Accel-Redirect',
//              'terminate'=>false
//          ]);
//         }
//        }
//        else {
//         throw new CHttpException(404,'Документ не знайдено');
//        }
//    }
    public function actionGetBook($id){
        $book = Library::model()->findByPk($id);
        $payment = LibraryPayments::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'library_id'=>$book->id, 'status'=>Library::SUCCESS_STATUS));
        if ($book && $payment){
            $file = "/files/library/{$book->id}/link/{$book->link}";
            // todo
            // $book->drawWatermark($userId);
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)){
                return   Yii::app()->request->xSendFile($file,[
                    'forceDownload'=>true,
                    'xHeader'=>'X-Accel-Redirect',
                    'terminate'=>false
                ]);
            }
            else{
                throw new CHttpException(404,'Документ не знайдено');
            }
        }
        else {
            throw new CHttpException(404,'Документ не знайдено');
        }
    }

    public function actionGetDemoBook($id){
        $book = Library::model()->findByPk($id);

        if ($book){
            $file = "/files/library/{$book->id}/demo_link/{$book->demo_link}";
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)){
                return   Yii::app()->request->xSendFile($file,[
                    'forceDownload'=>false,
                    'xHeader'=>'X-Accel-Redirect',
                    'terminate'=>false
                ]);
            }
            else{

                throw new CHttpException(404,'Документ не знайдено');
            }
        }
        else {
            throw new CHttpException(404,'Документ не знайдено');
        }
    }
}
