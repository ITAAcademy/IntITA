<div class="form-group">
    <label for="input-select-node">Пошук ревізії:</label>
    <input type="input" class="form-control" id="input-select-node" placeholder="Ідентифікатор ревізії">
</div>
<div class="form-group">
    <input type="button" class="btn btn-secondary" value="Очистити пошук" ng-click="clearSearch()">
    <input type="button" class="btn btn-secondary" value="Згорнути дерево" ng-click="collapseAll()">
    <input type="button" class="btn btn-secondary" value="Розгорнути дерево" ng-click="expandAll()">
</div>
<div id="tree">
</div>