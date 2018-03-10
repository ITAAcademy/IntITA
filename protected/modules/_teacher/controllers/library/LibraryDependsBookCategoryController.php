<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 3/5/2018
 * Time: 6:43 PM
 */

class LibraryDependsBookCategoryController extends TeacherCabinetController
{
    public function hasRole() {
        return Yii::app()->user->model->isAccountant();
    }
    public function actionIndex()
    {
        $this->render('index');
    }
    public function actionGetInfo(){
        $adapter = new NgTableAdapter('Library',$_GET);
        echo json_encode($adapter->getData());
    }
}