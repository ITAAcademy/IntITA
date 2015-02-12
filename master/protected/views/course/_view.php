<?php
/* @var $this CourseController */
/* @var $data Course */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CourseID), array('view', 'id'=>$data->CourseID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseName')); ?>:</b>
	<?php echo CHtml::encode($data->CourseName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseDurationHours')); ?>:</b>
	<?php echo CHtml::encode($data->CourseDurationHours); ?>
	<br />

	<b><?php echo 'Course duration (in days)'; ?>:</b>
	<?php echo CHtml::encode((int)($data->CourseDurationHours)/2); ?>
	<br />

</div>