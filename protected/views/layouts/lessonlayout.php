<!DOCTYPE html>
<html xmlns:og="https://ogp.me/ns#">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?php echo Config::getBaseUrl(); ?>">
    <meta name="twitter:image"
          content="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'intitaLogo.jpg'); ?>">
    <meta property="og:image"
          content="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'intitaLogo.jpg'); ?>">
    <!-- for tabs -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for tabs -->
    <!-- fonts -->
    <link rel="stylesheet" href="<?php echo Config::getBaseUrl(); ?>/css/fontface.css"/>
    <!-- fonts -->
    <!-- layouts style -->
    <link rel="stylesheet" type="text/css" href="<?php echo Config::getBaseUrl(); ?>/css/style.css"/>
    <!--   hamburger menu style -->
    <link rel="stylesheet" type="text/css" href="<?php echo Config::getBaseUrl(); ?>/css/hamburgerMenu.css"/>
    <link rel="shortcut icon" href="<?php echo Config::getBaseUrl(); ?>/css/images/favicon.ico" type="image/x-icon"/>
    <script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular/angular.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/interpreter_app/filters/interpreterJsonFilter.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/app.js'); ?>"></script>
    <!-- trimEmail-->
    <script async type="text/javascript" src="<?php echo Config::getBaseUrl(); ?>/scripts/trimField.js"></script>
    <!-- trimEmail -->
    <?php if (!Yii::app()->user->isGuest) { ?>
        <script src="<?php echo Config::getFullChatPath()."/js/ITA.js" ?>"></script>
    <?php } ?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-bootstrap/ui-bootstrap-tpls.js'); ?>"></script>
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'bootstrapRewrite.css') ?>"/>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-resource/angular-resource.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/bootbox/bootbox.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/highlightjs/highlight.pack.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-highlightjs/build/angular-highlightjs.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-ui-router/release/angular-ui-router.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/bootbox/bootbox.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/paramService.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/accessLecturesService.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/pagesDataUpdateService.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/openDialogsService.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/interpreter_app/services/interpreterServices.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/ratingService.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/services/transformRequest.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/lessonPageCtrl.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/testCtrl.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/taskCtrl.js'); ?>"></script>

    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/starsCtrl.js'); ?>"></script>

    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/skipTaskCtrl.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/controllers/plainTaskCtrl.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/directives/hoverSpot.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/directives/startVideo.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-cookie/angular-cookie.min.js'); ?>"></script>
    <!--codemirror textarea hightlight-->
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/lib/codemirror.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/theme/rubyblue.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'codemirror.css'); ?>"/>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/lib/codemirror.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/mode/javascript/javascript.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/mode/clike/clike.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/codemirror/mode/php/php.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-ui-codemirror/ui-codemirror.js'); ?>"></script>
    <!--codemirror textarea hightlight-->

    <!--star rating-->
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-sanitize/angular-sanitize.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo Config::getBaseUrl(); ?>/scripts/openDialog.js"></script>
    <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'regform.css');; ?>"/>
    <!-- jQuery -->
    <!-- passEye, jQuery -->
    <script async type="text/javascript" src="<?php echo Config::getBaseUrl(); ?>/scripts/jquery.passEye.js"></script>
    <!-- passEye, jQuery -->

    <!-- ngToast -->
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/ngToast/dist/ngToast.min.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/ngToast/dist/ngToast.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/ngToast/dist/ngToast-animations.min.css') ?>">
    <toast></toast>

    <title><?php echo CHtml::encode(Yii::app()->name); ?></title>
</head>

<body style="overflow-y: scroll" itemscope itemtype="https://schema.org/Product" ng-app="lessonApp">

<div id="contentBoxMain">
    <?php echo $content; ?>
    <?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
        'id' => 'forgotpass',
        'themeUrl' => Config::getBaseUrl() . '/css',
        'cssFile' => 'jquery-ui.css',
        'theme' => 'my',
        'options' => array(
            'width' => 540,
            'autoOpen' => false,
            'modal' => true,
            'resizable' => false
        ),
    ));
    $this->renderPartial('/site/_forgotpass');
    $this->endWidget('zii.widgets.jui.CJuiDialog');
    ?>
</div>
<!-- footer -->
<!-- Humburger script -->
<script type="text/javascript" src="<?php echo Config::getBaseUrl(); ?>/scripts/lessonHamburgerMenu.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-83801032-1', 'auto');
    ga('send', 'pageview');
</script>
<!--IntITAMessenger-->
<?php if (!Yii::app()->user->isGuest) { ?>
    <div ita-messenger="" path="<?php echo Config::getFullChatPath() ?>" class="dnd-container"></div>
<?php } ?>
<!--IntITAMessenger-->
</body>
</html>
