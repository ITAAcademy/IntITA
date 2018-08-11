<?php

class LibraryCategoryController extends TeacherCabinetController
{
    public function hasRole() {
        return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin());
    }

    public function actionIndex() {
        $this->renderPartial('/library/categoryList', array(), false, true);
    }

    public function actionCreate() {
        $this->renderPartial('/library/createCategory', array(), false, true);
    }

    public function actionUpdate() {
        $this->renderPartial('/library/updateCategory', array(), false, true);
    }

    public function actionGetCategories(){
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('LibraryCategory', $requestParams);
        $result = $ngTable->getData();
        echo  json_encode($result);
    }

    public function actionAddCategory(){
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $data = $_POST;
            $category = isset($data['id'])?LibraryCategory::model()->findByPk($data['id']):new LibraryCategory();
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

    public function actionGetCategory($id)
    {
        $data = [];
        $data['data'] = ActiveRecordToJSON::toAssocArray(LibraryCategory::model()->findByPk($id));
        echo json_encode($data);
    }
    public function actionGetCategoriesName(){
        echo LibraryCategory::getCategoriesName($_POST["id_category"]);
    }
}