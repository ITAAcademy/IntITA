<div class="row" data-selected-vacation="<?php echo $vacationType->id ?>" id="vacationIndex">
    <?php $this->renderPartial('/vacation/_form', ['vacationType' => $vacationType, 'isAccountant' => $isAccountant]);?>
</div>