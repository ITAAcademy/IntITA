<?php
/**
 * @var $params array
 * @var $model Consultationscalendar
 */
$model = $params[0];
?>
<h4>Повідомлення</h4>
<br>
Скасовано консультацію по лекції <strong>
    <a href="<?= Yii::app()->createAbsoluteUrl('module/index', array('idModule' => $model->lecture->id)); ?>">
        <?= $model->lecture->title(); ?>
    </a>
</strong>, яка була призначена на <?=date("d.m.Y", strtotime($model->date_cons));?>
(початок - <?=date("H:i", strtotime($model->start_cons))?>,
закінчення - <?=date("H:i", strtotime($model->end_cons));?>).
<br>
Кабінет (вкладка "Студент"): <a
    href="<?= Yii::app()->createAbsoluteUrl('/_teacher/cabinet/index'); ?>">
    <em>Кабінет</em>
</a>
<br>
Зв'язатися з адміністрацією: <a href="<?= Yii::app()->createAbsoluteUrl('/_teacher/cabinet/index', array(
    'scenario' => 'message',
    'receiver' => Config::getAdminId()
)); ?>">написати адміністратору</a>.