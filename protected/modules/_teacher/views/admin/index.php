<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Дизайн
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/translate/index'); ?>',
                               'Інтерфейсні повідомлення')">
                            Інтерфейсні повідомлення</a>
                    </li>
                    <li><a href="#" onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/carousel/index'); ?>',
                            'Слайдер на головній сторінці')">
                            Слайдер на головній сторінці</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/aboutusSlider/index'); ?>',
                               'Слайдер на сторінці <i>Про нас</i>')">
                            Слайдер на сторінці <i>Про нас</i></a>
                    </li>
                    <br>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Інтерфейс сайта</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Контент
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/verifyContent/index'); ?>',
                               'Контент лекцій')">
                            Контент лекцій</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/graduate/index'); ?>',
                               'Випускники')">
                            Випускники</a></li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/coursemanage/index'); ?>',
                               'Курси')">
                            Курси</a></li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/module/index'); ?>',
                               'Модулі')">
                            Модулі</a></li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Навчальні матеріали</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Викладачі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/teachers/index'); ?>',
                               'Викладачі')">Викладачі</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/shareLink/index'); ?>',
                               'Ресурси для викладачів')">Ресурси для викладачів</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/response/index'); ?>',
                               'Відгуки про викладачів')">Відгуки про викладачів</a>
                    </li>
                    <br>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Автори модулів, тренери, etc.</em>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Доступ
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/freeLectures/index'); ?>',
                               'Безкоштовні заняття')">Безкоштовні заняття</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/permissions/index'); ?>',
                               'Права доступа')">Права доступа</a>
                    </li>
                    <li><a href="#" onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/pay/index'); ?>',
                            'Сплатити курс/модуль')">Сплатити курс/модуль</a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/pay/cancelCourseModule'); ?>',
                               'Скасувати курс/модуль')">Скасувати курс/модуль</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Права доступу до курсів/модулів</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Користувачі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/users/index'); ?>',
                               'Користувачі')">Ролі користувачів
                        </a>
                    </li>
                    <br>
                    <br>
                    <br>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Управління користувачами</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Налаштування сайта
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#"
                           onclick="refreshCache('<?php echo Yii::app()->createUrl('/_teacher/_admin/config/refresh'); ?>')">
                            Оновити кеш
                        </a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/level/index'); ?>',
                               'Рівні курсів, модулів')">Рівні курсів, модулів
                        </a>
                    </li>
                    <li><a href="#"
                           onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/config/index'); ?>',
                               'Налаштування')">Налаштування
                        </a>
                    </li>
                    <br>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Адміністрування сайта</em>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'access.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/tmanage.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_teachers/newPlainTask.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'pay.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/graduatesList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/requestsList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/responsesList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/coursesList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/modulesList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/studentsList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/teachersList.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/shareLinks.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/usersManage.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'translateTeacherName.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/freeLectures.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_admin/verifyContent.js'); ?>"></script>
