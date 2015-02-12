<?php
/* @var $this TestsController */
/* @var $model Tests */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tests-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'fkModuleID'); ?>
		<?php echo $form->textField($model,'fkModuleID'); ?>
		<?php echo $form->error($model,'fkModuleID'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'fkModuleID'); ?>
		<?php echo $form->dropDownList($model,'fkModuleID', Modules::listAll()); ?>
		<?php echo $form->error($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkLectureID'); ?>
		<?php echo $form->dropDownList($model,'fkLectureID', Lectures::listAll()); ?>
		<?php echo $form->error($model,'fkLectureID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TestName'); ?>
		<?php echo $form->textField($model,'TestName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TestName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TestDescription'); ?>
		<?php echo $form->textField($model,'TestDescription',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TestDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TestURL'); ?>
		<?php echo $form->textField($model,'TestURL',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TestURL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->