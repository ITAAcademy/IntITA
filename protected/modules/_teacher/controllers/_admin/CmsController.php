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

    public function actionSubdomainName()
    {
        $subdomain_name = array_shift((explode('.', $_SERVER['HTTP_HOST'])));
        echo $_GET['base_path'] . '/domains/' . $subdomain_name . '.' . 'localhost';
    }

    public function actionIndex()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        if ($subdomain) {
            $this->renderPartial('index', array(), false, true);
        } else {
            $this->renderPartial('subdomain', array('subdomain' => $subdomain), false, true);
        }
    }

    public function actionAbout()
    {
        $this->renderPartial('about', array(), false, true);
    }

    public function actionStaff()
    {
        $this->renderPartial('staff', array(), false, true);
    }

    public function actionFaq()
    {
        $this->renderPartial('faq', array(), false, true);
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
        echo CJSON::encode(CmsMenuList::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId())));
    }

    public function actionUpdateSettings()
    {
        function valueNull($value)
        {
            return !$value ? null : $value;
        }
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_map("valueNull", (array)json_decode($_POST['data']));
            $settings = isset($params['id']) ? CmsGeneralSettings::model()->findByPk($params['id']) : new CmsGeneralSettings();
            if (!empty($_POST['copy_img'])) {
                $link = CrmImageUploadHelper::copyImageFromMainToSubdomain($settings->logo, $_POST['copy_img'], 'logo');
            } else {
                $link = CrmImageUploadHelper::uploadImage($settings->logo, "logo", key($_FILES));
            }
            $settings->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $settings->attributes = $params;
            if ($link) {
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

    public function actionUpdateMenuLink()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id']) ? CmsMenuList::model()->findByPk($params['id']) : new CmsMenuList();
            if (!empty($_POST['copy_img'])) {
                $link = CrmImageUploadHelper::copyImageFromMainToSubdomain($menuLink->image, $_POST['copy_img'], 'lists');
            } else {
                $link = CrmImageUploadHelper::uploadImage($menuLink->image, "lists", key($_FILES));
            }
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            if ($link) {
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

    public function actionUpdateNews()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $new = isset($params['id']) ? CmsNews::model()->findByPk($params['id']) : new CmsNews();
            if (!empty($_POST['copy_img'])) {
                $link = CrmImageUploadHelper::copyImageFromMainToSubdomain($new->img, $_POST['copy_img'], 'news');
            } else {
                $link = CrmImageUploadHelper::uploadImage($new->img, "news", key($_FILES));
            }
            $new->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $new->date = date("Y-m-d H:i:s");
            $new->attributes = $params;
            if ($link) {
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
        echo CJSON::encode(CmsNews::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId()), array('order' => 'date DESC')));
    }

    public function actionGetOneNews()
    {
        echo CJSON::encode(CmsNews::model()->findByPk($_POST['id']));
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
        } else {
            echo '<p style="color:red">*Конструктор сайту буде доступний після створення субдомену</p>';
            return $this->renderPartial('index');
        }
    }

    public function actionGetSettings()
    {
        $id_org = Yii::app()->user->model->getCurrentOrganizationId();
        $model = CJSON::encode(CmsGeneralSettings::model()->findByAttributes(['id_organization' => $id_org]));
        echo $model;
    }

    public function actionGeneratePage()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));

        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $subdomain->createSubdomainDirectory($path_domain); //створюємо директорію

        $path = $path_domain . '/'.$_POST['page'].'.php'; // створюємо файл в попередньо створеній директорії

        file_put_contents($path, '<?php
                include "../activeDomains.php";
                if (!in_array($_SERVER["HTTP_HOST"],$activeDomains)){
                  exit("Domain not active!");
                };?>');

        file_put_contents($path, $_POST["data"], FILE_USE_INCLUDE_PATH);
        $address = Yii::app()->basePath . '/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId();
        if (is_file($address.$_POST['page'].'.php')) {
            unlink($address.$_POST['page'].'.php');
        }

        if (!file_exists($address)) {
            mkdir($address, 0777, true);
        }
        $path = $address . '/'.$_POST['page'].'.php';
        file_put_contents($path, $_POST["data"], FILE_USE_INCLUDE_PATH);
    }

    public function actionRemoveLogo()
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
        $folderAddress = $path_domain . "/logo/";
        $imageAddress = $_POST["image"];
        if (file_exists($folderAddress . $imageAddress)) {  //видалення картинки з сервера(папки)
            unlink($folderAddress . $imageAddress);
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
        echo CJSON::encode(CmsCarousel::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId())));
    }
    public function actionUpdateMenuSlider()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $params = array_filter((array)json_decode($_POST['data']));
            $menuSlider = isset($params['id']) ? CmsCarousel::model()->findByPk($params['id']) : new CmsCarousel();
            if (!empty($_POST['copy_img'])) {
                $link = CrmImageUploadHelper::copyImageFromMainToSubdomain($menuSlider->src, $_POST['copy_img'], 'carousel');
            } else {
                $link = CrmImageUploadHelper::uploadImage($menuSlider->src, "carousel", key($_FILES));
            }
            $menuSlider->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuSlider->attributes = $params;

            if ($link) {
                $menuSlider->src = $link;
            }
            if (!$menuSlider->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $menuSlider->getValidationErrors());
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
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

    public function actionImageUpload()
    {
        if (isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
            define('F_NAME', ($_FILES['upload']['name']));  //get filename without extension
        }
        $pathImage = StaticFilesHelper::pathToCmsImages($_GET['folder']);

        // PHP Upload Script for CKEditor:  http://coursesweb.net/

// HERE SET THE PATH TO THE FOLDERS FOR IMAGES ON YOUR SERVER (RELATIVE TO THE ROOT OF YOUR WEBSITE ON SERVER)
        $upload_dir = array(
            'img' => Config::getBaseUrl() .'/'. $pathImage,
        );

// HERE PERMISSIONS FOR IMAGE
        $imgset = array(
            'maxsize' => 5 * 1024,     // maximum file size, in KiloBytes (2 MB)
            'maxwidth' => 5000,     // maximum allowed width, in pixels
            'maxheight' => 5000,    // maximum allowed height, in pixels
            'minwidth' => 1,      // minimum allowed width, in pixels
            'minheight' => 1,     // minimum allowed height, in pixels
            'type' => array('bmp', 'gif', 'jpg', 'jpeg', 'png'),  // allowed extensions
        );

// If 1 and filename exists, RENAME file, adding "_NR" to the end of filename (name_1.ext, name_2.ext, ..)
// If 0, will OVERWRITE the existing file
        define('RENAME_F', 1);

        $re = '';
        if (isset($_FILES['upload']) && strlen($_FILES['upload']['name']) > 1) {
            // get protocol and host name to send the absolute image path to CKEditor
            $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $site = $protocol . $_SERVER['SERVER_NAME'] . '/';
            $sepext = explode('.', strtolower($_FILES['upload']['name']));
            $type = end($sepext);    // gets extension
            $upload_dir = $upload_dir['img'];
            $type_dir = $pathImage;
            if(!file_exists(Yii::getpathOfAlias('webroot').'/'.$type_dir)){
                mkdir(Yii::getpathOfAlias('webroot').'/'.$type_dir);
            }
            $upload_dir = trim($upload_dir, '/') . '/';
            $dir = Yii::getpathOfAlias('webroot').'/'.$pathImage;

            //checkings for image
            if (in_array($type, $imgset['type'])) {
                list($width, $height) = getimagesize($_FILES['upload']['tmp_name']);  // image width and height
                if (isset($width) && isset($height)) {
                    if ($width > $imgset['maxwidth'] || $height > $imgset['maxheight']) $re .= '\\n Width x Height = ' . $width . ' x ' . $height . ' \\n The maximum Width x Height must be: ' . $imgset['maxwidth'] . ' x ' . $imgset['maxheight'];
                    if ($width < $imgset['minwidth'] || $height < $imgset['minheight']) $re .= '\\n Width x Height = ' . $width . ' x ' . $height . '\\n The minimum Width x Height must be: ' . $imgset['minwidth'] . ' x ' . $imgset['minheight'];
                    if ($_FILES['upload']['size'] > $imgset['maxsize'] * 1024) $re .= '\\n Maximum file size must be: ' . $imgset['maxsize'] . ' KB.';
                }
            } else $re .= 'The file: ' . $_FILES['upload']['name'] . ' has not the allowed extension type.';

            //set filename; if file exists, and RENAME_F is 1, set "img_name_I"
            // $p = dir-path, $fn=filename to check, $ex=extension $i=index to rename
            function setFName($p, $fn, $ex, $i)
            {
                if (RENAME_F == 1 && file_exists($p . $fn . $ex)) return setFName($p, F_NAME . '_' . ($i + 1), $ex, ($i + 1));
                else return $fn . $ex;
            }

            $f_name = setFName($_SERVER['DOCUMENT_ROOT'] . '/' . $dir, F_NAME, ".$type", 0);
            $uploadpath = $dir . $f_name;  // full file path

            // If no errors, upload the image, else, output the errors
            if ($re == '') {
                if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadpath)) {
                    $CKEditorFuncNum = $_GET['CKEditorFuncNum'];
                    $url = $upload_dir . $f_name;
                    $msg = F_NAME . '.' . $type . ' successfully uploaded: \\n- Size: ' . number_format($_FILES['upload']['size'] / 1024, 2, '.', '') . ' KB';
                    $re = "window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')";
                } else $re = 'alert("Unable to upload the file")';
            } else $re = 'alert("' . $re . '")';
        }

        @header('Content-type: text/html; charset=utf-8');
        echo '<script>' . $re . ';</script>';
    }

}