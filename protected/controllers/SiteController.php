<?php

class SiteController extends Controller
{
	/* @var $mainpage Mainpage*/
	/* @var $modelCarousel Carousel */
	/* @var $step1 Step*/
	/* @var $step2 Step*/
	/* @var $step3 Step*/
	/* @var $step4 Step*/
	/* @var $step5 Step*/
	/* @var $objAbout1 AboutUs*/
	/* @var $objAbout2 AboutUs*/
	/* @var $objAbout3 AboutUs*/
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index1.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index1.php'
		// using the default layout 'protected/views/layouts/main.php'
		$modelCarousel = new Carousel();
		$mainpage = new Mainpage();
		$mainpage->setValueById(0);

		$arraySteps = $this->initSteps();
		$arrayAboutUs = $this->initAboutus();
		
		$sliderPictures = array(
			'slider1'=>Yii::app()->request->baseUrl.$modelCarousel->findByPk(1)->imagesPath.$modelCarousel->findByPk(1)->pictureURL,
			'slider2'=>Yii::app()->request->baseUrl.$modelCarousel->findByPk(2)->imagesPath.$modelCarousel->findByPk(2)->pictureURL,
			'slider3'=>Yii::app()->request->baseUrl.$modelCarousel->findByPk(3)->imagesPath.$modelCarousel->findByPk(3)->pictureURL,
			'slider4'=>Yii::app()->request->baseUrl.$modelCarousel->findByPk(4)->imagesPath.$modelCarousel->findByPk(4)->pictureURL,
		);
		
