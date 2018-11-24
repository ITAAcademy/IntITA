<div class="" ng-controller="vacationFormCtrl">
    <div class="">
        <a type="button" class="btn btn-primary" ui-sref="vacationsList">
            Список відпусток
        </a>
    </div>
    <form enctype="multipart/form-data" novalidate ng-submit="submitFormAddVacation();" name="myForm" >
        <div class="form-group">
            <label for="vacation_type_id">Тип відпустки:</label>
            <select
                class="form-control"
                id="vacation_type"
                name="vacation_type_id"
                ng-model="formData.vacation_type_id"
                required
                ng-change="isBenefitsOrOvertime(formData.vacation_type_id.extension_form)"
                ng-options="type as type.title_ua for type in vacationTypes track by type.id"
            >
            </select>
        </div>
        <div class="form-group" ng-show="isBenefitsOrOvertime(formData.vacation_type_id.extension_form)">
            <label for="name">Назва задачі:</label>
            <input type="text" class="form-control" id="task_name" placeholder="Введіть назву задачі" name="task_name" ng-model="formData.task_name" ng-required="isBenefitsOrOvertime(formData.vacation_type_id.extension_form)">
        </div>
        <div class="form-group" ng-show="isBenefitsOrOvertime(formData.vacation_type_id.extension_form)">
            <label for="description">Опис задачі:</label>
            <textarea maxlength="256" class="form-control" rows="5" id="description" name="description" ng-model="formData.description" placeholder="Опис задачі" ng-required="isBenefitsOrOvertime(formData.vacation_type_id.extension_form)"></textarea>
        </div>
        <div class="form-group">
            <label for="comment">Коментар:</label>
            <textarea maxlength="256" class="form-control" rows="5" id="comment" name="comment" ng-model="formData.comment" placeholder="Коментар від бухгалтера" ng-disabled="<?php echo !$isAccountant ?>"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Статус:</label>
            <select
                class="form-control"
                id="status"
                name="status"
                ng-model="formData.status"
                ng-disabled="<?php echo !$isAccountant ?>"
                required
                ng-options="status as status.value for status in statusSelect track by status.id"
            >
            </select>
        </div>
        <div class="col-md-12 form-group vacation-date">
            <div class="col-md-6 vacation-date">
                <label class="col-md-6" style="line-height: 30px">Початкова дата відпустки:</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default" ng-click="start_date.open()">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </span>
                    <input type="text"
                           class="form-control"
                           uib-datepicker-popup
                           ng-model="formData.start_date"
                           is-open="start_date.popupOpened"
                           datepicker-options="start_date"
                           clear-text='Очистити'
                           close-text='Закрити'
                           current-text='Сьогодні'
                           required
                    />
                </div>
            </div>
            <div class="col-md-6 vacation-date">
                <label class="col-md-6" style="line-height: 30px">Кінцева дата відпустки:</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default" ng-click="end_date.open()">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </span>
                    <input type="text"
                           class="form-control"
                           uib-datepicker-popup
                           ng-model="formData.end_date"
                           is-open="end_date.popupOpened"
                           datepicker-options="end_date"
                           clear-text='Очистити'
                           close-text='Закрити'
                           current-text='Сьогодні'
                           required
                    />
                </div>
            </div>
        </div>
        <div class="form-group">
            <a ng-if="formData.file_src" ui-sref="getVacation({'id': formData.id})">Скан-копія відпустки</a>
            <br>
            <label for="file_src" class="btn btn-info">Оберіть файл відпустки</label>
            <input type="file" id="file_src" nv-file-select uploader="vacationUploader">
            <div ng-if="vacationUploader.getNotUploadedItems().length">
                <ul class="vacation-file-upload">
                    <li ng-repeat="item in vacationUploader.queue">
                        Назва файлу: <span ng-bind="item.file.name"></span><br/>
                    </li>
                </ul>
            </div>
        </div>
        <input type="submit" class="btn btn-default" ng-disabled="myForm.$invalid" value="Зберегти відпустку">
    </form>
</div>
