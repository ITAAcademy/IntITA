<?php
/* @var $this VacationTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Vacation Types',
);

$this->menu=array(
	array('label'=>'Create VacationTypes', 'url'=>array('create')),
	array('label'=>'Manage VacationTypes', 'url'=>array('admin')),
);
?>

<h1>Vacation Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
