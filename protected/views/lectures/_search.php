<?php
/* @var $this LecturesController */
/* @var $model Lectures */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LectureID'); ?>
		<?php echo $form->textField($model,'LectureID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkCourseID'); ?>
		<?php echo $form->textField($model,'fkCourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkModuleID'); ?>
		<?php echo $form->textField($model,'fkModuleID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NameClasses'); ?>
		<?php echo $form->textField($model,'NameClasses',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GoalOfClasses'); ?>
		<?php echo $form->textField($model,'GoalOfClasses',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalNumberOfItems'); ?>
		<?php echo $form->textField($model,'TotalNumberOfItems'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Duration'); ?>
		<?php echo $form->textField($model,'Duration'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->