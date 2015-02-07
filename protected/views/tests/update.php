<?php
/* @var $this TestsController */
/* @var $model Tests */

$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->TestID=>array('view','id'=>$model->TestID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tests', 'url'=>array('index')),
	array('label'=>'Create Tests', 'url'=>array('create')),
	array('label'=>'View Tests', 'url'=>array('view', 'id'=>$model->TestID)),
	array('label'=>'Manage Tests', 'url'=>array('admin')),
);
?>

<h1>Update Tests <?php echo $model->TestID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>