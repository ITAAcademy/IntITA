<?php
/* @var $this TestsController */
/* @var $model Tests */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TestID'); ?>
		<?php echo $form->textField($model,'TestID'); ?>
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
		<?php echo $form->label($model,'TestName'); ?>
		<?php echo $form->textField($model,'TestName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TestDescription'); ?>
		<?php echo $form->textField($model,'TestDescription',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TestURL'); ?>
		<?php echo $form->textField($model,'TestURL',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->