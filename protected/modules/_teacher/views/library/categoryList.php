<div ng-controller="categoryBooksCtrl"  class="row bookListWrap">
    <ul class="list-inline">
        <li>
            <a type="button" class="btn btn-primary" ng-href="#/library/addCategory">
                Створити
            </a>
        </li>
    </ul>
    <table class="table table-condensed table-striped" ng-table="categoryBooksTable">
        <tr ng-repeat="category in $data track by $index" style="text-align: center">
            <td title="'id'" sortable="'id'">
                {{category.id}}
            </td>
            <td  title="'Назва українською'" filter="{'title_ua': 'text'}" sortable="'title_ua'">
                <a ng-href="#/library/category/{{category.id}}">{{category.title_ua}}</a>
            </td>
            <td  title="'Назва російською'" filter="{'title_ru': 'text'}" sortable="'title_ru'">
                <a ng-href="#/library/category/{{category.id}}">{{category.title_ru}}</a>
            </td>
            <td  title="'Назва англійською'" filter="{'title_en': 'text'}" sortable="'title_en'">
                <a ng-href="#/library/category/{{category.id}}">{{category.title_en}}</a>
            </td>
        </tr>
    </table>
</div>