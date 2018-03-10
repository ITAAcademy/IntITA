<?php

class LibraryCategoryController extends TeacherCabinetController
{
    public function hasRole() {
        return Yii::app()->user->model->isAccountant();
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