<? $css_version = 1; ?>
<!-- teachers style -->
<!--<link href="--><?php //echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?><!--" rel="stylesheet">-->
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'bootstrapRewrite.css') ?>"/>
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'teachers.css'); ?>" />
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/teacher/controllers/filterTeacherCtrl.js'); ?>"></script>
<!-- teachers style -->
<?php
/* @var $teacherletter TeacherLetter*/
?>
<script>basePath = '<?php echo Config::getBaseUrl(); ?>';</script>
<div class="subNavBlockTeachers">
    <?php
    $this->breadcrumbs=array(
        Yii::t('breadcrumbs', '0052'));
    ?>
</div>
<div class='teachersList'>
    <div class="titleTeachers">
        <h1><?php echo Yii::t('teachers', '0058'); ?></h1>
        <?php echo $this->renderPartial('_teacherFilter'); ?>
    </div>
    <?php $this->renderPartial('_teacherList', array('dataProvider'=>$post, 'teacherletter'=>$teacherletter));  ?>
</div>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'hideBlock.js'); ?>"></script>
<?php $this->renderPartial('/site/_shareMetaTag', array(
    'url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->url),
    'title'=>Yii::t('teachers', '0058').'. '.Yii::t('sharing','0643'),
    'description'=>Yii::t('sharing','0645'),
));
?>
<script>
    $("#maxTeacherForm").css("left",($(window).width()/2)-$("#joinTeamMaxButton").width()/2);
    $(window).resize(function () {
            $("#maxTeacherForm").css("left",($(window).width()/2)-$("#joinTeamMaxButton").width()/2);
    });
</script>
