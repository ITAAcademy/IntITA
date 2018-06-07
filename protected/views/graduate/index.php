<? $css_version = 1; ?>
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'GraduatesStyle.css') ?>"/>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/main_app/controllers/filterGraduateCtrl.js'); ?>"></script>

<div class="subNavBlockGraduates">
    <?php
    $this->breadcrumbs=array(
        Yii::t('breadcrumbs', '0296'),
    );
     ?>
</div>
<?php $this->renderPartial('/site/_shareMetaTag', array(
    'url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->url),
    'title'=>Yii::t('graduates', '0297').'. '.Yii::t('sharing','0643'),
    'description'=>Yii::t('sharing','0644'),
));
?>
<div class="graduateBlock">
    <div  class="graduates">
        <h1><?php echo Yii::t('graduates', '0297')?></h1>
        <?php echo $this->renderPartial('_graduateFilter'); ?>
    </div>
    <div id="graduateBlock" class="clearfix">
        <?php echo $this->renderPartial('_graduatesList', array('dataProvider'=>$dataProvider,'lang'=>$lang)); ?>
        <div class="bannerForGraduatesWrapper clearfix">
            <div class="bannerForGraduatesTitle clearfix">
                <div class="col-md-3 col-sm-2">
                    <img src="<?php echo StaticFilesHelper::createPath('image', 'graduates', 'forma_1.png'); ?>">
                </div>
                <div class="col-md-9 col-sm-10 title-without-padding-banners-graduates">
                    <p>Компанії, де працюють наші випускники</p>
                </div>
            </div>
            <ul class="container" ng-controller="bannersSliderForGraduatesCtrl" drctv >
                <li class="graduatesBannerContent" ng-repeat="slide in slides | orderBy:'slide_position'"  >
                    <p class="bannerForGraduatesTitleText">{{slide.text}}</p>
                    <img class="bannerForGraduatesImg" src="{{slide.file_path}}">
                </li>
            </ul>
        </div>
    </div>
</div>
