<a type="button" class="btn btn-primary" ng-href="#/configuration/createBreak">
    Створити нову причину
</a>
<br>
<br>
<div class="panel panel-default" ng-controller="breakStartTableCtrl">
    <div class="panel-body" >
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" style="table-layout: fixed">
                <tr>
                    <th style="width:5%">ID</th>
                    <th>Назва українською</th>
                </tr>
                <tr ng-repeat="row in break">
                    <td>{{row.id}}</td>
                    <td>
                        <a ng-href="#/configuration/breaks/update/{{row.id}}">{{row.description}}</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>