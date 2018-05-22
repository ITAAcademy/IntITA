<script type="text/javascript">
    domainPath='<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() ."/lists/"   ?>';
    domainPathNews='<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() ."/news/"   ?>';
    domainPathLogo='<?php echo Config::getBaseUrl() . '/domains/' . Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()))->domain_name . '.' . Config::getBaseUrlWithoutSchema() ."/logo/"   ?>';

</script>
<div ng-controller="cmsCtrl">
        <?php
        $this->renderPartial('_settings', array());
        ?>
    <div id="cms_content_generate">
        <script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'cms.js'); ?>"></script>
        <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular/angular.min.js'); ?>"></script>
        <div id="cms_content">
            <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'fontface.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/main.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/header.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/slider.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/about_us.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/news.css'); ?>"/>
            <link rel="stylesheet" type="text/css" href="<?php echo StaticFilesHelper::fullPathTo('css', 'cms/footer.css'); ?>"/>
            <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
            <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-bootstrap/ui-bootstrap-tpls.js'); ?>"></script>
            <?php
            $this->renderPartial('_header', array());
            $this->renderPartial('_slider', array());
            $this->renderPartial('_about_us', array());
            $this->renderPartial('_news', array());
            $this->renderPartial('_footer', array());
            ?>
            <script>
                 angular
                        .module('cmsAppNew',['ui.bootstrap'])
                          .controller('sliderGeneratedCtrl', ['$scope','$http',
                            function ($scope,$http) {
                                var domain = "",
                                sliders_src = [],
                                slide_title = [],
                                slide_description = [],
                                currIndex = 0,   /*поточна кількість доданих слайдів*/
                                slides = $scope.slides = [];   /*масив об'єктів з властивостями слайдів*/
                                $http({
                                    method: 'GET',
                                    url: '/_teacher/_admin/cms/getDomainPath'
                                }).then(function (response) {
                                    domain = response.data.domainPath;
                                }).then(function () {
                                    $http({
                                        method: 'GET',
                                        url: '/_teacher/_admin/cms/getMenuSlider'
                                    }).then(function (response) {
                                        if (response.data.length == 0) {
                                            $http.get('/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                                                addSlideWithInfo(response,false);
                                            });
                                        }
                                        else{
                                            addSlideWithInfo(response,true);
                                        }
                                        function addSlideWithInfo(response,status){
                                            if (status == true){
                                                var data = response.data;
                                                var img_address = domain + '/carousel/';
                                            }
                                            else{
                                                var data = response;
                                                var img_address = "";
                                            }
                                            for(var i = 0; i < data.length; i++) {
                                                sliders_src.push(img_address +data[i].src);
                                                slide_title.push(data[i].title);
                                                slide_description.push(data[i].description);
                                            };
                                            for (var i = 0; i < sliders_src.length; i++) {   /*формування початкового набору слайдів*/
                                                $scope.addSlide();
                                                currIndex++;
                                            };
                                        }
                                    });
                                })
                                $scope.test = 5;
                                $scope.myInterval = 3000;   /*період зміни слайдів*/
                                $scope.noWrapSlides = false;   /*???*/
                                $scope.active = 0;   /*індекс першого слайду*/
                                $scope.addSlide = function() {   /*функція для додавання нового слайду*/
                                    slides.push({
                                        src: sliders_src[currIndex],   /*адреса зображення*/
                                        title: slide_title[currIndex],   /*стрічка тексту*/
                                        description: slide_description[currIndex],
                                        id: currIndex   /*індекс поточного слайду*/
                                    });
                                };
                            }
                        ]);


            </script>
        </div>
    </div>
</div>
<input id="save_cms" name="save" value="Згенерувати сторінку" type="submit"  onclick="bootbox.alert('Сторінку згенеровано!')" class="btn btn-primary" >



