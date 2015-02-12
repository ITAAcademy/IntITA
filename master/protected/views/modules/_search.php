<?php
/* @var $this ModulesController */
/* @var $model Modules */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ModuleID'); ?>
		<?php echo $form->textField($model,'ModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModuleName'); ?>
		<?php echo $form->textField($model,'ModuleName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModuleDurationHours'); ?>
		<?php echo $form->textField($model,'ModuleDurationHours'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModuleDurationDays'); ?>
		<?php echo $form->textField($model,'ModuleDurationDays'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->