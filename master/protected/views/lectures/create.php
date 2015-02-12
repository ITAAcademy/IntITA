<?php
/* @var $this LecturesController */
/* @var $model Lectures */

$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lectures', 'url'=>array('index')),
	array('label'=>'Manage Lectures', 'url'=>array('admin')),
);
?>

<h1>Create Lectures</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>