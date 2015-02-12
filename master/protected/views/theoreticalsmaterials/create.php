<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $model Theoreticalsmaterials */

$this->breadcrumbs=array(
	'Theoreticalsmaterials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Theoreticalsmaterials', 'url'=>array('index')),
	array('label'=>'Manage Theoreticalsmaterials', 'url'=>array('admin')),
);
?>

<h1>Create Theoreticalsmaterials</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>