<div class="row" ng-controller="mainTeacherConsultantCtrl">
    <div class="col-lg-12">
        Викладач
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
                    <li>
                        <a ng-href="#/teacherConsultant/modules">Модулі</a>
                    </li>
                </ul>
                <br>
            </div>
            <div class="panel-footer">
                <em>Модулі доступні призначені як викладачу</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Студенти
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <a href="#/teacherConsultant/students">Студенти</a>
                    </li>
                    <li>
                        <a href="#/offlineGroups">Офлайнові групи</a>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Студенти закріплені за викладачем</em>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Завдання з відкритою відповідю
            </div>
            <div class="panel-body">
                <ul>
                    <a href="#/teacherConsultant/tasks">
                        Всі завдання
                        <span ng-cloak class="label label-success" ng-if="countOfNewPlainTasksAnswers > 0">{{countOfNewPlainTasksAnswers}}</span>
                    </a>
                </ul>
            </div>
            <div class="panel-footer">
                <em>Відповіді на завдання</em>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Консультації
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <a ng-href="#/teacherConsultant/consultations">Консультації</a>
                    </li>
                    <li>
                        <a ng-href="#/teacherCalendarConsultation/calendarConsultations">Календар консультацій</a>
                    </li>
                </ul>
                <br>
            </div>
            <div class="panel-footer">
                <em>Консультації заплановані студентами у викладача</em>
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
