<?php
/**
 * @var $model StudentReg
 * @var $message UserMessages
 * @var $receivedMessages array
 * @var $sentMessages CActiveDataProvider
 * @var $sentDialogs array
 * @var $deletedMessages array
 */
?>

<a type="button" class="btn btn-primary" ng-href="#/newmessages/receiver/">
    Написати
</a>
<br>
<br>
<script type="text/ng-template" id="headerCheckbox.html">
    <input type="checkbox" ng-model="checkboxes.checkAll" id="select_all" name="filter-checkbox" value="" />
</script>

<div id="mylettersSend">
    <div class="panel panel-default">
        <div class="panel-body" ng-controller="messagesCtrl">
            <!-- Nav tabs -->
            <script type="text/ng-template" id="path/to/your/filters/age.html">
                <div ng-controller="messagesCtrl">
                    <p class="input-group dateInput">
                        <input type="text" name="{{name}}" ng-disabled="$filterRow.disabled" ng-model="params.filter()[name]" class="input-filter form-control" />
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default" ng-click="show = !show"><i class="glyphicon glyphicon-calendar"></i></button>
                        </span>
                    </p>
                    <div ng-show="show" class="dateFilter">
                        <div uib-datepicker ng-model="dt" class="well well-sm" datepicker-options="options"></div>
                    </div>
                </div>
            </script>


            <uib-tabset active="0">

                <uib-tab index="0" heading="<?php echo Yii::t("letter", "0532") ?>" select="reload()">
                    <div ng-if="deleteReceivedMessages.length > 0" style="padding: 10px">
                    <button class="btn btn-danger"  ng-click="deleteMessages()">Видалити повідомлення </button>
                    </div>
                    <table ng-table="receivedMessagesTable" class="table table-striped table-bordered table-hover" width="100%" style="cursor:pointer">
                        <colgroup>
                            <col width="5%" />
                            <col width="25%" />
                            <col width="55%" />
                            <col width="15%" />
                        </colgroup>
                        <tr ng-repeat="row in $data"  ng-class="(!row.read_date ? 'new' : '')">
                            <td header="'headerCheckbox.html'"> <input type="checkbox" ng-model="checkboxes.items[row.id]" /></td>
                            <td data-title="'Від кого'"  filter="{'name' : 'text'}" ng-click="changeView('messages/message/'+row.id)" sortable="'sender.fullName'">
                                <div ng-if="row.userSender.fullName"><em>{{row.userSender.fullName}}</em></div>
                            </td>
                            <td data-title="'Тема'" filter="{'subject' : 'text'}" ng-click="changeView('messages/message/'+row.id)">
                                <div><em>{{row.subject}}</em></div>

                            </td>
                            <td data-title="'Дата'"  sortable="'create_date'" filter="{'create_date': 'path/to/your/filters/age.html' }" ng-click="changeView('messages/message/'+row.id)">
                                <em>{{row.create_date |shortDate:"yyyy-MM-dd"}}</em>
                            </td>
                        </tr>
                    </table>
                </uib-tab>
                <uib-tab index="1" heading="Надіслані" select="reload()">

                    <table ng-table="sentMessagesTable" class="table table-striped table-bordered table-hover" width="100%" style="cursor:pointer">
                        <colgroup>
                            <col width="25%" />
                            <col width="55%" />
                            <col width="15%" />
                        </colgroup>
                        <tr ng-repeat="row in $data" >
                            <td data-title="'Кому'"  filter="{'name' : 'text'}" sortable="'receiver.fullName'" ng-click="changeView('messages/message/'+row.id)">
                                <div ng-if="row.userReceiver.fullName"><em>{{row.userReceiver.fullName}} ({{row.receiver.email}})</em></div>
                                <div ng-if="row.userReceiver.fullName == ''"><em>{{row.userReceiver.email}}</em></div>
                            </td>
                            <td data-title="'Тема'"  filter="{'subject' : 'text'}" ng-click="changeView('messages/message/'+row.id)">
                                <div ><em>{{row.subject}}</em></div>
                            </td>
                            <td data-title="'Дата'"  sortable="'create_date'" filter="{'message.create_date': 'path/to/your/filters/age.html' }" ng-click="changeView('messages/message/'+row.id)">
                                <em>{{row.create_date |shortDate:"yyyy-MM-dd"}}</em>
                            </td>
                        </tr>
                    </table>
                </uib-tab>

                </uib-tab>


                <uib-tab index="2" heading="Видалені" select="reload()">
                    <table ng-table="deletedMessagesTable" class="table table-striped table-bordered table-hover" width="100%" style="cursor:pointer">
                        <colgroup>
                            <col width="25%" />
                            <col width="55%" />
                            <col width="15%" />
                        </colgroup>
                        <tr ng-repeat="row in $data" ng-click="changeView('deletedmessage/'+row.id)">
                            <td data-title="'Від кого'"  filter="{'name' : 'text'}" sortable="'sender.fullName'">
                                <div ng-if="row.userSender.fullName"><em>{{row.userSender.fullName}} ({{row.sender.email}})</em></div>
                                <div ng-if="row.userSender.fullName == ''"><em>{{row.userSender.email}}</em></div>
                            </td>
                            <td data-title="'Тема'"  filter="{'subject' : 'text'}" ng-click="changeView('deletedmessage/'+row.id)">
                                <div><em>{{row.subject}}</em></div>

                            </td>
                            <td data-title="'Дата'"  sortable="'create_date'" filter="{'message.create_date': 'path/to/your/filters/age.html' }" ng-click="changeView('deletedmessage/'+row.id)">
                                <em>{{row.create_date |shortDate:"yyyy-MM-dd"}}</em>
                            </td>
                        </tr>
                    </table>
                </uib-tab>

            </uib-tabset>

        </div>

    </div>
</div>
