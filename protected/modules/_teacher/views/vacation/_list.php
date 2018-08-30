<div ng-controller="vacationCtrl">
    <table class="table table-condensed table-striped" ng-table="vacationTable">
        <tr ng-repeat="item in $data track by $index"  style="text-align: center">
            <td title="'Номер'" sortable="'id'">
                {{item.id}}
            </td>
            <td  title="'Тип відпустки'" filter="{'vacationType.title_ua': 'text'}" sortable="'vacationType.title_ua'">
                <a ui-sref="vacationUpdate({'vacation_id': item.id})">{{item.vacationType.title_ua}}</a>
            </td>
            <td title="'Початкова дата відпустки'" filter="{'start_date': 'text'}" >
                {{item.start_date}}
            </td>
            <td title="'Кінцева дата відпустки'" filter="{'end_date': 'text'}">
                {{item.end_date}}
            </td>
            <td title="'Співробітник'" filter="{'idUser.fullName': 'text'}" sortable="'idUser.fullName'">
                {{item.idUser.fullName}}
            </td>
            <td title="'Назва задачі'">
                {{item.task_name}}
            </td>
            <td title="'Опис задачі'">
                {{item.description}}
            </td>
            <td title="'Коментар'">
                {{item.comment}}
            </td>
            <td title="'Статус'">
                {{getStatusName(item.status)}}
            </td>
            <td title="'Скан-копія відпустки'">
                <img class="bookPreview" ng-if="item.file_src" src="" alt="Скан-копія відпустки">
            </td>
            <td>
                <a ui-sref="vacationUpdate({'vacation_id': item.id})"><i class="fa fa-edit"></i></a><br>
                <a ng-click="removeBook(book.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
        </tr>
    </table>    
</div>
