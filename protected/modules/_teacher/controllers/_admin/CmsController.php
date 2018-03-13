<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 22.12.2015
 * Time: 17:05
 */

class CmsController extends TeacherCabinetController{

    public function hasRole(){
        return Yii::app()->user->model->isAdmin();
    }

    public function actionIndex()
    {
        $this->renderPartial('index', array(),false,true);
    }

    public function actionMenuLists()
    {
        $this->renderPartial('list/lists');
    }

    public function actionGetMenuList()
    {
       echo CJSON::encode(CmsMenuList::model()->findAll());
    }

    public function actionSetLogo(){
        $addressForFile="";
        $previousImage = $_POST["previousImage"];
        if (isset($_FILES) && !empty($_FILES)){
            $folderAddress = 'images/cms/'. Yii::app()->user->model->getCurrentOrganizationId()."/lists/";

            if (!file_exists($folderAddress)){
                mkdir($folderAddress,'777',true);
            }
            if (file_exists($previousImage)){
                unlink($previousImage);
            }
            $end_file_name = $_FILES["logo"]["name"];
            $tmp_file_name = $_FILES["logo"]["tmp_name"];
            if(getimagesize($tmp_file_name)){
                $addressForFile = $folderAddress . date("jYgi") .basename($end_file_name);
            }
            copy($tmp_file_name,$addressForFile);
            echo $addressForFile;
        }
    }
    public function actionUpdateMenuLink()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id'])?CmsMenuList::model()->findByPk($params['id']): new CmsMenuList();
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            if(!$menuLink->save()){
                throw new \application\components\Exceptions\IntItaException(500, $menuLink->getValidationErrors());
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionRemoveMenuLink()
    {
        $imageAddress = $_POST["image"];
        if (file_exists($imageAddress)){
            unlink($imageAddress);
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $menuLink = CmsMenuList::model()->findByPk($_POST['id']);
            if (file_exists($menuLink["image"])){
                unlink($menuLink["image"]);
            }
            $menuLink->delete();

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}