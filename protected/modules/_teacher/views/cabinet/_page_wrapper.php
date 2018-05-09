<?php
/* @var $model StudentReg */
?>
<link href="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/color-picker/dist/color-picker.css'); ?>" rel="stylesheet"/>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/color-picker/dist/color-picker.js'); ?>"></script>
<div id="page-wrapper">
    <div class="row">
        <h2 style="margin-bottom: 10px;margin-top: 20px" class="page-header" id="pageTitle">Особистий кабінет</h2>
    </div>
    <div style="display:none" id="operationMessageHolder"
         uib-alert="" type="{{message.type}}"
         class="ng-scope ng-isolate-scope alert alert-dismissible alert-success">
    </div>
    <div ng-controller="rolesBadgesCount"></div>
    <div id="pageContainer" ui-view></div>
</div>

