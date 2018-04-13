<?php
 /**
  * Created by PhpStorm.
  * User: nick
  * Date: 19.03.18
  * Time: 22:47
  */

 class SubdomainsController extends TeacherCabinetController
  {
   public function hasRole()
    {
     return Yii::app()->user->model->isSuperAdmin();
    }

   public function actionIndex()
    {
     return $this->renderPartial('index');
    }

   public function actionList()
    {
     $adapter = new NgTableAdapter(Subdomains::class, $_GET);

     return $this->renderJSON($adapter->getData());
    }

   public function actionAddSubdomain()
    {
     $model = new Subdomains();
     //TODO test
     $model->domain_name = Yii::app()->request->getPost('subdomain');
     $model->active = 1;
     $model->organization = 1;
     $model->save();

     return $this->renderJSON(['data'=>true]);
    }

   public function actionChangeSubdomain()
    {

     return $this->renderJSON(['data'=>true]);
    }

   protected function loadModel($id)
    {
     return Subdomains::model()->findByPk((int)$id);
    }


  }