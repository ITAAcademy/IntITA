<?php

class LibraryCategoryController extends TeacherCabinetController
{
    public function hasRole() {
        return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin());
    }
    public function actionAddCategory(){
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $data = array_filter($_POST);
            $category = new LibraryCategory();
            $category->attributes = $data;
            if(!$category->save()){
                throw new Exception(json_encode(ValidationMessages::getValidationErrors($category)));
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
    public function actionGetCategory(){
        echo LibraryCategory::getCategory();
    }
    public function actionGetCategoriesName(){
        echo LibraryCategory::getCategoriesName($_POST["id_category"]);
    }
}