<div class="row" ng-controller="mainSuperAdminCtrl">
    <div class="col-lg-12">
        Суперадмін
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Дизайн
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#/interfacemessages">
                           Інтерфейсні повідомлення</a>
                    </li>
                    <li><a href="#/carousel">
                            Слайдер на головній сторінці</a>
                    </li>
                    <li><a href="#/aboutusSlider">
                            Слайдер на сторінці <i>Про нас</i></a>
                    </li>
                    <li><a href="#/banners">
                            Банери на головній сторінці</a>
                    </li>
                    <li><a href="#/banners_for_graduates">
                            Банери на сторінці випускників</a>
                    </li>
                    <li><a href="#/address">
                            Адреса (країни, міста)
                            <span ng-cloak class="label label-success" ng-if="countOfNewCities > 0">{{countOfNewCities}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Інтерфейс сайту</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Модерація
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <a href="#/users/blockedUsers">Заблоковані користувачі</a>
                    </li>
                    <li>
                        <a href="#/response">Відгуки про викладачів
                            <span ng-cloak class="label label-warning" ng-if="countOfNewResponses > 0">{{countOfNewResponses}}</span>
                        </a>
                    </li>
                 <li>
                  <a href="#/subdomains">Субдомени</a>
                 </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Модерація</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Налаштування сайту
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#/configuration/refreshcache">Оновити кеш </a>
                    </li>
                    <li><a href="#/configuration/levels">Рівні курсів, модулів
                        </a>
                    </li>
                    <li><a href="#/configuration/siteconfig">Налаштування
                        </a>
                    </li>
                    <li><a href="#/configuration/careers">Перелік кар'єр
                        </a>
                    </li>
                    <li><a href="#/configuration/task_types">Типи завдань
                        </a>
                    </li>
                    <li>
                        <a href="#/configuration/specializations">Спеціалізації(для груп та форми реєстрації)</a>
                    </li>
                    <li><a href="#/configuration/language_levels">Рівні англійської
                        </a>
                    </li>
                    <li>
                        <a href="#/configuration/breaks">Причина виключення студента</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Адміністрування сайту</em>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Користувачі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a ui-sref="users.registeredUsers">Користувачі</a></li>
                    <li><a ui-sref="graduate">Випускники</a></li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Користувачі та їх ролі</em>
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
                    <li><a ui-sref="courses">Курси</a></li>
                    <li><a ui-sref="modules">Модулі</a></li>
                    <li><a ui-sref="lectures">Заняття</a></li>
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
                Корисні посилання
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#/allShareLinks">Корисні посилання</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Корисні посилання для співробітників з усіх організацій</em>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Адмінка чату
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="<?php echo Config::getFullChatPath() ?>/admin" target="_blank">Адмінка чату</a></li>
                </ul>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>