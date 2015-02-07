<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->CourseID=>array('view','id'=>$model->CourseID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Course', 'url'=>array('index')),
	array('label'=>'Create Course', 'url'=>array('create')),
	array('label'=>'View Course', 'url'=>array('view', 'id'=>$model->CourseID)),
	array('label'=>'Manage Course', 'url'=>array('admin')),
);
?>

<h1>Update Course <?php echo $model->CourseID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>