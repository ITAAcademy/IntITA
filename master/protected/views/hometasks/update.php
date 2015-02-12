<?php
/* @var $this HometasksController */
/* @var $model Hometasks */

$this->breadcrumbs=array(
	'Hometasks'=>array('index'),
	$model->HomeTaskID=>array('view','id'=>$model->HomeTaskID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hometasks', 'url'=>array('index')),
	array('label'=>'Create Hometasks', 'url'=>array('create')),
	array('label'=>'View Hometasks', 'url'=>array('view', 'id'=>$model->HomeTaskID)),
	array('label'=>'Manage Hometasks', 'url'=>array('admin')),
);
?>

<h1>Update Hometasks <?php echo $model->HomeTaskID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>