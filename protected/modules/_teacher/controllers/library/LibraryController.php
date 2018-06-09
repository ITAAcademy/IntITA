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
        $this->renderPartial('/library/create', array(), false, true);
    }
    public function actionUpdate() {
        $this->renderPartial('/library/update', array(), false, true);
    }
    public function actionGetLibraryList(){
        $requestParam = $_GET;
        $criteria=new CDbCriteria;
        $criteria->with = ['libraryDependsBookCategories','libraryDependsBookCategories.idCategory'];
        $criteria->join = 'left join library_depends_book_category as bc ON bc.id_book = t.id';
        if (isset($requestParam['filter']['libraryDependsBookCategories.id'])){
            $criteria->addCondition('bc.id_category='.$requestParam['filter']['libraryDependsBookCategories.id']);
            unset($requestParam['filter']['libraryDependsBookCategories.id']);
        }
        $adapter = new NgTableAdapter('Library',$requestParam);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }
    public function actionAddBook(){
        $statusCode = 201;
        $id = null;
        $connection = Yii::app()->db;
        $transaction = $connection->beginTransaction();
        try {
            $data = $_POST;
            $book = isset($data['id'])?Library::model()->findByPk($data['id']):new Library();
            $book->attributes = $data;
            $categories = [];
            if (isset($data['category']) && !empty($data['category'])) {
                foreach ($data['category'] as $category){
                    array_push($categories, $category['id']);
                }
            }
            if($book->save()){
                $result = ['message' => 'OK', 'id' => $book->id];
                LibraryDependsBookCategory::model()->editLibraryCategory($categories, $book);
            }else{
                throw new Exception(json_encode(ValidationMessages::getValidationErrors($book)));
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionGetLibraryData()
    {
        $result = [];
        $result['data'] = ActiveRecordToJSON::toAssocArrayWithRelations(Library::model()->with('category')->findByPk(Yii::app()->request->getParam('id')));
        echo json_encode($result);
    }


    public function actionRemoveBook(){
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $id = $_POST['id'];
        $connection = Yii::app()->db;
        $transaction = $connection->beginTransaction();
        try {
            if(LibraryPayments::model()->findByAttributes(array('library_id'=>$id))){
                throw new Exception('Видалити книгу неможливо, оскільки її було куплено як мінімум одним користувачем');
            }
            if(!is_null(LibraryDependsBookCategory::model()->findByAttributes(['id_book'=>$id]))) {
                LibraryDependsBookCategory::model()->findByAttributes(['id_book' => $id])->deleteAll();
            }
            $deletedBook = Library::model()->findByPk($id);
            if ($deletedBook["logo"]!==""){
                if (file_exists(Yii::getPathOfAlias('webroot')."/files/library/".$id."/logo/".$deletedBook["logo"])){
                    unlink(Yii::getPathOfAlias('webroot')."/files/library/".$id."/logo/".$deletedBook["logo"]);
                }
            };
            if ($deletedBook["link"]!==""){
                if (file_exists(Yii::getPathOfAlias('webroot')."/files/library/".$id."/link/".$deletedBook["link"])){
                    unlink(Yii::getPathOfAlias('webroot')."/files/library/".$id."/link/".$deletedBook["link"]);
                }
            }
            if ($deletedBook["demo_link"]!==""){
                if (file_exists(Yii::getPathOfAlias('webroot')."/files/library/".$id."/demo_link/".$deletedBook["demo_link"])){
                    unlink(Yii::getPathOfAlias('webroot')."/files/library/".$id."/demo_link/".$deletedBook["demo_link"]);
                }
            }
            Library::model()->deleteByPk($id);

            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionUploadBookFiles($id, $type)
    {
        Library::model()->uploadBookFile($id, $type);
    }

    public function actionGetBook($id){
        $book = Library::model()->findByPk($id);
        if ($book){
            $file = "/files/library/{$book->id}/link/{$book->link}";
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)){
                return   Yii::app()->request->xSendFile($file,[
                    'forceDownload'=>true,
                    'xHeader'=>'X-Accel-Redirect',
                    'terminate'=>false
                ]);
            }
            else{

                throw new CHttpException(404,'Документ не знайдено');
            }
        }
        else {
            throw new CHttpException(404,'Документ не знайдено');
        }
    }

    public function actionLibraryByQuery($query)
    {
        if ($query) {
            $library = Library::libraryByQuery($query);
            echo $library;
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }
}