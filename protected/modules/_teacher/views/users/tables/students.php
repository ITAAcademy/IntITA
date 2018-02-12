<style>
    table.table-condensed{
        table-layout: inherit;
    }
</style>
<div ng-controller="studentsInfoCtrl">
    <uib-tabset active="active">
        <uib-tab ng-repeat="tab in tabs" heading="{{tab.title}}" ui-sref ="studentsTable/students.{{tab.route}}" ></uib-tab>
    </uib-tabset>
    <div ui-view="studentsTabs"></div>
</div>