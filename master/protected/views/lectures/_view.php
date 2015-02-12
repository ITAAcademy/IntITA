<?php
/* @var $this LecturesController */
/* @var $data Lectures */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LectureID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LectureID), array('view', 'id'=>$data->LectureID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkCourseID')); ?>:</b>
	<?php echo CHtml::encode($data->fkCourseID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NameClasses')); ?>:</b>
	<?php echo CHtml::encode($data->NameClasses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GoalOfClasses')); ?>:</b>
	<?php echo CHtml::encode($data->GoalOfClasses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalNumberOfItems')); ?>:</b>
	<?php echo CHtml::encode($data->TotalNumberOfItems); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Duration')); ?>:</b>
	<?php echo CHtml::encode($data->Duration); ?>
	<br />


</div>