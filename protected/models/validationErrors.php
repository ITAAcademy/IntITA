<?php

/**
 * Trait validationErrors
 */
trait validationErrors {

    public function getValidationErrors()
    {
        $errors = [];
        foreach ($this->getErrors() as $key => $attribute) {
            foreach ($attribute as $error) {
                array_push($errors, $error);
            }
        }
        return implode(", ", $errors);
    }
}