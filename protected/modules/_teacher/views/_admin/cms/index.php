<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'cms.js'); ?>"></script>
<div ng-controller="cmsCtrl">
        <?php
        $this->renderPartial('_settings', array());
        ?>
    <div id="cms_content_generate">
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
            <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-animate/angular-animate.min.js'); ?>"></script>
            <script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'bower_components/angular-sanitize/angular-sanitize.min.js'); ?>"></script>
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
                        .module('cmsAppNew',['ngAnimate', 'ngSanitize', 'ui.bootstrap'])
                          .controller('sliderGeneratedCtrl', ['$scope',
                            function ($scope) {
                                $scope.test = 5;
                                $scope.myInterval = 3000;   /*період зміни слайдів*/
                                $scope.noWrapSlides = false;   /*???*/
                                $scope.active = 3;   /*індекс першого слайду*/
                                var slides = $scope.slides = [];   /*масив об'єктів з властивостями слайдів*/
                                var currIndex = 0;   /*поточна кількість доданих слайдів*/
                                var sliders_src = [
                                    'https://intita.com/images/mainpage/5acb3f77a8ea7.jpg',
                                    'https://intita.com/images/mainpage/5acb3f1e920d6.jpg',
                                    'https://intita.com/images/mainpage/5ac254f8e1d60.jpg',
                                    'https://intita.com/images/mainpage/5acb3f4195982.jpg',
                                    'https://intita.com/images/mainpage/5ac2558437b4b.jpg'
                                ];
                                var slide_text = [
                                    "Ми гарантуємо Тобі отримання пропозиції працевлаштування\
                                    після успішного завершення навчання!",
                                    "Хочеш стати висококласним спеціалістом? Приймай правильне рішення - навчайся з нами!\
                                    Ми працюємо на результат!",
                                    "Не втрать свій шанс змінити світ - отримай якісну та сучасну освіту\
                                    і стань класним спеціалістом!",
                                    "Не втрачай шансу на творчу, цікаву та перспективну працю –\
                                    плануй своє професійне майбутнє вже сьогодні!",
                                    "Один рік цікавого навчання - і ти станеш гарним програмістом,\
                                    готовим працювати в індустрії інформаційних технологій!",
                                    "Мрієш заробляти улюбленою справою і отримувати задоволення від професії?\
                                    Скористайся можливістю потрапити у світ інформаційних технологій!",
                                    "В майбутньому буде два типи робіт: ті, де Ти будеш керувати комп'ютером - програмувати,\
                                    і ті, де машини вказуватимуть, що робити Тобі!"
                                ];

                                $scope.addSlide = function() {   /*функція для додавання нового слайду*/
                                    slides.push({
                                        image: sliders_src[currIndex],   /*адреса зображення*/
                                        text: slide_text[currIndex],   /*стрічка тексту*/
                                        id: currIndex++   /*індекс поточного слайду*/
                                    });
                                };

                                for (var i = 0; i < sliders_src.length; i++) {   /*формування початкового набору слайдів*/
                                    $scope.addSlide();
                                }
                            }
                        ]);


            </script>
        </div>
    </div>
</div>
<input id="save_cms" name="save" value="Згенерувати сторінку" type="submit" class="btn btn-primary">



