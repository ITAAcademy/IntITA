<?php
/* @var $this VideosController */
/* @var $model Videos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'videos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fkModuleID'); ?>
		<?php echo $form->dropDownList($model,'fkModuleID', Modules::listAll());?>
		<?php echo $form->error($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkLectureID'); ?>
		<?php echo $form->dropDownList($model,'fkLectureID', Lectures::listAll()); ?>
		<?php echo $form->error($model,'fkLectureID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VideoName'); ?>
		<?php echo $form->textField($model,'VideoName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'VideoName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VideoDescription'); ?>
		<?php echo $form->textField($model,'VideoDescription',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'VideoDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VideoURL'); ?>
		<?php echo $form->textField($model,'VideoURL',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'VideoURL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VideoDurationSeconds'); ?>
		<?php echo $form->textField($model,'VideoDurationSeconds'); ?>
		<?php echo $form->error($model,'VideoDurationSeconds'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->