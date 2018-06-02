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
        $criteria->order = 't.id desc';
        $adapter = new NgTableAdapter('Library',$requestParam);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }
    public function actionAddBook(){
        $statusCode = 201;
        $id = null;
        try {
            $data = $_POST;
            $book = isset($data['id'])?Library::model()->findByPk($data['id']):new Library();
            $book->attributes = $data;
            $categories = [];
            if (isset($data['category'])) {
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
        } catch (Exception $error) {
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
        Library::removeBook();
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
}