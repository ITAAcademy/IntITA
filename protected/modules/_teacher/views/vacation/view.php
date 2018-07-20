<?php
/* @var $this VacationTypesController */
/* @var $model VacationTypes */

$this->breadcrumbs=array(
	'Vacation Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List VacationTypes', 'url'=>array('index')),
	array('label'=>'Create VacationTypes', 'url'=>array('create')),
	array('label'=>'Update VacationTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete VacationTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VacationTypes', 'url'=>array('admin')),
);
?>

<h1>View VacationTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title_ua',
		'title_ru',
		'title_en',
	),
)); ?>
