<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $model Theoreticalsmaterials */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TMID'); ?>
		<?php echo $form->textField($model,'TMID'); ?>
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
		<?php echo $form->label($model,'TMName'); ?>
		<?php echo $form->textField($model,'TMName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TMDescription'); ?>
		<?php echo $form->textField($model,'TMDescription',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TM'); ?>
		<?php echo $form->textField($model,'TM',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->