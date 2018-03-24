<?php
/* @var $course Course */
?>
<div class="titlesBlock" id="titlesBlock">
    <ul><?php if ($idCourse != 0) {
            $course = Course::model()->findByPk($idCourse); ?>
            <li>
                <?php echo Yii::t('lecture', '0070'); ?>
                <a href="<?php echo Yii::app()->createUrl('course/index', array('id' => $idCourse)) ?>">
                    <?php echo $course->getTitle(); ?>
                </a> (<?php echo Yii::t('lecture', '0071') . strtoupper($course->language); ?>)
                <?php $this->renderPartial('_editLecture', array('lecture' => $lecture, 'editMode' => $editMode)); ?>
            </li>
            <li>
                <?php echo Yii::t('lecture', '0072'); ?>
                <a href="<?php echo Yii::app()->createUrl('module/index', array('idModule' => $lecture['idModule'], 'idCourse' => $idCourse)) ?>"><?php echo $lecture->module->getTitle(); ?></a>
            </li>
        <?php } else { ?>
            <li>
                <?php echo Yii::t('lecture', '0072'); ?>
                <a href="<?php echo Yii::app()->createUrl('module/index', array('idModule' => $lecture['idModule'])) ?>"><?php echo $lecture->module->getTitle(); ?></a>
            </li>
        <?php } ?>
</div>