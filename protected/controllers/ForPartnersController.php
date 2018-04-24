<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 3/30/2018
 * Time: 1:19 PM
 */
class ForPartnersController extends Controller
{
    public function actionIndex(){
        $this->render('index',array());
    }
    public function actionPartnerLetter(){
        $obj = new PartnerLetter;
        $obj->firstname=Yii::app()->request->getPost('firstname');
        $obj->lastname=Yii::app()->request->getPost('lastname');
        $obj->phone=Yii::app()->request->getPost('phone');
        $obj->question=Yii::app()->request->getPost('question');
        $obj->email=Yii::app()->request->getPost('email');
        if ($obj->validate()){
            $title = "Partner" . $obj->firstname . " " . $obj->lastname;
            $mess = "Ім'я: " . $obj->firstname . " " . $obj->lastname . "\r\n" . "Телефон: " . $obj->phone . "\r\n" . "Питання: " . $obj->question;
            $to = Config::getAdminEmail();
            mail($to, $title, $mess, "Content-type: text/plain; charset=utf-8 \r\n" . "From:" . $obj->email . "\r\n");
            $directors = Teacher::requestDirectorsArray();
            foreach($directors as $director){
                $email = $director->email;
                if(isset($email)){
                    mail($email, $title, $mess, "Content-type: text/plain; charset=utf-8 \r\n" . "From:" . $obj->email . "\r\n");
                }
            }
            echo Yii::t('letter', '0914');
        } else {
            echo Yii::t('letter', '0915');
        }
    }
}