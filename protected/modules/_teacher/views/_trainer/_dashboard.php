<div class="row">
    <div class="col-lg-12">
        Тренер
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-green">
            <div class="panel-heading">
                Закріплені студенти
            </div>
            <div class="panel-body">
                <ul>
                    <li>
                        <a href="#/trainerStudentsTable/main">Студенти</a>
                    </li>
                    <li>
                        <a ui-sref="students/progress">Прогрес навчання студентів</a>
                    </li>
                    <li>
                        <a href="#/trainer/students/agreements">Договори студентів</a>
                    </li>
                    <li>
                        <a href="#/offlineGroups">Офлайнові групи</a>
                    </li>
                    <li>
                        <a href="#/trainerStudentsTable/studentsProjects">Затвердження курсової роботи</a>
                    </li>
                    <li>
                        <a href="#/trainer/students">Студенти та їх модулі (закріплення викладачів)</a>
                    </li>
                </ul>
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


