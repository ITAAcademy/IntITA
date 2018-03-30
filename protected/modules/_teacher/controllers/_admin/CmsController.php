<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 22.12.2015
 * Time: 17:05
 */

class CmsController extends TeacherCabinetController
{

    public function hasRole()
    {
        return Yii::app()->user->model->isAdmin();
    }

    public function actionIndex()
    {
       $this->renderPartial('index', array(), false, true);
    }

    public function actionMenuLists()
    {
        $this->renderPartial('list/lists');
    }

    public function actionGetMenuList()
    {
        echo CJSON::encode(CmsMenuList::model()->findAll());
    }

    public function actionUpdateMenuLink()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $addressForFile = "";
            $previousImage = $_POST["previousImage"];
            if (isset($_FILES) && !empty($_FILES)) {
                $folderAddress = 'images/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/lists/";
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true);
                }
                if (file_exists($previousImage)) {
                    unlink($previousImage);
                }
                $end_file_name = $_FILES["logo"]["name"];
                $tmp_file_name = $_FILES["logo"]["tmp_name"];
                if (getimagesize($tmp_file_name)) {
                    $addressForFile = $folderAddress . date("jYgi") . basename($end_file_name);
                }
                copy($tmp_file_name, $addressForFile);
                echo $addressForFile;
            }
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id']) ? CmsMenuList::model()->findByPk($params['id']) : new CmsMenuList();
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            $menuLink->image = $addressForFile;
            if (!$menuLink->save()) {
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
        if (file_exists($imageAddress)) {
            unlink($imageAddress);
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $menuLink = CmsMenuList::model()->findByPk($_POST['id']);
            if (file_exists($menuLink["image"])) {
                unlink($menuLink["image"]);
            }
            $menuLink->delete();

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionNews()
    {
        $this->renderPartial('list/lists');
    }

    public function actionGetNews()
    {
        echo CJSON::encode(CmsNews::model()->findAll());
    }

    public function actionUpdateNews()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;

        $current_date = date("Y-m-d H:i:s");
        try {
            $addressForFile = "";
            $previousImage = $_POST["previousImage"];
            if (isset($_FILES) && !empty($_FILES)) {
                $folderAddress = 'images/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/news/";
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true);
                }
                if (file_exists($previousImage)) {
                    unlink($previousImage);
                }
                $end_file_name = $_FILES["photo"]["name"];
                $tmp_file_name = $_FILES["photo"]["tmp_name"];
                if (getimagesize($tmp_file_name)) {
                    $addressForFile = $folderAddress . date("jYgi") . basename($end_file_name);
                }
                copy($tmp_file_name, $addressForFile);
                echo $addressForFile;
            }
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id']) ? CmsNews::model()->findByPk($params['id']) : new CmsNews();
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->date= $current_date;
            $menuLink->attributes = $params;

            $menuLink->logo = $addressForFile;

            if (!$menuLink->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $menuLink->getValidationErrors());
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionRemoveNews()
    {
        $imageAddress = $_POST["image"];
        if (file_exists($imageAddress)) {
            unlink($imageAddress);
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $menuLink = CmsNews::model()->findByPk($_POST['id']);
            if (file_exists($menuLink["img"])) {
                unlink($menuLink["img"]);
            }
            $menuLink->delete();

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionGetSettings(){
        $id_org = Yii::app()->user->model->getCurrentOrganizationId();
        $model=CJSON::encode(CmsGeneralSettings::model()->findByAttributes(['id_organization' => $id_org]));
        $model=CJSON::encode(CmsGeneralSettings::model()->findByAttributes(['id_organization' => $id_org]));
        echo $model;
    }

    public function actionUpdateSettings(){
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $addressForFile = "";
            $previousImage = $_POST["previousImage"];
            if (isset($_FILES) && !empty($_FILES)) {    //$_FILES Переменные файлов, загруженных по HTTP // прилітає картінка
                $folderAddress = 'images/cms/' . Yii::app()->user->model->getCurrentOrganizationId() . "/generalSettings/";  // прописуєм шлях
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true); //створення каталога
                }
                if (file_exists($previousImage)) {
                    unlink($previousImage);  //удаляє файл
                }
                $end_file_name = $_FILES["photo"]["name"]; //Оригинальное имя файла на компьютере клиента.
                $tmp_file_name = $_FILES["photo"]["tmp_name"]; // Временное имя, с которым принятый файл был сохранен на сервере.
                if (getimagesize($tmp_file_name)) {  //Получение размера изображения
                    $addressForFile = $folderAddress . date("jYgi") . basename($end_file_name); //basename -- Возвращает имя файла из указанного пути
                }
                copy($tmp_file_name, $addressForFile);  //copy($file, $newfile) Копирует файл
                echo $addressForFile;
            }
            $params = array_filter((array)json_decode($_POST['data'])); //array_filter -- Применяет фильтр к массиву, используя функцию обратного вызова
            //Принимает закодированную в JSON строку и преобразует ее в переменную PHP.
            $menuLink = isset($params['id']) ? CmsGeneralSettings::model()->findByPk($params['id']) : new CmsGeneralSettings();
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            $menuLink->logo = $addressForFile;
            if (!$menuLink->save()) {

                throw new \application\components\Exceptions\IntItaException(500, $menuLink->getValidationErrors());
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }


}