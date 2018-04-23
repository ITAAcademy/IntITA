<div class="panel panel-default" ng-controller="subdomainsCtrl">
    <button class="btn btn-success"
            ng-bootbox-prompt="Додати субдомен"
            ng-bootbox-prompt-action="addSubdomain(result)">
        Додати субдомен
    </button>
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table ng-table="subdomainsTableData" class="table table-striped table-bordered table-hover"
                   style="table-layout: fixed">
                <colgroup>
                    <col width="5%"/>
                    <col width="35%"/>
                    <col width="35%"/>
                    <col width="10%"/>
                    <col width="10%"/>
                </colgroup>
                <tr ng-repeat="row in $data"style="cursor: pointer;">
                    <td data-title="'ID'">{{row.id}}</td>
                    <td data-title="'Субдомен'">{{row.domain_name}}</td>
                    <td data-title="'Організація'">{{row.organization.name}}</a></td>
                    <td data-title="'Статус'">
                        <span ng-show="row.active == 1" title="Активний "><i class="glyphicon glyphicon-eye-open"></i></span>
                        <span ng-show="row.active != 1"><i class="glyphicon glyphicon-eye-close"></i></span>

                    </td>
                    <td data-title="'Дії'" ng-drag="false">
                        <div style="vertical-align: middle; display: table-cell">
                            <span><button class="btn btn-success" ng-bootbox-confirm="Ви впевнені, що бажаєте змінити статус відображеня субдомену?"
                                          ng-bootbox-confirm-action="changeActive(row.id,row.active)" title="Змінити статус відображеня субдомену">
                                    <i  ng-show="row.visible != 1" class="glyphicon glyphicon-eye-open" title="Активний"></i>
                                    <i  ng-show="row.visible == 1" class="glyphicon glyphicon-eye-close" title="Заблокований"></i>
                                </button>
                            </span>
                            </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
