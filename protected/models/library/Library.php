<?php

/**
 * This is the model class for table "library".
 *
 * The followings are the available columns in table 'library':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $price
 * @property string $language
 * @property string $link
 * @property string $logo
 * @property string $paper_price
 * @property string $demo_link
 * @property string $author
 *
 * The followings are the available model relations:
 * @property LibraryDependsBookCategory[] $libraryDependsBookCategories
 */

use \Ajaxray\PHPWatermark\Watermark as Watermark;

class Library extends CActiveRecord
{

    use composerLoader;
    const ACTIVE = 1;
    const INACTIVE = 0;
    const SUCCESS_STATUS = 'success';

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'library';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description, price, language, status, author, status, position', 'required'),
            array('language', 'length', 'max' => 50),
            array('title', 'length', 'max' => 512),
            array('description', 'length', 'max' => 1512),
            array('link, logo, author', 'length', 'max' => 256),
            array('price, paper_price', 'length', 'max' => 8),
            array('publication_year', 'length', 'min' => 4),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, description, price, language, status, link, logo, author, status, paper_price, demo_link, position, publication_year', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'libraryDependsBookCategories' => array(self::HAS_MANY, 'LibraryDependsBookCategory', 'id_book'),
            'category' => array(self::MANY_MANY, 'LibraryCategory', 'library_depends_book_category(id_book,id_category)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'language' => 'Language',
            'status' => 'Status',
            'link' => 'Link',
            'logo' => 'Logo',
            'author' => 'Author',
            'paper_price' => 'Paper Price',
            'demo_link' => 'Demo Link',
            'publication_year' => 'Publication Year',
            'position' => 'Position',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('language', $this->language, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('link', $this->link, true);
        $criteria->compare('logo', $this->logo, true);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('paper_price', $this->paper_price, true);
        $criteria->compare('demo_link', $this->demo_link, true);
        $criteria->compare('publication_year', $this->publication_year, true);
        $criteria->compare('position', $this->position, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getLibraryList()
    {
        $requestParam = $_GET;
        $criteria = new CDbCriteria;
        $criteria->with = ['libraryDependsBookCategories', 'libraryDependsBookCategories.idCategory'];
        $criteria->join = 'left join library_depends_book_category as bc ON bc.id_book = t.id';
        if (isset($requestParam['filter']['libraryDependsBookCategories.id'])) {
            $criteria->addCondition('bc.id_category=' . $requestParam['filter']['libraryDependsBookCategories.id']);
            unset($requestParam['filter']['libraryDependsBookCategories.id']);
        }

        $adapter = new NgTableAdapter('Library', $requestParam);
        $adapter->mergeCriteriaWith($criteria);

        return json_encode($adapter->getData());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Library the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getPaymentButton()
    {
        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::dsCrypt($liqPayPayment->private_key, 1));
        $order_id = LiqpayPayment::dsCrypt('user_id=' . Yii::app()->user->getId() . '&library_id=' . $this->id);
        $model = LibraryPayments::model()->findByAttributes(array('user_id' => Yii::app()->user->getId(), 'library_id' => $this->id, 'status' => Library::SUCCESS_STATUS));
        if (!$model) {
            $html = $liqpay->cnb_form(array(
                'version' => '3',
                'action' => 'pay',
                'amount' => $this->price,
                'currency' => 'UAH',
                'description' => 'Купівля книги ' . $this->title,
                'order_id' => $order_id,
                'result_url' => Config::getBaseUrl() . '/library/libraryPay/?id=' . $this->id . '&order_id=' . $order_id,
                'server_url' => Config::getBaseUrl() . '/library/liqpayStatus/?id=' . $this->id . '&order_id=' . $order_id,
                'language' => 'uk', // uk, en
            ));
        } else {
            $html = '<a href="/library/getBook?id=' . $this->id . '">Завантажити</a>';
        }

        return $html;
    }

    public function createPayment($order_id)
    {

        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $orderParams = self::getOrderParams($order_id);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::dsCrypt($liqPayPayment->private_key, 1));
        $model = LibraryPayments::model()->findByAttributes(array('user_id' => $orderParams['user_id'], 'library_id' => $orderParams['library_id']));
        $res = $liqpay->api("request", array(
            'action' => 'status',
            'version' => '3',
            'order_id' => $order_id
        ));

        if (!$model || ($model && $model->status != Library::SUCCESS_STATUS)) {
            $model = new LibraryPayments();
            $model->library_id = $this->id;
            if (!empty($res->payment_id)) $model->payment_id = $res->payment_id;
            if (!empty($res->sender_phone)) $model->sender_phone = $res->sender_phone;
            if (!empty($res->sender_card_mask2)) $model->sender_card_mask2 = $res->sender_card_mask2;
            if (!empty($res->amount)) $model->amount = $res->amount;
            if (!empty($res->order_id)) $model->order_id = $res->order_id;
            $model->user_id = $orderParams['user_id'];
            $model->date = new CDbExpression('NOW()');;
            $model->status = $res->status;
            $model->save();
        }
    }

    public function getStatus($order_id)
    {
        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $orderParams = self::getOrderParams($order_id);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::dsCrypt($liqPayPayment->private_key, 1));
        $model = LibraryPayments::model()->findByAttributes(array('user_id' => $orderParams['user_id'], 'library_id' => $orderParams['library_id']));
        if (!$model) {
            $model = new LibraryPayments();
        }
        $res = $liqpay->api("request", array(
            'action' => 'status',
            'version' => '3',
            'order_id' => $order_id
        ));

        if (!$model || ($model && $model->status != Library::SUCCESS_STATUS)) {
            $model->library_id = $this->id;
            if (!empty($res->payment_id)) $model->payment_id = $res->payment_id;
            if (!empty($res->sender_phone)) $model->sender_phone = $res->sender_phone;
            if (!empty($res->sender_card_mask2)) $model->sender_card_mask2 = $res->sender_card_mask2;
            if (!empty($res->amount)) $model->amount = $res->amount;
            if (!empty($res->order_id)) $model->order_id = $res->order_id;
            $model->user_id = $orderParams['user_id'];
            $model->date = new CDbExpression('NOW()');;
            $model->status = $res->status;
            $model->save();
        }

        return $res->status;
    }

    public function sendTicket($order_id)
    {
        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $orderParams = self::getOrderParams($order_id);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::dsCrypt($liqPayPayment->private_key, 1));
        $model = LibraryPayments::model()->findByAttributes(array('user_id' => $orderParams['user_id'], 'library_id' => $orderParams['library_id']));
        $res = $liqpay->api("request", array(
            'action' => 'ticket',
            'version' => '3',
            'order_id' => $order_id,
            'email' => $model->user->email,
            'language' => 'uk',
        ));
    }

