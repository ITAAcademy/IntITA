<?php
/* @var $this HometasksController */
/* @var $model Hometasks */

$this->breadcrumbs=array(
	'Hometasks'=>array('index'),
	$model->HomeTaskID,
);

$this->menu=array(
	array('label'=>'List Hometasks', 'url'=>array('index')),
	array('label'=>'Create Hometasks', 'url'=>array('create')),
	array('label'=>'Update Hometasks', 'url'=>array('update', 'id'=>$model->HomeTaskID)),
	array('label'=>'Delete Hometasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->HomeTaskID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hometasks', 'url'=>array('admin')),
);
?>

<h1>View Hometasks #<?php echo $model->HomeTaskID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'HomeTaskID',
		'fkModuleID',
		'fkLectureID',
		'HomeTaskName',
		'HomeTaskDescription',
		'HomeTask',
	),
)); ?>
