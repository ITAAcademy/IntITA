<div ng-controller="vacationCtrl">
    <table class="table table-condensed table-striped" ng-table="vacationTable">
        <tr  style="text-align: center">
            <td title="'Номер'" sortable="'id'">
                as;dlfkj;
            </td>
            <td  title="'Назва'" filter="{'title': 'text'}" sortable="'title'">
                <a href="#/library/update/">asdfasdf</a>
            </td>
            <td title="'Опис'">
                adsfasdfasd
            </td>
            <td title="'Автор'">
                asdfasdf
            </td>
            <td title="'Ціна'"  sortable="'price'">
                sadfsadf
            </td>
            <td title="'Мова'" sortable="'language'">
                ssdfsadfsdaf
            </td>
            <td title="'Категорія'">
                <span ng-repeat="vacation in vacationType">{{vacationType.title_ua}}<br></span>
            </td>
            <td title="'Фото'">
                <img class="bookPreview" ng-if="book.logo" src="/files/library/{{book.id}}/logo/{{book.logo}}">
            </td>
            <td title="'Посилання'">
                <a ng-if="book.link" ng-href="/_teacher/library/library/getBook?id={{book.id}}">Книга</a>
            </td>
            <td>
                <a ng-href="#/library/update/{{book.id}}"><i class="fa fa-edit"></i></a><br>
                <a ng-click="removeBook(book.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </td>
        </tr>
    </table>    
</div>
