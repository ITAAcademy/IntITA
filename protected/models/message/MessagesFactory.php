<?php

class MessagesFactory
{
    public static function getInstance(Messages $model){
        switch($model->type){
            case MessagesType::USER:
                return UserMessages::model()->findByPk($model->id);
            case MessagesType::PAYMENT:
                return MessagesPayment::model()->findByPk($model->id);
//            case MessagesType::AUTHOR_REQUEST:
//                return MessagesAuthorRequest::model()->findByPk($model->id);
//            case MessagesType::TEACHER_CONSULTANT_REQUEST:
//                return MessagesTeacherConsultantRequest::model()->findByPk($model->id);
            default:
                return null;
        }
    }
}