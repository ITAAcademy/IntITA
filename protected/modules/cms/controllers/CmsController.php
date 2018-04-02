<?php

class CmsController extends Controller
{
    public $layout = 'main';

	public function actionIndex()
	{
	    $cmsLayout = 'protected/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/index.php";
	    if (file_exists($cmsLayout)){
            $this->renderFile("$cmsLayout");
        }
        else{
            $this->render('index');
        }
	}
}