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

<a href="#/vacationTypes/create">
    <button type="button" class="btn btn-primary">Додати тип відпусток</button>
</a>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
