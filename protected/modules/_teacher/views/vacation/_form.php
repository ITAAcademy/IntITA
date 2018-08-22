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
                ng-options="type as type.title_ua for type in vacationTypes track by type.id"
            >
            </select>
        </div>
        <div class="form-group" ng-show="isBenefitsOrOvertime(<?php echo $vacationType->id ?>)">
            <label for="name">Назва задачі:</label>
            <input type="text" class="form-control" id="task_name" placeholder="Введіть назву задачі" name="task_name" ng-model="formData.task_name">
        </div>
        <div class="form-group" ng-show="isBenefitsOrOvertime(<?php echo $vacationType->id ?>)">
            <label for="description">Опис задачі:</label>
            <textarea maxlength="256" class="form-control" rows="5" id="description" name="description" ng-model="formData.description" placeholder="Опис задачі"></textarea>
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
                ng-options="status as status.value for status in statusSelect track by status.id"
            >
            </select>
        </div>
        <div class="col-md-12 form-group vacation-date">
            <div class="col-md-6 vacation-date">
                <label class="col-md-6" style="line-height: 30px">Початкова дата відпустки</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default" ng-click="dateFrom.open()">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </span>
                    <input type="text"
                           class="form-control"
                           uib-datepicker-popup
                           ng-model="formData.start_date"
                           is-open="dateFrom.popupOpened"
                           datepicker-options="dateFrom"
                           clear-text='Очистити'
                           close-text='Закрити'
                           current-text='Сьогодні'>
                </div>
            </div>
            <div class="col-md-6 vacation-date">
                <label class="col-md-6" style="line-height: 30px">Кінцева дата відпустки</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default" ng-click="dateTo.open()">
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                    </span>
                    <input type="text"
                           class="form-control"
                           uib-datepicker-popup
                           ng-model="formData.end_date"
                           is-open="dateTo.popupOpened"
                           datepicker-options="dateTo"
                           clear-text='Очистити'
                           close-text='Закрити'
                           current-text='Сьогодні'>
                </div>
            </div>
        </div>
        <div class="form-group">
            <a ng-if="formData.link" ui-sref="getVacation({'id': formData.id})">Скан-копія відпустки</a>
            <br>
            <label for="link">Виберіть файл відпустки:</label>
            <input type="file" nv-file-select="" uploader="vacationUploader">
            <div ng-if="vacationUploader.getNotUploadedItems().length">
                <div class="progress" style="margin-bottom:0">
                    <div class="progress-bar" role="progressbar" ng-style="{ 'width': vacationUploader.progress + '%' }" style="width: 0%;"></div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-default" ng-disabled="myForm.$invalid" value="Зберегти відпустку">
    </form>
</div>
