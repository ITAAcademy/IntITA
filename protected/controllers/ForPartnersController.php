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
        $answer = json_decode(file_get_contents('php://input'), true);
        $obj = new PartnerLetter;
        $obj->attributes = $answer;
        $obj->question = $answer["question"];
            $title = "Partner " . $obj->firstname . " " . $obj->lastname;
            $mess = "Ім'я: " . $obj->firstname . " " . $obj->lastname . "\r\n" . "Телефон: " . $obj->phone . "\r\n" . "Питання: " . $obj->question;
            $to = Config::getAdminEmail();
            if(mail($to, $title, $mess, "Content-type: text/plain; charset=utf-8 \r\n" . "From:" . $obj->email . "\r\n")){
                echo Yii::t('letter', '0914');
            }
            else{
                echo Yii::t('letter', '0915');
            }
            $directors = Teacher::requestDirectorsArray();
            foreach($directors as $director){
                $email = $director->email;
                if(isset($email)){
                    mail($email, $title, $mess, "Content-type: text/plain; charset=utf-8 \r\n" . "From:" . $obj->email . "\r\n");
                }
            }
    }
}