<br>
<a class="btn btn-primary" ng-href="#/addcity">
    Додати місто
</a>
<br>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" ng-table="citiesTable">
                <colgroup>
                    <col width="10%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="20%" />
                    <col width="10%" />
                </colgroup>
                <tr ng-repeat="row in $data">
                    <td
                        data-title="'ID'"
                        sortable="'id'"
                        filter="{id:'text'}"
                        ng-click="showEditModal(row)"
                    >{{row.id}}</td>
                    <td
                        data-title="'Країна'"
                        sortable="'country0.title_ua'"
                        filter="{'country0.title_ua':'text'}"
                        ng-click="showEditModal(row)"
                    >{{row.country0.title_ua}}</td>
                    <td
                        data-title="'Українською'"
                        sortable="'title_ua'"
                        filter="{title_ua:'text'}"
                        ng-click="showEditModal(row)"
                    >{{row.title_ua}}</td>
                    <td
                        data-title="'Російською'"
                        sortable="'title_ru'"
                        filter="{title_ru:'text'}"
                        ng-click="showEditModal(row)"
                    >{{row.title_ru}}</td>
                    <td
                        data-title="'Англійською'"
                        sortable="'title_en'"
                        filter="{title_en:'text'}"
                        ng-click="showEditModal(row)"
                    >{{row.title_en}}</td>
                    <td data-title="'Редагувати'">
                        <a
                            type="button"
                            class="btn btn-outline btn-danger btn-sm"
                            ng-click="removeCity(row)"
                            <!--target="_blank" не помагає-->
                        >видалити</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
