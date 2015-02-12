<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">



    <!-- layouts style -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
    <!-- layouts style -->
    <!-- aboutUs style -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/aboutusstyles.css" />
    <!-- aboutUs style -->
    <!-- steps style -->
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/step.css" />
    <!-- steps style -->
    <!-- slider, jQuery -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/slider.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/slider.css">
    <!-- slider, jQuery -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="main"

    <div class="container" id="page">

        <div id="navigation">
            <div id="logo_img">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/intITA_logo.png"/>
            </div>
                <ul>
                    <li><a href="http://www.google.com"><span style="color: 4b75a5">Курси</span></a></li>
                    <li><a href="http://www.google.com"><span style="color: 4b75a5">Розклад</span></a></li>
                    <li><a href="http://www.google.com"><span style="color: 4b75a5">Викладачі</span></a></li>
                    <li><a href="http://www.google.com"><span style="color: 4b75a5">Форум</span></a></li>
                    <li><a href="http://www.google.com"><span style="color: 4b75a5">Про нас</span></a></li>
                </ul>
        </div>
            <div id="line_small_off">

            </div>
            <div id="line_top">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/toper.png"/>
            </div>
            <div id="enter_button">
                <a href="http://www.google.com"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/enter_button.png"/></a>

            </div>

        <script>
            var up_menu = document.getElementById('navigation');
            var key = document.getElementById('enter_button');
            var line = document.getElementById('line_top');
            var line_small = document.getElementById('line_small_off');
            window.onscroll = function() {
                var pageY = window.pageYOffset || document.documentElement.scrollTop;
                if (pageY >= key.offsetHeight) {
                    key.className = "fixed";
                    up_menu.className = "navigation";
                    line.className = "none";
                    line_small.className = "line_small"
                } else {
                    key.className = "";
                    line.className = "";
                    line_small.className = "";
                    up_menu.className = "";
                }
            }

        </script>

        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php echo $content; ?>

        <div class="clear"></div>

        <div id="footer">
            <div>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/sotial.gif"/>
            </div>
            <div class="footer">
                <div>
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/intITA_logo.png" id="logo"/>
                </div>
                <div>
                    <p>м. Вінниця, вул. Петлюри, 12а</br>
                        АйТі академія "INTITA"</p>
                </div>
                <div>
                    <ul>
                        <li><a href="http://www.google.com"><span style="color: 4b75a5">Курси</span></a></li>
                        <li><a href="http://www.google.com"><span style="color: 4b75a5">Розклад</span></a></li>
                        <li><a href="http://www.google.com"><span style="color: 4b75a5">Викладачі</span></a></li>
                        <li><a href="http://www.google.com"><span style="color: 4b75a5">Форум</span></a></li>
                        <li><a href="http://www.google.com"><span style="color: 4b75a5">Про нас</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer">
                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/go_up.gif"/></a>
            </div>

        </div><!-- footer -->


    </div><!-- page -->
</div>
</body>
</html>
