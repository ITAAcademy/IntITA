<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->CourseID=>array('view','id'=>$model->CourseID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'View Courses', 'url'=>array('view', 'id'=>$model->CourseID)),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>Update Courses <?php echo $model->CourseID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>