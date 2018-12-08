<?php
/**
 * @var $model IRequest
 */

switch($model->type){
    case Request::AUTHOR_REQUESTS:
        $this->renderPartial('_authorRequest', array('model' => $model));
        break;
    case Request::TEACHER_CONSULTANT_REQESTS:
        $this->renderPartial('_teacherConsultantRequest', array('model' => $model));
        break;
    case Request::COWORKER_REQUESTS:
        $this->renderPartial('_coworkerRequest', array('model' => $model));
        break;
    case Request::REVISION_REQUESTS:
        $this->renderPartial('_revisionRequest', array('model' => $model));
        break;
    case Request::MODULE_REVISION_REQUESTS:
        $this->renderPartial('_moduleRevisionRequest', array('model' => $model));
        break;
    default:
        return null;
}
?>


