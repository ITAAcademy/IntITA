<div ng-controller="vacationCtrl"  class="row">
    <?php $this->renderPartial('/vacation/_form');?>
    <?php $this->renderPartial('/vacation/_list',['vacationType' => $vacationType]);?>
</div>