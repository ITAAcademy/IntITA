<?php

trait WithGetSchemaCalculator {

    /**
     * @param EducationForm $educationForm
     * @param $service
     * @return IPaymentCalculator
     */
    public function getSchemaCalculator(EducationForm $educationForm, $service='course') {
        $schemes= array();

        $param = Yii::app()->session["lg"]?"title_".Yii::app()->session["lg"]:"title_ua";
        foreach ($this->schemes as $scheme){
            $schema = new AdvancePaymentSchema($scheme->discount, $scheme->loan, $scheme->pay_count, $educationForm, $scheme->id, $scheme->schemeName->$param, $scheme->contract, $scheme->template->duration, $scheme->template->start_date);
            array_push($schemes,$schema);
        }

        return $schemes;
    }

    public function getActualAdvancePaymentSchemaCalculator($courseId,EducationForm $educationForm) {
        $serviceModel = CourseService::model()->getService($courseId, $educationForm);
        $schemas = PaymentScheme::model()->getPaymentScheme(null, $serviceModel);
        $scheme=TemplateSchemes::model()->findByAttributes(array('id_template'=>$schemas->id_template,'pay_count'=>1));
        $actualAdvancePaymentSchema = new AdvancePaymentSchema($scheme->discount, $scheme->loan, $scheme->pay_count, $educationForm, $scheme->id,$scheme->schemeName->title_ua, $scheme->contract, $scheme->template->duration, $scheme->template->start_date);

        return $actualAdvancePaymentSchema;
    }

    public function checkDateConflict($offer=null){
        $criteria = new CDbCriteria;
        $criteria->alias='ps';
        $startDate=$this->startDate?$this->startDate:'NOW()';
        $criteria->condition='ps.id_organization=:organization';
        $criteria->addCondition('ps.startDate <= :endDate AND ps.endDate >= :startDate');
        $criteria->params = array(':startDate' => $startDate, ':endDate' => $this->endDate, ':organization' => $this->id_organization);
        if($offer){
            $criteria->addCondition('ps.id != ' . $offer->id);
        }
        $criteria->addInCondition('ps.userId',array($this->userId),'AND');
        $criteria->addInCondition('ps.serviceId',array($this->serviceId),'AND');
        $criteria->addInCondition('ps.serviceType',array($this->serviceType),'AND');
        $criteria->limit=1;

        return !PaymentScheme::model()->find($criteria);
    }
}