<?php
/* @var $this Controller */
$header = new Header();
?>
<!DOCTYPE html>
<html id="ng-app" ng-app="cmsApp">
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'fontface.css'); ?>"/>
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'style.css') ?>"/>
    <link rel="shortcut icon" href="<?php echo StaticFilesHelper::fullPathTo('css', 'images/favicon.ico'); ?>" type="image/x-icon"/>
    <script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/angular.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/cmsApp.js'); ?>"></script>
    <link rel='stylesheet' href="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/loading-bar.min.css'); ?>" type='text/css' media='all' />
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/loading-bar.min.js'); ?>"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script>
        basePath = '<?php echo Config::getBaseUrl(); ?>';
    </script>
</head>

<body>
<?php $switch_navigation = Header::model()->currentPage(); ?>
<div id="main-wrapper" >
    <div id="mainheader">
        <div id='headerUnderline'>
            <table id="navigation" class="down">
                <tr class="main">
                    <td id="logo_img" class="down">
                        <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">
                            <img id="logo"
                                 src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_small.png'); ?>"/>
                        </a>
                    </td>
                    <td id="menulist">
                        <ul>
                            <li>
                                <a href="<?php echo Config::getBaseUrl() . '/courses'; ?>"><?php echo Yii::t('header', '0016'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo Config::getBaseUrl() . '/teachers'; ?>"><?php echo Yii::t('header', '0021'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo Config::getBaseUrl() . '/graduate'; ?>"><?php echo Yii::t('header', '0137'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo Config::getBaseUrl() . '/aboutus'; ?>"><?php echo Yii::t('header', '0018'); ?></a>
                            </li>
                        </ul>
                    </td>
                    <td class="emptyTd"></td>
                    <td id="enterButton">
                        <div id="button_border" class="down">
                        </div>
                        <?php if (Yii::app()->user->isGuest) {
                            echo CHtml::link($header->getEnterButton(), '', array('id' => 'enter_button', 'class' => 'down', 'onclick' => 'openSignIn();',));
                        } else {
                            ?>
                            <a id="enter_button" href="<?php echo Config::getBaseUrl(); ?>/site/logout"
                               class="down"><?php echo $header->getLogoutButton(); ?></a>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="main">
        <div style="height: 5px; width: auto"></div>
        <div class="breadcrumbs">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'homeLink' => CHtml::link(Yii::t('breadcrumbs', '0049'), Config::getBaseUrl()),
                    'htmlOptions' => array(
                        'class' => 'my-cool-breadcrumbs'
                    )
                )); ?><!-- breadcrumbs -->
            <?php endif ?>
            <?php if (!Yii::app()->user->isGuest && !(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index')
                && !(Yii::app()->controller->id == 'aboutus') && !(Yii::app()->controller->id == 'lesson')
            ) {
                $post = Yii::app()->user->model;
                $statusInfo = $this->beginWidget('UserStatusWidget', ['bigView' => true ,'registeredUser'=>$post]);
                $this->endWidget();
            }
            ?>
        </div>
    </div>
    <div id="contentBoxMain">
        <?php echo $content; ?>
    </div>
</div>
<div id="mainfooter">
    <div class="footercontent">
        <div class="leftfooter">
            <table>
                <tr>
                    <td>
                        <a href="https://twitter.com/INTITA_EDU" target="_blank" title="Twitter">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'twitter.png'); ?>"/>
                        </a>
                    </td>
                    <td>
                        <a href="https://www.youtube.com/channel/UC2EMqcr4pEBuTGEJBaFgOzw" target="_blank" title="Youtube">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'youtube.png'); ?>"/>
                        </a>
                    </td>
                    <td>
                        <a href="https://plus.google.com/u/0/116490432477798418410/posts" target="_blank"
                           title="Google+">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'googlePlus.png'); ?>"/>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="https://www.facebook.com/pages/INTITA/320360351410183" target="_blank"
                           title="Facebook">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'facebook.png'); ?>"/>
                        </a>
                    </td>
                    <td>
                        <a href="https://www.linkedin.com/company/intita?trk=biz-companies-cym" target="_blank"
                           title="Linkedin">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'inl.png'); ?>"/>
                        </a>
                    </td>
                    <td>
                        <a href="https://www.instagram.com/intitaedu/" target="_blank" title="Instagram">
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'instagram.png'); ?>"/>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="centerfooter">
            <div class="leftpart">
                <div class="footerlogo">
                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>">
                        <img id="footerLogo" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_small.png'); ?>">
                        <img id="footerLogo800" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'Logo_small800.png'); ?>">
                    </a>
                </div>
                <div class="footercontact">
                    <p> <?php $footer = new Footer(); ?>
                        <span><?php echo $footer->getMobile(); ?></span><br/>
                        <span><?php echo $footer->getEmail(); ?></span><br/>
                    </p>
                </div>
            </div>

            <div class="footermenu">
                <ul>
                    <li>
                        <a href="<?php echo Config::getBaseUrl() . '/courses'; ?>"><?php echo Yii::t('header', '0016'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Config::getBaseUrl() . '/teachers'; ?>"><?php echo Yii::t('header', '0021'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Config::getBaseUrl() . '/graduate'; ?>"><?php echo Yii::t('header', '0137'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Config::getBaseUrl() . '/aboutus'; ?>"><?php echo Yii::t('header', '0018'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="rightfooter">
            <a href="javascript:void(0)"><img src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'go_up.png'); ?>"></a>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'goToTop.js'); ?>"></script>

<div id="rocket_div">
    <img id="rocket" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'rocket.png'); ?>"/>
    <img id="pad_1" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'tail.png'); ?>"/>
    <img id="pad_2" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'tail.png'); ?>"/>
</div>
<div id="exhaust_div">
    <img id="exhaust_1" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'exhaust.png'); ?>"/>
    <img id="exhaust_2" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'exhaust.png'); ?>"/>
    <img id="exhaust_3" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'exhaust.png'); ?>"/>
    <img id="exhaust_4" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'exhaust.png'); ?>"/>
    <img id="exhaust_5" src="<?php echo StaticFilesHelper::createPath('image', 'mainpage', 'exhaust.png'); ?>"/>
</div>
</body>
</html>