		$this->render('index', array(
			'slider1'=>$sliderPictures['slider1'],
			'slider2'=>$sliderPictures['slider2'],
			'slider3'=>$sliderPictures['slider3'],
			'slider4'=>$sliderPictures['slider4'],
			'mainpage'=>array(
				'sliderLine'=> $mainpage->sliderLineURL,
				'sliderTexture'=> $mainpage->sliderTextureURL,
				'buttonStart'=>$mainpage->sliderButtonText,
				'sliderHeader'=>$mainpage->sliderHeader,
				'sliderText'=>$mainpage->sliderText,
				'title'=>$mainpage->title,
				'header1'=>$mainpage->header1,
				'header2'=>$mainpage->header2,
				'hexagon'=>$mainpage->hexagon,
				'subLineImage'=>$mainpage->subLineImage,
				'stepSize'=>$mainpage->stepSize,
				'imageNetwork'=>$mainpage->imageNetwork,
				'formFon'=>$mainpage->formFon,
			),
			'block1'=>$arrayAboutUs['objAbout1'],
			'block2'=>$arrayAboutUs['objAbout2'],
			'block3'=>$arrayAboutUs['objAbout3'],
			'step1'=>$arraySteps['step1'],
			'step2'=>$arraySteps['step2'],
			'step3'=>$arraySteps['step3'],
			'step4'=>$arraySteps['step4'],
			'step5'=>$arraySteps['step5'],
		));
	}

	public function initAboutus(){
		$objAbout1 = new AboutUs(1);
		$objAbout1->setValuesById(1);
		$objAbout1->titleText = Yii::t('aboutus', 'What you dream about?');
		$objAbout1->textAbout = Yii::t('aboutus', 'Try to guess: their own apartment or even a house? A good car? Foreign travel may have to exotic countries?');
		$objAbout2 = new AboutUs(2);
		$objAbout2->setValuesById(2);
		$objAbout2->titleText = Yii::t('aboutus', 'Learning of the future');
		$objAbout2->textAbout = Yii::t('aboutus', 'Programming - it\'s not as hard as you can imagine. Of course, to become a good programmer, it takes time and effort.');
		$objAbout3 = new AboutUs(3);
		$objAbout3->setValuesById(3);
		$objAbout3->titleText = Yii::t('aboutus', 'Questions & feedback');
		$objAbout3->textAbout = Yii::t('aboutus', 'Three whales INTITA Independent Programming Academy training schedule. Only 100% of the necessary knowledge. The acquisition of 100% of knowledge!');
		return $arrayAboutUs = array(
			'objAbout1'=>$objAbout1,
			'objAbout2'=>$objAbout2,
			'objAbout3'=>$objAbout3,
		);
	}

	public function initSteps(){
		$step1=new Step();
		$step1->setValueById(1);
		$step2=new Step();
		$step2->setValueById(2);
		$step3=new Step();
		$step3->setValueById(3);
		$step4=new Step();
		$step4->setValueById(4);
		$step5=new Step();
		$step5->setValueById(5);

		$step1->stepTitle =  Yii::t('step','Online Registration');
		$step2->stepTitle =  Yii::t('step','Choosing course or module');
		$step3->stepTitle =  Yii::t('step','Payment');
		$step4->stepTitle =  Yii::t('step','Learning material');
		$step5->stepTitle =  Yii::t('step','Completion of the course');

		$step1->stepText =  Yii::t('step','To access the list of courses, modules and classes and pass free modules and classes register on the site. Registering will allow you to assess the quality and usability of our product that you will become a reliable partner and advisor to professional fulfillment.');
		$step2->stepText =  Yii::t('step','To become a specialist in a certain direction and level (get professional specialization) choose to undergo appropriate course. If you are interested only deepen the knowledge in a particular area of IT, then choose the module to pass.');
		$step3->stepText =  Yii::t('step','To start a course or module choose payment scheme (the entire amount for the course, month, potrymestrovo etc) and make a payment convenient way to You (payment scheme or course module can be changed also possible monthly payment on credit).');
		$step4->stepText =  Yii::t('step','Learning material is possible by reading the text and / or viewing video for each session. During the development of the material classes perform intermediate tests. At the end of each session do the final test task. Each module ends with an individual project or exam. You can get individual counseling teacher or discuss the issue on the forum.');
		$step5->stepText =  Yii::t('step','The result of course is the command thesis project, performed together with other students (the team recommends that forms an independent or executive who approved topic and terms of reference of the project). Filing project involves peredzahyst and protection in the online mode of presentation design.');

		return $arraySteps = array(
			'step1'=>$step1,
			'step2'=>$step2,
			'step3'=>$step3,
			'step4'=>$step4,
			'step5'=>$step5,
		);
	}

	public function actionAboutdetail()
	{
		$mainpage = new Mainpage(0);
		$mainpage->setValueById(0);
		$arrayAboutUs = $this->initAboutus();
		$this->render('aboutdetail', array(
			'mainpage'=>array(
				'title'=>$mainpage->title,
				'header1'=>$mainpage->header1,
				'linkName'=>$mainpage->linkName,
				'subLineImage'=>$mainpage->subLineImage,
				'subheader1'=>$mainpage->subheader1,
			),
			'block1'=>$arrayAboutUs['objAbout1'],
			'block2'=>$arrayAboutUs['objAbout2'],
			'block3'=>$arrayAboutUs['objAbout3'],
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionChangeLang($lg)
	{
		$app = Yii::app();
		if (isset($_GET['lg'])) {
			if ($_GET['lg'] == 'ru'){
				//Yii::app()->params['translatedMessageTable'] = 'translatedMessagesRU';
				//Yii::app()->config->set('translatedMessageTable', 'translatedMessagesRU');
			}
			$app->session['lg'] = $_GET['lg'];
		}
		$this->redirect(Yii::app()->user->returnUrl);
	}
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	/**
	 * Displays the login page
	 */
	public function actionRapidReg()
	{
		$model = new StudentReg('repidreg');
// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='studentreg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
        if(isset($_POST['isExtended']))
        {
            $this->redirect(array('studentreg/index'));
        }
// collect user input data
		if(isset($_POST['StudentReg']))
		{
			$model->attributes=$_POST['StudentReg'];

// validate user input and redirect to the previous page if valid
            if($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('forminfo', 'Ви успішно зареєструвалися.');
                $this->redirect(Yii::app()->request->baseUrl . '/site#form');
			}
            Yii::app()->user->setFlash('forminfo', 'Ви успішно зареєструвалися.');
            $this->redirect(Yii::app()->request->baseUrl . '/site#form');
		}

	}

    public function actionLogin()
    {
        $model = new StudentReg('loginuser');
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='quick-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if(isset($_POST['StudentReg']))
        {
            $model->attributes=$_POST['StudentReg'];
            // validate user input and redirect to the previous page if valid
            if($model->login())
                $this->redirect(Yii::app()->request->baseUrl.'/courses');
        }
    }
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}