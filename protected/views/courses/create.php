<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>Create Courses</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>