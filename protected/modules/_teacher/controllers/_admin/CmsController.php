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
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        if($subdomain){
            $this->renderPartial('index', array(), false, true);
        }else{
            $this->renderPartial('subdomain', array('subdomain'=>$subdomain), false, true);
        }
    }

    public function actionGetSubdomain()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        return $subdomain;
    }

    public function actionMenuLists()
    {
        $this->renderPartial('list/lists');
    }

    public function actionGetMenuList()
    {
        echo  CJSON::encode(CmsMenuList::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId())));
    }

    public function actionUpdateMenuLink()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id']) ? CmsMenuList::model()->findByPk($params['id']) : new CmsMenuList();
            $link = CrmImageUploadHelper::uploadImage($menuLink->image,"lists",key($_FILES));
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            if($link){
                $menuLink->image = $link;
            }
            if (!$menuLink->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $menuLink->getValidationErrors());
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
    public function actionUpdateSocialNetworks()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $settings = isset($params['id']) ? CmsGeneralSettings::model()->findByPk($params['id']) : new CmsGeneralSettings();
            $settings->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $settings->attributes = $params;
            if (!$settings->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $settings->getValidationErrors());  // $menuLink
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
    public function actionRemoveMenuLink()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $folderAddress = $path_domain . "/lists/";
        $imageAddress = $_POST["image"];
        if (file_exists($folderAddress . $imageAddress)) {
            unlink($folderAddress . $imageAddress);
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
        echo CJSON::encode(CmsNews::model()->findAllByAttributes(['id_organization' =>  Yii::app()->user->model->getCurrentOrganizationId()]));
    }

    public function actionGetOneNews()
    {
        echo CJSON::encode(CmsNews::model()->findByPk( $_POST['id'])) ;
    }

    public function actionUpdateNews()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $new = isset($params['id']) ? CmsNews::model()->findByPk($params['id']) : new CmsNews();
            $link = CrmImageUploadHelper::uploadImage($new->img,"news",key($_FILES));
            $new->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $new->date = date("Y-m-d H:i:s");
            $new->attributes = $params;
            if($link){
                $new->img = $link;
            }
            if (!$new->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $new->getValidationErrors());
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionRemoveNews()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $folderAddress = $path_domain . "/news/";
        $imageAddress = $_POST["image"];
        if (file_exists($folderAddress . $imageAddress)) {
            unlink($folderAddress . $imageAddress);
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

    public function actionSettings()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        if (isset($subdomain)) {
            $this->renderPartial('settings');
        } else{
            echo '<p style="color:red">*Конструктор сайту буде доступний після створення субдомену</p>';
            return $this->renderPartial('index');
        }
    }

    public function actionGetSettings()
{       $id_org = Yii::app()->user->model->getCurrentOrganizationId();
        $model = CJSON::encode(CmsGeneralSettings::model()->findByAttributes(['id_organization' => $id_org]));
        echo $model;
    }

    public function actionGeneratePage()
    {   $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));

        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $subdomain->createSubdomainDirectory($path_domain); //створюємо директорію

        $path = $path_domain . '/index.php'; // створюємо файл в попередньо створеній директорії

        file_put_contents($path, '<?php
                include "../activeDomains.php";
                if (!in_array($_SERVER["HTTP_HOST"],$activeDomains)){
                  exit("Domain not active!");
                };?>');

        file_put_contents($path, $_POST["data"], FILE_USE_INCLUDE_PATH);
        $address = Yii::app()->basePath . '/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId();
        if (file_exists($address)) {
            array_map('unlink', glob("$address/*.*"));
        }
        if (!file_exists($address)) {
            mkdir($address, 0777, true);
        }
        $path = $address . '/index.php';
        file_put_contents($path, $_POST["data"], FILE_USE_INCLUDE_PATH);
    }

    public function actionUpdateSettings()
    {
        function valueNull($value) {
            return !$value?null:$value;
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_map("valueNull", (array)json_decode($_POST['data']));
            $settings = isset($params['id']) ? CmsGeneralSettings::model()->findByPk($params['id']) : new CmsGeneralSettings();
            $link = CrmImageUploadHelper::uploadImage($settings->logo,"logo",key($_FILES));
            $settings->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $settings->attributes = $params;
            if($link){
                $settings->logo = $link;
            }
            if (!$settings->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $settings->getValidationErrors());
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }


    public function actionRemoveLogo()
{
    $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
    $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
    $folderAddress = $path_domain . "/logo/";
    $imageAddress = $_POST["image"];
    if (file_exists($folderAddress.$imageAddress)) {  //видалення картинки з сервера(папки)
        unlink($folderAddress.$imageAddress);
    }
    $result = ['message' => 'OK'];
    $statusCode = 201;
    try {
        $settings_logo = CmsGeneralSettings::model()->findByPk($_POST['id']);
        $settings_logo->logo = null;

        if (!$settings_logo->save()) {

            throw new \application\components\Exceptions\IntItaException(500, $settings_logo->getValidationErrors());
        }
    } catch (Exception $error) {
        $statusCode = 500;
        $result = ['message' => 'error', 'reason' => $error->getMessage()];
    }
    $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
}

    public function actionSubdomain()
    {
        $this->renderPartial('subdomain');
    }

    public function actionOrganizationSubdomain()
    {
        $adapter = new NgTableAdapter(Subdomains::class, $_GET);
        $criteria = new CDbCriteria();
        $criteria->alias = 't';
        $criteria->addCondition('t.organization=' . Yii::app()->user->model->getCurrentOrganizationId());
        $adapter->mergeCriteriaWith($criteria);
        return $this->renderJSON($adapter->getData());
    }

    public function actionAddSubdomain()
    {
        $model = new Subdomains();
        $model->domain_name = Yii::app()->request->getPost('subdomain');
        $model->active = 1;
        $model->organization = Yii::app()->user->model->getCurrentOrganizationId();
        $model->save();
        return $this->renderJSON(['data' => true]);
    }

    public function actionGetDomainPath()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $path_domain = Config::getBaseUrl() . '/domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        return $this->renderJSON(['domainPath' => $path_domain]);
    }

    public function actionGetMenuSlider()
    {
        echo  CJSON::encode( CmsCarousel::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId())) );
    }
    public function actionUpdateMenuSlider()
    {
        $uploadedFile = CrmImageUploadHelper::uploadImage($_POST["previousImage"],"carousel",key($_FILES));
        $params = array_filter((array)json_decode($_POST['data']));
        $menuSlider = isset($params['id']) ? CmsCarousel::model()->findByPk($params['id']) : new CmsCarousel();
        $menuSlider->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
        $menuSlider->attributes = $params;
        if(isset($uploadedFile)){
            $menuSlider->src = $uploadedFile;
        }
        if (!$menuSlider->save()) {
            throw new \application\components\Exceptions\IntItaException(500, $menuSlider->getValidationErrors());
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
    public function actionRemoveMenuSlider()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $folderAddress = $path_domain . "/carousel/";
        $imageAddress = $_POST["image"];
        if (file_exists($folderAddress . $imageAddress)) {
            unlink($folderAddress . $imageAddress);
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $menuSlider = CmsCarousel::model()->findByPk($_POST['id']);
            if (file_exists($menuSlider["src"])) {
                unlink($menuSlider["src"]);
            }
            $menuSlider->delete();

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}