    public function getOrderParams($order_id)
    {
        $url = 'https://example.com/?' . LiqpayPayment::dsCrypt($order_id, 1);
        $query_str = parse_url($url, PHP_URL_QUERY);
        parse_str($query_str, $query_params);

        return $query_params;
    }

    public function uploadBookFile($id, $type)
    {
        $private = $this->privateType($type);
        $model = Library::model()->findByPk($id);
        if (!file_exists(Yii::app()->basePath . "/../files/library/" . $id)) {
            mkdir(Yii::app()->basePath . "/../files/library/" . $id);
        }
        if (!file_exists(Yii::app()->basePath . "/../files/library/" . $id . "/" . $type)) {
            mkdir(Yii::app()->basePath . "/../files/library/" . $id . "/" . $type);
        }

        if (!empty($_FILES['file'])) {
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $image = uniqid() . '.' . $ext;

            $file = Yii::getpathOfAlias('webroot') . '/files/library/' . $id . '/' . $type . '/' . $model->$type;
            if (is_file($file)) {
                unlink($file);
                $callUrl = new CurlHelper();
                $callUrl->unlinkImageFromDependServer(Config::getDependentServer() . '/library/unlinkBookFile', $model->$type, $id, $type, $private);
            }

            move_uploaded_file(
                $_FILES['file']["tmp_name"],
                Yii::getpathOfAlias('webroot') . '/files/library/' . $id . '/' . $type . '/' . $image
            );

            $callUrl = new CurlHelper();
            $callUrl->loadImageToDependServer(
                Config::getDependentServer() . '/library/uploadBookFile', $image,
                Config::getBaseUrl() . '/files/library/' . $id . '/' . $type . '/' . $image,
                $id, $type, $private);

            $model->$type = $image;
            $model->save();
        } else {
            throw new \application\components\Exceptions\IntItaException(500, 'Завантажити файл не вдалося');
        }
    }

    public static function libraryByQuery($query)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "t.id, title";
        $criteria->alias = "t";
        $criteria->addSearchCondition('title', $query, true, "OR", "LIKE");
        $criteria->addCondition('t.status=' . self::ACTIVE);
        $data = Library::model()->findAll($criteria);
        $result = array();
        foreach ($data as $key => $model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["title"] = $model->title;
        }

        return json_encode($result);
    }

    public function drawWatermark($userId)
    {
        $this->loadComposerClasses();
        $bookFile = Yii::app()->getBasePath() . "/../files/library/{$this->id}/link/{$this->link}";
        $destFile = Yii::app()->getBasePath() . "/../files/library/buy/{$userId}/{$this->link}";
        if (file_exists($destFile)) {
            return $destFile;
        } else {
            $watermarkImage = $this->createWatermark($userId);
            if ($watermarkImage) {
                if (!file_exists(Yii::app()->getBasePath() . "/../files/library/buy/{$userId}") || !is_dir(Yii::app()->getBasePath() . "/../files/library/buy/{$userId}")) {
                    mkdir(Yii::app()->getBasePath() . "/../files/library/buy/{$userId}", 0777, true);
                }
                $watermark = new Watermark($bookFile);
                $watermark->setPosition(Watermark::POSITION_BOTTOM_RIGHT);
                $watermark->setOffset(10, 50);
                $watermark->setOpacity(.2);
                $watermark->setTiled();

                if ($watermark->withImage($watermarkImage, $destFile)) {
                    unlink($watermarkImage);

                    return $destFile;
                }

            };
        }

        throw new CHttpException(500, "Помилка при створенні файлу!");
    }

    private function createWatermark($userId)
    {
        /* Создаём объект imagickdraw */
        $draw = new ImagickDraw();

        /* Устанавливаем размер шрифта в 52 */
        $draw->setFontSize(16);

        /* Добавляем свой текст */
        $draw->annotation(0, 0, "INTITA: user-" . $userId);

        $canvas = new Imagick();
        $canvas->newImage(50, 20, "white");
        $canvas->drawImage($draw);
        $canvas->setImageFormat('png');
        $filename = sys_get_temp_dir() . "/{$userId}-watermark.png";
        if ($canvas->writeImage($filename))
            return $filename;
        else
            throw new CHttpException(500, "Помилка при створенні файлу!");

    }

    private function privateType($type)
    {
        switch ($type) {
            case 'demo_link':
            case 'logo':
                return false;
                break;
            case 'link':
                return true;
        }
    }
}
