<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * use session instead of cookie for CSRF Token
 *
 * @author 0leh Rostov
 */

class HttpRequest extends CHttpRequest  {

    public $noCsrfValidationRoutes = array();

    protected function normalizeRequest()
    {
        parent::normalizeRequest();
        $route = Yii::app()->getUrlManager()->parseUrl($this);
        if($this->enableCsrfValidation && false!==array_search($route, $this->noCsrfValidationRoutes))
            Yii::app()->detachEventHandler('onBeginRequest',array($this,'validateCsrfToken'));

    }

}