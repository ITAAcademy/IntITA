<?php

class OperationController extends AccountancyController
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($model)
	{
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Operation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Operation']))
		{
			$model->attributes=$_POST['Operation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

        $agreements = UserAgreements::getAllAgreements();
        $invoices = Invoice::getAllInvoices();

		$this->render('create',array(
			'model'=>$model,
            'agreementsList'=>$agreements,
            'invoicesList'=>$invoices,
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

		if(isset($_POST['Operation']))
		{
			$model->attributes=$_POST['Operation'];
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
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Operation('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Operation']))
			$model->attributes=$_GET['Operation'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Operation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Operation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Operation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='operation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionGetSearchAgreements(){

        $request = Yii::app()->request;
        $number = $request->getPost('number', "");
        $user = $request->getPost('user', 0);
        $course = $request->getPost('course', 0);
        $module = $request->getPost('module', 0);

        $result = UserAgreements::findAgreementByCondition($number,$user,$course,$module);

        return $this->renderPartial('_ajaxAgreement',array('agreements' => $result));

    }

    public function actionGetInvoicesList()
    {
        $id =  Yii::app()->request->getPost('id');

        $result = UserAgreements::getInvoices($id);

        return $this->renderPartial('_ajaxInvoices',array('invoices' => $result));
    }

    public function actionCreateByInvoice(){
        $request = Yii::app()->request;
        $invoice = $request->getPost('invoice', "");
        $summa = $request->getPost('summa', 0);
        $user = $request->getPost('user', 0);
        $type = $request->getPost('type', 0);
        $source = $request->getPost('source', 0);

        if (Operation::addOperation($summa, $user, $type, array($invoice), $source)) {
            $this->actionIndex();
        } else {
            throw new CException('Operation is not saved!');
        }
    }

    public function actionCreateByAgreement(){

        $invoices = Yii::app()->request->getPost('invoices');
        $request = Yii::app()->request;

        $invoicesListId = array('510', '511', '512');

        $summa = $request->getPost('summa', 0);
        $user = $request->getPost('user', 0);
        $type = $request->getPost('type', 0);
        $source = $request->getPost('source', 0);


        if (Operation::addOperation($summa, $user, $type, $invoicesListId, $source)) {

            $this->actionIndex();
        } else {
            throw new CException('Operation is not saved!');
        }


    }
}
