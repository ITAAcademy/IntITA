<?php

class RequestsList
{
    public static function listAllActiveRequests()
    {
        $organization=Yii::app()->user->model->getCurrentOrganization()->id;
        $authorRequests = AuthorRequest::model()->with('module')->findAll(
            'action = 0  and id_organization='.$organization);
        $consultantRequests = TeacherConsultantRequest::model()->with('idModule')->findAll(
            'action = 0  and id_organization='.$organization);
        $requests = array_merge($authorRequests, $consultantRequests);
        if(Yii::app()->user->model->isAdmin()){
          $coworkerRequests = CoworkerRequests::model()->findAll('action = 0  and id_organization='.$organization);
          $requests = array_merge($requests, $coworkerRequests);
        }
        if(Yii::app()->user->model->isContentManager()){
            $revisionRequests = LectureRevisionRequest::model()->with('idRevision.module')->findAll(
                'type = 4 AND action = 0 id_organization='.$organization);
            $moduleRevisionRequests = ModuleRevisionRequest::model()->with('idRevision.module')->findAll(
                'type = 3 AND action = 0 id_organization='.$organization);
            $requests = array_merge($requests, $revisionRequests, $moduleRevisionRequests);
        }

        $return = array('data' => array());
        foreach ($requests as $record) {
            $row = array();
            $row["user"]["title"] = $record->sender()->userNameWithEmail();
            if($record->module()){
                $row["module"]["title"] = $record->module()->getTitle();
            } else {
                $row["module"]["title"] = "не вказано";
            }
            $row["module"]["link"] = $row["user"]["link"] = "#/requests/message/".$record->getMessageId();
            $row["dateCreated"] = date("d.m.Y", strtotime($record->message0->create_date));
            $row["type"] = $record->title();
            array_push($return['data'], $row);
        }
        return json_encode($return);
    }

    public static function listAllApprovedRequests()
    {
        $organization=Yii::app()->user->model->getCurrentOrganization()->id;
        $authorRequests = AuthorRequest::model()->with('module')->findAll(
            'action = 2 and id_organization='.$organization);
        $consultantRequests = TeacherConsultantRequest::model()->with('idModule')->findAll(
            'action = 2 and id_organization='.$organization);

        $requests = array_merge($authorRequests, $consultantRequests);

        if(Yii::app()->user->model->isAdmin()){
            //            todo for organization
            $coworkerRequests = CoworkerRequests::model()->findAll('action = 2  and id_organization='.$organization);
            $requests = array_merge($requests, $coworkerRequests);
        }
        if(Yii::app()->user->model->isContentManager()){
            $revisionRequests = LectureRevisionRequest::model()->with('idRevision.module')->findAll(
                'type = 4 AND action = 2 AND id_organization='.$organization);
            $moduleRevisionRequests = ModuleRevisionRequest::model()->with('idRevision.module')->findAll(
                'type = 3 AND action = 2 id_organization='.$organization);
            $requests = array_merge($requests, $revisionRequests, $moduleRevisionRequests);
        }

        $return = array('data' => array());
        foreach ($requests as $record) {
            $row = array();
            $row["user"]["title"] = $record->sender()->userNameWithEmail();
            if($record->module()){
                $row["module"]["title"] = $record->module()->getTitle();
            } else {
                $row["module"]["title"] = "не вказано";
            }
            $row["module"]["link"] = $row["user"]["link"] = "#/requests/message/".$record->getMessageId();
            $row["dateCreated"] = date("d.m.Y", strtotime($record->message0->create_date));
            $row["type"] = $record->title();
            array_push($return['data'], $row);
        }
        return json_encode($return);
    }

    public static function listAllDeletedRequests()
    {
        $organization=Yii::app()->user->model->getCurrentOrganization()->id;
        $authorRequests = AuthorRequest::model()->with('module')->findAll('t.deleted = 1 and id_organization='.$organization);
        $consultantRequests = TeacherConsultantRequest::model()->with('idModule')->findAll('t.deleted = 1 and id_organization='.$organization);

        $requests = array_merge($authorRequests, $consultantRequests);

        if(Yii::app()->user->model->isAdmin()){
            $coworkerRequests = CoworkerRequests::model()->findAll('deleted = 1  and id_organization='.$organization);
            $requests = array_merge($requests, $coworkerRequests);
        }
        if(Yii::app()->user->model->isContentManager()){
            $revisionRequests = LectureRevisionRequest::model()->with('idRevision.module')->findAll('deleted = 1 and id_organization='.$organization);
            $moduleRevisionRequests = ModuleRevisionRequest::model()->with('idRevision.module')->findAll('deleted = 1 and id_organization='.$organization);
            $requests = array_merge($requests, $revisionRequests, $moduleRevisionRequests);
        }

        $return = array('data' => array());
        foreach ($requests as $record) {
            $row = array();
            $row["user"]["title"] = $record->sender()->userNameWithEmail();
            if($record->module()){
                $row["module"]["title"] = $record->module()->getTitle();
            } else {
                $row["module"]["title"] = "не вказано";
            }
            $row["module"]["link"] = $row["user"]["link"] = "#/requests/message/".$record->getMessageId();
            $row["dateCreated"] = date("d.m.Y", strtotime($record->message0->create_date));
            $row["type"] = $record->title();
            array_push($return['data'], $row);
        }
        return json_encode($return);
    }

    public static function listAllRejectedRevisionRequests()
    {
        $organization=Yii::app()->user->model->getCurrentOrganization()->id;
        $return = array('data' => array());
        if(Yii::app()->user->model->isContentManager()){
            $revisionRequests = LectureRevisionRequest::model()->with('idRevision.module')->findAll('type = 4 AND action = 1 AND id_organization='.$organization);
            $moduleRevisionRequests = ModuleRevisionRequest::model()->with('idRevision.module')->findAll('type = 3 AND action = 1 AND id_organization='.$organization);
            $requests = array_merge($revisionRequests, $moduleRevisionRequests);
            foreach ($requests as $record) {
                $row = array();
                $row["user"]["title"] = $record->sender()->userNameWithEmail();
                if($record->module()){
                    $row["module"]["title"] = $record->module()->getTitle();
                } else {
                    $row["module"]["title"] = "не вказано";
                }
                $row["module"]["link"] = $row["user"]["link"] = "#/requests/message/".$record->getMessageId();
                $row["dateCreated"] = date("d.m.Y", strtotime($record->message0->create_date));
                $row["type"] = $record->title();
                array_push($return['data'], $row);
            }
        }
        return json_encode($return);
    }
}