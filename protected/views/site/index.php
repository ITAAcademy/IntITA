<? $css_version = 1; ?>

<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'index.css') ?>"/>

<!-- carousel-plugins -->
<link type="text/css" rel="stylesheet"
      href="<?php echo StaticFilesHelper::fullPathTo('js', 'plugins/owl-carousel/owl.theme.css'); ?>"/>
<link type="text/css" rel="stylesheet"
      href="<?php echo StaticFilesHelper::fullPathTo('js', 'plugins/owl-carousel/owl.carousel.css'); ?>"/>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'plugins/owl-carousel/owl.carousel.js'); ?>"></script>
<!-- carousel-plugins -->
<!-- carousel -->
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'slider.css'); ?>">
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'slider.js'); ?>"></script>
<!-- carousel -->
<script>
    var width = 0;
    if (self.screen) {
        width = screen.width
    }
    var key = document.getElementById('enter_button');
    var nav = document.getElementById('navigation');
    var logo = document.getElementById('logo_img');
    var border = document.getElementById('button_border');
    var lang = document.getElementById('lang');
    var underline = document.getElementById('headerUnderline');
    var but = document.getElementById('enterButton');
    var logolang = "<?php
        $app = Yii::app();
        switch ($app->session['lg']){
            case 'ua':
                echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_bigUA.svg');
                break;
            case 'en':
                echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_bigEN.svg');
                break;
            case 'ru':
                echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_bigRU.svg');
                break;
            default:
                echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_bigUA.svg');
                break;
        }
        ?>";
    key.className = "";
    nav.className = "";
    logo.className = "";
    border.className = "";
    lang.className = "";
    underline.className = "downmain";
    but.className = "";
    document.getElementById('logo').src = logolang;
</script>
<?php $this->renderPartial('_slider', array('slider' => $slider));  ?>

<?php
$mainpage = new Mainpage();
$this->pageTitle = $mainpage->getTitle();
?>

<?php $this->renderPartial('_aboutUs_list', array('aboutUsDataProvider' => $aboutUsDataProvider));?>

<?php $this->renderPartial('_steps_list', array('stepsDataProvider' =>$stepsDataProvider, 'mainpage' => $mainpage)); ?>

<?php if(Yii::app()->user->isGuest) {
    $this->renderPartial('_form', array('mainpage' => $mainpage));
}
?>
<?php
$this->renderPartial('/site/_shareMetaTagMain', array(
    'url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->url),
    'title'=>Yii::t('sharing','0643'),
    'description'=>Yii::t('sharing','0644'),
));
?>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'es5-shim.js'); ?>"></script>
