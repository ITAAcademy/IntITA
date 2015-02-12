<?php
/* @var $this MainpageController */
/* @var $model Mainpage */

$this->breadcrumbs=array(
	'Mainpages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Mainpage', 'url'=>array('index')),
	array('label'=>'Create Mainpage', 'url'=>array('create')),
	array('label'=>'Update Mainpage', 'url'=>array('update', 'id'=>$model->mainpage_id)),
	array('label'=>'Delete Mainpage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mainpage_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mainpage', 'url'=>array('admin')),
);
?>

<h1>View Mainpage #<?php echo $model->mainpage_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mainpage_id',
		'title',
		'carousel_id',
		'header1',
		'subheader1',
		'block1',
		'block2',
		'block3',
		'header2',
		'subheader2',
		'step1',
		'step2',
		'step3',
		'step4',
		'step5',
	),
)); ?>
