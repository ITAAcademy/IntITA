<?php
/* @var $this VideosController */
/* @var $data Videos */
?>
<style type="text/css">
	#mybox {
		width: 300px;
		height: 250px;
		border: 1px solid #999;
	}
</style>



<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VideoID), array('view', 'id'=>$data->VideoID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkModuleID')); ?>:</b>
	<?php echo CHtml::encode($data->fkModuleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLectureID')); ?>:</b>
	<?php echo CHtml::encode($data->fkLectureID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoName')); ?>:</b>
	<?php echo CHtml::encode($data->VideoName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoDescription')); ?>:</b>
	<?php echo CHtml::encode($data->VideoDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoURL')); ?>:</b>
	<?php echo CHtml::encode($data->VideoURL); ?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VideoDurationSeconds')); ?>:</b>
	<?php echo CHtml::encode($data->VideoDurationSeconds); ?>
	<br />


</div>

<div>
<?php
//some droppable object (dropzone)
$this->beginWidget('zii.widgets.jui.CJuiDroppable', array(
	'options'=>array(
		'drop'=> 'js:function(event, ui){alert("OK");
this.option1 = ui;
alert(ui.draggable[0].width);
alert(Object.keys(ui.draggable.context)); }',
	),
	'htmlOptions'=>array(
		'style'=>'height:50px;background:#fffaaa;margin:10px;border-radius: 5px;',
	)
));


	if(isset($_POST['items'])){
	}


echo '<p>Drop something around here</p>';

$this->endWidget();
?>
</div>

<?php
$sql = "select ModuleID, ModuleName from modules order by ModuleID";
/*$dsn = "mysql:host=localhost;dbname = mydatabase";
$username = "root";
$password = "";
$connection = new CDbConnection($dsn, $username, $password);
$connection->active = true;
$command = $connection->createCommand($sql);
$dataReader = $command->query();
foreach($dataReader as $row){
echo $row;
}
$connection->active = false;*/
/** @var CDbConnection $connection */
$connection = Yii::app()->db;
$command = $connection->createCommand($sql);
$dataReader = $command->query();
$items = array();
$items1 = array();
while(($row=$dataReader->read())!==false){
	if($row['ModuleID']==1)
		$items["item_".$row['ModuleID']] = $row['ModuleName'];
	else
		$items1["item_".$row['ModuleID']] = $row['ModuleName'];
}
print_r($items);
?>

<div>
	<?php
	$this->widget('zii.widgets.jui.CJuiSortable',array(
		'id' => 'sortable1',
		'htmlOptions' => array(
			'class' => 'sort',
		),
		'items' => $items,
// additional javascript options for the JUI Sortable plugin
		'options'=>array(
			'cursor' => 'n-resize',
			'connectWith' => '.sort',
			'update' => 'js:function(event, ui){
var order = $(this).sortable("serialize");
var request = $.ajax({
data: order,
type: "POST",
url: "/newyii/changeOrder.php"
});
request.done(function(data){
$("#mybox").html(data);
});
request.fail(function(jqXHR, textStatus){
alert("Request failed: "+textStatus.toString());
});
}'
		),
	));
	?>
</div>
<?php
$this->widget('zii.widgets.jui.CJuiSortable',array(
	'id' => 'sortable2',
	'htmlOptions' => array(
		'class' => 'sort',
	),
	'items' => $items1,
	/*'items'=>array(
    '1' => 'Item 1',
    '2' => 'Item 2',
    '3' => 'Item 3',
    '4' => 'Item 4',
    ),*/
// additional javascript options for the JUI Sortable plugin
	'options'=>array(
		'cursor' => 'n-resize',
		'connectWith' => '.sort',
		'opacity' => '0.6',
	),
));
?>

