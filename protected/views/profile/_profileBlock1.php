<style>
    #firstBlockEditProfileInfo,#secondBlockEditProfileInfo{
        display: none;
    }
</style>
<?php
/* @var $model Teacher*/
if ($editMode){
    ?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'fileValidation.js');?>"></script>

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
                <?php echo $model->firstName()." ".$model->lastName(); ?>
            </div>
            <div class="TeacherProfiletitles">
                <?php echo Yii::t('teacher', '0065') ?>
            </div>

            <?php if($editMode){?>
                <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'ckeditor/ckeditor.js'); ?>"></script>
                <div class="editTextButton" id="firstButtonEditProfileInfo">
                    <span>
                        <em>Натисніть для редагування профілю</em>
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </div>
                <div id="firstBlockEditProfileInfo">
                    <textarea name="editor1" ><?php echo $model->profile_text_first; ?></textarea>
                    <button type="button" class="btn btn-success" id="saveFirstBlockEditProfileInfo">
                        Зберегти
                    </button>
                    <button type="button" class="btn btn-default" id="cancelTeacherEditButton1">Відміна</button>
                </div>

                <script>
                    CKEDITOR.replace( 'editor1', {
                        fullPage: true,
                        allowedContent: true,
                        extraPlugins: 'wysiwygarea',
                        toolbar: [
                            { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                            [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
                            { name: 'editing', items: ['SelectAll', 'Scayt' ] },
                            '/',																					// Line break - next group will be placed in new line.
                            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'CopyFormatting', 'RemoveFormat' ] },
                            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                        ]
                    } );
                </script>
            <?php } ?>

            <div id="firstTextProfileInfo">
                   <?php if($model->profile_text_first != '') { echo $model->profile_text_first; } ?>
            </div>
            <?php $this->renderPartial('_courses', array('model' => $model));?>

            <?php if($editMode){?>
                <div class="editTextButton" id="secondButtonEditProfileInfo">
                    <span>
                        <em>Натисніть для редагування профілю</em>
                        <i class="fas fa-pencil-alt"></i>
                    </span>
                </div>
                <div id="secondBlockEditProfileInfo">
                    <textarea name="editor2" ><?php echo $model->profile_text_last; ?></textarea>
                    <button type="button" class="btn btn-success" id="saveSecondBlockEditProfileInfo">
                        Зберегти
                    </button>
                    <button type="button" class="btn btn-default" id="cancelTeacherEditButton2">Відміна</button>
                </div>

                <script>
                    CKEDITOR.replace( 'editor2', {
                        fullPage: true,
                        allowedContent: true,
                        extraPlugins: 'wysiwygarea',
                        toolbar: [
                            { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                            [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
                            { name: 'editing', items: ['SelectAll', 'Scayt' ] },
                            '/',																					// Line break - next group will be placed in new line.
                            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'CopyFormatting', 'RemoveFormat' ] },
                            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                        ]
                    } );
                </script>
                <script type="text/javascript">
                    function editingFomForTeachersProfile(editButton,editForm,saveButton,cancelButton,mainText) {
                        document.getElementById(editButton).onclick = function () {
                            document.getElementById(editForm).style.display = "block";
                            document.getElementById(mainText).style.display = "none";
                        };
                        document.getElementById(cancelButton).onclick = function(){
                            document.getElementById(editForm).style.display = "none";
                            document.getElementById(mainText).style.display = "block";
                        };
                        document.getElementById(saveButton).onclick = function () {
                            if(saveButton == "saveFirstBlockEditProfileInfo"){
                                $.ajax({
                                    url: "/profile/save",
                                    method: "POST",
                                    data: {block: "t1", content: document.getElementsByTagName("iframe")[0].contentDocument.getElementsByTagName("body")[0].innerHTML,id: <?php echo $model->user_id; ?>},
                                    success: function (data) {
                                        window.location.replace(data);
                                    },
                                    error: function (err) {
                                        console.log(err);
                                    },
                                })
                            }
                            else if(saveButton == "saveSecondBlockEditProfileInfo"){
                                $.ajax({
                                    url: "/profile/save",
                                    method: "POST",
                                    data: {block: "t2", content: document.getElementsByTagName("iframe")[1].contentDocument.getElementsByTagName("body")[0].innerHTML,id: <?php echo $model->user_id; ?>},
                                    success: function (data) {
                                        window.location.replace(data);
                                    },
                                    error: function (err) {
                                        console.log(err);
                                    },
                                })
                            }
                        }
                    };
                    editingFomForTeachersProfile("firstButtonEditProfileInfo","firstBlockEditProfileInfo","saveFirstBlockEditProfileInfo","cancelTeacherEditButton1","firstTextProfileInfo");
                    editingFomForTeachersProfile("secondButtonEditProfileInfo","secondBlockEditProfileInfo","saveSecondBlockEditProfileInfo","cancelTeacherEditButton2","secondTextProfileInfo");
                </script>
            <?php } ?>

            <div id="secondTextProfileInfo">
                    <?php if($model->profile_text_last != '') { echo $model->profile_text_last; } ?>
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