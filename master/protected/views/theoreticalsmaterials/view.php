<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $model Theoreticalsmaterials */

$this->breadcrumbs=array(
	'Theoreticalsmaterials'=>array('index'),
	$model->TMID,
);

$this->menu=array(
	array('label'=>'List Theoreticalsmaterials', 'url'=>array('index')),
	array('label'=>'Create Theoreticalsmaterials', 'url'=>array('create')),
	array('label'=>'Update Theoreticalsmaterials', 'url'=>array('update', 'id'=>$model->TMID)),
	array('label'=>'Delete Theoreticalsmaterials', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TMID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Theoreticalsmaterials', 'url'=>array('admin')),
);
?>

<h1>View Theoreticalsmaterials #<?php echo $model->TMID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TMID',
		'fkModuleID',
		'fkLectureID',
		'TMName',
		'TMDescription',
		'TM',
	),
)); ?>
