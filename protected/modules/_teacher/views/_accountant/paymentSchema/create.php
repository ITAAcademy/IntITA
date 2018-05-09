<?php
/* @var $scenario
 * @var $organization
 */
?>
<div class="panel-body" ng-controller="paymentsSchemaTemplateCtrl">
    <div class="row">
        <div class="formMargin">
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Назва шаблону схеми ua*</label>
                    <input name="name_ua" class="form-control" ng-model="template.name_ua" required maxlength="64" size="50">
                    <label>Назва шаблону схеми ru</label>
                    <input name="name_ru" class="form-control" ng-model="template.name_ru" maxlength="64" size="50">
                    <label>Назва шаблону схеми en</label>
                    <input name="name_en" class="form-control" ng-model="template.name_en" maxlength="64" size="50">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="col-md-5">
                    <label>Початок договору</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default" ng-click="startDateOptions.open()">
                                <i class="glyphicon glyphicon-calendar"></i>
                            </span>
                        </span>
                        <input type="text"
                               class="form-control"
                               uib-datepicker-popup
                               ng-model="template.start_date"
                               is-open="startDateOptions.popupOpened"
                               datepicker-options="openDateOptions"
                               clear-text='Очистити'
                               close-text='Закрити'
                               current-text='Сьогодні'>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Тривалість сервісу в місяцях</label>
                        <input type="number" name="duration" class="form-control" min="1" max="99" ng-model="template.duration" required maxlength="2">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Опис, умови, перелік документів (ua)</label>
                    <textarea name="description_ua" class="form-control" ng-model="template.description_ua"
                              style="resize:none"></textarea>
                    <label>Опис, умови, перелік документів (ru)</label>
                    <textarea name="description_ru" class="form-control" ng-model="template.description_ru"
                              style="resize:none"></textarea>
                    <label>Опис, умови, перелік документів (en)</label>
                    <textarea name="description_en" class="form-control" ng-model="template.description_en"
                              style="resize:none"></textarea>
                </div>
            </div>

            <div class="row col-md-12">
                <div class="col-md-4">
                    <span class="control-label"><b>Розрахунковий рахунок</b>
                        (*приорітет р/р закріплений до шаблона - вищий, ніж той який закріплений до сервіса)</span>
                </div>
                <div class="col-md-8">
                    <div class="input-group">
                        <div class="form-group col-xs-10">
                            <select class="form-control" ng-model="template.company"
                                    ng-options="company.id as company.title for company in companies"
                                    ng-change="loadCheckingAccounts(template.company)">
                                <option value="" disabled>Оберіть компанію</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-10">
                            <select class="form-control" ng-model="template.id_checking_account"
                                    ng-options="account.id as (account.bank_name + ', р/р:' + account.checking_account) for account in checkingAccounts">
                                <option value="">рахунок не вибрано</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Кількість проплат</th>
                        <th>Назва схеми</th>
                        <th>Відсоток знижки</th>
                        <th>Відсоток кредиту</th>
                        <th>З паперовим договором</th>
                        <th>
                            Додати схему
                            <button type="button" class="btn btn-default btn-sm" ng-click="operation.addScheme()">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                            </button>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="scheme in schemes track by $index">
                        <td>
                            <select
                                    class="form-control"
                                    ng-model="schemes[$index].pay_count"
                                    ng-options="pay_count.value as pay_count.value for pay_count in payCount"
                                    ng-change="updateScheme(schemes[$index].pay_count,$index)">
                            </select>
                        </td>
                        <td>
                            <input type="text" ng-disabled=true class="form-control" ng-value="schemes[$index].name">
                        </td>
                        <td>
                            <input type="number" class="form-control" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/"
                                   step="0.01" ng-model="schemes[$index].discount" min="0" max="100"/>
                        </td>
                        <td>
                            <input type="number" class="form-control" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/"
                                   step="0.01" ng-model="schemes[$index].loan" min="0" max="100"/>
                        </td>
                        <td>
                            <input type="checkbox" class="form-control" ng-model="schemes[$index].contract"/>
                        </td>
                        <td ng-if="$index!=0">
                            <button type="button" class="btn btn-default btn-sm"
                                    ng-click="operation.removeScheme($index)">
                                <span class="glyphicon glyphicon-minus-sign"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" ng-model="template.id_organization"
                   ng-init="template.id_organization='<?php echo $organization ? Yii::app()->user->model->getCurrentOrganizationId() : null ?>'">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" ng-click="createTemplate(template)"
                        ng-disabled="!template.name_ua || !template.schemes.length">
                    Зберегти
                </button>
                <a type="button" class="btn btn-default" ng-click='back()'>
                    Назад
                </a>
            </div>
        </div>
    </div>
</div>