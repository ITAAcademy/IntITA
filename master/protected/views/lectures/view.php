<?php
/* @var $this LecturesController */
/* @var $model Lectures */

$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	$model->LectureID,
);

$this->menu=array(
	array('label'=>'List Lectures', 'url'=>array('index')),
	array('label'=>'Create Lectures', 'url'=>array('create')),
	array('label'=>'Update Lectures', 'url'=>array('update', 'id'=>$model->LectureID)),
	array('label'=>'Delete Lectures', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LectureID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lectures', 'url'=>array('admin')),
);
?>

<h1>View Lectures #<?php echo $model->LectureID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LectureID',
		'fkCourseID',
		'fkModuleID',
		'NameClasses',
		'GoalOfClasses',
		'TotalNumberOfItems',
		'Duration',
	),
)); ?>
