<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $logoURL;
	public $menu1;
	public $link1;
	public $menu2;
	public $link2;
	public $menu3;
	public $link3;
	public $menu4;
	public $link4;
	public $buttonText;
    public $smallLogoURL;

	public $phone;
	public $imageUp;
	public $mobile;
	public $email;
	public $imageSotial;

	public function init(){
		$this->logoURL = Yii::app()->request->baseUrl.Header::model()->findByPk(1)->logoURL;
        $this->smallLogoURL = Yii::app()->request->baseUrl.Header::model()->findByPk(1)->smallLogoURL;
		$this->link1 = Yii::app()->request->baseUrl.Header::model()->findByPk(1)->item1Link;
		$this->link2 = Yii::app()->request->baseUrl.Header::model()->findByPk(1)->item2Link;
		$this->link3 = Header::model()->findByPk(1)->item3Link;
		$this->link4 = Yii::app()->request->baseUrl.Header::model()->findByPk(1)->item4Link;
		$this->imageSotial = Yii::app()->request->baseUrl.Footer::model()->findByPk(1)->imageSotial;
		$this->imageUp = Yii::app()->request->baseUrl.Footer::model()->findByPk(1)->imageUp;

		$app = Yii::app();
		if (isset($app->session['lg'])) {
			$app->language = $app->session['lg'];
			//$var = Yii::app()->config->set('translatedMessageTable', 'translatedMessagesUA');
			//http://habrahabr.ru/post/172737/
		}
	}
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $seo;
	public $portlets = array();
	public $lastUpdate;
}