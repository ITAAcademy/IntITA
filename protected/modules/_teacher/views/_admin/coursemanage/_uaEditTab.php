<?php
/* @var $model Course
 * @var $scenario string
 */
?>
<br>
<div class="formMargin">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'title_ua'); ?>
        <?php echo $form->textField($model, 'title_ua', array('size' => 45, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title_ua'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'for_whom_ua'); ?>
        <?php echo $form->textArea($model, 'for_whom_ua', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'for_whom_ua'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'what_you_learn_ua'); ?>
        <?php echo $form->textArea($model, 'what_you_learn_ua', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'what_you_learn_ua'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'what_you_get_ua'); ?>
        <?php echo $form->textArea($model, 'what_you_get_ua', array('placeholder' => Yii::t('coursemanage', '0417'), 'rows' => 6,
            'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'what_you_get_ua'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('coursemanage', '0398') : Yii::t('coursemanage', '0399'),
            array(
                'class' => 'btn btn-primary',
                'id' => 'submitButton',
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$model->isNewRecord ? Yii::app()->createUrl('/_teacher/_admin/coursemanage/create'):
                        Yii::app()->createUrl('/_teacher/_admin/coursemanage/update') ,
                    'success'=>'function(data) {bootbox.alert(data);}',
                )
            )); ?>
    </div>
</div>
