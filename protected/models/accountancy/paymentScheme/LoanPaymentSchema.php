<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 22.10.2015
 * Time: 14:39
 */

class LoanPaymentSchema implements IPaymentCalculator{

    public $id;
    private $loanValue;
    private $payCount;
    private $educForm;
    private $name;
    private $duration;
    private $start_date;

    function __construct($loan, $payCount, $educForm, $id, $name, $duration, $start_date){
        $this->id = $id;
        $this->loanValue = $loan;
        $this->payCount = $payCount;
        $this->educForm = $educForm;
        $this->name = $name;
        $this->duration = $duration;
        $this->start_date = $start_date;
     }

    public function getSumma(IBillableObject $payObject){
        $basePrice = $payObject->getBasePrice() * $this->educForm->getCoefficient();
        $coeff =  pow((1 + $this->loanValue/100), $this->payCount/12);
        return round($basePrice * $coeff, 2);
    }

    public function getCloseDate(IBillableObject $payObject, DateTime $startDate){
        $interval = new DateInterval('P'.$this->getDuration($startDate).'D');
        $closeDate = $startDate->add($interval);
        return $closeDate;
    }

    public function getDuration(DateTime $startDate){
        $endDate = clone $startDate;
        if($this->payCount>12){
            return $this->payCount;
        }else{
            $endDate->modify('+'.$this->duration.' month');
            $interval = date_diff($startDate, $endDate);
            return $interval->days;
        }
    }
    
    public function getInvoicesList(IBillableObject $payObject,  DateTime $startDate){
        $invoicesList = [];
        $currentTimeInterval = $startDate;
        $timeInterval = ceil($this->getDuration($startDate)/ $this->payCount); //days
        $arrayInvoiceSumma = GracefulDivision::getArrayInvoiceSumma($this->getSumma($payObject),
            $this->payCount);

        for($i = 0; $i < $this->payCount; $i++){
            array_push($invoicesList, Invoice::createInvoice($arrayInvoiceSumma[$i], $currentTimeInterval));
            $currentTimeInterval = $currentTimeInterval->modify(' +'.$timeInterval.' day');
        }

        return $invoicesList;
    }

    public function yearsCount(){
        return $this->payCount / 12;
    }

    /**
     * Returns discount, payments count
     * @return mixed
     */
    public function getPaymentProperties() {
        return [
            'paymentsCount' => $this->payCount,
            'type'=>PaymentScheme::getPaymentType($this->payCount),
            'ico'=>PaymentScheme::getPaymentIco($this->payCount, false),
            'icoCheck'=>PaymentScheme::getPaymentIco($this->payCount, true),
            'translates' => [
                'title' => Yii::t('course', '0425') . ' ' . $this->yearsCount() . ' ' . CommonHelper::getYearsTermination($this->yearsCount()),
                'currencySymbol' => Yii::t('courses', '0322'),
                'payment' => Yii::t('course', '0324'),
                'month' => Yii::t('payments', '0865')
            ]

        ];
    }
}