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

    public function actionAbout()
    {
        $cmsLayout = 'protected/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/about.php";
        if (file_exists($cmsLayout)){
            $this->renderFile("$cmsLayout");
        }
        else{
            $this->render('about');
        }
    }

    public function actionStaff()
    {
        $cmsLayout = 'protected/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/staff.php";
        if (file_exists($cmsLayout)){
            $this->renderFile("$cmsLayout");
        }
        else{
            $this->render('staff');
        }
    }

    public function actionFaq()
    {
        $cmsLayout = 'protected/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/faq.php";
        if (file_exists($cmsLayout)){
            $this->renderFile("$cmsLayout");
        }
        else{
            $this->render('faq');
        }
    }
}