<div ng-controller="liqpayPaymentsCtrl">
    <em>*Якщо в списку немає проплати здійсненої користувачем, введіть в поля нижче користувача та книгу по якій була здійснена проплата.
        Буде відправлено запит на перевірку проплати та оновлено дані.</em>
    <div class="form-group row">
        <div class="col-md-6">
            <label>
                <strong>Користувач:</strong>
            </label>
            <input type="text" ng-model="userSelected"  ng-model-options="{ debounce: 1000 }"
                   placeholder="Користувач" uib-typeahead="item.email for item in getActiveUsers($viewValue) | limitTo : 10"
                   typeahead-no-results="noResults"  typeahead-template-url="customTemplate.html"
                   typeahead-on-select="onSelectUser($item)" ng-change="reloadUser()" class="form-control" />
            <div ng-show="noResults">
                <i class="glyphicon glyphicon-remove"></i> користувача не знайдено
            </div>
        </div>
        <div class="col-md-6">
            <label>
                <strong>Книга:</strong>
            </label>
            <input type="text" ng-model="librarySelected"  ng-model-options="{ debounce: 1000 }"
                   placeholder="Книга" uib-typeahead="item.title for item in getLibraryList($viewValue) | limitTo : 10"
                   typeahead-no-results="noLibraryResults"  typeahead-template-url="libraryTemplate.html"
                   typeahead-on-select="onSelectLibrary($item)" ng-change="reloadLibrary()" class="form-control" />
            <div ng-show="noLibraryResults">
                <i class="glyphicon glyphicon-remove"></i> книгу не знайдено
            </div>
        </div>
    </div>
    <button class="btn btn-primary pull-right" ng-click="liqPayStatusRequest()">Відправити запит</button>
    <table class="table table-condensed table-striped" ng-table="libraryPaymentsTableParams">
        <tr ng-repeat="row in $data track by $index">
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
            <td  title="'Проплочено'" filter="{'status': 'text'}" sortable="'status'">
                {{row.status==1?'Проплочено':'Не проплочено'}}
            </td>
            <td  title="'Дата'" filter="{'date': 'text'}" sortable="'date'">
                {{row.date}}
            </td>
        </tr>
    </table>
</div>
<script type="text/ng-template" id="libraryTemplate.html">
    <a>
        <div class="typeahead_wrapper  tt-selectable">
            <div class="typeahead_labels">
                <span ng-bind="match.model.title"></span>
            </div>
        </div>
    </a>
</script>