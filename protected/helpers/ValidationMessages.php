<?php

class ValidationMessages {

    /**
     * @param CActiveRecord  $model
     * @return string
     */
    public static function getValidationErrors($model) {
        $errors = [];
        foreach ($model->getErrors() as $key => $attribute) {
            foreach ($attribute as $error) {
                array_push($errors, $error);
            }
        }

        return implode(", ", $errors);
    }
}