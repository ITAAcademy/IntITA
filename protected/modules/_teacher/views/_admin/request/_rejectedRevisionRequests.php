<div class="panel panel-default" >
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table ng-table="rejectedRequestsTable" class="table table-striped table-bordered table-hover" id="activeRequestsTable">
                <tr ng-repeat="row in $data">
                    <td data-title="'Користувач'"><a ng-href="#{{row.link}}" >{{row.user}} </a></td>
                    <td data-title="'Контент'" ><a ng-href="#{{row.link}}" >{{row.content}} </a></td>
                    <td data-title="'Тип'" >{{row.type}}</td>
                    <td data-title="'Дата'" >{{row.dateCreated}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>