
<div class="row">
    <div class="col-lg-12">
        Адміністратор
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Ролі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a ng-href="#/admin/addrole">Призначити роль</a></li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Призначення ролей в межах організації</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Користувачі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a ui-sref="organization.registeredUsers">Користувачі</a></li>
                    <li><a ui-sref="graduate">Випускники</a></li>
                    <li><a ui-sref="organization.coworkers">Співробітники</a></li>
                    <li>
                        <a ng-href="#/admin/usersemail">База email'ів</a>
                    </li>
                    <li>
                        <a ng-href="#/admin/emailscategory">Категорії email</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Користувачі та їх ролі</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Контент
            </div>
            <div class="panel-body">
                <ul>
                    <li><a ng-href="#/organization/courses">Курси</a></li>
                    <li><a ng-href="#/organization/modules">Модулі</a></li>
                    <li><a ng-href="#/organization/lectures">Заняття</a></li>
                    <li><a ng-href="#/admin/freelectures">Безкоштовні заняття</a>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Навчальні матеріали</em>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Конструктор сайту
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="#/admin/intita_cms">Доменне ім'я сайту</a></li>
                    <li><a href="#/admin/about">Сторінка про нас</a></li>
                    <li><a href="#/admin/staff">Сторінка співробітники</a></li>
                    <li><a href="#/admin/faq">Сторінка FAQ</a></li>
                    <li><a ng-href="#/admin/cms_settings">Налаштування кольорів</a></li>
                    <li><a ng-href="#/admin/cms_list">Список пунктів меню</a></li>
                    <li><a ng-href="#/admin/cms_news">Редактор новин</a></li>
                    <li><a ng-href="#/admin/cms_social_networks">Редактор соцмереж</a></li>
                    <li><a ng-href="#/admin/cms_slider">Редактор cлайдера</a></li>



                </ul>
            </div>
            <div class="panel-footer">
                <em>Створення піддомену, та конструктор сайту</em>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4"></div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Відпустки
            </div>
            <div class="panel-body panel-vacation">
                <ul>
                    <li ng-repeat="type in vacationTypes">
                        <a ui-sref="vacationCreate({'vacation_type_id': type.id})">{{type.title_ua}}</a>
                    </li>
                </ul>
            </div>
            <div class="green-list">
                <ul>
                    <li>
                        <a ui-sref="vacationsList">Список відпусток</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Замовлення відпусток</em>
            </div>
        </div>
    </div>
</div>
