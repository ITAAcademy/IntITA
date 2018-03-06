<? $css_version = 1; ?>
<link type="text/css" rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'lectureStyles.css'); ?>"/>
<?php if ($isVerified) { ?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/config.js'); ?>"></script>
<?php } else { ?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/lesson_app/configDynamic.js'); ?>"></script>
<?php } ?>
<?php
/* @var $this LessonController */
/* @var $lecture Lecture */
/* @var $page LecturePage */
/* @var integer $idCourse */
if (!isset($idCourse)) $idCourse = 0;
?>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular_non_version', 'bower_components/MathJax/MathJax.js?config=TeX-AMS-MML_HTMLorMML'); ?>"></script>
<!-- lesson style -->
<link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'modalTask.css'); ?>"/>
<?php
$passedLecture = Lecture::isPassedLecture($passedPages);
$finishedLecture = $lecture->isFinished($user);
?>
<script type="text/javascript">
    basePath = '<?php echo Config::getBaseUrl(); ?>';
</script>

<div id="scriptData">
    <input type="hidden" data-success-message='<?php echo Yii::t('lecture', '0675'), ' ', Yii::t('lecture', '0679'); ?>'>
    <input type="hidden" data-part-not-available='<?php echo Yii::t('lecture', '0638'); ?>'>
    <input type="hidden" data-lang='<?php echo CommonHelper::getLanguage();?>'>
    <input type="hidden" data-user-id='<?php echo $user;?>'>
    <input type="hidden" data-interpreter-server='<?php echo Config::getInterpreterServer();?>'>
    <input type="hidden" data-finished-lecture='<?php echo ($finishedLecture) ? 1 : 0;?>'>
    <input type="hidden" data-last-access-page='<?php echo $lastAccessPage ?>'>

    <input type="hidden" data-is-admin='<?php echo Yii::app()->user->model->isAdmin() ? 1 : 0; ?>'>
    <input type="hidden" data-edit-mode='<?php echo ($editMode) ? 1 : 0;?>'>
    <input type="hidden" data-course-id='<?php echo $idCourse;?>'>
    <input type="hidden" data-module-id='<?php echo $lecture->idModule;?>'>
    <input type="hidden" data-lecture-id='<?php echo $lecture->id;?>'>
</div>

<div id="lessonHumMenu" data-toggle="tooltip" title="Меню INTITA">
    <?php $this->renderPartial('/lesson/_lessonHamburgerMenu', array('idCourse' => $idCourse, 'module' => $lecture->module)); ?>
</div>
            <a class='consultationButtons'
   href="<?php echo Yii::app()->createUrl('/consultationscalendar/index', array('lectureId' => $lecture->id, 'idCourse' => $idCourse)); ?>">
    <div id="consultationAssistance" data-toggle="tooltip" data-placement="bottom" title="Запланувати консультацію">
        <img class="consultationLogos"
             src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'consultationLogo.png'); ?>">
        <div class="consultationText">Запланувати консультацію</div>
    </div>
</a>
<div class="consultations">
    <a class='consultationButtons'
       href="<?php echo Yii::app()->createUrl('/consultationscalendar/index', array('lectureId' => $lecture->id, 'idCourse' => $idCourse)); ?>">
    </a>
</div>

<div ng-cloak class="lessonBlock" id="lessonBlock">
    <div ng-controller="lessonPageCtrl">
        <div class="lessonText">
            <div>
                <div class="lessonTheme">
                    <?php echo $lecture->title(); ?>
                    <?php $this->renderPartial('_editLecture', array('lecture' => $lecture, 'editMode' => $editMode)); ?>
                </div>
                <div ng-if=lectureRating class="lecturesSpots" style="padding: 0;">
                    <?php echo Yii::t('graduates', '0319') ?> <span animate-on-change="lectureRating">{{lectureRating*10| limitTo:3}}/10</span>
                </div>
                <div ng-if=lecturesData.currentOrder class="lecturesSpots" style="padding: 0;">
                    ({{lecturesData.currentOrder}} /
                    {{lecturesData.module.lectures.length}} <?php echo Yii::t('lecture', '0616'); ?>)
                </div>
            </div>
                <div id="counter">
                <span ng-repeat="lecture in lecturesData.module.lectures track by $index">
                    <a ng-if=(+lecture.order<=+lecturesData.lastAccessLectureOrder)
                       href=""
                       ng-click="lectureLink(lecture.id, lecturesData.courseId)"
                       uib-tooltip-html="lecture.title">
                        <div class="lectureAccess"
                             ng-class="{thisLecture: lecture.order=='<?php echo $lecture->order; ?>'}"></div>
                    </a>
                    <a ng-if=!(lecture.order<=+lecturesData.lastAccessLectureOrder)
                       uib-tooltip-html="'<span class=\'titleNoAccessMin\'>{{lecture.title | unsafe}}</span><span class=\'noAccessMin\'> (Заняття недоступне)</span>'">
                        <div class="lectureDisabled"></div>
                    </a>
                </span>
                    <div ng-if=lecturesData.currentOrder id="iconImage">
                        <?php if ($lecture->module->isModuleDone()) { ?>
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'medalIco.png'); ?>"/>
                        <?php } else { ?>
                            <img src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'medalIcoFalse.png'); ?>"/>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    $this->renderPartial('_jsChaptersListTemplate');
                ?>
            <!-- Spoiler -->
            <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'chaptersSpoiler.js'); ?>"></script>
            <!-- Spoiler -->
            <?php
            $this->renderPartial('_jsLecturePageTabs', array('lectureId' => $lecture->id, 'page' => $page, 'lastAccessPage' => $lastAccessPage, 'dataProvider' => $dataProvider, 'finishedLecture' => $finishedLecture, 'passedLecture' => $passedLecture, 'passedPages' => $passedPages, 'editMode' => $editMode, 'user' => $user, 'order' => $lecture->order, 'idCourse' => $idCourse));
            ?>
            <div class="lectureFooterMini">
                <?php $this->renderPartial('_sidebarHelp', array('lecture' => $lecture, 'idCourse' => $idCourse)); ?>
            </div>
        </div>
        <!--modal task error1-->
        <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'mydialog3',
            'themeUrl' => Config::getBaseUrl() . '/css',
            'cssFile' => 'jquery-ui.css',
            'theme' => 'my',
            'options' => array(
                'autoOpen' => false,
                'modal' => true,
                'resizable' => false
            ),
        ));
        $this->renderPartial('/lesson/_errorDialog');
        $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>

        <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'dialogNextLectureNG',
            'themeUrl' => Config::getBaseUrl() . '/css',
            'cssFile' => 'jquery-ui.css',
            'theme' => 'my',
            'options' => array(
                'autoOpen' => false,
                'modal' => true,
                'resizable' => false
            ),
        ));
        if ($isLastLecture) {
            $this->renderPartial('/lesson/_moduleCompleteDialog', array('lecture' => $lecture));
        } else {
            $this->renderPartial('/lesson/_passLectureModal', array('lecture' => $lecture, 'idCourse' => $idCourse));
        }
        $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>
    </div>
</div>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'SidebarLesson.js'); ?>"></script>