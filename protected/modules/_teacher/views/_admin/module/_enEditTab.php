<?php
/* @var $model Module
 * @var $scenario string
 */
?>
<br>
<div class="formMargin">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'title_en'); ?>
        <?php echo $form->textField($model, 'title_en', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title_en'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Зберегти',
            array(
                'class' => 'btn btn-primary',
                'id' => 'submitButton',
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$model->isNewRecord ? Yii::app()->createUrl('/_teacher/_admin/module/create'):
                        Yii::app()->createUrl('/_teacher/_admin/module/update', array('id' => $model->module_ID)) ,
                    'success'=>'function(data) {bootbox.alert(data);}',
                )
            )); ?>
    </div>
</div>
