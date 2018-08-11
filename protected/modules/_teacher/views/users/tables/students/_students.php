<?php
$currentTime = date('Y-m-d H:i:s');
$last_24h = date('Y-m-d H:i:s', time()-60*60*24);
$startOfDay = date('Y-m-d H:i:s', strtotime(date('Y-m-d')));
?>
<div ng-controller="studentsTableCtrl">
    <br>
    <button class="btn btn-primary resetInput"
            ng-click="updateStudentList(organization)">
        Всі студенти
    </button>

    <button class="btn btn-primary resetInput"
            ng-click="updateStudentList(organization,'<?=$startOfDay?>', '<?=$currentTime?>')">
        За сьогодні
    </button>

    <button class="btn btn-primary resetInput"
            ng-click="updateStudentList(organization,'<?=$last_24h?>', '<?=$currentTime?>')">
        За добу
    </button>
    <div class="students-table-datepicker ">
        <button class="btn btn-primary"
                ng-click="updateStudentList(organization,from+ ' 00:00:00', to+' 23:59:59')"
                ng-disabled="!from">
            За період:
        </button>

        з : <input type="text" ng-model='from' id="from" name="from">
        по: <input type="text" ng-model='to' id="to" name = "to">
    </div>

    <input type="hidden" ng-model='startDate'>
    <input type="hidden" ng-model='endDate'>

    <script>
        $jq('.resetInput').on('click', function(e){
            e.preventDefault();

            var val_from = $jq('#from').val();
            var val_to = $jq('#to').val();

            if(val_from.length >= 1){
                $jq('#from').val('');
            }
            if(val_to.length >= 1){
                $jq('#to').val('');
            }
        });
    </script>
    <div style="display: inline" ng-if="studentsTableParams.total() > 0">
        <a title="Експорт" class="glyphicon glyphicon-floppy-disk btn btn-primary pull-right" style="margin: 5px;"
           href="/_teacher/users/export/type/students/start/{{startDate}}/end/{{endDate}}">
        </a>
    </div>
    <br>
    <br>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table ng-table="studentsTableParams" class="table table-bordered table-striped table-condensed">
                    <tr ng-repeat="row in $data track by $index">
                        <td style="word-wrap:break-word" data-title="'Студент'" sortable="'idUser.fullName'" filter="{'idUser.fullName': 'text'}" >
                            <a ng-href="#/users/profile/{{row.id_user}}">{{row.idUser.fullName}}</a>
                        </td>
                        <td data-title="'Надано роль'" filter="{'start_date': 'text'}" sortable="'start_date'">{{row.start_date}}</td>
                        <td data-title="'Форма'" filter="{'idUser.education_shift': 'select'}" filter-data="educationForms">
                            {{row.idUser.education_shift==1? "онлайн":"онлайн/оффлайн"}}
                        </td>
                        <td data-title="'Місто'" filter="{'city.title_ua': 'text'}" sortable="'city.title_ua'">{{row.city.title_ua}}</td>
                        <td style="word-wrap:break-word" data-title="'Тренер'" filter="{'trainer.fullName': 'text'}" sortable="'trainer.fullName'">
                            <a ng-href="#/users/profile/{{row.trainer.id}}">{{row.trainer.fullName}}</a>
                        </td>
                        <td style="word-wrap:break-word;" data-title="'Телефон'" sortable="'idUser.phone'" filter="{'idUser.phone': 'text'}">
                            {{row.idUser.phone}}
                        </td>
                        <?php if (Yii::app()->user->model->isSuperVisor()) { ?>
                            <td data-title="" ng-if="organization">
                                <a ng-href="#/supervisor/addOfflineStudent/{{row.id_user}}">Додати в підгрупу</a>
                            </td>
                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>