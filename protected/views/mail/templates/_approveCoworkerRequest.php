<?php
/**
 * @var $params array
 * @var $model StudentReg
 */
$model = $params[0];
?>
<h4>Вітаємо!</h4>
<br>
Ваш запит на призначення співробітником користувача <strong>
    <a href="<?= Yii::app()->createAbsoluteUrl('studentreg/profile', array('idUser' => $model->id)); ?>">
        <?= $model->userNameWithEmail(); ?>
    </a>
</strong> підтверджено.
<br>
Редагувати права співробітника можна у кабінеті: <a
    href="<?= Yii::app()->createAbsoluteUrl('/_teacher/cabinet/index'); ?>">
    <em>Кабінет</em>
</a>