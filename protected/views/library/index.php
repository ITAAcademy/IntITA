<?php
/* @var $this LibraryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Бібліотека',
);
?>

    <link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/library.css') ?>"/>
<div class="container">
<h1>Бібліотека</h1>
<?php
$this->widget('application.components.ColumnListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'emptyText' => Yii::t('coursemanage', '0517'),
    'viewData'=>array( 'lang' => $lang ),
    'summaryText' => '  ',
    'columns' => array("one", "two"),
    'pager' => array(
        'firstPageLabel' => '&#171;&#171;',
        'lastPageLabel' => '&#187;&#187;',
        'prevPageLabel' => '&#171;',
        'nextPageLabel' => '&#187;',
        'header' => '',
        'cssFile' => Config::getBaseUrl() . '/css/pager.css'
    ),
    'id'=>'ajaxListView',
));

?>
</div>

<?php ?>