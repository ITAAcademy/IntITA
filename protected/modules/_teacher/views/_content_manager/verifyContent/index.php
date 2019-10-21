<div class="ng-scope ng-isolate-scope alert alert-dismissible alert-success">
    *Шаблонізовані заняття - готові заняття у вигляді html файлів (швидке завантаження сторінок з заняттям)
</div>
<div ng-controller="verifyContentCtrl">
    <div class="panel panel-default">
        <div class="panel-heading">
            Лекції
        </div>
        <div class="panel-body">
            <uib-tabset active="0" >
                <uib-tab  index="0" heading="Заняття очікують шаблонізації">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" style="width:100%" datatable="ng" dt-options="dtOptions" dt-instance="dtInstance">
                                    <thead>
                                    <tr>
                                        <th>Модуль</th>
                                        <th>Порядок у модулі</th>
                                        <th>Назва</th>
                                        <th>Тип заняття</th>
                                        <th>HTML Шаблонізація</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr  ng-repeat="waitLecture in waitLectures">
                                        <td>{{waitLecture.module}}</td>
                                        <td>{{waitLecture.order}}</td>
                                        <td><a href="{{waitLecture.url}}">{{waitLecture.title}}</a></td>
                                        <td>{{waitLecture.type}}</td>
                                        <td><a href="javascript:void(0)" ng-click="actionLecture('confirmLecture', $index, waitLecture.id)">Затвердити</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </uib-tab>

                <uib-tab  index="1" heading="Шаблонізовані заняття" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" style="width:100%" datatable="ng" dt-options="dtOptions">
                                    <thead>
                                    <tr>
                                        <th style="width:30%">Модуль</th>
                                        <th style="width:10%" class="test">Порядок у модулі</th>
                                        <th style="width:30%">Назва</th>
                                        <th style="width:15%">Тип заняття</th>
                                        <th style="width:15%">HTML Шаблонізація</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr  ng-repeat="verifiedlecture in verifiedlectures">
                                        <td>{{verifiedlecture.module}}</td>
                                        <td>{{verifiedlecture.order}}</td>
                                        <td><a href="{{verifiedlecture.url}}">{{verifiedlecture.title}}</a></td>
                                        <td>{{verifiedlecture.type}}</td>
                                        <td><a href="javascript:void(0)" ng-click="actionLecture('cancelLecture', $index, verifiedlecture.id)">Скасувати</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </uib-tab>

            </uib-tabset>
        </div>
    </div>
</div>



