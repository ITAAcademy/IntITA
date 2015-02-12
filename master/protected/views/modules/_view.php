<?php
/* @var $this ModulesController */
/* @var $data Modules */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModuleID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ModuleID), array('view', 'id'=>$data->ModuleID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModuleName')); ?>:</b>
	<?php echo CHtml::encode($data->ModuleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModuleDurationHours')); ?>:</b>
	<?php echo CHtml::encode($data->ModuleDurationHours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModuleDurationDays')); ?>:</b>
	<?php echo CHtml::encode($data->ModuleDurationDays); ?>
	<br />


</div>