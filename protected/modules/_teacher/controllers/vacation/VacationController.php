<?php

class VacationController extends TeacherCabinetController
{
	public function hasRole() {
            return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin() || Yii::app()->user->model->isAuditor() || Yii::app()->user->model->isDirector() || Yii::app()->user->model->isAccountant() || Yii::app()->user->model->isTrainer() || Yii::app()->user->model->isTeacherConsultant() || Yii::app()->user->model->isTenant() || Yii::app()->user->model->isConsultant() || Yii::app()->user->model->isAuthorModule() || Yii::app()->user->model->isTeacherConsultantModule() || Yii::app()->user->model->isSuperVisor() || Yii::app()->user->model->isSuperAdmin());
    }
	
	public function actionVacationList()
	{
		$requestParam = $_GET;
		$vacationTypeId = $requestParam['vacation_type_id'];
		// $vacations = Vacation::::model()->find('vacation_type_id=:vacation_type_id', array(':vacation_type_id'=>$vacationTypeId));
		$vacationType = VacationType::model()->findByPk($vacationTypeId);
		$this->renderPartial('/vacation/index', ['vacationType' => $vacationType]);
	}

	public function actionGetVacationTypes()
	{
		$requestParam = $_GET;
		if(empty($requestParam)) {
			echo CJSON::encode(VacationType::model()->findAll());
		} else {
	        $adapter = new NgTableAdapter('VacationType', $requestParam);
	        echo CJSON::encode($adapter->getData());
		}
	}
	
	public function actionVacationTypesList()
	{
		$this->renderPartial('/vacation/_typesIndex', array(), false, true);
	}

	public function actionVacationTypeRemove()
	{
		$result = ['message' => 'OK'];
        $statusCode = 201;
        $id = $_POST['id'];
        try{
        	VacationType::model()->deleteByPk($id);	
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
	}

	public function actionGetVacationData()
    {
        $result = [];
        $id = Yii::app()->request->getParam('id');
        $result['data'] = ActiveRecordToJSON::toAssocArray(VacationType::model()->findByPk($id));
        echo CJSON::encode($result);
    }

    public function actionVacationTypeCreate()
    {
        $this->renderPartial('/vacation/create', array(), false, true);
    }

    public function actionVacationTypeUpdate()
    {
        $this->renderPartial('/vacation/update', array(), false, true);
    }
    
    public function actionAddVacationType()
    {
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            $data = $_POST;
            $vacationType = isset($data['id'])?VacationType::model()->findByPk($data['id']):new VacationType();
            $vacationType->attributes = $data;
            if(!$vacationType->save()){
                throw new Exception(json_encode(ValidationMessages::getValidationErrors($vacationType)));
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}