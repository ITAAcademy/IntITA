<?php
namespace application\components\Exceptions;
use UAParser\Exception\FileNotFoundException;

/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 23.10.2015
 * Time: 14:56
 */

class IntItaException extends \Exception {

    protected $view = '/site/error';
    public $statusCode;

    public function __construct($code=500,$message=null)
    {
        $this->statusCode=$code;

        parent::__construct($message,$code);
    }



}