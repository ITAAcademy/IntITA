<?php

class TrainerController extends TeacherCabinetController
{

    public function hasRole()
    {
        return Yii::app()->user->model->isTrainer();
    }

    public function actionEditTeacherModule($id, $idModule)
    {
        $student = RegisteredUser::userById($id);
        $module = Module::model()->findByPk($idModule);

        Yii::app()->user->model->hasAccessToOrganizationModel($module);
        Yii::app()->user->model->hasAccessToOrganizationModel(TrainerStudent::model()->findByAttributes(
            array(
                'student'=>$id,
                'trainer'=>Yii::app()->user->getId(),
                'id_organization'=>Yii::app()->user->model->getCurrentOrganization()->id,
                'end_time'=>null,
            )
        ));

        if ($id && $idModule) {
            $role = new TeacherConsultant();
            $isTeacherDefined = !$role->checkStudent($idModule, $id);
            if ($isTeacherDefined) {
                $role = new Student();
                $teacher = $role->getTeacherForModuleDefined($id, $idModule);
            } else {
                $teacher = null;
            }

            $this->renderPartial('/_trainer/_editTeacherModule', array(
                'student' => $student->registrationData,
                'module' => $module,
                'isTeacherDefined' => $isTeacherDefined,
                'teacher' => $teacher
            ), false, true);
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionAssignTeacherForStudent()
    {
        $teacher = Yii::app()->request->getPost('teacher', 0);
        $module = Yii::app()->request->getPost('module', 0);
        $student = Yii::app()->request->getPost('student', 0);

        $user = RegisteredUser::userById($teacher);
        $model = $user->registrationData;

        $role = new TeacherConsultant();
        if (!$user->isTeacherConsultant()) {
            echo "Даному співробітнику не призначена роль викладача.";
        } else {
            if ($role->checkModule($teacher, $module)) {
                if ($role->checkStudent($module, $student)) {
                    if ($role->setStudentAttribute($model, $student, $module)) {
                        echo "Операцію успішно виконано.";
                    } else {
                        echo "Операцію не вдалося виконати.";
                    }
                } else {
                    echo "Даного викладача-консультанта вже призначено для цього студента.";
                }
            } else {
                echo "Даний викладач не має прав викладача для обраного модуля.";
            }
        }
    }

    public function actionCancelTeacherForStudent()
    {
        $teacher = Yii::app()->request->getPost('teacher', 0);
        $module = Yii::app()->request->getPost('module', 0);
        $student = Yii::app()->request->getPost('student', 0);

        $model = StudentReg::model()->findByPk($teacher);

        $role = new TeacherConsultant();
        if ($role->checkCancelStudent($model->id, $module, $student)) {
            if ($role->cancelStudentAttribute($model, $student, $module)) {
                echo "Операцію успішно виконано.";
            } else {
                echo "Операцію не вдалося виконати.";
            }
        } else {
            echo "Даному викладача-консультанту не було призначено цього студента.";
        }
    }

    public function actionViewStudent($id)
    {
        $student = RegisteredUser::userById($id);
        $role = new Student();
        $teachersByModule = $role->getTeachersForModules($student->registrationData);

        Yii::app()->user->model->hasAccessToOrganizationModel(TrainerStudent::model()->findByAttributes(
            array(
                'student'=>$id,
                'trainer'=>Yii::app()->user->getId(),
                'id_organization'=>Yii::app()->user->model->getCurrentOrganization()->id,
                'end_time'=>null,
            )
        ));

        $this->renderPartial('/_trainer/_viewStudent', array(
            'student' => $student,
            'teachersByModule' => $teachersByModule
        ), false, true);
    }

    public function actionAllTeachersByQuery($query)
    {
        echo Teacher::teachersByQuery($query);
    }

    public function actionTeachersByQuery($query, $module)
    {
        echo Teacher::teachersByQueryAndModule($query, $module);
    }

    public function actionSendResponseConsultantModule($idModule)
    {
        $module = Module::model()->findByPk($idModule);
        if ($module) {
            $this->renderPartial('/_trainer/_sendResponseAssignConsultant', array(
                'module' => $module
            ));
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionSendRequest()
    {
        $teacher = Yii::app()->request->getPost('teacher', 0);
        $user = Yii::app()->request->getPost('user', 0);
        $module = Yii::app()->request->getPost('module', 0);

        $teacherModel = StudentReg::model()->findByPk($teacher);
        $moduleModel = Module::model()->findByPk($module);
        $userModel = StudentReg::model()->findByPk($user);

        if ($teacherModel && $moduleModel && $userModel) {
            $message = new MessagesTeacherConsultantRequest();
            if ($message->isRequestOpen(array($moduleModel->module_ID, $teacherModel->id))) {
                echo "Такий запит вже надіслано. Ви не можете надіслати запит на призначення викладача-консультанта для модуля двічі.";
            } else {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $message->build($moduleModel, $userModel, $teacherModel);
                    $message->create();
                    $sender = new MailTransport();

                    $message->send($sender);
                    $transaction->commit();
                    echo "Запит на призначення викладача-консультанта модуля успішно відправлено. Зачекайте, поки адміністратор сайта підтвердить запит.";
                } catch (Exception $e) {
                    $transaction->rollback();
                    throw new \application\components\Exceptions\IntItaException(500, "Запит на редагування модуля не вдалося надіслати.");
                }
            }
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionGetTrainersStudentsList()
    {
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('TrainerStudent', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->condition = 't.trainer='.Yii::app()->user->getId().' and t.end_time is null 
        and id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }
    
    public function actionRenderTrainerUsersAgreements() {
        $this->renderPartial('/_trainer/trainerUsersAgreements');
    }

    public function actionGetTrainerUsersAgreementsList() {
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserAgreements', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->alias = 't';
        $criteria->join = 'left join acc_course_service cs on cs.service_id=t.service_id';
        $criteria->join .= ' left join course c on c.course_ID=cs.course_id';
        $criteria->join .= ' left join acc_module_service ms on ms.service_id=t.service_id';
        $criteria->join .= ' left join module m on m.module_ID=ms.module_id';
        $criteria->join .= ' left join trainer_student ts on ts.student=t.user_id';
        $criteria->addCondition('ts.trainer='.Yii::app()->user->getId().' and end_time is null 
        and (m.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id.' 
        or c.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id.')');
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionStudentsProjects()
    {
        $this->renderPartial('/_trainer/tables/_studentsProjects', array(), false, true);
    }

    public function actionGetStudentsProjectList(){

        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('StudentsProjects', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->with = ['studentTrainer'];
        $criteria->addCondition('studentTrainer.trainer = :trainer');
        $criteria->params = ['trainer' => Yii::app()->user->getId()];
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionViewStudentProject(){
        $projectId =  Yii::app()->request->getPost('id');
        $project = StudentsProjects::model()->findByPk($projectId);
        $project->pullProject();
        echo json_encode(['data'=>1,'message'=>'Проект оновлено!' ]);
        Yii::app()->end();
    }

    public function actionApproveStudentProject(){
        $projectId =  Yii::app()->request->getPost('id');
        $project = StudentsProjects::model()->findByPk($projectId);
        if ($project){
            if (!$project->approveProject()){
                echo json_encode(['data'=>1,'message'=>'Помилка затвердження проекту! Можливо директорія з проектом порожня. Спробуйте спочатку оновити проект до останньої версії!' ]);
            }
            else{
                echo json_encode(['data'=>1,'message'=>'Проект затведжено!' ]);
            }
        }
        else{
            echo  json_encode(['data'=>1,'message'=>'Помилка' ]);
        }
        Yii::app()->end();

    }

    public function actionShowFiles(){
        $this->renderPartial('/_trainer/viewFiles');
    }

    public function actionGetProjectFiles($projectId){
        $project = StudentsProjects::model()->findByPk($projectId);
        if ($project->showFiles()){
            echo json_encode($project->showFiles());
        }
        else{
            echo json_encode(['data'=>0,'message'=>'Помилка! Можливо директорія з проектом порожня. Спробуйте спочатку оновити проект до останньої версії!' ]);
        }
        Yii::app()->end();
    }

    public function actionGetFileContent($path, $fileName){
        echo file_get_contents(Config::getTempProjectsPath().DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$fileName);
        Yii::app()->end();

    }

}