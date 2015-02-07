<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->CourseID,
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'Update Courses', 'url'=>array('update', 'id'=>$model->CourseID)),
	array('label'=>'Delete Courses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CourseID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>View Courses #<?php echo $model->CourseID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CourseID',
		'CourseName',
		'CourseDurationHours',
		'CourseDurationDays',
	),
)); ?>
