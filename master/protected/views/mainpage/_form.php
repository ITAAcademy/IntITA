<?php
/* @var $this MainpageController */
/* @var $model Mainpage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mainpage-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mainpage_id'); ?>
		<?php echo $form->textField($model,'mainpage_id'); ?>
		<?php echo $form->error($model,'mainpage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carousel_id'); ?>
		<?php echo $form->textField($model,'carousel_id'); ?>
		<?php echo $form->error($model,'carousel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header1'); ?>
		<?php echo $form->textField($model,'header1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'header1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subheader1'); ?>
		<?php echo $form->textField($model,'subheader1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'subheader1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'block1'); ?>
		<?php echo $form->textField($model,'block1'); ?>
		<?php echo $form->error($model,'block1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'block2'); ?>
		<?php echo $form->textField($model,'block2'); ?>
		<?php echo $form->error($model,'block2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'block3'); ?>
		<?php echo $form->textField($model,'block3'); ?>
		<?php echo $form->error($model,'block3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'header2'); ?>
		<?php echo $form->textField($model,'header2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'header2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subheader2'); ?>
		<?php echo $form->textField($model,'subheader2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'subheader2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step1'); ?>
		<?php echo $form->textField($model,'step1'); ?>
		<?php echo $form->error($model,'step1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step2'); ?>
		<?php echo $form->textField($model,'step2'); ?>
		<?php echo $form->error($model,'step2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step3'); ?>
		<?php echo $form->textField($model,'step3'); ?>
		<?php echo $form->error($model,'step3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step4'); ?>
		<?php echo $form->textField($model,'step4'); ?>
		<?php echo $form->error($model,'step4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'step5'); ?>
		<?php echo $form->textField($model,'step5'); ?>
		<?php echo $form->error($model,'step5'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->