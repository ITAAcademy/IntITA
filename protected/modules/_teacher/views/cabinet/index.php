<?php
/* @var $this CabinetController
 * @var $model StudentReg
 * @var $scenario
 * @var $receiver
 * @var $requests array
 * @var $newMessages array
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/showPlainTask.css'); ?>" rel="stylesheet">
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'courseSchema.css'); ?>" rel="stylesheet">
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/messages.css'); ?>" rel="stylesheet">
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/consult.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= StaticFilesHelper::fullPathTo('css', 'formattedForm.css') ?>"/>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap-theme.css'); ?>" rel="stylesheet">
    <!-- Bootstrap Core CSS -->

    <script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script>
        var $jq = jQuery.noConflict();
    </script>
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/main.css'); ?>" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'dist/css/timeline.css');?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'dist/css/sb-admin-2.css');?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/morrisjs/morris.css');?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'roles.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'jquery-ui.min.css') ?>"/>
    <!--Angular-->
<!--    <script src="--><?php //echo StaticFilesHelper::fullPathTo('angular', 'js/angular.min.js'); ?><!--"></script>-->
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/teacher/app.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/teacher/controllers.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/ngBootbox.min.js'); ?>"></script>
    <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'CheckFile.js');?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script>
    basePath = '<?=Config::getBaseUrl()?>';
    user = '<?=Yii::app()->user->getId()?>';
    scenario = '<?=$scenario?>';
    adminEmail = '<?=Config::getAdminEmail();?>';
</script>
<body ng-app="teacherApp">

<div id="wrapper" ng-controller="teacherCtrl">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <?php echo $this->renderPartial('_top_navigation', array(
            'model' => $model,
            'newMessages' => $newMessages,
            'requests' => $requests
        )); ?>
        <?php echo $this->renderPartial('_sidebar_navigation', array('model' => $model, 'newMessages' => $newMessages)); ?>
    </nav>
    <?php echo $this->renderPartial('_page_wrapper', array('model' => $model)); ?>
</div>
</body>
<div style="display: none;text-align: center;" id="ajaxLoad">
    <img style="position:relative;top:68px" src="<?php echo StaticFilesHelper::createPath('image', 'lecture', 'ajax.gif'); ?>" />
</div>
<div class="col-lg-6">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo Yii::app()->name ?></h4>
                </div>
                <div class="modal-body" id="modalText">
                    Вибачте, але на сайті виникла помилка.<br>
                    Спробуйте зайти до кабінету пізніше або зв'яжіться з адміністратором сайту.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ок</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery-ui.min.js'); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/raphael/raphael-min.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/bootbox.min.js'); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'dist/js/sb-admin-2.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_teacher.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_teachers/newPlainTask.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_trainer/trainer.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/morrisjs/morris.min.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js'); ?>"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.11/sorting/date-de.js"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', '_teachers/newPlainTask.js'); ?>"></script>
<?php if(Yii::app()->user->model->isContentManager()){?>
    <script src="<?php echo StaticFilesHelper::fullPathTo('js', 'cabinet/contentManager.js'); ?>"></script>
<?php }?>
<!--Typeahead  scripts -->
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'handlebars.js');?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'typeahead.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'pay.js'); ?>"></script>
<script>
    window.onload = function()
    {

        if(scenario == 'message'){
            load('<?=Yii::app()->createUrl("/_teacher/messages/write",
                array('id' => $model->id, 'receiver' => $receiver));?>');
        }
        history.pushState({url : '<?php echo Yii::app()->createUrl("/_teacher/cabinet/loadDashboard",
                    array('user' => $model->id)); ?>'},"")
    };
    window.onpopstate = function(event){
        reloadPage(event);
    };
</script>
</html>

