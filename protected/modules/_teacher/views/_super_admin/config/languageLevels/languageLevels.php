<a type="button" class="btn btn-primary" ng-href="#/configuration/create_language_levels">
    Створити новий рівень
</a>
<br>
<br>
<div class="panel panel-default" ng-controller="languageLevelTableCtrl">
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover ng-table text-center" style="table-layout: fixed">
                <tr>
                    <th class="col-sm-2">ID</th>
                    <th class="col-sm-2">Title</th>
                    <th class="col-sm-6">Description</th>
                    <th class="col-sm-2">Order</th>
                </tr>

                <tr ng-repeat="row in languageLevels track by $index">
                    <td><a ng-href="#/configuration/language_levels/update/{{row.id}}">
                            {{row.id}}</a>
                    </td>
                    <td><a ng-href="#/configuration/language_levels/update/{{row.id}}">
                            {{row.title}}</a>
                    </td>
                    <td><a ng-href="#/configuration/language_levels/update/{{row.id}}">
                            {{row.description}}</a>
                    </td>
                    <td>{{row.order}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>