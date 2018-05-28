<?php
include (Yii::app()->basePath . '/extensions/liqPay/LiqPay.php');
/**
 * This is the model class for table "liqpay".
 *
 * The followings are the available columns in table 'liqpay':
 * @property string $public_key
 * @property string $private_key
 * @property string $key
 */
class LiqpayPayment extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'liqpay';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('public_key, private_key', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('public_key, private_key', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'public_key' => 'Public Key',
            'private_key' => 'Private Key',
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

        $criteria->compare('public_key', $this->public_key, true);
        $criteria->compare('private_key', $this->private_key, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LiqpayPayment the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    static function cryptic($data)
    {
//        $key = self::model()->findByPk(1)->key;
        $key = 'adisabeba';
        return self::strToHex(self::__encode($data, $key));
    }

    static function encryptic($data)
    {
//        $key = self::model()->findByPk(1)->key;
        $key = 'adisabeba';
        return self::__decode(self::hexToStr($data), $key);
    }

    static function __encode($text, $key)
    {
        $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
        if (mcrypt_generic_init ($td, $key, $iv) != -1)
        {
            $enc_text=base64_encode(mcrypt_generic ($td,$iv.$text));
            mcrypt_generic_deinit ($td);
            mcrypt_module_close ($td);
            return $enc_text;
        }
    }

    static function strToHex($string)
    {
        $hex='';
        for ($i=0; $i < strlen($string); $i++)
        {
            $hex .= dechex(ord($string[$i]));
        }

        return $hex;
    }

    static function __decode($text, $key)
    {
        $td = mcrypt_module_open ("tripledes", '', 'cfb', '');
        $iv_size = mcrypt_enc_get_iv_size ($td);
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
        if (mcrypt_generic_init ($td, $key, $iv) != -1) {
            $decode_text = substr(mdecrypt_generic ($td, base64_decode($text)),$iv_size);
            mcrypt_generic_deinit ($td);
            mcrypt_module_close ($td);
            return $decode_text;
        }
    }

    static function hexToStr($hex)
    {
        $string='';
        for ($i=0; $i < strlen($hex)-1; $i+=2)
        {
            $string .= chr(hexdec($hex[$i].$hex[$i+1]));
        }
        return $string;
    }
}
