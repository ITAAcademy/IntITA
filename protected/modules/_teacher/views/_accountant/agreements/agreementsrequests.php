<div class="col-lg-12" ng-controller="agreementsRequestsTableCtrl">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table ng-table="agreementsRequestsTableParams" class="table table-bordered table-striped table-condensed">
                    <colgroup>
                        <col/>
                        <col width="20%"/>
                        <col/>
                        <col width="20%"/>
                        <col/>
                        <col/>
                        <col width="4%"/>
                    </colgroup>
                    <tr ng-repeat="row in $data track by $index">
                        <td data-title="'Сервіс'" filter="{'service.description': 'text'}" sortable="'service.description'">
                            <a href="" ng-click="serviceLink(row.service.service_id)" target="_blank">
                                {{row.service.description}}
                            </a>
                        </td>
                        <td data-title="'Користувач'" filter="{'requestUser.fullName': 'text'}" sortable="'requestUser.fullName'">
                            <a ng-href="#/users/profile/{{row.requestUser.id}}" target="_blank">{{row.requestUser.fullName}}</a>
                        </td>
                        <td data-title="'Дата запиту'" filter="{'action_date': 'text'}" sortable="'action_date'">
                            {{row.action_date}}
                        </td>
                        <td data-title="'Затвердив'" filter="{'coworkerChecked.fullName': 'text'}" sortable="'coworkerChecked.fullName'">
                            <a ng-href="#/users/profile/{{row.coworkerChecked.id}}" target="_blank">{{row.coworkerChecked.fullName}}</a>
                        </td>
                        <td data-title="'Статус'" filter="{'action': 'select'}" filter-data="action">
                            <span ng-if="!row.action">нові</span>
                            <span ng-if="row.action==2">затверджені</span>
                            <span ng-if="row.action==1">відхилені</span>
                        </td>
                        <td data-title="'Коментар скасування'" filter="{'comment': 'text'}">
                            {{row.comment}}
                        </td>
                        <td data-title="">
                            <a title="переглянути" ng-href="#/accountant/writtenAgreementView/request/{{row.id}}">
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <a ng-if="row.action!=1" title="скасувати" ng-click="rejectAgreementRequest(row.id)">
                                <i class="fa fa-trash fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>