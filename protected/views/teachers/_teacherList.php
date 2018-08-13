<?php

$this->widget('application.components.ColumnListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_teacherBlock',
    'emptyText' => Yii::t('coursemanage', '0517'),
    'viewData'=>array('teacherletter'=>$teacherletter, 'page'=>$dataProvider->pagination->currentPage),
    'summaryText' => '',
    'columns' => array("one", "two"),
    'pager' => array(
        'firstPageLabel' => '&#171;&#171;',
        'lastPageLabel' => '&#187;&#187;',
        'prevPageLabel' => '&#171;',
        'nextPageLabel' => '&#187;',
        'header' => '<div
            class="showMore"
            align="right"
            onclick="showMore()"
        ><?php echo Yii::t("pagination", "0998"); ?>&#32;&hellip;</div>',
        'maxButtonCount' => 6,
        'cssFile' => Config::getBaseUrl() . '/css/pager.css'
    ),

    'id' => 'ajaxListTeacher'
));
?>

<script>
    var size=2;
    function showMore() {
        $.fn.yiiListView.update(
            // this is the id of the CListView
            'ajaxListTeacher',
            {
                url:'teachers/ShowMoreAjaxFilter',
                data: {
                    size: size
                },
                complete: function () {
                    $scope.currentCount = $('.teacherBlock').length;
                    $scope.$apply();
                }
            }
        );
        size++;
    };
</script>
