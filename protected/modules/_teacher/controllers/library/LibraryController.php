<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 2/23/2018
 * Time: 5:42 PM
 */
class LibraryController extends TeacherCabinetController {
    public function hasRole() {
        return Yii::app()->user->model->isAccountant();
    }
    public function actionIndex() {
        $this->renderPartial('/library/_dashboard', array(), false, true);
    }
    public function actionGetLibraryList(){
        echo Library::getLibraryList();
    }
    public function actionAddBook(){
        Library::addBook($_POST["data"]["data"]);
    }
    public function actionGetBookFile(){
        $end_file_name = $_FILES["file"]["name"];
        $tmp_file_name = $_FILES["file"]["tmp_name"];
        if(getimagesize($tmp_file_name)){
            $addressForFile = "images/library/".basename($end_file_name);
        }
        else{
            $addressForFile = "files/library/".basename($end_file_name);
        }
        copy($tmp_file_name,$addressForFile);
        echo $addressForFile;
    }
    public function actionGetLibraryData()
    {
        echo json_encode(ActiveRecordToJSON::toAssocArrayWithRelations(Library::model()->with('category')->findByPk(Yii::app()->request->getParam('id'))));
    }

    public function actionUpdateLibraryData()
    {
        Library::updateBook($_POST["data"]["data"]);
    }
    public function actionRemoveBook(){
        Library::removeBook();
    }
}