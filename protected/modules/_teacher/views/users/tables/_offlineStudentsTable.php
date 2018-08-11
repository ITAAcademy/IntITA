<a title="Експорт" class="glyphicon glyphicon-floppy-disk btn btn-primary pull-right" style="margin: 5px;"
   href="/_teacher/users/export/type/offlineStudents">
</a>
<div class="panel panel-default" ng-controller="offlineStudentsTableCtrl" organization="<?php echo $organization ?>">
    <div class="panel-body">
        <table ng-table="offlineStudentsTableParams" class="table table-bordered table-striped table-condensed">
            <colgroup>
                <col width="4%"/>
                <col width="20%"/>
                <col width="20%"/>
                <col/>
                <col/>
                <col/>
                <col/>
                <col/>
                <col/>
            </colgroup>
            <tr ng-repeat="row in $data track by $index">
                <td data-title="offlineStudentsTableParams.total()">{{ $index + 1 }}</td>
                <td style="word-wrap:break-word" data-title="'Користувач'" filter="{'user.fullName': 'text'}" sortable="'user.fullName'">
                    <a ng-href="#/users/profile/{{row.id_user}}">{{row.user.fullName}}</a>
                </td>
                <td data-title="'Тренер'" filter="{'trainerData.fullName': 'text'}" sortable="'trainerData.fullName'">
                    <a ng-href="#/users/profile/{{row.trainerData.id}}">{{row.trainerData.fullName}} {{row.trainerData.email}}</a>
                </td>
                <td data-title="'Навчальна зміна'" filter="{'user.education_shift': 'select'}" filter-data="shifts">
                    <span ng-if="row.user.education_shift==1">ранкова</span>
                    <span ng-if="row.user.education_shift==2">вечірня</span>
                    <span ng-if="row.user.education_shift==3">байдуже</span>
                </td>
                <td data-title="'Група'" filter="{'group.name': 'text'}" sortable="'group.name'">
                    {{row.group.name}}
                </td>
                <td data-title="'Підгрупа'" sortable="'subgroupName.name'" filter="{'subgroupName.name': 'text'}" >
                    {{row.subgroupName.name}}
                </td>
                <td data-title="'Додано'" sortable="'start_date'" filter="{'start_date': 'text'}">
                    {{row.start_date}}
                </td>
                <td data-title="'Випуск'" sortable="'graduate_date'" filter="{'graduate_date': 'text'}">
                    {{row.graduate_date}}
                </td>
                <td style="word-wrap:break-word;" data-title="'Телефон'" sortable="'user.phone'" filter="{'user.phone': 'text'}">
                    {{row.user.phone}}
                </td>
            </tr>
        </table>
    </div>
</div>