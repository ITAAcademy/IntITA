<?php $this->renderPartial('/site/_shareMetaTag', array(
    'url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->url),
    'title'=>Yii::t('teachers', '0058').'. '.Yii::t('sharing','0643'),
    'description'=>Yii::t('sharing','0645'),
));
?>
<!-- teachers style -->
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'teachers.css'); ?>" />
<!-- teachers style -->
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'hideBlock.js'); ?>"></script>
<?php
$this->pageTitle = 'INTITA';
$post=$dataProvider->getData();
?>
<!-- BD -))) -->
<div class="subNavBlockTeachers">
    <?php
    $this->breadcrumbs=array(
        Yii::t('breadcrumbs', '0052'));
    ?>
</div>
<div class='teachersList'>
    <div class="titleTeachers">
        <h1><?php echo Yii::t('teachers', '0058'); ?></h1>
    </div>
    <?php $this->renderPartial('_leftTeacher', array('post' => $post));  ?>
    <?php $this->renderPartial('_rightTeacher', array('post' => $post,'teacherletter'=>$teacherletter)); ?>
</div>
