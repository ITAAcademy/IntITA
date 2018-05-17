<?php

class AddressController extends TeacherCabinetController
{
    public function hasRole(){
        return Yii::app()->user->model->isSuperAdmin();
    }

    public function actionIndex()
    {
        $this->renderPartial('index', array(), false, true);
    }

    public function actionGetCountriesList(){
        $criteria = new CDbCriteria();
        if (isset($_GET['sorting']['title_ua'])){
            $criteria->order = 'title_ua  COLLATE utf8_unicode_ci ' .$_GET['sorting']['title_ua']  ;
        }
        $adapter = new NgTableAdapter('AddressCountry',$_GET);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }

    public function actionGetCitiesList(){
        $criteria = new CDbCriteria();
        if (isset($_GET['sorting']['title_ua'])){
            $criteria->order = 't.title_ua  COLLATE utf8_unicode_ci ' .$_GET['sorting']['title_ua']  ;
        }
        if (isset($_GET['sorting']['country0.title_ua'])){
            $criteria->order = 'country0.title_ua  COLLATE utf8_unicode_ci ' .$_GET['sorting']['country0.title_ua']  ;
        }
        $adapter = new NgTableAdapter('AddressCity',$_GET);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }

    public function actionAddCountry(){
        $this->renderPartial('_addCountry', array(), false, true);
    }

    public function actionAddCity(){
        $this->renderPartial('_addCity', array(), false, true);
    }
    
    public function actionEditCity($id){
        $model=AddressCity::model()->findByPk($id);
        $this->renderPartial('_editCity', array('model'=>$model), false, true);
    }
    
    public function actionNewCountry(){
        $titleUa = Yii::app()->request->getPost('titleUa', '');
        $titleRu = Yii::app()->request->getPost('titleRu', '');
        $titleEn = Yii::app()->request->getPost('titleEn', '');
        $geocode = Yii::app()->request->getPost('geocode', '');

        if($titleUa && $titleRu && $titleEn && $geocode){
            if (AddressCountry::newCountry($titleUa, $titleRu, $titleEn, $geocode)){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Неправильно введені дані.";
        }
    }

    public function actionNewCity(){
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            $country = AddressCountry::model()->findByPk($data['country']);
            if($country){
                $response = AddressCity::newCity($country, $data);
                echo $response;
            } else {
                echo "Неправильно введені дані.";
            }
        } else {
            echo "Неправильно введені дані!!!.";
        }
    }

    public function actionUpdateCity(){
        $data = json_decode(file_get_contents('php://input'), true);
        if($data){
            $model=AddressCity::model()->findByPk($data['id']);
            $model->attributes = $data;
            if($model->save()){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Неправильно введені дані.";
        }
    }

    public function actionRemoveCity() {
        $data = json_decode(file_get_contents('php://input'), true);
        $city = AddressCity::model()->findByPk($data['id']);

        $isCES = CorporateEntity::model()->exists('actual_address_city_code = :id', [":id" => $data['id']]);

        if ($isCES) {
            echo "Операцію не вдалося виконати. Місто закріплено за компанією.";
        } else {
            $users = $city->users;
            if ($users) {
                foreach ($users as $user) {
                    $user->city = '';
                    $user->reg_time = null;
                    $user->save();
                }
            }

            if($city->delete()){
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        }
    }

    public function actionCountriesByQuery($query){
        echo AddressCountry::countriesByQuery($query);
    }
}