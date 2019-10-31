<?php

class LibraryController extends TeacherCabinetController {
    public function hasRole() {
        return Yii::app()->user->model->isDirector() || Yii::app()->user->model->isAuditor();
    }

    public function actionPayments() {
        $this->renderPartial('/_director/library/payments', array(), false, true);
    }

    public function actionGetPayments() {
        $requestParam = $_GET;
        $criteria=new CDbCriteria;
        $adapter = new NgTableAdapter('LibraryPayments',$requestParam);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }
}