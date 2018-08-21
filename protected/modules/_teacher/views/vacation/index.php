<div ng-controller="vacationCtrl"  class="row" data-selected-vacation="<?php echo $vacationType->id ?>" id="vacationIndex">
    <?php $this->renderPartial('/vacation/_form', ['vacationType' => $vacationType]);?>
    <?php $this->renderPartial('/vacation/_list', ['vacationType' => $vacationType]);?>
</div>