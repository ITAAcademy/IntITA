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

   private $emailSender;

   private function loadSender()
    {
     $this->loadComposerClasses();
     $this->emailSender = new \PHPMailer\PHPMailer\PHPMailer();
    }

   private function configureSender(){
    $this->emailSender->isSMTP();
    $this->emailSender->Host =Yii::app()->params['mailParams']['smtpHost'];
    $this->emailSender->Port =Yii::app()->params['mailParams']['smtpPort'];
    if(Yii::app()->params['mailParams']['smtpDebug']){
     $this->emailSender->SMTPDebug=Yii::app()->params['mailParams']['smtpDebug'];
    }
    if(Yii::app()->params['mailParams']['smtpAuth']){
     $this->emailSender->Username =Yii::app()->params['mailParams']['smtpUsername'];
     $this->emailSender->Password =Yii::app()->params['mailParams']['smtpPassword'];
     $this->emailSender->SMTPSecure =Yii::app()->params['mailParams']['smtpProtocol'];
    }


   }

   public function sendmail($from=null, $fromName = null, $to, $subject, $message)
    {
     $this->loadSender();
     $this->configureSender();
     $senderEmail = (is_null($from)?Config::getNotifyEmail():$from);
     $senderName = (is_null($fromName)?'IntITA':$fromName);
     $this->emailSender->setFrom($senderEmail,$senderName);
     $this->emailSender->addReplyTo($senderEmail);
     $this->emailSender->addAddress($to);
     $this->emailSender->SMTPAutoTLS = false;
     $this->emailSender->isHTML(true);
     $this->emailSender->Subject = mb_encode_mimeheader($subject,'utf-8');
     $this->emailSender->Body = $message;
     try
      {
       $this->emailSender->send();
       return true;
      } catch (Exception $e)
      {
       return false;
      }
    }
  }