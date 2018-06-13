<?php

class MailTransport implements IMailSender{

    use mailSender;
    public $viewPath = 'application.views.mail';
    private $template = '';


  public function send($mailto, $nameFrom, $subject, $text)
    {

        if ($this->template != '') {
            $text = $this->template;
        }
        $this->viewPath = ($dir = Yii::getPathOfAlias($this->viewPath)) ? $dir : Yii::app()->viewPath . DIRECTORY_SEPARATOR . 'mail';
        $message = Yii::app()->controller->renderFile($this->viewPath . DIRECTORY_SEPARATOR . 'mailLayout.php', array(
            'content' => $text,
            'userEmail' => $mailto
        ), true);
        $message = $message . "\n";
        return $this->sendmail(Config::getNotifyEmail(),$nameFrom,$mailto,$subject,$message);
    }

    public function renderBodyTemplate($template, $params){
        $this->viewPath = ($dir = Yii::getPathOfAlias($this->viewPath)) ? $dir : Yii::app()->viewPath . DIRECTORY_SEPARATOR . 'mail';
        $this->template = Yii::app()->controller->renderFile($this->viewPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $template . '.php', array(
            'params' => $params,
        ), true);
    }

    public function template(){
        return $this->template;
    }
}