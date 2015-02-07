<?php
/* @var $this VideoFilesController */
/* @var $data VideoFiles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VideoID), array('view', 'id'=>$data->VideoID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLectureID')); ?>:</b>
	<?php echo CHtml::encode($data->fkLectureID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoName')); ?>:</b>
	<?php echo CHtml::encode($data->VideoName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoDescription')); ?>:</b>
	<?php echo CHtml::encode($data->VideoDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoURL')); ?>:</b>
	<?php echo CHtml::encode($data->VideoURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoDurationSeconds')); ?>:</b>
	<?php echo CHtml::encode($data->VideoDurationSeconds); ?>
	<br />


</div>