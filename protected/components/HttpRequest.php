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

class HttpRequest extends CHttpRequest {
	private $_csrfToken;

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
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			var_dump($this->getCsrfToken());die;
		}
	    if($this->getIsPostRequest())
	    {
	        // only validate POST requests
	        $session=Yii::app()->session;
	        if($session->contains($this->csrfTokenName) && isset($_POST[$this->csrfTokenName]))
	        {
	            $tokenFromSession=$session->itemAt($this->csrfTokenName);
	            $tokenFromPost=$_POST[$this->csrfTokenName];
	            $valid=$tokenFromSession===$tokenFromPost;
	        }
	        else
	            $valid=false;
	        if(!$valid)
	            throw new CHttpException(400,Yii::t('yii','The CSRF token could not be verified.'));
	    }
	}

}