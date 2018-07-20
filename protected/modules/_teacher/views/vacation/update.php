<?php
/* @var $this VacationTypesController */
/* @var $model VacationTypes */

$this->breadcrumbs=array(
	'Vacation Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List VacationTypes', 'url'=>array('index')),
	array('label'=>'Create VacationTypes', 'url'=>array('create')),
	array('label'=>'View VacationTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage VacationTypes', 'url'=>array('admin')),
);
?>

<h1>Update VacationTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>