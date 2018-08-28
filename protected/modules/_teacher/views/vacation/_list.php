<div ng-controller="vacationCtrl">
    <table class="table table-condensed table-striped" ng-table="vacationTable">
        <tr ng-repeat="item in vacations track by item.id"  style="text-align: center">
            <td title="'Номер'" sortable="'id'">
                {{item.id}}
            </td>
            <td  title="'Тип відпустки'" filter="{'title': 'text'}" sortable="'title'">
                <a href="#/library/update/">{{item.vacationType.title_ua}}</a>
            </td>
            <td title="'Початкова дата відпустки'">
                {{item.start_date}}
            </td>
            <td title="'Кінцева дата відпустки'">
                {{item.end_date}}
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
                <img class="bookPreview" ng-if="book.logo" src="/files/vacation/{{item.id}}/{{item.file_src}}">
            </td>
            <td>
                <a ng-href="#/library/update/{{book.id}}"><i class="fa fa-edit"></i></a><br>
                <a ng-click="removeBook(book.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
        </tr>
    </table>    
</div>
