<div class="panel panel-default" >
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table ng-table="activeRequestsTable" class="table table-striped table-bordered table-hover" id="activeRequestsTable">
                <tr ng-repeat="row in $data">
                    <td data-title="'Користувач'">{{row.user}}</a></td>
                    <td data-title="'Контент'" >{{row.content}}</td>
                    <td data-title="'Тип'" >{{row.type}}</td>
                    <td data-title="'Дата'" >{{row.date}}</td>
                    <td data-title="'Переглянути'" ><a href="#{{row.link}}">переглянути</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>