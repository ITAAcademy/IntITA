<?php
/* @var $this VideoFilesController */
/* @var $model VideoFiles */

$this->breadcrumbs=array(
	'Video Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VideoFiles', 'url'=>array('index')),
	array('label'=>'Manage VideoFiles', 'url'=>array('admin')),
);
?>

<h1>Create VideoFiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>