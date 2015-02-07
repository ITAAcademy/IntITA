<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $data Theoreticalsmaterials */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TMID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TMID), array('view', 'id'=>$data->TMID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLectureID')); ?>:</b>
	<?php echo CHtml::encode($data->fkLectureID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TMName')); ?>:</b>
	<?php echo CHtml::encode($data->TMName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TMDescription')); ?>:</b>
	<?php echo CHtml::encode($data->TMDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TM')); ?>:</b>
	<?php echo CHtml::encode($data->TM); ?>
	<br />


</div>