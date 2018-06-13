
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
                    <li><a href="#/admin/subdomain">Субдомен</a></li>
                    <li><a ng-href="#/admin/intita_cms">Конструктор сайту</a></li>
                    <li><a ng-href="#/admin/cms_list">Меню ліст</a></li>
                    <li><a ng-href="#/admin/cms_news">Меню новини</a></li>
                    <li><a ng-href="#/admin/cms_slider">Меню слайдер</a></li>
                    <li><a ng-href="#/admin/cms_main_settings">Головні налаштування</a></li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Створення піддомену, та конструктор сайту</em>
            </div>
        </div>
    </div>
</div>
