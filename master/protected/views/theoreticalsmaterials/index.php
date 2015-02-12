<?php
/* @var $this TheoreticalsmaterialsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Theoreticalsmaterials',
);

$this->menu=array(
	array('label'=>'Create Theoreticalsmaterials', 'url'=>array('create')),
	array('label'=>'Manage Theoreticalsmaterials', 'url'=>array('admin')),
);
?>

<h1>Theoreticalsmaterials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
