<?php
/**
 * Created by PhpStorm.
 * User: Adm
 * Date: 08.09.2017
 * Time: 18:57
 */


class NgTableRequestsAdapter
{

    /**
     * Types of requests
     */
    const NEWREQUESTS = 0;
    const APPROWEDREQUESTS = 1;
    const REJECTEDEQUESTS = 2;
    const DELETEDREQUESTS = 3;

    private $_typeOfRequest;
    private $page =1;
    private $count = 10;
    private $data = ['count'=>0,'rows'=>[]];
    private $organization;

    /**
     * @param $type Int type of messageRequest
     */
    public function __construct($typeOfRequest)
    {
        $this->_typeOfRequest = $typeOfRequest;
        $this->count = (int)Yii::app()->request->getParam('count');
        $this->page = (int)Yii::app()->request->getParam('page');
        $this->organization = Yii::app()->user->model->getCurrentOrganization()->id;
    }
    /**
     * @return string json encoded data
     */
    public function getData(){
        $requests = [];
        if ($this->_typeOfRequest !== $this::REJECTEDEQUESTS){
            $requests = array_merge($this->getUsersRequests(),$this->getRevisionRequests());
        }
        else{
            $requests = $this->getRevisionRequests();
        }

        if ($requests){
            $this->data['count'] = count($requests);
            $this->data['rows'] = $this->getRowsData(array_chunk($requests, $this->count)[--$this->page]);
        }
        return json_encode($this->data);
    }
    /**
     * Get data from founded rows
     * @return array
     */
    private function getRowsData($arrayOfModels){
        $data = [];
        foreach ($arrayOfModels as $record) {
            $row = array();
            $row["user"] = $record->user()->userNameWithEmail();
            if($record->content()){
                $row["content"] = $record->content()->getTitle();
            } else {
                $row["content"] = '';
            }
            $row["link"] = "/requests/message/".$record->id;
            $row["dateCreated"] = date("d.m.Y", strtotime($record->action_date));
            $row["type"] = $record->title();
            array_push($data, $row);
        }
        return $data;
    }
    /**
     * Get user requests data
     * @return array
     */
    private function getUsersRequests(){
        $criteria = new CDbCriteria();
        $criteria->with ='idModule';
        switch ($this->_typeOfRequest){
            case $this::NEWREQUESTS:
                $criteria->addCondition('action = 0');
                break;
            case $this::APPROWEDREQUESTS:
                $criteria->addCondition('action = 2');
                break;
            case $this::DELETEDREQUESTS:
                $criteria->addCondition('deleted = 1');
                break;
        }
        $authorRequests = (new AuthorRequest)->findAll($criteria);
        $consultantRequests = (new TeacherConsultantRequest)->findAll($criteria);
        $requests = array_merge($authorRequests, $consultantRequests);
        return $requests;
    }
    /**
     * Get revision requests data
     * @return array
     */
    private function getRevisionRequests(){
        $requests = [];
        if(Yii::app()->user->model->isContentManager()){
            $criteria = new CDbCriteria();
            $criteria->with ='idRevision.module';
            $criteria->addCondition('deleted = '.Request::ACTIVE);
            switch ($this->_typeOfRequest){
                case $this::NEWREQUESTS:
                    $criteria->addCondition('action = 0');
                    break;
                case $this::APPROWEDREQUESTS:
                    $criteria->addCondition('action = 2');
                    break;
                case $this::REJECTEDEQUESTS:
                    $criteria->addCondition('action = 1');
                    break;
                case $this::DELETEDREQUESTS:
                    $criteria->addCondition('deleted = 1');
                    break;
            }
            $criteria1 = clone $criteria;
            $revisionRequests = (new LectureRevisionRequest)->findAll($criteria);
            $moduleRevisionRequests = (new ModuleRevisionRequest)->findAll($criteria1);
            $requests = array_merge($revisionRequests, $moduleRevisionRequests);
        }

        return $requests;
    }


}