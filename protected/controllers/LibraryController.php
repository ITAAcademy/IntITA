<?php
include (dirname(__FILE__) . '/../extensions/liqPay/liqPay.php');
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
				'actions'=>array('index','view','pay','buy_coffee_form'),
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
	    $dataProvider=new CActiveDataProvider('Library',array(
	        'criteria'=>array(
	            'with'=>array('libraryDependsBookCategories')
            ),
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

    function getForm($insert_id = 0){

        $public_key = 'i66161139369';
        $private_key= 'jqhus6G4UAq116vPd3s6RmAr4hgOi1tRMIrtLuaP';

        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'version'=>'3',
            'action'         => 'pay',
            'amount'         => 1, // сумма заказа
            'currency'       => 'UAH',
            /* перед этим мы ведь внесли заказ в  таблицу,
            $insert_id = $wpdb->query( 'insert into table_orders' );
            */
            'description'    => 'Оплата заказа № '.$insert_id,
            'order_id'       => $insert_id,
            // если пользователь возжелает вернуться на сайт
            'result_url'	=>	'http://mydomain.site/thank_you_page/',
            /*
                если не вернулся, то Webhook LiqPay скинет нам сюда информацию из формы,
                в частонсти все тот же order_id, чтобы заказ
                 можно было обработать как оплаченый
            */
            'server_url'	=>	'http://mydomain.site/liqpay_status/',
            'language'		=>	'uk', // uk, en
            'sandbox'=>'1' // и куда же без песочницы,
            // не на реальных же деньгах тестировать
        ));

        $res_arr = array("status"=>1, 'form'=>$html, 'order_num'=>$insert_id, 'error'=>$error);
        echo json_encode( $res_arr ); // вернем нашу сгенерированную форму для отправки
        //покупателя на LiqPay
        wp_die();

    }

    public function actionBuy_coffee_form()
    {
//        $liqpay = new LiqPay('i66161139369', 'jqhus6G4UAq116vPd3s6RmAr4hgOi1tRMIrtLuaP');
//        $html = $liqpay->cnb_form(array(
//            'action'         => 'pay',
//            'amount'         => '1',
//            'currency'       => 'UAH',
//            'description'    => 'description text',
//            'order_id'       => 'order_id_1',
//            'version'        => '3'
//        ));

//        $is_ajax = $this->input->is_ajax_request();
//        if($is_ajax) {
//            $post = $this->input->post();
            $order_id = 'coffee_'.rand(10000, 99999);
//            require("/modules/payment/libraries/LiqPay.php");

            $liqpay = new LiqPay('i66161139369', 'jqhus6G4UAq116vPd3s6RmAr4hgOi1tRMIrtLuaP');

//            $data = $liqpay->cnb_form(array(
//                'version'        => '3',
//                'amount'         => '1',
//                'currency'       => 'UAH',
//                'description'    => 'Donate polyakov.co.ua',
//                'order_id'       => $order_id,
//                'language'      => 'uk',
//                'type'          => 'pay',
//                'result_url'    => '/IntITA/library/success_coffee',
//                'sandbox'=>'1'
//            ));

        $html = $liqpay->cnb_form(array(
            'version'=>'3',
            'action'         => 'pay',
            'amount'         => 1, // сумма заказа
            'currency'       => 'UAH',
            /* перед этим мы ведь внесли заказ в  таблицу,
            $insert_id = $wpdb->query( 'insert into table_orders' );
            */
            'description'    => 'Оплата заказа № '.$order_id,
            'order_id'       => $order_id,
            // если пользователь возжелает вернуться на сайт
            'result_url'	=>	'/IntITA/library/success_coffee',
            /*
                если не вернулся, то Webhook LiqPay скинет нам сюда информацию из формы,
                в частонсти все тот же order_id, чтобы заказ
                 можно было обработать как оплаченый
            */
            'server_url'	=>	'http://mydomain.site/liqpay_status/',
            'language'		=>	'ru', // uk, en
            'sandbox'=>'1' // и куда же без песочницы,
            // не на реальных же деньгах тестировать
        ));

        $this->render('success',array(
        'html'=>$html
        ));
//        }
//        else{
//            show_404();
//        }
    }
}
