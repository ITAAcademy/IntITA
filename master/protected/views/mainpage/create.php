<?php
/* @var $this MainpageController */
/* @var $model Mainpage */

$this->breadcrumbs=array(
	'Mainpages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mainpage', 'url'=>array('index')),
	array('label'=>'Manage Mainpage', 'url'=>array('admin')),
);
?>

<h1>Create Mainpage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>