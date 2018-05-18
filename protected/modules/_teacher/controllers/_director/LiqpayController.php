<?php

class LiqpayController extends TeacherCabinetController {
    public function hasRole() {
        return Yii::app()->user->model->isDirector() || Yii::app()->user->model->isAuditor();
    }

    public function actionIndex($id = 0) {
        $model = LiqpayPayment::model()->findByPk(1);
        if(!$model) $model = new LiqpayPayment();
        $this->renderPartial('/_director/liqpay/liqpayForm', array('model'=>$model), false, true);
    }

    public function actionCreateLiqPay() {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $params = array_filter($_POST);
            if(!isset($params['id'])){
                $liqpay = new LiqpayPayment();
            }else{
                $liqpay = LiqpayPayment::model()->findByPk(1);
            }

            $params['private_key'] = LiqpayPayment::cryptic($params['private_key']);
            $liqpay->setAttributes($params);
            $liqpay->save();

            if (count($liqpay->getErrors())) {
                throw new Exception(json_encode($liqpay->getErrors()));
            }

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionGetLiqPay() {
        $result = array();
        $result['data'] = LiqpayPayment::model()->findByPk(1);
        if($result['data']){
            $result['data']['private_key'] = LiqpayPayment::encryptic($result['data']['private_key']);
        }

        echo CJSON::encode($result);
    }
}