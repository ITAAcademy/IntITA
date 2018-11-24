<?php
/**
 * @var $model MessagesRevisionRequest
 */
?>
<h4>
    Затвердити ревізію лекції: <a
        href="<?= Yii::app()->createUrl('revision/previewLectureRevision', array('idRevision' => $model->request_model_id)); ?>">
        Ревізія №<?= $model->request_model_id; ?></a>
</h4>
