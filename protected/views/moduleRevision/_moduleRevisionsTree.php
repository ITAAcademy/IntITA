<div class="form-group">
    <label for="input-select-node">Пошук ревізії:</label>
    <input type="input" class="form-control" id="input-select-node" placeholder="Ідентифікатор ревізії">
</div>
<div class="form-group">
    <input type="button" class="btn btn-secondary" value="Очистити пошук" ng-click="clearSearch()">
    <input type="button" class="btn btn-secondary" value="Згорнути дерево" ng-click="collapseAll()">
    <input type="button" class="btn btn-secondary" value="Розгорнути дерево" ng-click="expandAll()">
    <input type="button" class="btn btn-secondary" value="Оновити дерево" ng-click="updateTree()">
</div>
<div id="checkboxFilter" class="form-group">
    <label ng-click="isFilterOpen = !isFilterOpen" id="filterSpoiler">Фільтр ревізій{{isFilterOpen | arrow}}</label><br>
    <div ng-show="!isFilterOpen">
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.approved">Затверджені
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.editable">Доступні для редагування
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.sent">Відправлені на розгляд
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.reject">Відхилені
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.cancelled">Скасовані
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.cancelledEditor">Скасовані автором
        </label>
        <label>
            <input type="checkbox" name="revisionFilter" ng-model="formData.revisionFilter.release">В релізі
        </label>
        <label>
            <input type="checkbox" name="allRevision" ng-model="allRevision">Всі ревізії
        </label><br>
        <button class="btn btn-default" style="float: right;" ng-click="revisionFilter()">Застосувати</button>
    </div>
</div>
<div id="tree">
</div>