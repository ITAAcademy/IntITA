<?php
/**
 * Created by PhpStorm.
 * User: Ivanna
 * Date: 22.10.2015
 * Time: 14:35
 */

class AdvancePaymentSchema implements IPaymentCalculator{

    use GracefulDivision;
    public $id;
    public $payCount;
    public $discount;
    private $educForm;
    public $name;
    public $loanValue;
    public $contract;
    public $duration;
    public $start_date;

    function __construct($discount, $loan, $payCount, $educForm, $id, $name, $contract, $duration, $start_date){
        $this->id = $id;
        $this->discount = min($discount, 100);
        $this->loanValue = $loan;
        $this->payCount = $payCount;
        $this->educForm = $educForm;
        $this->name = $name;
        $this->contract = $contract;
        $this->duration = $duration;
        $this->start_date = $start_date;
    }

    public function getSumma(IBillableObject $payObject){
        $basePrice = $payObject->getBasePrice() * $this->educForm->getCoefficient();
        $coeff =  pow((1 + $this->loanValue/100), $this->payCount/12);
        return round($basePrice * (1 - $this->discount/100)*$coeff, 2);
    }

    public function getCloseDate(IBillableObject $payObject,  DateTime $startDate){
        $interval = new DateInterval('P'.$this->getDuration($startDate).'D');
        $closeDate = $startDate->add($interval);
        return $closeDate;
    }
    //month
    public function getDuration(DateTime $startDate){
        $endDate = clone $startDate;
        if($this->payCount>12){
            $endDate->modify('+'.$this->payCount.' month');
            $interval = date_diff($startDate, $endDate);
            return $interval->days;
        } else {
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
            if(isset($arrayInvoiceSumma[$i])){
                array_push($invoicesList, Invoice::createInvoice($arrayInvoiceSumma[$i], $currentTimeInterval));
                $currentTimeInterval = $currentTimeInterval->modify(' +'.$timeInterval.' day');
            }
        }
        return $invoicesList;
    }

    /**
     * Returns discount, payments count
     * @return mixed
     */
    public function getPaymentProperties() {
        return [
            'discount' => $this->discount,
            'loan' => $this->loanValue,
            'paymentsCount' => $this->payCount,
            'type'=>PaymentScheme::getPaymentType($this->payCount),
            'ico'=>PaymentScheme::getPaymentIco($this->payCount, false),
            'icoCheck'=>PaymentScheme::getPaymentIco($this->payCount, true),
            'translates' => [
                'title' => $this->name,
                'currencySymbol' => Yii::t('courses', '0322'),
                'discount' => Yii::t('courses', '0144'),
                'payment' => Yii::t('course', '0323'),
                'month' => Yii::t('payments', '0865')
            ]
        ];
    }
}