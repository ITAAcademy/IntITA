<? $css_version = 1; ?>
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'GraduatesStyle.css') ?>"/>

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
    <div id="graduateBlock">
        <?php echo $this->renderPartial('_graduatesList', array('dataProvider'=>$dataProvider,'lang'=>$lang)); ?>
    </div>
</div>