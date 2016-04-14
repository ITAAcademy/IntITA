<?php

class TeacherConsultant extends Role
{
    private $errorMessage = "";
    private $dbModel;
    private $modules;
    private $students;
    private $user;

    public function tableName()
    {
        return "user_teacher_consultant";
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function title()
    {
        return "Викладач";
    }

    public function attributes(StudentReg $user)
    {
        if ($this->user == null)
            $this->user = $user;

        return array(
            array(
                'key' => 'module',
                'title' => 'Модулі',
                'type' => 'module-list',
                'value' => $this->getModules()
            ),
            array(
                'key' => 'students',
                'title' => 'Студенти',
                'type' => 'hidden',
                'value' => $this->getStudents()
            )
        );
    }

    private function getModules()
    {
        if ($this->modules == null) {
            $this->modules = $this->loadModules();
        }

        return $this->modules;
    }

    private function getStudents()
    {
        if ($this->students == null) {
            $this->students = $this->loadStudents();
        }

        return $this->students;
    }

    private function loadStudents()
    {
        $records = Yii::app()->db->createCommand()
            ->select('u.id, GROUP_CONCAT(DISTINCT u.secondName, u.firstName, u.middleName, u.email ORDER BY u.id ASC SEPARATOR " ") title, u.email, tcs.start_date, tcs.end_date')
            ->from('teacher_consultant_student tcs')
            ->rightJoin('user u', 'u.id=tcs.id_student')
            ->where('id_teacher=:id', array(':id' => $this->user->id))
            ->group('u.id')
            ->queryAll();

        return $records;
    }

    private function loadModules()
    {
        $records = Yii::app()->db->createCommand()
            ->select('id_module id, language lang, m.title_ua title, tcm.start_date, tcm.end_date')
            ->from('teacher_consultant_module tcm')
            ->join('module m', 'm.module_ID=tcm.id_module')
            ->where('id_teacher=:id', array(':id' => $this->user->id))
            ->queryAll();

        return $records;
    }

    public function checkBeforeDeleteRole(StudentReg $user)
    {
        return true;
    }

    public function cancelAttribute(StudentReg $user, $attribute, $value)
    {
        switch ($attribute) {
            case 'module':
                return Yii::app()->db->createCommand()->
                update('teacher_consultant_module', array(
                    'end_date' => date("Y-m-d H:i:s"),
                ), 'id_teacher=:user and id_module=:module', array(':user' => $user->id, 'module' => $value));
                break;
            default:
                return false;
        }
    }

    public function addRoleFormList($query)
    {
        $criteria = new CDbCriteria();
        $criteria->select = "id, secondName, firstName, middleName, email, avatar";
        $criteria->alias = "s";
        $criteria->addSearchCondition('firstName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('secondName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('middleName', $query, true, "OR", "LIKE");
        $criteria->addSearchCondition('email', $query, true, "OR", "LIKE");
        $criteria->join = 'LEFT JOIN user_teacher_consultant u ON u.id_user = s.id';
        $criteria->addCondition('u.id_user IS NULL or u.end_date IS NOT NULL');

        $data = StudentReg::model()->findAll($criteria);

        $result = [];
        foreach ($data as $key => $model) {
            $result["results"][$key]["id"] = $model->id;
            $result["results"][$key]["name"] = $model->secondName . " " . $model->firstName . " " . $model->middleName;
            $result["results"][$key]["email"] = $model->email;
            $result["results"][$key]["url"] = $model->avatarPath();
        }
        return json_encode($result);
    }

    public function setAttribute(StudentReg $user, $attribute, $value)
    {
        switch ($attribute) {
            case 'module':
                if ($this->checkModule($user->id, $value)) {
                    return Yii::app()->db->createCommand()->
                    insert('teacher_consultant_module', array(
                        'id_teacher' => $user->id,
                        'id_module' => $value
                    ));
                } else {
                    return false;
                }
            default:
                return false;
        }
    }

    public function setStudentAttribute(StudentReg $teacher, $student, $module)
    {
        if ($this->checkStudent($teacher->id, $student, $module)) {
            return Yii::app()->db->createCommand()->
            insert('teacher_consultant_student', array(
                'id_teacher' => $teacher->id,
                'id_module' => $module,
                'id_student' => $student
            ));
        } else {
            return false;
        }
    }


    public function checkStudent($teacher, $module, $student)
    {
        if (Yii::app()->db->createCommand('select id_teacher from teacher_consultant_student where id_module=' . $module .
            ' and id_teacher=' . $teacher . ' and id_student=' . $student . ' and end_date IS NULL')->queryScalar()
        ) {
            $this->errorMessage = "Даний викладач вже має права консультанта для обраного модуля для обраного студента.";
            return false;
        } else return true;
    }

    public function checkModule($teacher, $module)
    {
        if (empty(Yii::app()->db->createCommand('select count(id_module) from teacher_consultant_module where id_module=' . $module .
                ' and id_teacher=' . $teacher . ' and end_date IS NULL')->queryAll())) {
            return false;
        } else return true;
    }

    public function existOpenTaskAnswers(StudentReg $teacher)
    {
        return (count($this->openPlainTaskAnswers($teacher)) > 0);
    }

    public function openPlainTaskAnswers(StudentReg $teacher)
    {
        $criteria = new CDbCriteria();
        $criteria->select = '*';
        $criteria->alias = 'ans';
        $criteria->join = 'LEFT JOIN plain_task_answer_teacher pt ON pt.id_plain_task_answer = ans.id';
        $criteria->condition = 'pt.id_teacher = ' . $teacher->id . ' and end_date IS NOT NULL';

        return PlainTaskAnswer::model()->findAll($criteria);
    }

    /**
     * Return true if this student assigned for this teacher-consultant for chosen module. Used before canceling student
     * for teacher-consultant.
     * @param $teacher
     * @param $module
     * @param $student
     * @return bool
     */
    public function checkCancelStudent($teacher, $module, $student)
    {
        if (Yii::app()->db->createCommand('select id_teacher from teacher_consultant_student where id_module=' . $module .
                ' and id_teacher=' . $teacher . ' and id_student=' . $student . ' and end_date IS NULL')->queryScalar() == 0
        ) {
            return false;
        } else return true;
    }

    public function cancelStudentAttribute(StudentReg $teacher, $student, $module)
    {
        return Yii::app()->db->createCommand()->
        update('teacher_consultant_student', array(
            'end_date' => date("Y-m-d H:i:s"),
        ), 'id_teacher=:teacher and id_student=:student and id_module=:module', array(
            ':teacher' => $teacher->id,
            ':student' => $student,
            ':module' =>$module
        ));
    }
}