<?php
/* @var $this MainpageController */
/* @var $model Mainpage */

$this->breadcrumbs=array(
	'Mainpages'=>array('index'),
	$model->title=>array('view','id'=>$model->mainpage_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mainpage', 'url'=>array('index')),
	array('label'=>'Create Mainpage', 'url'=>array('create')),
	array('label'=>'View Mainpage', 'url'=>array('view', 'id'=>$model->mainpage_id)),
	array('label'=>'Manage Mainpage', 'url'=>array('admin')),
);
?>

<h1>Update Mainpage <?php echo $model->mainpage_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>