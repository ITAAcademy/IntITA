<?php
/* @var $this LecturesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lectures',
);

$this->menu=array(
	array('label'=>'Create Lectures', 'url'=>array('create')),
	array('label'=>'Manage Lectures', 'url'=>array('admin')),
);
?>

<h1>Lectures</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
