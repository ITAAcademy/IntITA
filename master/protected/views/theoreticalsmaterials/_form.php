<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $model Theoreticalsmaterials */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'theoreticalsmaterials-form',
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
		<?php echo $form->dropDownList($model,'fkModuleID', Modules::listAll()); ?>
		<?php echo $form->error($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkLectureID'); ?>
		<?php echo $form->dropDownList($model,'fkLectureID', Lectures::listAll());  ?>
		<?php echo $form->error($model,'fkLectureID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TMName'); ?>
		<?php echo $form->textField($model,'TMName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TMName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TMDescription'); ?>
		<?php echo $form->textField($model,'TMDescription',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TMDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TM'); ?>
		<?php echo $form->textField($model,'TM',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'TM'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->