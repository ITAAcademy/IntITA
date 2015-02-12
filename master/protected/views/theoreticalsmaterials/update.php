<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $model Theoreticalsmaterials */

$this->breadcrumbs=array(
	'Theoreticalsmaterials'=>array('index'),
	$model->TMID=>array('view','id'=>$model->TMID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Theoreticalsmaterials', 'url'=>array('index')),
	array('label'=>'Create Theoreticalsmaterials', 'url'=>array('create')),
	array('label'=>'View Theoreticalsmaterials', 'url'=>array('view', 'id'=>$model->TMID)),
	array('label'=>'Manage Theoreticalsmaterials', 'url'=>array('admin')),
);
?>

<h1>Update Theoreticalsmaterials <?php echo $model->TMID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>