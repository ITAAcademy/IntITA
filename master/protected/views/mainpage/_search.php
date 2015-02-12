<?php
/* @var $this MainpageController */
/* @var $model Mainpage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mainpage_id'); ?>
		<?php echo $form->textField($model,'mainpage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carousel_id'); ?>
		<?php echo $form->textField($model,'carousel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'header1'); ?>
		<?php echo $form->textField($model,'header1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subheader1'); ?>
		<?php echo $form->textField($model,'subheader1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block1'); ?>
		<?php echo $form->textField($model,'block1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block2'); ?>
		<?php echo $form->textField($model,'block2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'block3'); ?>
		<?php echo $form->textField($model,'block3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'header2'); ?>
		<?php echo $form->textField($model,'header2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subheader2'); ?>
		<?php echo $form->textField($model,'subheader2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step1'); ?>
		<?php echo $form->textField($model,'step1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step2'); ?>
		<?php echo $form->textField($model,'step2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step3'); ?>
		<?php echo $form->textField($model,'step3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step4'); ?>
		<?php echo $form->textField($model,'step4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step5'); ?>
		<?php echo $form->textField($model,'step5'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->