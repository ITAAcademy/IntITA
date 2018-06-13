<div class="panel panel-default" ng-controller="bannersForGraduatesCtrl">
    <button class="btn btn-success"
            ng-bootbox-title="Завантажити банер"
            ng-bootbox-options="dialogOptions"
            ng-bootbox-custom-dialog
            ng-bootbox-custom-dialog-template="/angular/js/teacher/templates/bannerForGraduatesUploadTemplate.html"
    >
        Завантажити банер
    </button>
    <div class="panel-body">
        <div class="dataTable_wrapper">
            <table ng-table="bannersForGraduatesTableData" class="table table-striped table-bordered table-hover"
                   style="table-layout: fixed">
                <colgroup>
                    <col width="5%"/>
                    <col width="35%"/>
                    <col width="21%"/>
                    <col width="21%"/>
                    <col width="9%"/>
                    <col width="7%"/>
                    <col width="12%"/>
                </colgroup>
                <tr ng-repeat="row in $data"style="cursor: pointer;" ng-drop="true" ng-drop-success="onDropComplete(row, $data,$event)" ng-drag="true" ng-drag-data="row" >
                    <td data-title="'ID'">{{row.id}}</td>
                    <td data-title="'Файл'"><img width="400px" src="{{row.file_path}}" alt="Тут банер прозорого кольору!"></td>
                    <td data-title="'Заголовок'">{{row.text}}</td>
                    <td data-title="'Посилання'"><a href="{{row.url}}" target="_blank">{{row.url}}</a></td>
                    <td data-title="'Позиція'">{{row.slide_position}}</td>
                    <td data-title="'Статус'">
                        <span ng-show="row.visible == 1" title="Відображено "><i class="glyphicon glyphicon-eye-open"></i></span>
                        <span ng-show="row.visible != 1"><i class="glyphicon glyphicon-eye-close"></i></span>

                    </td>
                    <td data-title="'Дії'" ng-drag="false">
                        <div style="vertical-align: middle; display: table-cell">
                            <span><button class="btn btn-success" ng-bootbox-confirm="Ви впевнені, що бажаєте змінити статус відображеня банеру?"
                                          ng-bootbox-confirm-action="chandeState(row.id,row.visible)" title="Змінити статус відображеня банеру">
                                    <i  ng-show="row.visible != 1" class="glyphicon glyphicon-eye-open" title="Відображений"></i>
                                    <i  ng-show="row.visible == 1" class="glyphicon glyphicon-eye-close" title="Прихований"></i>
                                </button>
                            </span>
                            <span><button class="btn btn-info" ng-click="editTask(row.id)"  title="Змінити посилання банеру"
                                          ng-bootbox-prompt="Змінити посилання банеру"
                                          ng-bootbox-prompt-default-value="{{row.url}}"
                                          ng-bootbox-prompt-action="changeUrl(row.id,result)">
                                    <i class="glyphicon glyphicon-tag"></i>
                                </button>
                            </span><br>
                            <span><button class="btn btn-info" ng-click="editTask(row.id)"  title="Змінити назву компанії"
                                          ng-bootbox-prompt="Змінити назву компанії"
                                          ng-bootbox-prompt-default-value="{{row.text}}"
                                          ng-bootbox-prompt-action="changeTitle(row.id,result)">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </button>
                            </span>
                            <span><button class="btn btn-danger" ng-bootbox-confirm="Ви впевнені, що бажаєте видалити банер?"
                                          ng-bootbox-confirm-action="deleteBanner(row.id)" title="Видалити банер">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>