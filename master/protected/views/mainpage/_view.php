<?php
/* @var $this MainpageController */
/* @var $data Mainpage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mainpage_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mainpage_id), array('view', 'id'=>$data->mainpage_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carousel_id')); ?>:</b>
	<?php echo CHtml::encode($data->carousel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header1')); ?>:</b>
	<?php echo CHtml::encode($data->header1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subheader1')); ?>:</b>
	<?php echo CHtml::encode($data->subheader1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block1')); ?>:</b>
	<?php echo CHtml::encode($data->block1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('block2')); ?>:</b>
	<?php echo CHtml::encode($data->block2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('block3')); ?>:</b>
	<?php echo CHtml::encode($data->block3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header2')); ?>:</b>
	<?php echo CHtml::encode($data->header2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subheader2')); ?>:</b>
	<?php echo CHtml::encode($data->subheader2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step1')); ?>:</b>
	<?php echo CHtml::encode($data->step1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step2')); ?>:</b>
	<?php echo CHtml::encode($data->step2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step3')); ?>:</b>
	<?php echo CHtml::encode($data->step3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step4')); ?>:</b>
	<?php echo CHtml::encode($data->step4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('step5')); ?>:</b>
	<?php echo CHtml::encode($data->step5); ?>
	<br />

	*/ ?>

</div>