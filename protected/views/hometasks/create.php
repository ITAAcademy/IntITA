<?php
/* @var $this HometasksController */
/* @var $model Hometasks */

$this->breadcrumbs=array(
	'Hometasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hometasks', 'url'=>array('index')),
	array('label'=>'Manage Hometasks', 'url'=>array('admin')),
);
?>

<h1>Create Hometasks</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>