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
        if (isset($subdomain)) {
            $this->renderPartial('index', array(), false, true);
        } else {
            echo '<p style="color:red">*Конструктор сайту буде доступний після створення субдомену</p>';
            return $this->renderPartial('subdomain');
        }
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
        try {
            $addressForFile = "";
            $previousImage = isset($_POST["previousImage"]) ? $_POST["previousImage"] : null;
            if (isset($_FILES) && !empty($_FILES)) {
                $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
                $path_domain = 'domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
                $folderAddress = $path_domain . "/lists/";
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true);
                }
                if ($previousImage && file_exists($folderAddress . $previousImage)) {
                    unlink($folderAddress . $previousImage);
                }
                $end_file_name = $_FILES["logo"]["name"];
                $tmp_file_name = $_FILES["logo"]["tmp_name"];
                if (getimagesize($tmp_file_name)) {
                    $endAddress = date("jYgi") . basename($end_file_name);  // '21042018name.jpg'
                    $addressForFile = $folderAddress . $endAddress;   // "domains/Madagascar1/lists/21042018name.jpg"
                }
                copy($tmp_file_name, $addressForFile);
            }
            $params = array_filter((array)json_decode($_POST['data']));
            $menuLink = isset($params['id']) ? CmsMenuList::model()->findByPk($params['id']) : new CmsMenuList();
            $menuLink->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $menuLink->attributes = $params;
            if(isset($endAddress)){
                $menuLink->image = $endAddress;
            }
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
        echo CJSON::encode(CmsNews::model()->findAll());
    }


    public function actionUpdateNews()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;

        $current_date = date("Y-m-d H:i:s");
        try {
            $addressForFile = "";
            $previousImage = isset($_POST["previousImage"]) ? $_POST["previousImage"] : null;
            if (isset($_FILES) && !empty($_FILES)) {
                $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
                $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
                $folderAddress = $path_domain . "/news/";
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true);
                }
                if ($previousImage && file_exists($folderAddress . $previousImage)) {
                    unlink($folderAddress . $previousImage);
                }
                $end_file_name = $_FILES["photo"]["name"];
                $tmp_file_name = $_FILES["photo"]["tmp_name"];
                if (getimagesize($tmp_file_name)) {
                    $endAddress = date("jYgi") . basename($end_file_name);  // '21042018name.jpg'
                    $addressForFile = $folderAddress . $endAddress;
                }
                copy($tmp_file_name, $addressForFile);
            }
            $params = array_filter((array)json_decode($_POST['data']));
            $new = isset($params['id']) ? CmsNews::model()->findByPk($params['id']) : new CmsNews();
            $new->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $new->date = $current_date;
            $new->attributes = $params;
            if(isset($endAddress)){
                $new->img = $endAddress;
            }
            if (!$new->save()) {
                throw new \application\components\Exceptions\IntItaException(500, $new->getValidationErrors());
            }
        } catch (Exception $error) {
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
        $subdomain->createSubdomainDirectory($path_domain);
        $path = $path_domain . '/index.php';
        file_put_contents($path, '<?php
                include "../activeDomains.php";
                if (!in_array($_SERVER["HTTP_HOST"],$activeDomains)){
                  exit("Domain not active!");
                };?>');
        file_put_contents($path, $_POST["data"], FILE_APPEND);
        $address = Yii::app()->basePath . '/modules/_teacher/views/_admin/cms/' . Yii::app()->user->model->getCurrentOrganizationId();
        if (file_exists($address)) {
            array_map('unlink', glob("$address/*.*"));
        }
        if (!file_exists($address)) {
            mkdir($address, '777', true);
        }
        $path = $address . '/index.php';
        file_put_contents($path, $_POST["data"], FILE_APPEND);
    }

    public function actionUpdateSettings()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $addressForFile = "";
            $previousImage = isset($_POST["previousImage"]) ? $_POST["previousImage"] : null;

            $params = array_filter((array)json_decode($_POST['data'])); //array_filter -- Применяет фильтр к массиву, используя функцию обратного вызова
            //Принимает закодированную в JSON строку и преобразует ее в переменную PHP.
            $settings = isset($params['id']) ? CmsGeneralSettings::model()->findByPk($params['id']) : new CmsGeneralSettings();
            $settings->id_organization = Yii::app()->user->model->getCurrentOrganizationId();
            $settings->attributes = $params;

            if (isset($_FILES) && !empty($_FILES)) {    //$_FILES Переменные файлов, загруженных по HTTP // прилітає картінка
                $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
                $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
                $folderAddress = $path_domain . "/logo/"; // прописуєм шлях
                if (!file_exists($folderAddress)) {
                    mkdir($folderAddress, '777', true);   //створення каталога
                }
                $end_file_name = $_FILES["photo"]["name"]; //Оригинальное имя файла на компьютере клиента.
                $tmp_file_name = $_FILES["photo"]["tmp_name"]; // Временное имя, с которым принятый файл был сохранен на сервере.
                if(isset($end_file_name) && !empty($end_file_name)){
                    if ($previousImage && file_exists($folderAddress . $previousImage  )) {
                        unlink($folderAddress.$previousImage); //удаляє файл
                    }
                    if (getimagesize($tmp_file_name)) {  //Получение размера изображения
                        $endAddress = date("jYgi") . basename($end_file_name);  // '21042018name.jpg'   //basename -- Возвращает имя файла из указанного пути
                        $addressForFile = $folderAddress . $endAddress;
                    }
                    copy($tmp_file_name, $addressForFile);  //copy($file, $newfile) Копирует файл
                    echo $addressForFile;
                    $settings->logo = $addressForFile;
                    if(isset($endAddress)){
                        $settings->logo = $endAddress;
                    }
                }
            }
            if (!$settings->save()) {

                throw new \application\components\Exceptions\IntItaException(500, $settings->getValidationErrors());  // $menuLink
            }
        } catch (Exception $error) {
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
        return $this->renderPartial('subdomain');
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

    public function actionGetMenuSlider()   /* функція для отримання данних (альтернатива для .json) */
    {
        //Виведення данних, отриманих методом моделі CmsCarousel за поточним id_organization
        echo  CJSON::encode( CmsCarousel::model()->findAllByAttributes(array('id_organization' => Yii::app()->user->model->getCurrentOrganizationId())) );
    }
    public function actionUpdateMenuSlider()   /* функція повинна додавати данні для слайду */
    {
        $result = ['message' => 'OK'];   //створення деякого массиву з значенням по замовчуванню
        $statusCode = 201;  //створення змінної статусу по замовчуванню
        try {
            $addressForFile = "";
            $previousImage = isset($_POST["previousImage"]) ? $_POST["previousImage"] : null;   //перевірка існування змінної
            if (isset($_FILES) && !empty($_FILES)) {   //перевірка наявності файлу в формі
                $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));   //встановлюємо піддомен за ідентифікатором організації
                $path_domain = 'domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();   //куди зберігаються файли
                $folderAddress = $path_domain . "/carousel/";
                if (!file_exists($folderAddress)) {   //якщо директорія неіснує
                    mkdir($folderAddress, '777', true);   //створення папки з правами 777
                }
                if ($previousImage && file_exists($folderAddress . $previousImage)) {   //перевірка існування попереднього зображення
                    unlink($folderAddress . $previousImage);   //видалення
                }
                $end_file_name = $_FILES["slide"]["name"];   //актуальний файл з форми
                $tmp_file_name = $_FILES["slide"]["tmp_name"];   //адреса ще не збереженого файла
                if (getimagesize($tmp_file_name)) {   //взяти розміри
                    $endAddress = date("jYgi") . basename($end_file_name);  // '21042018name.jpg'
                    $addressForFile = $folderAddress . $endAddress;   // "domains/Madagascar1/lists/21042018name.jpg"
                }
                copy($tmp_file_name, $addressForFile);    //копіювання файлу за вказаною адресою
            }
            //розбираємось з параметрами окрім файла
            $params = array_filter((array)json_decode($_POST['data']));
            $menuSlider = isset($params['id']) ? CmsCarousel::model()->findByPk($params['id']) : new CmsCarousel();   //перевіряємо чи був слайд з таким ід
            $menuSlider->id_organization = Yii::app()->user->model->getCurrentOrganizationId();   //для нового об'єкта потрібен ід організації
            $menuSlider->attributes = $params;   //Наповнення об'єкта моделі данними з форми
            if(isset($endAddress)){   //якщо є файл
                $menuSlider->src = $endAddress;   //записуємо адресу файлу
            }
            if (!$menuSlider->save()) {   //Спроба записати данні в атаблицю
                throw new \application\components\Exceptions\IntItaException(500, $menuSlider->getValidationErrors());
            }
        } catch (Exception $error) {   //якщо щось пішло не так, генеруємо помилку
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        //Відображення вмісту файлу '//ajax/json' з поточними параметрами
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
    public function actionRemoveMenuSlider()   /* видалення обраного запису */
    {
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));   //отримання піддомена по ід організації
        $path_domain = Yii::app()->basePath . '/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();   //
        $folderAddress = $path_domain . "/carousel/";
        $imageAddress = $_POST["image"];   //витягування з об'єкта POST адреси, переданої з в'юхи
        if (file_exists($folderAddress . $imageAddress)) {   //Перевірка існування файлу за вказаною адресою
            unlink($folderAddress . $imageAddress);   //видалення зображення за вказаною адресою
        }
        $result = ['message' => 'OK'];   //створення масиву з статусом по замовчуванню
        $statusCode = 201;   //змінна з статусом по замовчуванню
        try {
            $menuSlider = CmsCarousel::model()->findByPk($_POST['id']);   //отримання з бази данних пов'язаних з заданим ід
            if (file_exists($menuSlider["src"])) {   //Перевірка існування файлу
                unlink($menuSlider["src"]);
            }
            $menuSlider->delete();   //по ходу видалення данних

        } catch (Exception $error) {   //помилка
            $statusCode = 500;   //зміна коду статусу
            $result = ['message' => 'error', 'reason' => $error->getMessage()];   //зміна масиву результату
        }
        //Відображення вмісту файлу '//ajax/json' з поточними параметрами
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}