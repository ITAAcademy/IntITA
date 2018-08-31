<?php

class MessagesFactory
{
    public static function getInstance(Messages $model){
        switch($model->type) {
            case MessagesType::USER:
                return UserMessages::model()->findByPk($model->id);
            case MessagesType::PAYMENT:
                return PaymentRequest::model()->findByPk($model->id);
            case MessagesType::APPROVE_REVISION:
                return MessagesNotifications::model()->findByPk($model->id);
//            case MessagesType::SERVICE_SCHEMES_REQUEST:
//                return MessagesServiceSchemesRequest::model()->findByPk($model->id);
        }
        return null;
    }
}