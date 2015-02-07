<?php
/* @var $this VideoFilesController */
/* @var $model VideoFiles */

$this->breadcrumbs=array(
	'Video Files'=>array('index'),
	$model->VideoID,
);

$this->menu=array(
	array('label'=>'List VideoFiles', 'url'=>array('index')),
	array('label'=>'Create VideoFiles', 'url'=>array('create')),
	array('label'=>'Update VideoFiles', 'url'=>array('update', 'id'=>$model->VideoID)),
	array('label'=>'Delete VideoFiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VideoID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VideoFiles', 'url'=>array('admin')),
);
?>

<h1>View VideoFiles #<?php echo $model->VideoID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'VideoID',
		'fkModuleID',
		'fkLectureID',
		'VideoName',
		'VideoDescription',
		'VideoURL',
		'VideoDurationSeconds',
	),
)); ?>
