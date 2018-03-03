<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/main.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/header.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/slider.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/about_us.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/news.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/footer.css'); ?>"/>

<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'cms.js'); ?>"></script>
<?php
$this->renderPartial('_header', array());
$this->renderPartial('_slider', array());
$this->renderPartial('_about_us', array());
$this->renderPartial('_news', array());
$this->renderPartial('_footer', array());
?>