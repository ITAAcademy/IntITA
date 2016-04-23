<?php

class TeacherConsultantController extends TeacherCabinetController
{
    public function hasRole(){
        return Yii::app()->user->model->isTeacherConsultant();
    }

    public function actionAssignModule(){
        $userId = Yii::app()->request->getPost('userId', 0);
        $module = Yii::app()->request->getPost('module', 0);

        if($userId && $module){
            $user = RegisteredUser::userById($userId);
            $role = Role::getInstance(UserRoles::TEACHER_CONSULTANT);
            if($role->checkModule($userId, $module)){
                if($user->setRoleAttribute(UserRoles::TEACHER_CONSULTANT, 'module', $module)){
                    echo "Викладача для модуля успішно призначено.";
                    Yii::app()->end();
                } else {
                    echo "Операцію не вдалося виконати.";
                    Yii::app()->end();
                }
            } else {
                echo "Даний викладач вже має права консультанта для обраного модуля.";
                Yii::app()->end();
            }
        }
    }

    public function actionShowTeacherPlainTaskList($idTeacher)
    {
        if ($idTeacher == 0) {
            throw new \application\components\Exceptions\IntItaException(400, 'Неправильний запит.');
        }

        $tasksList = PlainTaskAnswer::plainTaskListByTeacher($idTeacher);

        return $this->renderPartial('/_teacher_consultant/teacherPlainTaskList', array(
            'teacherPlainTasks' => $tasksList,
        ));
    }

    public function actionModules($id){
        $user = RegisteredUser::userById($id);
        $modules = $user->getAttributesByRole(UserRoles::TEACHER_CONSULTANT)[0];

        return $this->renderPartial('/_teacher_consultant/_modules', array(
            'modules' => $modules,
        ));
    }

    public function actionStudents($id){
        $user = RegisteredUser::userById($id);
        $students = $user->getAttributesByRole(UserRoles::TEACHER_CONSULTANT)[1];

        return $this->renderPartial('/_teacher_consultant/_students', array(
            'students' => $students,
        ));
    }

    public function actionShowPlainTask($idPlainTask)
    {
        if ($idPlainTask == 0) {
            throw new \application\components\Exceptions\IntItaException(400, 'Такої задачі не знайдено.');
        }

        $plainTask = PlainTaskAnswer::model()->findByPk($idPlainTask);
        if (!$plainTask) {
            throw new \application\components\Exceptions\IntItaException(400, 'Такої задачі не знайдено.');
        }

        return $this->renderPartial('/_teacher_consultant/showPlainTask', array(
            'plainTask' => $plainTask
        ), false, true);
    }

    public function actionMarkPlainTask()
    {
        $plainTaskId = Yii::app()->request->getPost('idPlainTask');
        $mark = Yii::app()->request->getPost('mark');
        $comment = Yii::app()->request->getPost('comment');
        $userId = Yii::app()->request->getPost('userId');

        if (!PlainTaskMarks::saveMark($plainTaskId, $mark, $comment, $userId))
            throw new \application\components\Exceptions\IntItaException(503, 'Ваша оцінка не записана в базу даних.
            Спробуйте пізніше або повідомте адміністратора.');
    }
}