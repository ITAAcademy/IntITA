<?php

/*@var $model TeachersTemp*/

class TeachersController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'teacherletter', 'UpdateTeacherAvatar'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->renderIndex(new TeacherLetter);
    }

    public function actionTeacherLetter()
    {
        $answer = json_decode(file_get_contents('php://input'), true);
        $obj = new TeacherLetter();
        $obj->attributes = $answer;
        $obj->courses = $answer["courses"];
            $title = "Teacher_Work " . $obj->firstname . " " . $obj->lastname;
            $mess = "Ім'я: " . $obj->firstname . " " . $obj->lastname . "\r\n" . "Телефон: " . $obj->phone . "\r\n" . "Курси які готовий викладати: " . $obj->courses;
            $to = Config::getAdminEmail();
            $sender = new MailTransport();
            $sender->renderBodyTemplate('_teacherRequest', array($mess));
            if ($sender->send($to,  $obj->email, $title, $mess))
                echo Yii::t('letter', '0914');
            else {
                echo Yii::t('letter', '0915');
            }
            $directors = Teacher::requestDirectorsArray();
            foreach($directors as $director){
                $email = $director->email;
                if(isset($email)){
                    $sender->send($email,  $obj->email, $title, $mess);
                }
            }
    }

    private function renderIndex($teacherLetter)
    {
        $dataProvider = Teacher::getTeacherAsPrint();
        $teachers = Teacher::getAllTeachersId();
        $this->render('index', array(
            'post' => $dataProvider,
            'teachers' => $teachers,
            'teacherletter' => $teacherLetter
        ));
    }

    public function actionUpdateAjaxFilter()
    {
        $selector = $_GET["selector"];
        $string = $_GET['input'];

        $dataProvider = Teacher::getTeacherBySelector($selector, $string);

        $teacherLetter = new TeacherLetter;
        $teachers = Teacher::getAllTeachersId();
        $this->render('index', array(
            'post' => $dataProvider,
            'teachers' => $teachers,
            'teacherletter' => $teacherLetter
        ));
    }

    public function actionShowMoreAjaxFilter()
    {
        $pageSize = $_GET['size'];

        $dataProvider = Teacher::showMoreTeachers($pageSize);

        $teacherLetter = new TeacherLetter;
        $teachers = Teacher::getAllTeachersId();
        $this->render('index', array(
            'post' => $dataProvider,
            'teachers' => $teachers,
            'teacherletter' => $teacherLetter
        ));
    }

    public function actionApiGetAllTeacherData()
    {
        $teachersWithModulesByAuthor = Yii::app()->db->createCommand()
        ->select('u.id, u.firstName, u.middleName, u.secondName, u.email, CONCAT(ava.value, \'/\', u.avatar) as avatar, null as moduleByAuthor, m1.title_ua as moduleByConsultant')
        ->from('teacher_consultant_module tcm')
        ->join('teacher t', 't.user_id = tcm.id_teacher')
        ->join('module m1', 'm1.module_ID = tcm.id_module')
        ->join('teacher_organization tor', 'tor.id_user = t.user_id')
        ->join('user u', 'u.id = t.user_id')
        ->join('config ava', 'ava.id = 6')
        ->where('t.cancelled=:cancelled and tor.end_date IS NULL and tor.isPrint=:isPrint and tor.id_organization=:organization', array(':cancelled'=>Teacher::ACTIVE, 'isPrint'=>TeacherOrganization::SHOW, ':organization'=>Organization::MAIN_ORGANIZATION))
        ->getText();

        $teachers = Yii::app()->db->createCommand()
        ->select('u.id, u.firstName, u.middleName, u.secondName, u.email, CONCAT(ava.value, \'/\', u.avatar) as avatar, m.title_ua as moduleByAuthor, null as moduleByConsultant')
        ->from('teacher_module tm')
        ->join('teacher t', 't.user_id = tm.idTeacher')
        ->join('module m', 'm.module_ID = tm.idModule')
        ->join('teacher_organization tor', 'tor.id_user = t.user_id')
        ->join('user u', 'u.id = t.user_id')
        ->join('config ava', 'ava.id = 6')
        ->where('t.cancelled=:cancelled and tor.end_date IS NULL and tor.isPrint=:isPrint and tor.id_organization=:organization', array(':cancelled'=>Teacher::ACTIVE, 'isPrint'=>TeacherOrganization::SHOW, ':organization'=>Organization::MAIN_ORGANIZATION))
        ->union($teachersWithModulesByAuthor)
        ->queryAll();
        
        $userHelper = new UserHelper();
        $teachers = $userHelper->prepareTeachersWithModules($teachers);
        echo CJSON::encode($teachers);
    }
}
