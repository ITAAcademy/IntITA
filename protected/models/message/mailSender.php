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

   private $senderAttr;

   private function loadSender()
    {
     $this->loadComposerClasses();
     $this->senderAttr = new \PHPMailer\PHPMailer\PHPMailer();
    }

   private function configureSender(){
    $this->senderAttr->isSMTP();
    $this->senderAttr->XMailer = " ";
    $this->senderAttr->Host =Yii::app()->params['mailParams']['smtpHost'];
    $this->senderAttr->Port =Yii::app()->params['mailParams']['smtpPort'];
    if(Yii::app()->params['mailParams']['smtpDebug']){
     $this->senderAttr->SMTPDebug=Yii::app()->params['mailParams']['smtpDebug'];
    }
    if(Yii::app()->params['mailParams']['smtpAuth']){
     $this->senderAttr->Username =Yii::app()->params['mailParams']['smtpUsername'];
     $this->senderAttr->Password =Yii::app()->params['mailParams']['smtpPassword'];
     $this->senderAttr->SMTPSecure =Yii::app()->params['mailParams']['smtpProtocol'];
    }


   }

   public function sendmail($from, $fromName = "IntITA", $to, $subject, $message)
    {
     $this->loadSender();
     $this->configureSender();
     $this->senderAttr->setFrom($from, mb_encode_mimeheader($fromName,'utf-8'));
     $this->senderAttr->addReplyTo($from);
     $this->senderAttr->addAddress($to);
     $this->senderAttr->SMTPAutoTLS = false;
     $this->senderAttr->isHTML(true);
     $this->senderAttr->Subject = mb_encode_mimeheader($subject,'utf-8');
     $this->senderAttr->Body = $message;
     try
      {
       $this->senderAttr->send();
       return true;
      } catch (Exception $e)
      {
       return false;
      }
    }
  }
