<div ng-controller="booksCtrl"  class="row bookListWrap">
    <ul class="list-inline">
        <li>
            <a type="button" class="btn btn-primary" ng-href="#/library/create">
                Створити
            </a>
        </li>
    </ul>
    <table class="table table-condensed table-striped" ng-table="booksTable">
        <tr ng-repeat="book in $data track by $index" style="text-align: center">
            <td title="'Номер'" sortable="'id'">
                {{$index+1}}
            </td>
            <td  title="'Назва'" filter="{'title': 'text'}" sortable="'title'">
                <a href="#/library/update/{{book.id}}">{{book.title}}</a>
            </td>
            <td title="'Опис'">
                {{book.description}}
            </td>
            <td title="'Автор'">
                {{book.author}}
            </td>
            <td title="'Ціна'"  sortable="'price'">
                {{book.price}}
            </td>
            <td title="'Мова'" sortable="'language'">
                {{book.language}}
            </td>
            <td title="'Категорія'">
                <span ng-repeat="category in book.libraryDependsBookCategories">{{category.idCategory.title_ua}}<br></span>
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