<?php

class VacationController extends TeacherCabinetController
{
	public function hasRole()
    {
        return Yii::app()->user->model->getCurrentOrganizationId()==Organization::MAIN_ORGANIZATION && (Yii::app()->user->model->isContentManager() || Yii::app()->user->model->isAdmin() || Yii::app()->user->model->isAuditor() || Yii::app()->user->model->isDirector() || Yii::app()->user->model->isAccountant() || Yii::app()->user->model->isTrainer() || Yii::app()->user->model->isTeacherConsultant() || Yii::app()->user->model->isTenant() || Yii::app()->user->model->isConsultant() || Yii::app()->user->model->isAuthorModule() || Yii::app()->user->model->isTeacherConsultantModule() || Yii::app()->user->model->isSuperVisor() || Yii::app()->user->model->isSuperAdmin());
    }
	
	public function actionVacationCreate()
	{
		$requestParam = $_GET;
		$vacationTypeId = $requestParam['vacation_type_id'];
		$vacationType = VacationType::model()->findByPk($vacationTypeId);
        $isAccountant = Yii::app()->user->model->isAccountant();
		$this->renderPartial('/vacation/index', ['vacationType' => $vacationType, 'isAccountant' => $isAccountant]);
	}

    public function actionVacationUpdate()
    {
        $isAccountant = Yii::app()->user->model->isAccountant();
        $this->renderPartial('/vacation/_update', ['isAccountant' => $isAccountant]);
    }

    public function actionGetVacationData()
    {
        $result = [];
        $result['data'] = ActiveRecordToJSON::toAssocArrayWithRelations(Vacation::model()->with('vacationType')->findByPk(Yii::app()->request->getParam('id')));
        $result['isAccountant'] = Yii::app()->user->model->isAccountant();
        echo CJSON::encode($result);
    }

    public function actionUploadVacationFile()
    {
        $requestParam = $_GET;
        Vacation::model()->uploadVacationFile($requestParam['id']);
    }

    public function actionAddVacation()
    {
        $statusCode = 201;
        $id = null;
        $connection = Yii::app()->db;
        $transaction = $connection->beginTransaction();
        try {
            $data = $_POST;
            $vacation = isset($data['id']) ? Vacation::model()->findByPk($data['id']) : new Vacation();
            $vacation->user_id = Yii::app()->user->model->registrationData->id;
            $vacation->organisation_id = Yii::app()->user->model->getCurrentOrganizationId();
            $startDate = new DateTime($data['start_date']);
            $vacation->start_date = date_format($startDate, 'Y-m-d');
            $endDate = new DateTime($data['end_date']);
            $vacation->end_date = date_format($endDate, 'Y-m-d');
            $vacation->attributes = $data;
            if($vacation->save()){
                $result = ['message' => 'OK', 'id' => $vacation->id];
            }else{
                throw new Exception(CJSON::encode(ValidationMessages::getValidationErrors($vacation)));
            }
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => CJSON::encode($result)]);
    }

    public function actionGetVacationList()
    {
        $requestParam = $_GET;
        $adapter = new NgTableAdapter('Vacation', $requestParam);
        $criteria=new CDbCriteria;
        $criteria->with = ['vacationType', 'idUser'];
        if (!Yii::app()->user->model->isAccountant()) {
            $userId = Yii::app()->user->getId();
            $criteria->compare('user_id', $userId);
            $criteria->compare('organisation_id', Yii::app()->user->model->getCurrentOrganizationId());
        }
        $adapter->mergeCriteriaWith($criteria);
        echo CJSON::encode($adapter->getData());
    }

    public function actionVacationList()
    {
        $this->renderPartial('/vacation/_list');
    }

    public function actionRemoveVacation(){
        $result = ['message' => 'OK'];
        $statusCode = 202;
        $id = $_POST['id'];
        $connection = Yii::app()->db;
        $transaction = $connection->beginTransaction();
        try {
            $vacation = Vacation::model()->findByPk($id);
            if ($vacation['file_src'] !== ''){
                if (file_exists(Yii::getPathOfAlias('webroot')."/files/vacation/".$id."/".$vacation['file_src'])){
                    unlink(Yii::getPathOfAlias('webroot')."/files/vacation/".$id."/".$vacation['file_src']);
                }
            };
            Vacation::model()->deleteByPk($id);
            $transaction->commit();
        } catch (Exception $error) {
            $transaction->rollback();
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

	public function actionGetVacationTypes()
	{
		$requestParam = $_GET;
		if(empty($requestParam)) {
            $result['data'] = ActiveRecordToJSON::toAssocArray(VacationType::model()->findAll());
			echo CJSON::encode($result);
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

	public function actionGetVacationTypeData()
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
            $positionHelper = new PositionHelper();
            $vacationTypeByPosition = $positionHelper->changePosition($vacationType, $data['position'], 'VacationType');
            $vacationType->attributes = $data;
            if($vacationType->save() && $positionHelper->storePosition($vacationTypeByPosition)){
                $positionHelper->temporaryPosition = 9999;
            } else {
                throw new Exception(json_encode(ValidationMessages::getValidationErrors($vacationType)));
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}