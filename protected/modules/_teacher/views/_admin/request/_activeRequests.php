<div class="panel panel-default">
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table class="table table-striped table-bordered table-hover" id="activeRequestsTable">
                <thead>
                <tr>
                    <th>Користувач</th>
                    <th>Модуль</th>
                    <th>Тип</th>
                    <th>Дата</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $jq(document).ready(function () {
        initActiveRequestsTable();
    });
</script>