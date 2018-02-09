<?php

class UsersController extends TeacherCabinetController
{
    public function hasRole()
    {
        $allowedDenySetActions = ['addAdmin', 'createAccountant'];
        $allowedUsersTables = ['users','getUsersList','getTrainersList','coworkers','getTeachersList','students','getStudentsList'];
        $allowedCMActions = ['contentAuthors','getAuthorsList','teacherConsultants','getTeacherConsultantsList'];
        $allowedGroups = ['offlineGroups','offlineGroup','offlineSubgroup'];

        $action = Yii::app()->controller->action->id;
        return (Yii::app()->user->model->isDirector() || Yii::app()->user->model->isSuperAdmin() || Yii::app()->user->model->isAuditor() || Yii::app()->user->model->isAccountant() && !in_array($action, $allowedDenySetActions)) ||
        (Yii::app()->user->model->isSuperVisor() && in_array($action, $allowedUsersTables)) ||
        Yii::app()->user->model->isAdmin() ||
        (Yii::app()->user->model->isContentManager() && in_array($action, $allowedCMActions)) ||
            (Yii::app()->user->model->isTeacherConsultant() || Yii::app()->user->model->isTrainer() && in_array($action, $allowedGroups));
    }

    public function actionIndex($id=0)
    {
        $this->renderPartial('index', array(), false, true);
    }
    public function actionOrganizationUsers()
    {
        $this->renderPartial('organizationUsers', array(), false, true);
    }

    public function actionGetUsersCount()
    {
        $counters = [];
        $result=[];

        $counters["admins"] = UserAdmin::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["accountants"] = UserAccountant::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["coworkers"] = TeacherOrganization::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE."  AND end_date IS NULL");
        $counters["contentAuthors"] = UserAuthor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["students"] = UserStudent::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["offlineStudents"] = OfflineStudents::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["registeredUsers"] = StudentReg::model()->count('cancelled='.StudentReg::ACTIVE);
        $counters["tenants"] = UserTenant::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["trainers"] = UserTrainer::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["contentManagers"] = UserContentManager::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["teacherConsultants"] = UserTeacherConsultant::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["withoutRole"] = StudentReg::countUsersWithoutRoles();
        $counters["blockedUsers"] = StudentReg::model()->count('cancelled='.StudentReg::DELETED);
        $counters["supervisors"] = UserSuperVisor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["superAdmins"] = UserSuperAdmin::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["directors"] = UserDirector::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["auditors"] = UserAuditor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");

