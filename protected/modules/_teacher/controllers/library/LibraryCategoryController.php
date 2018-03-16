<?php

class LibraryCategoryController extends TeacherCabinetController
{
    public function hasRole() {
        return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin());
    }
    public function actionAddCategory(){
        LibraryCategory::addCategory($_POST["data"]["data"]);
    }
    public function actionGetCategory(){
        echo LibraryCategory::getCategory();
    }
    public function actionGetCategoriesName(){
        echo LibraryCategory::getCategoriesName($_POST["id_category"]);
    }
}