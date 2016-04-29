<?php
/**
 * @var $model StudentReg
 */
?>
<li>
    <a href="#"  onclick="load('<?php echo Yii::app()->createUrl('/_teacher/cabinet/loadPage',
        array('page' => 'content_manager'));?>','Контент менеджер')">
        <i class="fa fa-bar-chart-o fa-fw"></i>Контент менеджер
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#"
               onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/authors'); ?>',
                   'Автори модулів')">
                Автори модулів
            </a>
        </li>
        <li>
            <a href="#"
               onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/consultants'); ?>',
                   'Консультанти для модулів')">
                Консультанти
            </a>
        </li>
        <li>
            <a href="#"
               onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/teacherConsultants'); ?>',
                   'Викладачі')">
                Викладачі
            </a>
        </li>
        <li>
            <a href="#"
               onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_content_manager/contentManager/courseStatus'); ?>',
                   'Стан курсу')">
                Стан курсу
            </a>
        </li>
    </ul>
</li>