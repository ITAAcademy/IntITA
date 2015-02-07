<?php
/* @var $this VideoFilesController */
/* @var $model VideoFiles */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'VideoID'); ?>
		<?php echo $form->textField($model,'VideoID'); ?>
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
		<?php echo $form->label($model,'VideoName'); ?>
		<?php echo $form->textField($model,'VideoName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VideoDescription'); ?>
		<?php echo $form->textField($model,'VideoDescription',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VideoURL'); ?>
		<?php echo $form->textField($model,'VideoURL',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VideoDurationSeconds'); ?>
		<?php echo $form->textField($model,'VideoDurationSeconds'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->