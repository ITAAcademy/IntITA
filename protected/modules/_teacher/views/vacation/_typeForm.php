<ul class="list-inline">
    <li>
        <a type="button" class="btn btn-primary" ui-sref="vacationsTypes">
            Типи відпусток
        </a>
    </li>
</ul>
<div class="">
    <form enctype="multipart/form-data" novalidate ng-submit="submitType();" name="myForm">
        <div class="form-group">
            <label for="title_ua">Назва українською мовою:</label>
            <input type="text" class="form-control" id="title_ua" placeholder="Введіть назву відпустки" name="title_ua" ng-model="newType.title_ua"><br>
            <label for="title_ru">Назва російською мовою:</label>
            <input type="text" class="form-control" id="title_ru" placeholder="Введите название відпустки" name="title_ru" ng-model="newType.title_ru"><br>
            <label for="title_en">Назва англійською мовою:</label>
            <input type="text" class="form-control" id="title_en" placeholder="Enter category vacation" name="title_en" ng-model="newType.title_en">
            <label for="position">Позиція</label>
            <input type="text" class="form-control" id="position" placeholder="Enter category position" name="position" ng-model="newType.position">
        </div>
        <input type="submit" class="btn btn-default" ng-disabled="myForm.$invalid" value="Додати відпустку">
    </form>
</div>