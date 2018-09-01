<?php
 /**
  * Created by PhpStorm.
  * User: unadm
  * Date: 28.08.18
  * Time: 23:04
  */

 interface IRequest
  {
   public function approve();
   public function cancel();
   public function subject();
   public function title();
  }