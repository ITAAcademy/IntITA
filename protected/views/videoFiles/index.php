<?php
/* @var $this VideoFilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Video Files',
);

$this->menu=array(
	array('label'=>'Create VideoFiles', 'url'=>array('create')),
	array('label'=>'Manage VideoFiles', 'url'=>array('admin')),
);
?>

<h1>Video Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
