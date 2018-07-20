<?php
/* @var $this VacationTypesController */
/* @var $model VacationTypes */

$this->breadcrumbs=array(
	'Vacation Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VacationTypes', 'url'=>array('index')),
	array('label'=>'Manage VacationTypes', 'url'=>array('admin')),
);
?>

<h1>Create VacationTypes</h1>

<?php $this->renderPartial('/vacation/_form', array('model'=>$model)); ?>