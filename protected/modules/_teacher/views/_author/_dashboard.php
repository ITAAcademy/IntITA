<div class="row">
    <div class="col-lg-12">
        Автор контента
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Модулі
            </div>
            <div class="panel-body">
                <ul>
                    <li><a ng-href="#/author/modules">Модулі</a>
                    </li>
                </ul>
                <br>
            </div>
            <div class="panel-footer">
                <em>Модулі доступні для наповнення</em>
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