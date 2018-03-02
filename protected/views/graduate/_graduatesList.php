
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'SpoilerContent.js'); ?>"></script>

<?php

$this->widget('application.components.ColumnListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_graduateBlock',
    'emptyText' => Yii::t('coursemanage', '0517'),
    'viewData'=>array( 'lang' => $lang),
    'summaryText' => '',
    'columns' => array("one row", "two row"),
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

<div class="showMoreGraduate" ng-hide="currentGraduateCount=='<?php echo $dataProvider->totalItemCount?>'" align="right"
     ng-controller="showMoreGraduateCtrl">
    <a href="" ng-click="showMoreGraduate()" class="" style="">Показати ще ... </a>
</div>

