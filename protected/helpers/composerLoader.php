<?php
 /**
  * Created by PhpStorm.
  * User: unadm
  * Date: 08.05.18
  * Time: 21:22
  */

 trait composerLoader
  {
     public function loadComposerClasses(){
      $path =Yii::app()->basePath;
      spl_autoload_unregister(array('YiiBase','autoload'));
      require $path.'/vendor/autoload.php';
      spl_autoload_register(array('YiiBase','autoload'));
     }
  }