        $i=0;
        foreach ($counters as $key=>$counter){
            $result[$i]['role']=$key;
            $result[$i]['count']=$counter;
            $i++;
        }
        echo json_encode($result);
    }

    public function actionGetOrganizationUsersCount()
    {
        $counters = [];
        $result=[];
        $sql=' and id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        $counters["admins"] = UserAdmin::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["accountants"] = UserAccountant::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["coworkers"] = TeacherOrganization::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE."  AND end_date IS NULL".$sql);
        $counters["contentAuthors"] = UserAuthor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["students"] = UserStudent::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["offlineStudents"] = OfflineStudents::model()->with('user','group')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL 
        and group.id_organization=".Yii::app()->user->model->getCurrentOrganization()->id);
        $counters["registeredUsers"] = StudentReg::model()->count('cancelled='.StudentReg::ACTIVE);
        $counters["tenants"] = UserTenant::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["trainers"] = UserTrainer::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["contentManagers"] = UserContentManager::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["teacherConsultants"] = UserTeacherConsultant::model()->with('idUser')->count("idUser.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["supervisors"] = UserSuperVisor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL".$sql);
        $counters["superAdmins"] = UserSuperAdmin::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["directors"] = UserDirector::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");
        $counters["auditors"] = UserAuditor::model()->with('user')->count("user.cancelled=".StudentReg::ACTIVE." AND end_date IS NULL");

        $i=0;
        foreach ($counters as $key=>$counter){
            $result[$i]['role']=$key;
            $result[$i]['count']=$counter;
            $i++;
        }
        echo json_encode($result);
    }

    public function actionUsers()
    {
        $this->renderPartial('tables/_usersTable', array(), false, true);
    }

    public function actionStudents($organization=false, $trainer=false)
    {
        $this->renderPartial('tables/_studentsTable', array('organization'=>$organization, 'trainer'=>$trainer), false, true);
    }

    public function actionOfflineStudents($organization)
    {
        $this->renderPartial('tables/_offlineStudentsTable', array('organization'=>$organization), false, true);
    }

    public function actionCoworkers($organization)
    {
        $this->renderPartial('tables/_teachersTable', array('organization'=>$organization), false, true);
    }

    public function actionContentAuthors($organization)
    {
        $this->renderPartial('tables/_authorsTable', array('organization'=>$organization), false, true);
    }

    public function actionUsersWithoutRoles()
    {
        $this->renderPartial('tables/_withoutRolesTable', array(), false, true);
    }

    public function actionAdmins($organization=0)
    {
        $this->renderPartial('tables/_adminsTable', array('organization'=>$organization), false, true);
    }

    public function actionAccountants($organization)
    {
        $this->renderPartial('tables/_accountantsTable', array('organization'=>$organization), false, true);
    }

    public function actionContentManagers($organization)
    {
        $this->renderPartial('tables/_contentManagersTable', array('organization'=>$organization), false, true);
    }

    public function actionTrainers($organization)
    {
        $this->renderPartial('tables/_trainersTable', array('organization'=>$organization), false, true);
    }

    public function actionTenants($organization)
    {
        $this->renderPartial('tables/_tenantsTable', array('organization'=>$organization), false, true);
    }

    public function actionSupervisors($organization)
    {
        $this->renderPartial('tables/_superVisorsTable', array('organization'=>$organization), false, true);
    }

    public function actionBlockedUsers()
    {
        $this->renderPartial('tables/_blockedUsersTable', array(), false, true);
    }

    public function actionAuditors()
    {
        $this->renderPartial('tables/_auditorsTable', array(), false, true);
    }

    public function actionSuperAdmins()
    {
        $this->renderPartial('tables/_superAdminsTable', array(), false, true);
    }

    public function actionDirectors()
    {
        $this->renderPartial('tables/_directorsTable', array(), false, true);
    }

    public function actionTeacherConsultants($organization)
    {
        $this->renderPartial('tables/_teacherConsultantsTable', array('organization'=>$organization), false, true);
    }
    
    public function actionUsersEmail()
    {
        $this->renderPartial('usersEmail', array(), false, true);
    }

    public function actionEmailsCategory()
    {
        $this->renderPartial('emailsCategory', array(), false, true);
    }
    public function actionEmailsCategoryCreate()
    {
        $this->renderPartial('emailCategoryForm', array('scenario'=>'new'), false, true);
    }
    public function actionEmailsCategoryUpdate()
    {
        $this->renderPartial('emailCategoryForm', array('scenario'=>'update'), false, true);
    }

    public function actionAddAdmin()
    {
        $userId = Yii::app()->request->getPost('userId');
        $user = RegisteredUser::userById($userId);

        if ($user->setRole(new UserRoles("admin"))) echo "Користувач ".$user->registrationData->userNameWithEmail()." призначений адміністратором.";
        else echo "Користувача ".$user->registrationData->userNameWithEmail()." не вдалося призначити адміністратором.
        Спробуйте повторити операцію пізніше або напишіть на адресу ".Config::getAdminEmail();
    }

    public function actionCreateAccountant()
    {
        $userId = Yii::app()->request->getPost('userId');
        $user = RegisteredUser::userById($userId);

        if ($user->setRole(new UserRoles("accountant"))) echo "Користувач ".$user->registrationData->userNameWithEmail()." призначений бухгалтером.";
        else echo "Користувача ".$user->registrationData->userNameWithEmail()." не вдалося призначити бухгалтером.
        Спробуйте повторити операцію пізніше або напишіть на адресу ".Config::getAdminEmail();
    }

    public function actionGetStudentsList()
    {
        if($_GET['organization']){
            Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        }
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserStudent', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->alias = 't';
        $criteria->join = 'inner join user u on u.id = t.id_user';
        $criteria->condition = 'u.cancelled='.StudentReg::ACTIVE.' and t.end_date IS NULL';

        if($_GET['organization'])
            $criteria->addCondition('t.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $criteria->group = 'u.id';
        if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $startDate=$_GET['startDate'];
            $endDate=$_GET['endDate'];
            $criteria->condition = "TIMESTAMP(t.start_date) BETWEEN " . "'$startDate'" . " AND " . "'$endDate'";
        }
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetOfflineStudentsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('OfflineStudents', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->join = 'LEFT JOIN offline_subgroups sg ON t.id_subgroup = sg.id';
        $criteria->join .= ' LEFT JOIN offline_groups g ON sg.group = g.id';
        if(isset($requestParams['idGroup'])){
            $criteria->addCondition('g.id='.$requestParams['idGroup'].' and t.end_date IS NULL');
        }
        if(isset($requestParams['idSubgroup'])){
            $criteria->addCondition('sg.id='.$requestParams['idSubgroup'].' and t.end_date IS NULL');
        }
        if(!isset($requestParams['idGroup']) && !isset($requestParams['idSubgroup'])){
            $criteria->addCondition('t.end_date IS NULL');
        }
        if($_GET['organization'])
            $criteria->addCondition('g.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetUsersList()
    {
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('StudentReg', $requestParams);

        $criteria =  new CDbCriteria();
        $criteria->condition = 't.cancelled='.StudentReg::ACTIVE;
        $ngTable->mergeCriteriaWith($criteria);

        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetWithoutRolesUsersList()
    {
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('StudentReg', $requestParams,array(
            'country0'=>true,
            'city0'=>true
        ));
        
        $criteria = new CDbCriteria();
        $criteria->alias = 't';
        $criteria->join = 'left join user_student us on us.id_user=t.id';
        $criteria->join .= ' left join teacher tt on tt.user_id=t.id';
        $criteria->addCondition('t.cancelled='.StudentReg::ACTIVE);
        $criteria->addCondition('(us.id_user IS NULL or us.end_date IS NOT NULL) and (tt.user_id IS NULL or tt.cancelled=1)');
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetTenantsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $ngTable = new NgTableAdapter('UserTenant', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetContentManagersList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserContentManager', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetTeacherConsultantsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $ngTable = new NgTableAdapter('UserTeacherConsultant', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetTeachersList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->join = 'left join user u on u.id=t.id_user';
        $criteria->addCondition('u.cancelled='.StudentReg::ACTIVE.' and t.end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('t.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $ngTable = new NgTableAdapter('TeacherOrganization', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetAdminsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserAdmin', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetAccountantsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserAccountant', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetTrainersList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserTrainer', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetActualTrainers()
    {
        $criteria = new CDbCriteria();
        $criteria->distinct = true;
        $criteria->addCondition('end_time IS NULL');
        $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $criteria->select = 'trainer';
        $trainers = TrainerStudent::model()->findAll($criteria);
        $result = array();
        foreach($trainers as $item){
            array_push($result, ['id'=>$item->trainer, 'fullName'=>$item->trainerModel->fullName]);
        }
        echo json_encode($result);
    }

    public function actionExchangeTrainers()
    {
        $id_old_trainer = $_GET['id_old'];
        $id_new_trainer = $_GET['id_new'];

        $criteria = new CDbCriteria();
        $criteria->addCondition('trainer = '.$id_old_trainer);
        $criteria->addCondition('end_time IS NULL');
        $students = TrainerStudent::model()->findAll($criteria);

        $transaction = Yii::app()->db->beginTransaction();
        try {
            foreach($students as $student){
                $student->trainer = $id_new_trainer;
                $student->save();
            }
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            throw new \application\components\Exceptions\IntItaException(500, "Виникла помилка при видаленні категорії");
        }
    }

    public function actionGetBlockedUsersList()
    {
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('unlocked_by IS NULL and unlocked_date IS NULL');
        $ngTable = new NgTableAdapter('UserBlocked', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        echo json_encode($ngTable->getData());
    }
    
    public function actionGetSuperVisorsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserSuperVisor', $requestParams);

        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetDirectorsList()
    {
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        $ngTable = new NgTableAdapter('UserDirector', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetAuditorsList()
    {
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        $ngTable = new NgTableAdapter('UserAuditor', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetSuperAdminsList()
    {
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        $ngTable = new NgTableAdapter('UserSuperAdmin', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionGetAuthorsList()
    {
        Yii::app()->user->model->hasAccessToGlobalRoleLists($_GET['organization']);
        $params = $_GET;
        $criteria = new CDbCriteria();
        $criteria->addCondition('end_date IS NULL');
        if($_GET['organization'])
            $criteria->addCondition('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        $adapter = new NgTableAdapter('UserAuthor',$params);
        $adapter->mergeCriteriaWith($criteria);
        echo json_encode($adapter->getData());
    }

    public function actionExport($type)
    {
        $phpExcelPath = Yii::getPathOfAlias('ext.PHPExcel');
        spl_autoload_unregister(array('YiiBase','autoload'));
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        spl_autoload_register(array('YiiBase','autoload'));

        switch ($type) {
            case 'all': {
                $fieldsToExport = ['firstName' => 'Ім\'я',
                    'middleName' => 'По-батькові',
                    'secondName' => 'Прізвище',
                    'email' => 'Електронна пошта',
                    'city0.title_ua' => 'Місто',
                    'country0.title_ua' => 'Країна',
                    'reg_time' => 'Час реєстрації'];
                $exporter = new ExcelExporter('StudentReg', $fieldsToExport);
                $exporter->setCriteria('cancelled=' . StudentReg::ACTIVE);
            }
            break;
            case 'students':{
                $fieldsToExport = ['firstName' => 'Ім\'я',
                    'middleName' => 'По-батькові',
                    'secondName' => 'Прізвище',
                    'email' => 'Електронна пошта',
                    'student.start_date'=>'Надано роль',
                    'educform' => 'Форма',
                    'city0.title_ua' => 'Місто',
                    'country0.title_ua' => 'Країна',
                    'trainerData.fullName'=>'Тренер',
                    'reg_time' => 'Час реєстрації'];
                $criteria =  new CDbCriteria();
                $criteria->alias = 't';
                $criteria->join = 'inner join user_student us on t.id = us.id_user';
                $criteria->condition = 't.cancelled='.StudentReg::ACTIVE.' and us.end_date IS NULL';
                $criteria->group = 't.id';
                $exporter = new ExcelExporter('StudentReg', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
            break;
            case 'offlineStudents':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    'trainerData.fullName' => 'Тренер',
                    'group.name' => 'Група',
                    'subgroupName.name'=>'Підгрупа',
                    'start_date' => 'Додано',
                    'user.phone' => 'Телефон',];
                $criteria =  new CDbCriteria();
                $criteria->join = ' LEFT JOIN offline_subgroups sg ON t.id_subgroup = sg.id';
                $criteria->condition = 't.end_date IS NULL';
                $exporter = new ExcelExporter('OfflineStudents', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'teachers':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('user.cancelled='.StudentReg::ACTIVE);
                $exporter = new ExcelExporter('Teacher', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'authors':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('user.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserAuthor', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'withoutRoles':{
                $fieldsToExport = ['firstName' => 'Ім\'я',
                    'middleName' => 'По-батькові',
                    'secondName' => 'Прізвище',
                    'email' => 'Електронна пошта',
                    'reg_time' => 'Зареєстровано',
                    'city0.title_ua' => 'Місто',
                    'country0.title_ua' => 'Країна',
                ];
                $criteria =  new CDbCriteria();
                $criteria->alias = 't';
                $criteria->join = 'left join user_student us on us.id_user=t.id';
                $criteria->join .= ' left join teacher tt on tt.user_id=t.id';
                $criteria->addCondition('t.cancelled='.StudentReg::ACTIVE);
                $criteria->addCondition('us.id_user IS NULL and tt.user_id IS NULL');
                $exporter = new ExcelExporter('StudentReg', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'admins':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('user.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserAdmin', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'accountants':{
                $fieldsToExport = ['idUser.firstName' => 'Ім\'я',
                    'idUser.middleName' => 'По-батькові',
                    'idUser.secondName' => 'Прізвище',
                    'idUser.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('idUser.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserAccountant', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'contentManagers':{
                $fieldsToExport = ['idUser.firstName' => 'Ім\'я',
                    'idUser.middleName' => 'По-батькові',
                    'idUser.secondName' => 'Прізвище',
                    'idUser.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('idUser.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserContentManager', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'consultants':{
                $fieldsToExport = ['idUser.firstName' => 'Ім\'я',
                    'idUser.middleName' => 'По-батькові',
                    'idUser.secondName' => 'Прізвище',
                    'idUser.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('idUser.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserTeacherConsultant', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'trainers':{
                $fieldsToExport = ['idUser.firstName' => 'Ім\'я',
                    'idUser.middleName' => 'По-батькові',
                    'idUser.secondName' => 'Прізвище',
                    'idUser.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('idUser.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserTrainer', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'tenants':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('user.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserTenant', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'supervisors':{
                $fieldsToExport = ['user.firstName' => 'Ім\'я',
                    'user.middleName' => 'По-батькові',
                    'user.secondName' => 'Прізвище',
                    'user.email' => 'Електронна пошта',
                    'start_date' => 'Призначено'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('user.cancelled='.StudentReg::ACTIVE.' AND end_date IS NULL');
                $exporter = new ExcelExporter('UserSuperVisor', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
            case 'blockedUsers':{
                $fieldsToExport = ['registeredUser.firstName' => 'Ім\'я',
                    'registeredUser.middleName' => 'По-батькові',
                    'registeredUser.secondName' => 'Прізвище',
                    'registeredUser.email' => 'Електронна пошта',
                    'locked_date' => 'Дата блокування',
                    'lockedBy.fullName' => 'Заблоковано користувачем'
                ];
                $criteria =  new CDbCriteria();
                $criteria->addCondition('registeredUser.cancelled='.StudentReg::DELETED);
                $exporter = new ExcelExporter('UserBlocked', $fieldsToExport);
                $exporter->setCriteria($criteria);
            }
                break;
        }


        header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
        header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
        header ( "Cache-Control: no-cache, must-revalidate" );
        header ( "Pragma: no-cache" );
        header ( "Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" );
        $objWriter = new PHPExcel_Writer_Excel2007($exporter->getDocument());
        $objWriter->save('php://output');
        Yii::app()->end();

    }

    public function actionSaveExcelFile(){
        if (!file_exists(Yii::app()->basePath . "/../files/emailsBase")) {
            mkdir(Yii::app()->basePath . "/../files/emailsBase");
        }
        if ( 0 < $_FILES['file']['error'] ) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            move_uploaded_file($_FILES['file']['tmp_name'], Yii::getpathOfAlias('webroot').'/files/emailsBase/email_base'.Yii::app()->user->model->getCurrentOrganization()->id.'.xlsx');
        }
    }

    public function actionImportExcel(){
        $phpExcelPath = Yii::getPathOfAlias('ext.PHPExcel');
        spl_autoload_unregister(array('YiiBase','autoload'));
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        spl_autoload_register(array('YiiBase','autoload'));

        $emailsCategory = Yii::app()->request->getPost('categoryId');
        $filepath=Yii::getpathOfAlias('webroot').'/files/emailsBase/email_base'.Yii::app()->user->model->getCurrentOrganization()->id.'.xlsx';
        $exporter = new ExcelImporter('users_email',1,$filepath, $emailsCategory);
        $exporter->importExcelToMySQL();
    }

    public function actionAddNewEmail(){
        $email = Yii::app()->request->getPost('email');
        $emailsCategory = Yii::app()->request->getPost('categoryId');
        $userEmail= new UsersEmailDatabase();
        $userEmail->email=$email;
        $userEmail->category=$emailsCategory;
        $userEmail->save();
    }

    public function actionGetUsersEmailList()
    {
        $requestParams = $_GET;
        $criteria = new CDbCriteria();
        $criteria->condition = 'id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        $ngTable = new NgTableAdapter('UsersEmailDatabase', $requestParams);
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }

    public function actionRemoveEmail(){
        $email = Yii::app()->request->getPost('email');
        $category = Yii::app()->request->getPost('category');
        $model= UsersEmailDatabase::model()->findByAttributes(array('email'=>$email,'category'=>$category));
        Yii::app()->user->model->hasAccessToOrganizationModel($model->emailCategory);
        $model->delete();
    }

    public function actionTruncateEmailsTable(){
        $emailsCategoryId = Yii::app()->request->getPost('categoryId');
        $emailsCategory=EmailsCategory::model()->findByPk($emailsCategoryId);
        Yii::app()->user->model->hasAccessToOrganizationModel($emailsCategory);
        UsersEmailDatabase::model()->deleteAllByAttributes(array('category'=>$emailsCategoryId));
    }

    public function actionRemoveEmailCategory(){
        $emailsCategoryId = Yii::app()->request->getPost('categoryId');
        $emailsCategory=EmailsCategory::model()->findByPk($emailsCategoryId);
        Yii::app()->user->model->hasAccessToOrganizationModel($emailsCategory);
        $transaction = Yii::app()->db->beginTransaction();
        try {
            UsersEmailDatabase::model()->deleteAllByAttributes(array('category'=>$emailsCategoryId));
            $emailsCategory->delete();
            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollback();
            throw new \application\components\Exceptions\IntItaException(500, "Виникла помилка при видаленні категорії");
        }
    }

    public function actionGetEmailsCategoryList()
    {
        echo  CJSON::encode(EmailsCategory::model()->findAll('id_organization='.Yii::app()->user->model->getCurrentOrganization()->id));
    }

    public function actionGetEmailCategoryData($id)
    {
        echo CJSON::encode(EmailsCategory::model()->findByPk($id));
    }

    public function actionCreateEmailCategory()
    {
        $title=Yii::app()->request->getParam('name');

        $emailCategory= new EmailsCategory();
        $emailCategory->title=$title;
        $emailCategory->id_organization=Yii::app()->user->model->getCurrentOrganization()->id;
        $emailCategory->save();
    }

    public function actionUpdateEmailCategory()
    {
        $id=Yii::app()->request->getPost('id');
        $title=Yii::app()->request->getPost('name');

        $emailCategory=EmailsCategory::model()->findByPk($id);
        $emailCategory->title=$title;
        $emailCategory->update();
    }

    public function actionOfflineGroups()
    {
        $this->renderPartial('/users/offlineGroups/offlineGroupsTable', array(), false, true);
    }

    public function actionOfflineGroup($id)
    {
        Yii::app()->user->model->hasAccessToOrganizationModel(OfflineGroups::model()->findByPk($id));
        $this->renderPartial('/users/offlineGroups/offlineGroup', array(), false, true);
    }

    public function actionOfflineSubgroup($id)
    {
        Yii::app()->user->model->hasAccessToOrganizationModel(OfflineSubgroups::model()->findByPk($id)->groupName);
        $this->renderPartial('/users/offlineGroups/offlineSubgroup', array(), false, true);
    }

    public function actionAttachStudents()
    {
        $this->renderPartial('/users/tables/students/_students', array(), false, true);
    }

    public function actionGetGroupNumber(){

        $groups = OfflineGroups::model()->findAll();
        $res = array();
        $result = array();

        foreach($groups as $group){
            $res['id'] = $group->id;
            $res['title'] = $group->name;
            array_push($result, $res);
        }

        echo json_encode($result);
    }

    public function actionGetEducationForm(){
        $result = EducationForm::model()->findAll();

        $res = array();
        $temp = array();
        foreach($result as $item){
            $temp['id'] = $item->id;
            $temp['title'] = $item->title_ua;
            array_push($res, $temp);
        }

        echo json_encode($res);
    }

    public function actionGetEducationTime(){
        $result = EducationShift::model()->findAll();

        $res = array();
        $temp = array();
        foreach($result as $item){
            $temp['id'] = $item->id;
            $temp['title'] = $item->title_ua;
            array_push($res, $temp);
        }

        echo json_encode($res);
    }

    public function actionPersonalInfo()
    {
        $this->renderPartial('/users/tables/students/_personalInfo', array(), false, true);
    }

    public function actionGetPersonalInfo()
    {
        $requestParams = $_GET;

        $ngTable = new NgTableAdapter('StudentInfo', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->join = 'left join trainer_student as ts on t.id_student=ts.student';
        if(isset($_GET['trainersScope'])){
            $criteria->condition = 'ts.trainer='.Yii::app()->user->getId().' and ts.end_time is null
        and ts.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        }else{
            $criteria->addCondition('t.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id);
        }
        $criteria->order = 'ts.start_time DESC';
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();

        echo json_encode($result);
    }

    public function actionCareerInfo()
    {
        $this->renderPartial('/users/tables/students/_career', array(), false, true);
    }

    public function actionGetCareerInfo()
    {
        $requestParams = $_GET;
        $specialization_id = 0;

        if(isset($requestParams['filter']['specializations.id'])){
            $specialization_id = $requestParams['filter']['specializations.id'];
            unset($requestParams['filter']['specializations.id']);
        }

        $ngTable = new NgTableAdapter('StudentInfo', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->with=array('specializations');
        $criteria->join = 'left join trainer_student as ts on t.id_student=ts.student';
        $criteria->join .= ' left join user_specialization_organization as uso on t.id=uso.id_student_info';
        $criteria->join .= ' left join specializations_group as sg on uso.id_specialization=sg.id';
        if(isset($_GET['trainersScope'])){
            $criteria->condition = 'ts.trainer='.Yii::app()->user->getId().' and ts.end_time is null
        and ts.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        }else{
            $criteria->condition ='t.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        }
        if($specialization_id != 0){
            $criteria->addCondition('sg.id='.$specialization_id);
        }
        $criteria->order = 'ts.start_time DESC';
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();

        echo json_encode($result);
    }

    public function actionGetSpecializationGroup(){
        $results = SpecializationsGroup::model()->findAll();

        $res = array();
        $temp = array();
        foreach($results as $item){
            $temp["id"] = $item->id;
            $temp["title"] = $item->title_ua;
            array_push($res, $temp);
        }

        echo json_encode($res);
    }

    public function actionGetPayForm(){
        $result = SchemesName::model()->findAll();

        $res = array();
        $temp = array();
        foreach($result as $item){
            $temp['id'] = $item->pay_count;
            $temp['title'] = $item->title_ua;
            array_push($res, $temp);
        }

        echo json_encode($res);
    }

    public function actionContractInfo()
    {
        $this->renderPartial('/users/tables/students/_contract', array(), false, true);
    }

    public function actionGetContractInfo()
    {
        $requestParams = $_GET;
        $ngTable = new NgTableAdapter('UserAgreements', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->alias = 't';
        $criteria->with = array('organization');
        $criteria->join = 'left join trainer_student as ts on t.user_id=ts.student';
        if(isset($_GET['trainersScope'])){
            $criteria->join = 'left join trainer_student as ts on t.user_id=ts.student';
            $criteria->condition = 'ts.trainer='.Yii::app()->user->getId().' and ts.end_time is null
        and organization.id='.Yii::app()->user->model->getCurrentOrganization()->id;
        }else{
            $criteria->condition = 'organization.id='.Yii::app()->user->model->getCurrentOrganization()->id;
        }
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();
        echo json_encode($result);
    }


    public function actionVisitInfo()
    {
        $this->renderPartial('/users/tables/students/_visit', array(), false, true);
    }

    public function actionGetVisitInfo()
    {
        $requestParams = $_GET;
        $group_name_id = 0;
        $reason_id = 0;

        if(isset($requestParams['filter']['group_name.id'])){
            $group_name_id = $requestParams['filter']['group_name.id'];
            unset($requestParams['filter']['group_name.id']);
        }

        if(isset($requestParams['filter']['reason.id'])){
            $reason_id = $requestParams['filter']['reason.id'];
            unset($requestParams['filter']['reason.id']);
        }

        $ngTable = new NgTableAdapter('StudentInfo', $requestParams);
        $criteria =  new CDbCriteria();
        $criteria->with=['group'];
        $criteria->join = 'left join trainer_student as ts on t.id_student=ts.student';
        $criteria->join .= ' left join offline_students as os ON t.id_student=os.id_user';
        $criteria->join .= ' left join offline_subgroups as osbgr ON os.id_subgroup=osbgr.id';
        $criteria->join .= ' left join offline_groups as ogr ON osbgr.group=ogr.id';
        $criteria->join .= ' left join offline_student_cancel_type as osct ON os.cancel_type=osct.id';
        if(isset($_GET['trainersScope'])){
            $criteria->condition = 'ts.trainer='.Yii::app()->user->getId().' and ts.end_time is null
        and ts.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        }else{
            $criteria->condition ='t.id_organization='.Yii::app()->user->model->getCurrentOrganization()->id;
        }
        if($group_name_id != 0){
            $criteria->addCondition('ogr.id='.$group_name_id);
        }
        if($reason_id != 0){
            $criteria->addCondition('osct.id='.$reason_id);
        }
        $criteria->order = 'ts.start_time DESC';
        $ngTable->mergeCriteriaWith($criteria);
        $result = $ngTable->getData();

        echo json_encode($result);
    }

    public function actionGetCancelType(){
        $reason = OfflineStudentCancelType::model()->findAll();
        $res = array();
        $result = array();

        foreach($reason as $item){
            $res['id'] = $item->id;
            $res['title'] = $item->description;
            array_push($result, $res);
        }

        echo json_encode($result);
    }

    public function actionUpdateStudent(){
        $id_student = $_GET['id_student'];
        $attr = $_GET['attr'];
        $data = $_GET['data'];
        $student = StudentInfo::model()->findByAttributes(array('id_student'=>$id_student));
        $student[$attr] = $data;
        $student->save();
    }

    public function actionUpdateSpecialization(){
        $id_organization = Yii::app()->user->model->getCurrentOrganization()->id;
        $data = $_GET["data"];
        preg_match_all("/\d+/", $data, $matches);
        $num = $matches[0];
        $id_stud_info = $num[0];
        $del_student_spec = UserSpecializationOrganization::model()->deleteAllByAttributes(
            array(
                'id_student_info' => $id_stud_info,
                'id_organization' => $id_organization)
        );
        $length = count($num);
        if($length > 1){
            for($i = 1; $i<$length; $i++){
                $new_save = new UserSpecializationOrganization();
                $new_save['id_student_info'] = $id_stud_info;
                $new_save['id_specialization'] = $num[$i];
                $new_save['id_organization'] = $id_organization;
                $new_save->save();
            }
        }
    }

    public function actionChangePayForm(){
        $id_student = $_GET['id_student'];
        $id_pay = $_GET['id_pay'];
        $student = StudentInfo::model()->findByAttributes(['id_student'=>$id_student]);
        $student['pay_form'] = $id_pay;
        $student->save();
    }

    public function actionChangeFormStudy(){
        $id_student = $_GET['id_student'];
        $id_form_study = $_GET['id_study_form'];
        $student = StudentInfo::model()->findByAttributes(['id_student'=>$id_student]);
        $student->rather_form_study = $id_form_study;
        $student->save();
    }

    public function actionChangeTimeStudy(){
        $id_student = $_GET['id_student'];
        $id_time_study = $_GET['id_time_form'];
        $student = StudentInfo::model()->findByAttributes(['id_student'=>$id_student]);
        $student->rather_time_study = $id_time_study;
        $student->save();
    }
}