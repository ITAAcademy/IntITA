<?php
/**
 * @var $params array
 * @var $user StudentReg
 * @var $revision RevisionLecture
 */
$user = $params[0];
$revision = $params[1];
?>
Ваша ревізія № <a href="<?=Yii::app()->createAbsoluteUrl('revision/previewLectureRevision', array('idRevision' => $revision->id_revision));?>"
                  target="_blank">
    <?=$revision->id_revision;?>
</a>
затверджена користувачем <?=$user->userNameWithEmail();?>. Переглянути затверджені зміни можна за посиланням
<a href="<?=Yii::app()->createAbsoluteUrl('revision/previewLectureRevision', array('idRevision' => $revision->id_revision));?>"
   target="_blank">Ревізія</a>.

