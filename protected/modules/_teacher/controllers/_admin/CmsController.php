<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 22.12.2015
 * Time: 17:05
 */

class CmsController extends TeacherCabinetController{

    public function hasRole(){
        return Yii::app()->user->model->isAdmin();
    }

    public function actionIndex()
    {
        $this->renderPartial('index', array(),false,true);
    }
}