<div class="panel panel-default" ng-controller="subdomainCtrl">
    <p ng-if="subdomainsTableData.total()!=0"><a class="text-right" href="#/admin/intita_cms">Конструктор сайту</a></p>
    <a href="" ng-show="subdomainsTableData.total()==0" ng-click="showForm=!showForm">Створити субдомен</a>
    <form name='subdomainForm' ng-if="showForm && subdomainsTableData.total()==0">
        <label>Назва піддомену*</label>
        <input class="form-control" type="text" ng-required="true" ng-pattern="/^[a-zA-Z0-9_]+$/"  ng-minlength="1" ng-maxlength="15" placeholder="Небільше 15 латинських символів, цифр або спеціальних символів -,_"
               ng-model="name">
        Посилання на сайт буде мати вигляд: https://{{name}}.intita.com
        <div ng-cloak class="clientValidationError" ng-show="subdomainForm.$invalid">
            Введіть коректну назву (Небільше 15 латинських символів, цифр або спеціальних символів -,_)
        </div>
        <br>
        <button class="btn btn-primary" ng-click="addSubdomain(name)" ng-disabled="subdomainForm.$invalid">Додати субдомен</button>
    </form>
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table ng-table="subdomainsTableData" class="table table-striped table-bordered table-hover"
                   style="table-layout: fixed">
                <colgroup>
                    <col width="5%"/>
                    <col width="45%"/>
                    <col width="35%"/>
                    <col width="10%"/>
                </colgroup>
                <tr ng-repeat="row in $data" style="cursor: pointer;">
                    <td data-title="'ID'">{{row.id}}</td>
                    <td data-title="'Субдомен'">{{row.domain_name}}</td>
                    <td data-title="'Організація'">{{row.organization}}</a></td>
                    <td data-title="'Статус'">
                        <span ng-show="row.active == 1" title="Активний ">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </span>
                        <span ng-show="row.active != 1"><i class="glyphicon glyphicon-eye-close"></i></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
