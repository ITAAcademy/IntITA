<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 22.12.2015
 * Time: 17:05
 */

class TeachersController extends TeacherCabinetController{

    public function hasRole(){
        return Yii::app()->user->model->isAdmin();
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'teacher-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionIndex()
    {
        $model = new Teacher('search');
        $model->unsetAttributes();

        if (isset($_GET['Teacher']))
            $model->attributes = $_GET['Teacher'];

        $this->renderPartial('index', array(
            'model' => $model,
        ),false,true);
    }

    public function actionShowTeacher($id)
    {
        $user = RegisteredUser::userById($id);
        if(!$user->isTeacher()){
            throw new \application\components\Exceptions\IntItaException(400, 'Такого викладача немає.');
        }
        $teacher = $user->getTeacher();

        $this->renderPartial('showTeacher',array(
            'teacher' => $teacher,
            'user' => $user
        ),false,true);
    }

    public function actionAddModule($id)
    {
        $user = RegisteredUser::userById($id);
        if(!$user->isTeacher()){
            throw new \application\components\Exceptions\IntItaException(400, 'Такого викладача немає.');
        }
        $attributes = $user->getAttributesByRole(UserRoles::AUTHOR);


        $this->renderPartial('_moduleList',array(
            'user' => $user->id,
            'model' => $user,
            'role' => UserRoles::AUTHOR,
            'attribute' => $attributes["module"]
        ),false,true);
    }

    public function actionCreate()
    {
        $messageId = Yii::app()->request->getPost('message', 0);
        $userApproved = Yii::app()->request->getPost('user', 0);

        $model = new Teacher;

        if (isset($_POST['Teacher'])) {
            $model->attributes = $_POST['Teacher'];
             if ($model->save()) {
                if($messageId && $userApproved){
                    $message = MessagesCoworkerRequest::model()->findByPk($messageId);
                    $user = StudentReg::model()->findByPk($userApproved);
                    $message->approve($user);
                }
                $this->redirect($this->pathToCabinet());
            } else {
                throw new \application\components\Exceptions\IntItaException(400, 'Не вдалося додати викладача.');
            }
        }
        $predefinedUser = null;
        if($messageId && $userApproved){
            $predefinedUser = StudentReg::model()->findByPk($userApproved);
        }

        $this->renderPartial('create', array(
            'model' => $model,
            'message' => $messageId,
            'predefinedUser' => $predefinedUser
        ),false,true);
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

         $this->performAjaxValidation($model);

        if (isset($_POST['Teacher'])) {
            $model->attributes = $_POST['Teacher'];
            if ($model->save())
            $this->redirect($this->pathToCabinet());
        }
        $this->renderPartial('update', array(
            'model' => $model,
        ),false,true);
    }

    public function loadModel($id)
    {
        $model = Teacher::model()->findByAttributes(array('user_id' => $id));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDelete($id)
    {
        $model = Teacher::model()->findByPk($id);
        $model->setDeleted();
        if(!$model->isActive()) echo 'success';
        else echo "error";
    }

    public function actionRestore($id)
    {
        $model = Teacher::model()->findByPk($id);
        $model->setActive();
        if($model->isActive()) echo 'success';
        else echo "error";
    }

    public function actionCancelTeacherRole($id)
    {
        $user = RegisteredUser::userById($id);
        $roles = $user->teacherRoles();
        $teacher = $user->getTeacher();

        $this->renderPartial('cancelTeacherRole', array(
            'teacher' => $teacher,
            'roles' => $roles,
        ),false,true);
    }

    public function actionAddTeacherRole($id)
    {
        $user = RegisteredUser::userById($id);
        $teacher = $user->getTeacher();
        $roles = $user->noSetTeacherRoles();

        $this->renderPartial('addTeacherRole', array(
            'teacher' => $teacher,
            'roles' => $roles,
        ),false,true);
    }

    public function actionUnsetTeacherRole()
    {
        $id = Yii::app()->request->getPost('teacher');
        $role = Yii::app()->request->getPost('role');

        $user = RegisteredUser::userById($id);
        if ($id && $role) {
            echo $user->cancelRoleMessage(new UserRoles($role));
        } else {
            throw new \application\components\Exceptions\IntItaException(400, "Неправильний запит.");
        }
    }

    public function actionSetTeacherRole()
    {
        $id = Yii::app()->request->getPost('teacher', 0);
        $role = Yii::app()->request->getPost('role', '');

        $user = RegisteredUser::userById($id);
        if ($id && $role) {
            if ($user->setRole(new UserRoles($role))) {
                echo "success";
            } else {
                echo "error";
            }
        } else {
            throw new \application\components\Exceptions\IntItaException(400, "Неправильний запит.");
        }
    }

    public function actionEditRole($id, $role)
    {
        $user = RegisteredUser::userById($id);
        $role = new UserRoles($role);
        $attributes = $user->getAttributesByRole($role);

        $this->renderPartial('editRole', array(
            'model' => $user->registrationData,
            'role' => $role,
            'attributes' => $attributes
        ),false,true);
    }

    public function actionGetTeachersAdminList()
    {
        echo Teacher::teachersAdminList();
    }

    public function actionModulesByQuery($query)
    {
        if ($query) {
            $modules = Module::allModules($query);
            echo $modules;
        } else {
            throw new \application\components\Exceptions\IntItaException('400');
        }
    }

    public function actionUsersByQuery($query)
    {
        if ($query) {
            $users = StudentReg::usersWithoutTeachers($query);
            echo $users;
        } else {
            throw new \application\components\Exceptions\IntItaException('400');
        }
    }

    public function actionUsersWithoutTrainers($query)
    {
        if ($query) {
            $users = StudentReg::usersWithoutAssignedTrainers($query);
            echo $users;
        } else {
            throw new \application\components\Exceptions\IntItaException('400');
        }
    }

    public function actionSetTeacherRoleAttribute()
    {
        $request = Yii::app()->request;
        $userId = $request->getPost('user', 0);
        $role = $request->getPost('role', '');
        $attribute = $request->getPost('attribute', '');
        $value = $request->getPost('attributeValue', 0);
        $user = RegisteredUser::userById($userId);

        if ($userId && $attribute && $value && $role) {
            if($user->setRoleAttribute(new UserRoles($role), $attribute, $value)){
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }


    public function actionUnsetTeacherRoleAttribute()
    {
        $request = Yii::app()->request;
        $userId = $request->getPost('user', 0);
        $role = $request->getPost('role', '');
        $attribute = $request->getPost('attribute', '');
        $value = $request->getPost('attributeValue', 0);
        $user = RegisteredUser::userById($userId);

        if ($userId && $attribute && $value && $role) {
            if($user->unsetRoleAttribute(new UserRoles($role), $attribute, $value)){
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
    }

    public function actionShowAttributes()
    {
        $user = Yii::app()->request->getPost('user');
        $role = Yii::app()->request->getPost('role');

        $user = StudentReg::model()->findByPk($user);
        $attributes = Role::getInstance(new UserRoles($role))->attributes($user);

        $this->renderPartial('_showAttributes', array(
            'attributes' => $attributes
        ), false, true);
    }
}