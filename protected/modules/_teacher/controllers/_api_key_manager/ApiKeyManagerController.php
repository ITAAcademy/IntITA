<?php

class ApiKeyManagerController extends TeacherCabinetController
{
    public function hasRole(){
        return Yii::app()->user->model->isApiKeyManager();
    }

    public function actionIndex($id=0) {
        $this->renderPartial('/_api_key_manager/_dashboard', array(), false, true);
    }
}