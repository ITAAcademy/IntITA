<?php

class CourseController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Lists all models.
     */
    public function actionIndex($id)
    {
        if(Yii::app()->user->isGuest) {
            $canEdit = false;
        } else {
            $canEdit = Yii::app()->user->model->isAdmin();
        }
        $model = Course::model()->findByPk($id);
        if ($model->cancelled == Course::DELETED) {
            throw new \application\components\Exceptions\IntItaException('410', Yii::t('error', '0786'));
        }

        $dataProvider = new CourseModules('search');

        $this->render('index', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'canEdit' => $canEdit,
        ));

    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Course the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Course::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Course $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUnableModule()
    {
        $idCourse = Yii::app()->request->getParam('idCourse');
        $idModule = Yii::app()->request->getParam('idModule');

        $course = Course::model()->with('module')->findByPk($idCourse);

        $this->checkInstance($course);

        $course->disableModule($idModule);

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionUpModule()
    {
        $idCourse = Yii::app()->request->getParam('idCourse');
        $idModule = Yii::app()->request->getParam('idModule');

        $course = Course::model()->with("module")->findByPk($idCourse);

        $this->checkInstance($course);

        $course->upModule($idModule);

//        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionDownModule()
    {
        $idCourse = Yii::app()->request->getParam('idCourse');
        $idModule = Yii::app()->request->getParam('idModule');

        $course = Course::model()->with("module")->findByPk($idCourse);

        $this->checkInstance($course);

        $course->downModule($idModule);

        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionModulesUpdate()
    {
        $model = Course::model()->findByPk($_POST['idcourse']);
        $this->renderPartial('_addLessonForm', array('model' => $model), false, true);
    }

    public function actionCourseUpdate()
    {
        if (Yii::app()->request->isPostRequest) {
            $model = new Course;
            $model->attributes = $_POST;
            if ($model->save()) {
                echo CJSON::encode(array('id' => $model->primaryKey));
            } else {
                $errors = array_map(function ($v) {
                    return join(', ', $v);
                }, $model->getErrors());
                echo CJSON::encode(array('errors' => $errors));
            }
        } else {
            throw new CHttpException(400, 'Invalid request');
        }
    }

    public function actionSchema($id)
    {
        $lg = Yii::app()->session['lg'];
        $filename = StaticFilesHelper::pathToCourseSchema('schema_course_' . $id . '_' . $lg . '.html');

        if (!file_exists($filename)) {
            $modules = Course::getCourseModulesSchema($id);
            $tableCells = Course::getTableCells($modules, $id);
            $courseDurationInMonths =  Course::getCourseDuration($tableCells) + 5;
            $lang = $_SESSION['lg'];
            $lg = ['ua','ru','en'];
            for($i = 0;$i < 3;$i++)
            {
                Yii::app()->session['lg'] = $lg[$i];
                $messages = Translate::model()->getMessagesForSchemabyLang($lg[$i]);

                $schema = $this->renderPartial('_schema', array(
                    'modules' => $modules,
                    'idCourse' => $id,
                    'tableCells' => $tableCells,
                    'courseDuration' => $courseDurationInMonths,
                    'messages' => $messages,
                    'save' => true
                ), true);
                $name = 'schema_course_'.$id.'_'.$lg[$i].'.html';
                $file = StaticFilesHelper::pathToCourseSchema($name);
                file_put_contents($file, $schema);
            }
            Yii::app()->session['lg'] = $lang;
        }

        try {
            $path = Config::getBaseUrl() . '/' . $filename;
            $this->redirect($path);
        } catch (Exception $e) {
            throw new \application\components\Exceptions\IntItaException(404, Yii::t('course_schema', '0780'));
        }
    }

    public function checkInstance($model) {
        if ($model === null)
            throw new \application\components\Exceptions\CourseNotFoundException();
    }
    public function actionModulesData()
    {
        //init data json
        $data = [];
        $data["courseId"] = Yii::app()->request->getPost('id');
        if(Yii::app()->user->getId())
        $data["userId"] = Yii::app()->user->getId();
        else $data["userId"]=false;
        $data["isAdmin"] = (Yii::app()->user->isGuest)?false:Yii::app()->user->model->isAdmin();
        $data["termination"][0] = Yii::t('module', '0653');
        $data["termination"][1] = Yii::t('module', '0654');
        $data["termination"][2] = Yii::t('module', '0655');
        $data["modules"]=[];
        if(Course::model()->findByPk($data["courseId"])->status=='1')
            $data["courseStatus"]=true;
        else $data["courseStatus"]=false;

        //if guest or admin return json
        if(!$data["userId"] || $data["isAdmin"]){
            $modules=Course::model()->modulesInCourse($data["courseId"]);
            if($data["isAdmin"])
                $data["isPaidCourse"]=PayCourses::model()->checkCoursePermission($data["userId"], $data["courseId"], array('read'));
            for($i = 0;$i < count($modules);$i++){
                if(!$data["userId"])
                    $data["modules"][$i]['access']=false;
                else $data["modules"][$i]['access']=true;
                $module=Module::model()->findByPk($modules[$i]['id_module']);
                $data["modules"][$i]['id']= $modules[$i]['id_module'];
                $data["modules"][$i]['time']= $module->averageModuleDuration();
                $data["modules"][$i]['title']=CHtml::decode($module->getTitle());
                $data["modules"][$i]['link']=Yii::app()->createUrl("module/index", array("idModule" => $modules[$i]['id_module'], "idCourse" => $data["courseId"]));
            }
            echo CJSON::encode($data);
            return;
        }

        $user=Studentreg::model()->findByPk($data["userId"]);
        if($user->isTeacher()){
            $data["teacherId"] = $user->id;
            $data["isPaidCourse"]=PayCourses::model()->checkCoursePermission($data["userId"], $data["courseId"], array('read'));
        }else{
            $data["teacherId"] = false;
            $data["isPaidCourse"]=PayCourses::model()->checkCoursePermission($data["userId"], $data["courseId"], array('read'));
        }

        $modules=Course::model()->modulesInCourse($data["courseId"]);

        for($i = 0;$i < count($modules);$i++){
            $module=Module::model()->findByPk($modules[$i]['id_module']);
            $data["modules"][$i]['id']= $modules[$i]['id_module'];
            $data["modules"][$i]['time']= $module->averageModuleDuration();
            $data["modules"][$i]['title']=CHtml::decode($module->getTitle());
            $data["modules"][$i]['link']=Yii::app()->createUrl("module/index", array("idModule" => $modules[$i]['id_module'], "idCourse" => $data["courseId"]));

            if( $data["teacherId"]){
                $data["modules"][$i]['isAuthor']=Teacher::isTeacherIdAuthorModule( $data["userId"], $modules[$i]['id_module']);
            }else{
                $data["modules"][$i]['isAuthor']=false;
            }
            if($data["isPaidCourse"]){
                $data["modules"][$i]['access']=true;
                $firstQuiz = $module->getFirstQuizId();
                if(Lecture::getLastEnabledLessonOrder($modules[$i]['id_module'])<$module->lesson_count)
                    $lastQuiz = false;
                else $lastQuiz = $module->getLastQuizId();
                if ($firstQuiz)
                    $data["modules"][$i]['startTime'] = (Module::getTimeAnsweredQuiz($firstQuiz, $data["userId"]))?(strtotime(Module::getTimeAnsweredQuiz($firstQuiz, $data["userId"]))): (false);
                else $data["modules"][$i]['startTime'] = false;
                if ($lastQuiz)
                    $data["modules"][$i]['finishTime'] = (Module::getTimeAnsweredQuiz($lastQuiz, $data["userId"]))?(strtotime(Module::getTimeAnsweredQuiz($lastQuiz, $data["userId"]))): (false);
                else $data["modules"][$i]['finishTime'] = false;
            }else{
                if(PayModules::model()->checkModulePermission($data["userId"], $modules[$i]['id_module'], array('read'))) {
                    $data["modules"][$i]['access']=true;
                    $firstQuiz = $module->getFirstQuizId();
                    if(Lecture::getLastEnabledLessonOrder($modules[$i]['id_module'])<$module->lesson_count)
                        $lastQuiz = false;
                    else $lastQuiz = $module->getLastQuizId();
                    if ($firstQuiz)
                        $data["modules"][$i]['startTime'] = (Module::getTimeAnsweredQuiz($firstQuiz, $data["userId"]))?(strtotime(Module::getTimeAnsweredQuiz($firstQuiz, $data["userId"]))): (false);
                    else $data["modules"][$i]['startTime'] = false;
                    if ($lastQuiz)
                        $data["modules"][$i]['finishTime'] = (Module::getTimeAnsweredQuiz($lastQuiz, $data["userId"]))?(strtotime(Module::getTimeAnsweredQuiz($lastQuiz, $data["userId"]))): (false);
                    else $data["modules"][$i]['finishTime'] = false;
                }else{$data["modules"][$i]['access']=false;}
            }

        }
        echo CJSON::encode($data);
    }
}
