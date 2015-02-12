<?php
/* @var $this HometasksController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Hometasks',
);

$this->menu=array(
	array('label'=>'Create Hometasks', 'url'=>array('create')),
	array('label'=>'Manage Hometasks', 'url'=>array('admin')),
);
?>

<h1>Hometasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
