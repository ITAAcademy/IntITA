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
            var_dump('1111');
            var_dump($route);
            var_dump('2222');
            var_dump($this->noCsrfValidationRoutes);
            var_dump('3333');
            var_dump(in_array($route, $this->noCsrfValidationRoutes));
            var_dump('44444');
            var_dump(array_search($route, $this->noCsrfValidationRoutes));
            var_dump('5555');
            var_dump(false!==array_search($route, $this->noCsrfValidationRoutes));
            var_dump('6666');die;
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