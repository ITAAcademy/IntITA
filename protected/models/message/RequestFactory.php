<?php

class RequestFactory
{
    public static function getInstance(Request $model){
        switch($model->type){
            case Request::AUTHOR_REQUESTS:
                return AuthorRequest::model()->with(['requestUser','idModule','teacher','idModule'])->findByPk($model->id);
            case Request::TEACHER_CONSULTANT_REQESTS:
                return TeacherConsultantRequest::model()->with(['requestUser','idTeacher','idModule'])->findByPk($model->id);
            case Request::COWORKER_REQUESTS:
                return CoworkerRequests::model()->with(['requestUser','idTeacher'])->findByPk($model->id);
            case Request::REVISION_REQUESTS:
                return LectureRevisionRequest::model()->with(['requestUser','idRevision'])->findByPk($model->id);
            case Request::MODULE_REVISION_REQUESTS:
                return ModuleRevisionRequest::model()->with(['requestUser','idRevision'])->findByPk($model->id);
            default:
                return null;
        }
    }
}