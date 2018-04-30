<?php
/**
 * @property string $firstname
 * @property string $lastname
 * @property string $phone
 * @property string $email
 * @property string $question
 */

class PartnerLetter extends CFormModel
{
    public $firstname, $lastname, $phone, $email, $question;
    public function rules()
    {
        return array(
            array('firstname, phone, email','required','message'=>Yii::t('error','0268')),
            array('firstname, lastname', 'length', 'max'=>35),
            array('phone', 'match','pattern'=>'/^[0-9\+\-\(\)\s]+$/u', 'message'=>Yii::t('error','0429')),
            array('firstname, lastname', 'match', 'pattern'=>'/^[a-zа-яіїёєЄA-ZА-ЯІЇЁ\s\'’]+$/u','message'=>Yii::t('error','0429')),
            array('email','email', 'message'=>Yii::t('error','0271')),
            array('email','length','max'=>50)
        );
    }
    public function attributeLabels()
    {
        return array(
            'firstname' => Yii::t('teachers', '0174'),
            'lastname' => Yii::t('teachers', '0175'),
            'phone' => Yii::t('teachers', '0178'),
            'email' => Yii::t('teachers', '0418'),
            'question' => Yii::t('teachers', '0179')
        );
    }
    public function sendmail()
    {

    }
}


?>