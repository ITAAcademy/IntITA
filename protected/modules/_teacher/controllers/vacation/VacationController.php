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
		// var_dump($vacationType);die;
		$this->renderPartial('/vacation/index', ['vacationType' => $vacationType], false, true);
	}

	public function actionGetVacationTypes()
	{
		echo CJSON::encode(VacationType::model()->findAll());
	}
}