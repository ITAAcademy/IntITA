<div ng-controller="addCategoryCtrl">
        <ul class="list-inline">
            <li>
                <a type="button" class="btn btn-primary" ng-href="#/library/categoryList">
                    Категорії
                </a>
            </li>
        </ul>
        <div class="addBookWrap">
            <form enctype="multipart/form-data" novalidate ng-submit="submitCategory();" name="myForm">
                <div class="form-group">
                    <label for="title_ua">Назва українською мовою:</label>
                    <input type="text" class="form-control" id="title_ua" placeholder="Введіть назву категорії" name="name" ng-model="newCategory.title_ua"><br>
                    <label for="title_ru">Назва російською мовою:</label>
                    <input type="text" class="form-control" id="title_ru" placeholder="Введите название категории" name="name" ng-model="newCategory.title_ru"><br>
                    <label for="title_en">Назва англійською мовою:</label>
                    <input type="text" class="form-control" id="title_en" placeholder="Enter category title" name="name" ng-model="newCategory.title_en">
                </div>
                <input type="submit" class="btn btn-default" ng-disabled="myForm.$invalid" value="Додати категорію">
            </form>
        </div>
</div>
