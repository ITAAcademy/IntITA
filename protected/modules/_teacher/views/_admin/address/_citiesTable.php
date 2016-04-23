<?php
/**
 *
 */
?>
<div class="col-lg-12">
    <br>
    <button class="btn btn-primary"
            onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/address/addCity');?>',
                'Додати місто')">
        Додати місто
    </button>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="citiesTable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Країна</th>
                        <th>Українською</th>
                        <th>Російською</th>
                        <th>Англійською</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
