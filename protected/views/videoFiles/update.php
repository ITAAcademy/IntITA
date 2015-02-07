<?php
/* @var $this VideoFilesController */
/* @var $model VideoFiles */

$this->breadcrumbs=array(
	'Video Files'=>array('index'),
	$model->VideoID=>array('view','id'=>$model->VideoID),
	'Update',
);

$this->menu=array(
	array('label'=>'List VideoFiles', 'url'=>array('index')),
	array('label'=>'Create VideoFiles', 'url'=>array('create')),
	array('label'=>'View VideoFiles', 'url'=>array('view', 'id'=>$model->VideoID)),
	array('label'=>'Manage VideoFiles', 'url'=>array('admin')),
);
?>

<h1>Update VideoFiles <?php echo $model->VideoID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>