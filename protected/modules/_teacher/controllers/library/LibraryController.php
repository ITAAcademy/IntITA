<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 2/23/2018
 * Time: 5:42 PM
 */
class LibraryController extends TeacherCabinetController {
    public function hasRole() {
            return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin());
    }
    public function actionDashboard() {
        $this->renderPartial('/library/_dashboard', array(), false, true);
    }
    public function actionIndex() {
        $this->renderPartial('/library/list', array(), false, true);
    }
    public function actionCreate() {
        $this->renderPartial('/library/addBook', array(), false, true);
    }
    public function actionUpdate() {
        $this->renderPartial('/library/editBook', array(), false, true);
    }
    public function actionCreateCategory() {
        $this->renderPartial('/library/addCategory', array(), false, true);
    }
    public function actionGetLibraryList(){
        echo Library::getLibraryList();
    }
    public function actionAddBook(){
        Library::addBook($_POST["data"]["data"]);
    }
    public function actionGetBookFile(){
        foreach ($_FILES as $filesBook){
            $end_file_name = $filesBook["name"];
            $tmp_file_name = $filesBook["tmp_name"];
            $fileExtension = strtolower(pathinfo($end_file_name,PATHINFO_EXTENSION));
            switch ($fileExtension) {
                case "jpg":
                case "png":
                case "bmp":
                case "jpeg":
                case "tif":
                case "tiff":
                case "gif":
                case "dib":
                    $addressForFile = Yii::app()->basePath . "/../images/library/" . basename($end_file_name);
                    break;
                default:
                    $addressForFile = Yii::app()->basePath . "/../files/library/" . basename($end_file_name);
                    break;
            }
            copy($tmp_file_name,$addressForFile);
            echo basename($end_file_name);
        }
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