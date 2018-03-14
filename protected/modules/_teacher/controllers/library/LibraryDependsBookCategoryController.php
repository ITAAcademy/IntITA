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
        return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin());
    }
    public function actionIndex()
    {
        $this->render('index');
    }
}