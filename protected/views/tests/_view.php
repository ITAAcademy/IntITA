<?php
/* @var $this TestsController */
/* @var $data Tests */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TestID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TestID), array('view', 'id'=>$data->TestID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLectureID')); ?>:</b>
	<?php echo CHtml::encode($data->fkLectureID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TestName')); ?>:</b>
	<?php echo CHtml::encode($data->TestName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TestDescription')); ?>:</b>
	<?php echo CHtml::encode($data->TestDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TestURL')); ?>:</b>
	<?php echo CHtml::encode($data->TestURL); ?>
	<br />


</div>