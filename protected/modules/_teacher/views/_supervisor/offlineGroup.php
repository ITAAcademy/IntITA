<div class="panel panel-default" ng-controller="offlineGroupCtrl">
    <div class="panel-body">
        <ul class="list-inline">
            <li>
                <a type="button" class="btn btn-primary" ng-href="#/supervisor/editOfflineGroup/{{groupId}}">
                    Редагувати групу
                </a>
            </li>
            <li>
                <a type="button" class="btn btn-primary" ng-href="#/supervisor/offlineGroups">
                    Всі групи
                </a>
            </li>
        </ul>
        <div class="panel-body" style="padding:15px 0 0 0">
            <uib-tabset active="active" >
                <uib-tab ng-repeat="tab in tabs" heading="{{tab.title}}" ui-sref ="supervisorGroup.{{tab.route}}" >
                    <div ui-view="supervisorTabs"></div>
                </uib-tab>
            </uib-tabset>
        </div>
    </div>
</div>

