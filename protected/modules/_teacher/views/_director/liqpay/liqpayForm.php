<?php
/* @var $scenario */
?>
<div class="panel-body" ng-controller="liqpayCtrl">
    <div class="row">
        <div class="formMargin">
            <div class="col-lg-8">
                <form autocomplete="off" ng-submit="sendLiqPay(liqpay);" novalidate>
                    <div class="form-group">
                        <label>Public_key</label>
                        <input class="form-control" ng-model="liqpay.public_key">
                    </div>
                    <div class="form-group">
                        <label>Private_key</label>
                        <input class="form-control" ng-model="liqpay.private_key">
                    </div>
                    <input type="hidden" ng-model="liqpay.id">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                        <a type="button" class="btn btn-default" ng-click='back()'>
                            Назад
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>