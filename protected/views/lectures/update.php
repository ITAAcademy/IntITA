<?php
/* @var $this LecturesController */
/* @var $model Lectures */

$this->breadcrumbs=array(
	'Lectures'=>array('index'),
	$model->LectureID=>array('view','id'=>$model->LectureID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lectures', 'url'=>array('index')),
	array('label'=>'Create Lectures', 'url'=>array('create')),
	array('label'=>'View Lectures', 'url'=>array('view', 'id'=>$model->LectureID)),
	array('label'=>'Manage Lectures', 'url'=>array('admin')),
);
?>

<h1>Update Lectures <?php echo $model->LectureID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>