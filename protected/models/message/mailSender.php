<?php
 /**
  * Created by PhpStorm.
  * User: unadm
  * Date: 08.05.18
  * Time: 21:24
  */

 trait mailSender
  {
   use composerLoader;

   private $sender;

   private function loadSender()
    {
     $this->loadComposerClasses();
     $this->sender = new \PHPMailer\PHPMailer\PHPMailer();
    }

   private function configureSender(){
    $this->sender->isSMTP();
    $this->sender->Host =Yii::app()->params['mailParams']['smtpHost'];
    $this->sender->Port =Yii::app()->params['mailParams']['smtpPort'];
    if(Yii::app()->params['mailParams']['smtpDebug']){
     $this->sender->SMTPDebug=Yii::app()->params['mailParams']['smtpDebug'];
    }
    if(Yii::app()->params['mailParams']['smtpAuth']){
     $this->sender->Username =Yii::app()->params['mailParams']['smtpUsername'];
     $this->sender->Password =Yii::app()->params['mailParams']['smtpPassword'];
     $this->sender->SMTPSecure =Yii::app()->params['mailParams']['smtpProtocol'];
    }


   }

   public function sendmail($from=null, $fromName = null, $to, $subject, $message)
    {
     $this->loadSender();
     $this->configureSender();
     $senderEmail = (is_null($from)?Config::getNotifyEmail():$from);
     $senderName = (is_null($fromName)?'IntITA':$fromName);
     $this->sender->setFrom($senderEmail,$senderName);
     $this->sender->addReplyTo($senderEmail);
     $this->sender->addAddress($to);
     $this->sender->SMTPAutoTLS = false;
     $this->sender->isHTML(true);
     $this->sender->Subject = mb_encode_mimeheader($subject,'utf-8');
     $this->sender->Body = $message;
     try
      {
       $this->sender->send();
       return true;
      } catch (Exception $e)
      {
       return false;
      }
    }
  }