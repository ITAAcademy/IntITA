<?php

$this->widget('application.components.ColumnListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_graduateBlock',
    'emptyText' => Yii::t('coursemanage', '0517'),
    'viewData'=>array( 'lang' => $lang ),
    'summaryText' => '',
    'columns' => array("one row"),
    'pager' => array(
        'firstPageLabel' => '&#171;&#171;',
        'lastPageLabel' => '&#187;&#187;',
        'prevPageLabel' => '&#171;',
        'nextPageLabel' => '&#187;',
        'header' => '<div
            class="showMoreGraduate"
            align="right"
            onclick="showMoreGraduate()"
        >Показати ще ...</div>',
        'cssFile' => Config::getBaseUrl() . '/css/pager.css'
    ),
    'id'=>'ajaxListView',
));
?>
<script>
    var sizeGraduate = 2;
    function showMoreGraduate() {
        $.fn.yiiListView.update(
            // this is the id of the CListView
            'ajaxListView',
            {
                url: 'graduate/ShowMoreGraduateAjaxFilter',
                data: {
                    size: sizeGraduate
                },
                complete: function () {
                    $scope.currentGraduateCount = $('.GraduatesBlock').length;
                    $scope.$apply();
                }
            }
        );
        sizeGraduate++;
    };
</script>

