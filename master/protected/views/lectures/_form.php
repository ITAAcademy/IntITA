<?php
/* @var $this LecturesController */
/* @var $model Lectures */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lectures-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fkCourseID'); ?>
		<?php echo $form->textField($model,'fkCourseID'); ?>
		<?php echo $form->error($model,'fkCourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkModuleID'); ?>
		<?php echo $form->textField($model,'fkModuleID'); ?>
		<?php echo $form->error($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NameClasses'); ?>
		<?php echo $form->textField($model,'NameClasses',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'NameClasses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GoalOfClasses'); ?>
		<?php echo $form->textField($model,'GoalOfClasses',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'GoalOfClasses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TotalNumberOfItems'); ?>
		<?php echo $form->textField($model,'TotalNumberOfItems'); ?>
		<?php echo $form->error($model,'TotalNumberOfItems'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Duration'); ?>
		<?php echo $form->textField($model,'Duration'); ?>
		<?php echo $form->error($model,'Duration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->