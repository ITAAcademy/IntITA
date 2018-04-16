<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'cms.js'); ?>"></script>
<div ng-controller="cmsCtrl">
        <?php
        $this->renderPartial('_settings', array());
        ?>
    <div id="cms_content_generate">
        <div id="cms_content">
            <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'fontface.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/main.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/header.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/slider.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/about_us.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/news.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/footer.css'); ?>"/>
            <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
            <?php
            $this->renderPartial('_header', array());
            $this->renderPartial('_slider', array());
            $this->renderPartial('_about_us', array());
            $this->renderPartial('_news', array());
            $this->renderPartial('_footer', array());
            ?>
        </div>
    </div>
</div>
<input id="save_cms" name="save" value="Згенерувати сторінку" type="submit" class="btn btn-primary">



