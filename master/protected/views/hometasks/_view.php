<?php
/* @var $this HometasksController */
/* @var $data Hometasks */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('HomeTaskID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->HomeTaskID), array('view', 'id'=>$data->HomeTaskID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLectureID')); ?>:</b>
	<?php echo CHtml::encode($data->fkLectureID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HomeTaskName')); ?>:</b>
	<?php echo CHtml::encode($data->HomeTaskName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HomeTaskDescription')); ?>:</b>
	<?php echo CHtml::encode($data->HomeTaskDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HomeTask')); ?>:</b>
	<?php echo CHtml::encode($data->HomeTask); ?>
	<br />


</div>