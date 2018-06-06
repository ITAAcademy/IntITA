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
 *
 * The followings are the available model relations:
 * @property LibraryDependsBookCategory[] $libraryDependsBookCategories
 */
class Library extends CActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;
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
			array('title, description, price, language, status, author, status', 'required'),
			array('title, language', 'length', 'max'=>50),
			array('description, link, logo,author', 'length', 'max'=>256),
			array('price', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, price, language, status, link, logo, author, status', 'safe', 'on'=>'search'),
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
			'status'=>'Status',
			'link' => 'Link',
			'logo' => 'Logo',
            'author' => 'Author'
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('language',$this->language,true);
        $criteria->compare('status',$this->status,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('logo',$this->logo,true);
        $criteria->compare('author',$this->author,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public static function getLibraryList(){
        $requestParam = $_GET;
        $criteria=new CDbCriteria;
        $criteria->with = ['libraryDependsBookCategories','libraryDependsBookCategories.idCategory'];
        $criteria->join = 'left join library_depends_book_category as bc ON bc.id_book = t.id';
        if (isset($requestParam['filter']['libraryDependsBookCategories.id'])){
            $criteria->addCondition('bc.id_category='.$requestParam['filter']['libraryDependsBookCategories.id']);
            unset($requestParam['filter']['libraryDependsBookCategories.id']);
        }

        $adapter = new NgTableAdapter('Library',$requestParam);
        $adapter->mergeCriteriaWith($criteria);
        return json_encode($adapter->getData());
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Library the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getPaymentButton()
    {
        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::encryptic($liqPayPayment->private_key));
        $order_id = LiqpayPayment::cryptic('user_id='.Yii::app()->user->getId().'&library_id='.$this->id);
        $model = LibraryPayments::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId(), 'library_id'=>$this->id));
        if(!$model){
            $html = $liqpay->cnb_form(array(
                'version'=>'3',
                'action'         => 'pay',
                'amount'         => $this->price,
                'currency'       => 'UAH',
                /* перед этим мы ведь внесли заказ в  таблицу,
                $insert_id = $wpdb->query( 'insert into table_orders' );
                */
                'description'    => 'Купівля книги '.$this->title,
                'order_id'       => $order_id,
                // если пользователь возжелает вернуться на сайт
                'result_url'	=>	Config::getBaseUrl() . '/library/libraryPay/?id='.$this->id.'&order_id='.$order_id,
                /*
                    если не вернулся, то Webhook LiqPay скинет нам сюда информацию из формы,
                    в частонсти все тот же order_id, чтобы заказ
                     можно было обработать как оплаченый
                */
                'server_url'	=>	Config::getBaseUrl() . '/library/liqpayStatus/?id='.$this->id.'&order_id='.$order_id,
                'language'		=>	'uk', // uk, en
                'sandbox'=>'1' // и куда же без песочницы,
                // не на реальных же деньгах тестировать
            ));
        } else {
            $html = '<a href="/library/getBook?id='.$this->id.'">Завантажити</a>';
        }

        return $html;
    }

    public function createPayment($order_id)
    {

        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $orderParams = self::getOrderParams($order_id);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::encryptic($liqPayPayment->private_key));
        $model = LibraryPayments::model()->findByAttributes(array('user_id'=>$orderParams['user_id'], 'library_id'=>$orderParams['library_id']));
        $res = $liqpay->api("request", array(
            'action'        => 'status',
            'version'       => '3',
            'order_id'      => $order_id
        ));
        if(!$model && $res->result=='ok'){
            $model = new LibraryPayments();
            $model->library_id = $this->id;
            $model->user_id = $orderParams['user_id'];
            $model->amount = $this->price;
            $model->order_id = $res->order_id;
            $model->date = new CDbExpression('NOW()');;
            $model->status = 1;
            $model->save();
        }
    }

    public function sendTicket($order_id)
    {
        $liqPayPayment = LiqpayPayment::model()->findByPk(1);
        $orderParams = self::getOrderParams($order_id);
        $liqpay = new LiqPay($liqPayPayment->public_key, LiqpayPayment::encryptic($liqPayPayment->private_key));
        $model = LibraryPayments::model()->findByAttributes(array('user_id'=>$orderParams['user_id'], 'library_id'=>$orderParams['library_id']));
        $res = $liqpay->api("request", array(
            'action'    => 'ticket',
            'version'   => '3',
            'order_id' => $order_id,
            'email'   => $model->user->email,
            'language'		=>	'uk',
        ));
    }

    public function getOrderParams($order_id)
    {
        $url = 'https://example.com/?' . LiqpayPayment::encryptic($order_id);
        $query_str = parse_url($url, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        return $query_params;
    }

    public function uploadBookFile($id, $type){
        $model = Library::model()->findByPk($id);
        if (!file_exists(Yii::app()->basePath . "/../files/library/".$id)) {
            mkdir(Yii::app()->basePath . "/../files/library/".$id);
        }
        if (!file_exists(Yii::app()->basePath . "/../files/library/".$id."/".$type)) {
            mkdir(Yii::app()->basePath . "/../files/library/".$id."/".$type);
        }

        if(!empty($_FILES['file'])){
            $ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
            $image = uniqid().'.'.$ext;

            $file=Yii::getpathOfAlias('webroot').'/files/library/'.$id.'/'.$type.'/'.$model->$type;
            if (is_file($file))
                unlink($file);

            move_uploaded_file(
                $_FILES['file']["tmp_name"],
                Yii::getpathOfAlias('webroot').'/files/library/'.$id.'/'.$type.'/'.$image
            );
            $model->$type = $image;
            $model->save();
        }else{
            throw new \application\components\Exceptions\IntItaException(500, 'Завантажити файл не вдалося');
        }
    }
}
