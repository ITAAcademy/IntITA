<?php

class Step {
    public $stepImage;
    public $stepTitle;
    public $stepText;
    public $stepNumber;
    public $stepName;

    function Step ($image,$title,$text,$number,$name)
    {
        $this->stepImage=$image;
        $this->stepTitle=$title;
        $this->stepText=$text;
        $this->stepNumber=$number;
        $this->stepName=$name;
    }
} 