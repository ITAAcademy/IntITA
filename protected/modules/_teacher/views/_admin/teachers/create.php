<?php
/* @var $model Teacher */
?>
<div class="col-md-8">
    <ul class="list-inline">
    <li>
        <button type="button" class="btn btn-primary"
                onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/teachers/index'); ?>',
                    'Співробітники')">Співробітники</button>
    </li>
    </ul>
<?php $this->renderPartial('_form', array('model' => $model, 'scenario' => 'create')); ?>
</div>