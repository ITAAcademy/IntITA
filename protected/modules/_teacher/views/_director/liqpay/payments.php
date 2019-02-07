<div ng-controller="liqpayPaymentsCtrl">
    <em>*Якщо в списку немає проплати здійсненої користувачем, введіть в поле нижче order_id, який можна дістати з проплати на LiqPay.
        Буде відправлено запит на перевірку проплати та оновлено дані.</em>
    <div class="form-group row">
        <div class="col-md-6">
            <label>
                <strong>order_id:</strong>
            </label>
            <input type="text" ng-model="order_id" placeholder="order_id" class="form-control" />
            <div ng-show="noResults">
                <i class="glyphicon glyphicon-remove"></i> користувача не знайдено
            </div>
        </div>
    </div>
    <button class="btn btn-primary pull-right" ng-click="liqPayStatusRequest()">Відправити запит</button>
    <table class="table table-condensed table-striped" ng-table="libraryPaymentsTableParams">
        <tr ng-repeat="row in $data track by $index" ng-class="{green: row.status == 'success'}">
            <td title="'Order ID'" filter="{'order_id': 'text'}" style="word-break: break-all">
                {{row.order_id}}
            </td>
            <td title="'Payment id'" filter="{'payment_id': 'text'}" sortable="'payment_id'" style="word-break: break-all">
                {{row.payment_id}}
            </td>
            <td title="'Телефон'" filter="{'sender_phone': 'text'}" sortable="'sender_phone'" style="word-break: break-all">
                {{row.sender_phone}}
            </td>
            <td title="'Картка'" filter="{'sender_card_mask2': 'text'}" sortable="'sender_card_mask2'" style="word-break: break-all">
                {{row.sender_card_mask2}}
            </td>
            <td title="'Книга'" filter="{'library.title': 'text'}">
                {{row.library.title}}
            </td>
            <td data-title="'Користувач'" filter="{'user.fullName': 'text'}" sortable="'user.fullName'">
                <a ng-href="#/users/profile/{{row.user_id}}">{{row.user.fullName}}</a>
            </td>
            <td title="'Сума грн.'" filter="{'amount': 'text'}">
                {{row.amount}}
            </td>
            <td title="'Статус'" filter="{'status': 'text'}" sortable="'status'">
                {{row.status}}
            </td>
            <td  title="'Дата'" filter="{'date': 'text'}" sortable="'date'">
                {{row.date}}
            </td>
        </tr>
    </table>
</div>
<a target="_blank" href="https://www.liqpay.ua/ru/doc/status">Статуси liqpay</a>
<script type="text/ng-template" id="libraryTemplate.html">
    <a>
        <div class="typeahead_wrapper  tt-selectable">
            <div class="typeahead_labels">
                <span ng-bind="match.model.title"></span>
            </div>
        </div>
    </a>
</script>