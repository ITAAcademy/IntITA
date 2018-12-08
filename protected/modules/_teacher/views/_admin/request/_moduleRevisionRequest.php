<?php
/**
 * @var $model MessagesModuleRevisionRequest
 */

?>
<h4>
    Затвердити ревізію модуля: <a
        href="<?= Yii::app()->createUrl('moduleRevision/previewModuleRevision', array('idRevision' => $model->request_model_id)); ?>">
        Ревізія №<?= $model->request_model_id; ?></a>
</h4>
