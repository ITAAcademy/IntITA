<?php
/* @var $model Teacher*/
if ($editMode){
    ?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'fileValidation.js');?>"></script>
    <script type="text/javascript">
        idTeacher = <?php echo $model->teacher_id;?>;

        function editTeacherText(selected_block_id){
            document.getElementById(selected_block_id).dispatchEvent( new Event("click") );
        }
    </script>
<?php }?>

<div class="TeacherProfileblock1">
    <div class="teacherTable">
        <div>
            <div class="teacherLogo">
                <img id="teacherImg" src="<?php echo StaticFilesHelper::createPath('image', 'avatars', $model->avatar());?>"/>
                <br>
                <div align="center" style="width:85%">
                    <a class="btnChat" href="<?php
                    if (!Yii::app()->user->isGuest){
                        echo Config::getChatPath(); echo $model->user_id; echo '" target="_blank';
                    } else {
                        echo '" onclick="openSignIn();';
                    }
                    ?>" data-toggle="tooltip" data-placement="left" title="<?=Yii::t('teacher', '0794');?>"><img src="<?php echo StaticFilesHelper::createPath('image', 'teachers', 'chat.png');?>"></a>
                    <a class="btnChat" href="<?php
                    if (!Yii::app()->user->isGuest) {
                            echo Yii::app()->createUrl('/cabinet/#/newmessages/receiver/').$model->user_id;
                    } else {
                        echo '"onclick="openSignIn();';
                    }?>" data-toggle="tooltip" data-placement="top" title="<?= Yii::t('teacher', '0795'); ?>"><img
                            src="<?php echo StaticFilesHelper::createPath('image', 'teachers', 'mail.png'); ?>"></a>
                </div>
            </div>
            <div class="teacherName">
                <?php echo $model->firstName()." ".$model->lastName();?>
            </div>
        </div>
        <div>
            <div class="TeacherProfilename">
                <?php echo $model->firstName()." ".$model->lastName();?>
            </div>
            <div class="TeacherProfiletitles">
                <?php echo Yii::t('teacher', '0065') ?>
            </div>

            <?php if($editMode){?>
                <div class="editTextButton">
                    <span onclick="editTeacherText('t1');">
                        <em>Натисніть для редагування профілю</em>
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </div>
            <?php } ?>

            <div <?php if ($editMode){ ?> class="editableText" id="t1" <?php } ?>>
                <p>
                   <?php if($model->profile_text_first != '') { echo $model->profile_text_first; } ?>
                </p>
            </div>
            <?php $this->renderPartial('_courses', array('model' => $model));?>

            <?php if($editMode){?>
                <div class="editTextButton">
                    <span onclick="editTeacherText('t2');">
                        <em>Натисніть для редагування профілю</em>
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </div>
            <?php } ?>

            <div  <?php if ($editMode){ ?> class="editableText" id="t2" <?php } ?>>
                <p>
                    <?php if($model->profile_text_last != '') { echo $model->profile_text_last; } ?>
                </p>
            </div>
            <br>
            <?php if(Yii::app()->user->hasFlash('success')):?>
                <div class="info">
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
// use editor WYSIWYG Imperavi
if ($editMode) {
    $this->widget('ImperaviRedactorWidget', array(
        'selector' => "#",
        'options' => array(
            'imageUpload' => $this->createUrl('files/upload'),
            'lang' => 'ua',
            'toolbar' => true,
            'iframe' => true,
            'css' => 'wym.css',
        ),
        'plugins' => array(
            'fullscreen' => array(
                'js' => array('fullscreen.js',),
            ),
            'video' => array(
                'js' => array('video.js',),
            ),
            'fontsize' => array(
                'js' => array('fontsize.js',),
            ),
            'fontfamily' => array(
                'js' => array('fontfamily.js',),
            ),
            'fontcolor' => array(
                'js' => array('fontcolor.js',),
            ),
            'save' => array(
                'js' => array('saveTeacherProfile.js',),
            ),
            'close' => array(
                'js' => array('close.js',),
            ),
            'closefullscreen' => array(
                'js' => array('closefullscreen.js',),
            ),
        ),
    ));
}
?>