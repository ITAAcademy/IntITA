<?php
/* @var $this MainpageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mainpages',
);

$this->menu=array(
	array('label'=>'Create Mainpage', 'url'=>array('create')),
	array('label'=>'Manage Mainpage', 'url'=>array('admin')),
);
?>

<h1>Mainpages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
