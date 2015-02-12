<?php
/* @var $this MainpageController */
/* @var $model Mainpage */

$this->breadcrumbs=array(
	'Mainpages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Mainpage', 'url'=>array('index')),
	array('label'=>'Create Mainpage', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mainpage-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mainpages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mainpage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'mainpage_id',
		'title',
		'carousel_id',
		'header1',
		'subheader1',
		'block1',
		/*
		'block2',
		'block3',
		'header2',
		'subheader2',
		'step1',
		'step2',
		'step3',
		'step4',
		'step5',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
