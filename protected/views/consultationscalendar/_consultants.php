<?php
/**
 * @var $data Teacher
 */
?>
<div class="teacherBlock">
    <div class="leftBlock">
        <div class="photobg">
            <img class="mask" src="<?php echo StaticFilesHelper::createPath('image', 'common', 'img.png'); ?>">
            <img class="teacherphoto"
                 src="<?php echo StaticFilesHelper::createPath('image', 'teachers', $data['foto_url']) ?>">
        </div>
        <a href="<?php echo Yii::app()->createUrl('profile/index', array('idTeacher' => $data['teacher_id'])) ?>">
            <?php echo Yii::t('teachers', '0059'); ?>&#187;
        </a>
    </div>
    <div class="rightBlock">
        <ul>
            <li>
                <div class="teacherTitle">
                    <?php echo Yii::t("consultation", "0492") ?>
                </div>
            </li>
            <li>
                <?php echo $data['last_name'.$lg] . " " . $data['first_name'.$lg] . " " . $data['middle_name'.$lg]; ?>
            </li>
            <li>
                <?php echo $data['email']; ?>
            </li>
            <li>
                <?php echo 'skype: ' ?>
                <span class="teacherSkype"><?php echo $data['skype'] ?></span>
            </li>
            <!--Календарь консультацій з календарем, часом консультацій і інформаційною формою-->
            <?php if (StudentReg::canAddConsultation()) {
                ?>
                <div class="calendar">
                    <!--            Календарь-->
                    <div class="input-append date form_datetime" id="form_datetime">
                        <input size="16" type="text" value="" onchange="showTime('<?php echo $data['teacher_id']; ?>')"
                               readonly id="<?php echo 'dateTimePicker' . $data['teacher_id'] ?>">
                        <span class="add-on"><i class="icon-th"></i></span>
                        <?php $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'ajaxchange-form',
                        )); ?>
                        <input type="hidden" id="<?php echo 'dateconsajax' . $data['teacher_id'] ?>"
                               name="dateconsajax"/>
                        <input type="hidden" name="teacherIdajax" value="<?php echo $data['teacher_id']; ?>" />
                        <?php
                        echo CHtml::ajaxSubmitButton('Updatedate', CController::createUrl('lesson/UpdateAjax'),
                            array('update' => '#timeConsultation' . $data['teacher_id']), array(
                                'id' => 'hiddenAjaxButton' . $data['teacher_id']));
                        ?>
                        <?php $this->endWidget(); ?>
                    </div>
                    <!--Інтервали консультацій-->
                    <div class="timeBlock">
                        <div id="<?php echo 'timeConsultation' . $data['teacher_id'] ?>">
                            <?php $this->renderPartial('/lesson/_timeConsult', array('teacherId' =>
                                $data['teacher_id'], 'day' => '')); ?>
                        </div>
                    </div>
                    <!--Інформативна форма після вибору консультації-->
                    <div class="consinf">
                        <div id="<?php echo 'consultationInfo' . $data['teacher_id'] ?>">
                            <form
                                action="<?php echo Yii::app()->createUrl('consultationscalendar/saveconsultation',
                                    array('idCourse' => $idCourse)); ?>"
                                method="post">
                                <p class="consInfHeader">
                                    <?php echo Yii::t("consultation", "0498");
                                    $titleParam = Lecture::getTypeTitleParam();
                                    if ($lecture->$titleParam == '') {
                                        $titleParam = "title_ua";
                                    }
                                    ?>
                                </p>
                                <input type="hidden" class='consInfText'
                                       id="<?php echo 'consInfText' . $data['teacher_id'] ?>"
                                       value="<?php echo ' ' . Yii::t('consultation', '0493') . ' ' . $lecture->$titleParam . ', ' .
                                           Yii::t('consultation', '0494') . ' ' . $data['last_name'.$lg] . ' ' . $data['first_name'.$lg]
                                           . ' ' . $data['middle_name'.$lg] . '. ' . Yii::t('consultation', '0495') ?>"/>

                                <p class='consInfText' id="<?php echo 'constext' . $data['teacher_id'] ?>"></p>
                                <input type="hidden" id="<?php echo 'datecons' . $data['teacher_id'] ?>"
                                       name="datecons"/>
                                <input type="hidden" id="<?php echo 'timecons' . $data['teacher_id'] ?>"
                                       name="timecons"/>
                                <input type="hidden" name="teacherid" value="<?php echo $data['teacher_id']; ?>"/>
                                <input type="hidden" name="userid" value="<?php echo Yii::app()->user->id; ?>"/>
                                <input type="hidden" name="lectureid" value="<?php echo $lecture->id; ?>"/>
                                <input name="saveConsultation" id="consultationButton" type="submit"
                                       value="<?php echo Yii::t("consultation", "0496") ?>">
                            </form>
                            <button id="cancelButton"
                                    onclick="exit()"><?php echo Yii::t("consultation", "0497") ?></button>
                        </div>
                    </div>
                    <a id="consultationCalendar" onclick="showCalendar('<?php echo $data['teacher_id']; ?>')">
                        <?php echo Yii::t('lecture', '0079'); ?>
                    </a>
                </div>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
    calendarId = '#dateTimePicker' +<?php echo $data['teacher_id']; ?>;
    var firstday = new Date();
    var lastday = new Date();
    lastday.setDate(firstday.getDate() + 366);
    $(calendarId).datetimepicker({
        format: "yyyy-mm-dd",
        language: "<?php echo Yii::app()->session['lg']?>",
        weekStart: 1,
        todayBtn: 0,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        startDate: firstday,
        endDate: lastday
    });
    $(calendarId).datetimepicker('setDaysOfWeekDisabled', [0, 6]);
</script>