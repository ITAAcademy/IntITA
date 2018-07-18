<script type="text/javascript">
    domainPath = '<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() . "/lists/"   ?>';
    domainPathNews = '<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() . "/news/"   ?>';
    domainPathLogo = '<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() . "/logo/"   ?>';
</script>
<style>
    .slide img {
        width: 100%;
        height: 500px !important;
        z-index: 0;
    }

    #cms_content_generate {
        margin-bottom: 40px;
    }

    #save_cms {
        position: absolute;
        margin-top: 75px;
    }

</style>
<div ng-controller="cmsCtrl">
    <div id="cms_content_generate">
        <script type="text/javascript"
                src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular/angular.js'); ?>"></script>
        <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-resource/angular-resource.min.js'); ?>"></script>
        <script type="text/javascript"
                src="<?php echo StaticFilesHelper::fullPathTo('angular', 'cmsControllers.js'); ?>"></script>
        <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/teacher/services/cmsDomainService.js'); ?>"></script>
        <script type="text/javascript"
                src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'cms.js'); ?>"></script>
        <div id="cms_content" class="clearfix" ng-app="cmsDomainApp">
            <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'fontface.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/main.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/header.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/slider.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/about_us.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/news.css'); ?>"/>
            <link rel="stylesheet" type="text/css"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/footer.css'); ?>"/>
            <link rel="stylesheet"
                  href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
            <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-bootstrap/ui-bootstrap-tpls.js'); ?>"></script>
            <div ng-controller="mainCmsCtrl">
                <?php
                $this->renderPartial('_header', array());
                $this->renderPartial('_slider', array());
                $this->renderPartial('_about_us', array());
                $this->renderPartial('_news', array());
                $this->renderPartial('_footer', array());
                ?>
            </div>
        </div>
        <div>
            <input id="save_cms " name="save" value="Згенерувати сторінку" type="submit" ng-click="generatePage()"
                   class="btn btn-primary hide_edit">
        </div>
    </div>
    <div class="news_box" ng-repeat="new in news track by $index">
        <div ng-include="templateUrl('/modal/newsModalLeft.html')" ng-init="index = $index"></div>
    </div>
    <div ng-include="templateUrl('/modal/logoModal.html')"></div>
    <div ng-include="templateUrl('/modal/menuListModal.html')"></div>
    <div ng-include="templateUrl('/modal/headerModal.html')"></div>
    <div ng-include="templateUrl('/modal/titlesModal.html')"></div>
    <div ng-include="templateUrl('/modal/aboutUsModal.html')"></div>
    <div ng-include="templateUrl('/modal/newsModal.html')"></div>
    <div ng-include="templateUrl('/modal/socialNetworksModal.html')"></div>
</div>




