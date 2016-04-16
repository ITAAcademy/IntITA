<?php

class CabinetController extends TeacherCabinetController
{

    public function hasRole(){
        return !Yii::app()->user->isGuest;
    }

    public function actionIndex($scenario = "dashboard", $receiver = 0)
    {
        $model = Yii::app()->user->model;

        if (!$model) {
            throw new \application\components\Exceptions\IntItaException(400, 'Користувача не знайдено.');
        }
        $newReceivedMessages = $model->newReceivedMessages();
        $countNewMessages = count($newReceivedMessages);
        $newReceivedMessages = $model->newMessages($newReceivedMessages);
        $requests = $model->requests();



        $this->render('index', array(
            'model' => $model,
            'newMessages' => $newReceivedMessages,
            'countNewMessages' => $countNewMessages,
            'scenario' => $scenario,
            'receiver' => $receiver,
            'requests' => $requests
        ));
    }

    public function actionLoadPage($page)
    {
        $page = strtoupper($page);

        $model = Yii::app()->user->model;
        $role = new UserRoles($page);

        if ($role && $model)
            $this->rolesDashboard($model, array($role));
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $this->render('view', array(
            'model' => $model,
        ));
    }

    public function actionLogin($id)
    {
        $email = StudentReg::model()->findByPk($id)->email;
        $model = array_shift(Teacher::model()->findAllByAttributes(array('email' => $email)));

        $this->render('cabinet', array(
            'model' => $model,
        ));
    }

    private function loadModel($id)
    {
        $model = Teacher::model()->findByPk($id);
        if (!$model)
            throw new \Psr\Log\InvalidArgumentException('Page not found');
        return $model;
    }

    public function actionLoadDashboard($user)
    {
        $model = RegisteredUser::userById($user);
        $this->rolesDashboard($model);
    }

    public function actionAccountantPage($user)
    {
        $this->redirect(Yii::app()->createUrl('/_teacher/accountant/index', array('user' => $user)));
    }

    public function actionAdminPage()
    {
        $this->redirect(Yii::app()->createUrl('/_teacher/admin/index'));

    }

    public function rolesDashboard(RegisteredUser $user, $inRole = null)
    {
        if ($inRole == null) {
            $roles = $user->getRoles();
        } else $roles = $inRole;

        foreach ($roles as $role) {
            switch ($role) {
                case "trainer":
                case "author":
                case 'consultant':
                case 'student':
                case 'tenant':
                case 'content_manager':
                case 'teacher_consultant':
                    $this->renderDashboard($role, $user);
                    break;
                case 'admin':
                    $this->renderAdminDashboard();
                    break;
                case 'accountant':
                    $this->renderAccountantDashboard();
                    break;

                default:
                    throw new CHttpException(400, 'Неправильно вибрана роль!');
                    break;
            }
        }
    }

    private function renderDashboard(UserRoles $role, RegisteredUser $user){
        $view = '/'.$role.'/_dashboard';
        return $this->renderPartial($view, array(
            'teacher' => $user->getTeacher(),
            'user' => $user->registrationData
        ));
    }

    private function renderAdminDashboard()
    {
        return $this->renderPartial('/admin/index');
    }

    private function renderAccountantDashboard()
    {
        return $this->renderPartial('/accountant/index');
    }

    public function actionUsersByQuery($query)
    {
        if ($query) {
            $users = StudentReg::allUsers($query);
            echo $users;
        } else {
            throw new \application\components\Exceptions\IntItaException('400');
        }
    }

}