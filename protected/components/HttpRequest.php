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
    private $_csrfToken;
    public $noCsrfValidationRoutes = array();

    public function getCsrfToken()
    {
        if($this->_csrfToken===null)
        {
            $session = Yii::app()->session;
            $csrfToken=$session->itemAt($this->csrfTokenName);
            if($csrfToken===null)
            {
                $csrfToken = sha1(uniqid(mt_rand(),true));
                $session->add($this->csrfTokenName, $csrfToken);
            }
            $this->_csrfToken = $csrfToken;
        }
        return $this->_csrfToken;
    }

    public function validateCsrfToken($event)
    {
        if($this->getIsPostRequest())
        {
            $isTokenInRequest = Yii::app()->request->csrfTokenName === $this->csrfTokenName;
            // only validate POST requests
            $session=Yii::app()->session;

            $route = Yii::app()->getUrlManager()->parseUrl($this);
            if(($session->contains($this->csrfTokenName) && $isTokenInRequest) || in_array($route, $this->noCsrfValidationRoutes))
            {
                $tokenFromSession=$session->itemAt($this->csrfTokenName);
                $tokenFromRequest=Yii::app()->request->getCsrfToken();
                $valid=$tokenFromSession===$tokenFromRequest;
            }
            else
                $valid=false;
            if(!$valid)
                throw new CHttpException(400,Yii::t('yii','The CSRF token could not be verified.'));
        }
    }
}