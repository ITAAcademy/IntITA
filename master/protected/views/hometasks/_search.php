<?php
/* @var $this HometasksController */
/* @var $model Hometasks */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'HomeTaskID'); ?>
		<?php echo $form->textField($model,'HomeTaskID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkModuleID'); ?>
		<?php echo $form->textField($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkLectureID'); ?>
		<?php echo $form->textField($model,'fkLectureID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HomeTaskName'); ?>
		<?php echo $form->textField($model,'HomeTaskName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HomeTaskDescription'); ?>
		<?php echo $form->textField($model,'HomeTaskDescription',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HomeTask'); ?>
		<?php echo $form->textField($model,'HomeTask',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->