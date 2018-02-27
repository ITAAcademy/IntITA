<style>
    table.table-condensed{
        table-layout: inherit;
    }
</style>
<div ng-controller="studentsInfoCtrl" organization="<?php echo $organization ?>" trainer="<?php echo $trainer ?>" class="row scroll-table">
    <uib-tabset active="active">
        <?php if($trainer){ ?>
            <uib-tab ng-repeat="tab in tabs" heading="{{tab.title}}" ui-sref="trainerStudentsTable/students.{{tab.route}}" ></uib-tab>
        <?php } else { ?>
            <uib-tab ng-repeat="tab in tabs" heading="{{tab.title}}" ui-sref="studentsTable/students.{{tab.route}}" ></uib-tab>
        <?php } ?>
    </uib-tabset>
    <div ui-view="studentsTabs"></div>
</div>
<script>
    $jq('.scroll-table').height($jq(window).height()-100);
</script>