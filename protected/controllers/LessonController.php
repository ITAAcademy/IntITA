<?php
/* @var $lecture Lecture*/

class LessonController extends Controller{

    public function initialize($id)
    {
        if ($id != 1){
        if(Yii::app()->user->isGuest){
            throw new CHttpException(403, Yii::t('errors', '0138'));
        }
        else{
            $permission = new Permissions();
            if (!$permission->checkPermission(Yii::app()->user->getId(), $id, array('read'))) {
                throw new CHttpException(403, Yii::t('errors', '0139'));
            }
        }
        }
    }

    public function actionIndex($id){
        $this->initialize($id);
        $permission = new Permissions();
        if ($permission->checkPermission(Yii::app()->user->getId(), $id, array('edit'))) {
            $editMode = true;
        } else {
            $editMode = false;
        }

        $lecture = Lecture::model()->findByPk($id);

        $criteria = new CDbCriteria();
        $criteria->addCondition('id_lecture='.$id);

        $dataProvider = new CActiveDataProvider('LectureElement');
        $dataProvider->criteria = $criteria;
        $dataProvider->setPagination(array(
                'pageSize' => '200',
            )
        );
        $countBlocks = LectureElement::model()->count('id_lecture = :id', array(':id' => $id));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'lecture' => $lecture,
            'editMode' => $editMode,
            'countBlocks' => $countBlocks,
        ));
    }

    public function actionUpdateAjax()
    {
        $data = array();
        $data["day"] = $_POST['dateconsajax'];
        $data["teacherId"] = $_POST['teacherIdajax'];
        $this->renderPartial('_timeConsult', $data, false, true);
    }

    public function actionUnableLesson(){
        $this->render('unableLesson');
    }

    public function filters()
    {
        return array(
            'ajaxOnly + save',
        );
    }

    public function actionSave(){
        $order = substr(Yii::app()->request->getPost('order'), 2);
        $id = Yii::app()->request->getPost('idLecture');
        $model = LectureElement::model()->findByAttributes(array('id_lecture' => $id,'block_order' => $order));
        $model->html_block = Yii::app()->request->getPost('content');
        var_dump($order);
        $model->save();
    }

    public function actionCreateNewBlock(){
        $model = new LectureElement();

        $model->id_lecture = Yii::app()->request->getPost('idLecture');
        $model->block_order = Yii::app()->request->getPost('order');
        $model->html_block = Yii::app()->request->getPost('newTextBlock');
        $model->id_type = '1';
        $model->type = 'text';

        $model->save();
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionUpElement()
    {
        $idLecture = Yii::app()->request->getPost('idLecture');
        $order = Yii::app()->request->getPost('order');

        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => -1, ':idLecture' => $idLecture, ':blockOrder' => $order))
            ->execute();

        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => $order, ':idLecture' => $idLecture, ':blockOrder' => $order-1))
            ->execute();

        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => $order-1, ':idLecture' => $idLecture, ':blockOrder' => -1))
            ->execute();
        // if AJAX request, we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionDownElement(){
        $idLecture = Yii::app()->request->getPost('idLecture');
        $order = Yii::app()->request->getPost('order');

        //delete order of called block
        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => -1, ':idLecture' => $idLecture, ':blockOrder' => $order))
            ->execute();

        //update next block order
        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => $order, ':idLecture' => $idLecture, ':blockOrder' => $order+1))
            ->execute();

        //update called block order
        Yii::app()->db
            ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
            ->bindValues(array(':newOrder' => $order+1, ':idLecture' => $idLecture, ':blockOrder' => -1))
            ->execute();
        // if AJAX request, we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionDeleteElement(){
        $idLecture = Yii::app()->request->getPost('idLecture');
        $order = Yii::app()->request->getPost('order');

        LectureElement::model()->deleteAllByAttributes(array('id_lecture' => $idLecture, 'block_order' => $order));

        $this->reorderBlocks($idLecture, $order);
        var_dump($order);
        // if AJAX request, we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public  function reorderBlocks($idLecture, $order){
        $countBlocks = LectureElement::model()->count('id_lecture = :id', array(':id' => $idLecture));
        $countBlocks++;
        for ($i = $order+1; $i <= $countBlocks; $i++){
            Yii::app()->db
                ->createCommand("UPDATE lecture_element SET block_order =:newOrder WHERE id_lecture=:idLecture AND block_order=:blockOrder")
                ->bindValues(array(':newOrder' => $i-1, ':idLecture' => $idLecture, ':blockOrder' => $i))
                ->execute();
        }
    }
}