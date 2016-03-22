<?php
/**
 * @var $model Course
 * @var $levels array
 * @var $level Level
 * @var $scenario string
 */
?>
<br>
<div class="formMargin">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'language', array('for' => 'language')); ?>
        <?php echo $form->dropDownList($model, 'language', array(
            'ua' => 'Українська', 'en' => 'English', 'ru' => 'Русский'),
            array('options' => array('ua' => array('selected' => true)), 'empty' => 'Виберіть мову', 'class' => 'form-control', 'style' => 'width:350px')); ?>
        <?php echo $form->error($model, 'language'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'alias'); ?>
        <?php echo $form->textField($model, 'alias', array('size' => 45, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'alias'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'course_number'); ?>
        <?php echo $form->textField($model, 'course_number', array('size' => 45, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'course_number'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'level'); ?>
        <?php echo $form->dropDownList($model, 'level', CHtml::listData(Level::model()->findAll(), 'id', 'title_ua'),
            array('options' => array('1' => array('selected' => true)), 'empty' => 'Виберіть рівень', 'class' => 'form-control', 'style' => 'width:350px')); ?>
        <?php echo $form->error($model, 'level'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'start'); ?>
        <?php echo $form->textField($model, 'start', array('placeholder' => Yii::t('coursemanage', '0395'),
            'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'start'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array(
            '0' => Yii::t('coursemanage', '0396'), '1' => Yii::t('coursemanage', '0397')),
            array('options' => array('0' => array('selected' => true)), 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('coursemanage', '0398') : Yii::t('coursemanage', '0399'),
            array(
                'class' => 'btn btn-primary',
                'id' => 'submitButton',
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>$model->isNewRecord ? Yii::app()->createUrl('/_teacher/_admin/coursemanage/create'):
                        Yii::app()->createUrl('/_teacher/_admin/coursemanage/update', array('id' => $model->course_ID)) ,
                    'success'=>'function(data) {bootbox.alert(data);}',
                )
            )); ?>
    </div>
</div>

