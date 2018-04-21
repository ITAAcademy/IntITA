
        <div id="cms_content">
            <link rel="stylesheet" href="http://intita/css/fontface.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/main.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/header.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/slider.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/about_us.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/news.css?version=2">
            <link rel="stylesheet" type="text/css" href="http://intita/css/cms/footer.css?version=2">
            <link rel="stylesheet" href="http://intita/css/bower_components/bootstrap/dist/css/bootstrap.min.css?version=2">
            <div class="header" ng-style="{'background-color':settings.header_background_color}" style="background-color: rgb(250, 250, 250);">
    <nav class="navbar">
        <div class="col-md-3 navbar-header">
<!--            <a href="/IntITA/">-->
<!--                <img id="logo" src="http://localhost/IntITA/images/mainpage/Logo_bigUA.png">-->
<!--            </a>-->
            <a href="">
                <img id="logo" src="http://intita.com/images/mainpage/Logo_small.png">
            </a>


        </div>
        <div class="col-md-9">
            <ul class="nav navbar-nav">
                <!-- ngRepeat: list in listsItemMenu track by $index --><li ng-repeat="list in listsItemMenu track by $index" class="ng-scope"><a href="http://intita/teachers" class="ng-binding">Про що мрієш ти?</a></li><!-- end ngRepeat: list in listsItemMenu track by $index --><li ng-repeat="list in listsItemMenu track by $index" class="ng-scope"><a href="http://intita/teachers" class="ng-binding">Ніжитись на сонечку як панда?</a></li><!-- end ngRepeat: list in listsItemMenu track by $index --><li ng-repeat="list in listsItemMenu track by $index" class="ng-scope"><a href="http://intita/teachers" class="ng-binding">Жувати бамбук?</a></li><!-- end ngRepeat: list in listsItemMenu track by $index -->
            </ul>
        </div>
        <div class="col-md-2"></div>
    </nav>
</div>


<div ng-controller="sliderCtrl" id="sliderBlock" class="ng-scope">
    <div id="slider" class="owl-carousel" style="opacity: 1; display: block;">
        <div uib-carousel="" active="active" interval="myInterval" no-wrap="noWrapSlides" class="ng-isolate-scope carousel"><div class="carousel-inner" ng-transclude="">
            <!-- ngRepeat: slide in slides track by slide.id --><div uib-slide="" class="slide ng-scope ng-isolate-scope item" ng-repeat="slide in slides track by slide.id" index="slide.id"><div class="text-center" ng-transclude="">
                <div class="ng-scope">
                    <img ng-src="https://intita.com/images/mainpage/5acb3f77a8ea7.jpg" src="https://intita.com/images/mainpage/5acb3f77a8ea7.jpg">
                    <p class="ng-binding">Ми гарантуємо Тобі отримання пропозиції працевлаштування                після успішного завершення навчання!</p>
                </div>
            </div>
</div><!-- end ngRepeat: slide in slides track by slide.id --><div uib-slide="" class="slide ng-scope ng-isolate-scope item" ng-repeat="slide in slides track by slide.id" index="slide.id"><div class="text-center" ng-transclude="">
                <div class="ng-scope">
                    <img ng-src="https://intita.com/images/mainpage/5acb3f1e920d6.jpg" src="https://intita.com/images/mainpage/5acb3f1e920d6.jpg">
                    <p class="ng-binding">Хочеш стати висококласним спеціалістом? Приймай правильне рішення - навчайся з нами!                Ми працюємо на результат!</p>
                </div>
            </div>
</div><!-- end ngRepeat: slide in slides track by slide.id --><div uib-slide="" class="slide ng-scope ng-isolate-scope item" ng-repeat="slide in slides track by slide.id" index="slide.id"><div class="text-center" ng-transclude="">
                <div class="ng-scope">
                    <img ng-src="https://intita.com/images/mainpage/5ac254f8e1d60.jpg" src="https://intita.com/images/mainpage/5ac254f8e1d60.jpg">
                    <p class="ng-binding">Не втрать свій шанс змінити світ - отримай якісну та сучасну освіту                і стань класним спеціалістом!</p>
                </div>
            </div>
</div><!-- end ngRepeat: slide in slides track by slide.id --><div uib-slide="" class="slide ng-scope ng-isolate-scope item active" ng-repeat="slide in slides track by slide.id" index="slide.id"><div class="text-center" ng-transclude="">
                <div class="ng-scope">
                    <img ng-src="https://intita.com/images/mainpage/5acb3f4195982.jpg" src="https://intita.com/images/mainpage/5acb3f4195982.jpg">
                    <p class="ng-binding">Не втрачай шансу на творчу, цікаву та перспективну працю –                плануй своє професійне майбутнє вже сьогодні!</p>
                </div>
            </div>
</div><!-- end ngRepeat: slide in slides track by slide.id --><div uib-slide="" class="slide ng-scope ng-isolate-scope item" ng-repeat="slide in slides track by slide.id" index="slide.id"><div class="text-center" ng-transclude="">
                <div class="ng-scope">
                    <img ng-src="https://intita.com/images/mainpage/5ac2558437b4b.jpg" src="https://intita.com/images/mainpage/5ac2558437b4b.jpg">
                    <p class="ng-binding">Один рік цікавого навчання - і ти станеш гарним програмістом,                готовим працювати в індустрії інформаційних технологій!</p>
                </div>
            </div>
</div><!-- end ngRepeat: slide in slides track by slide.id -->
        </div>
<a role="button" href="" class="left carousel-control" ng-click="prev()" ng-class="{ disabled: isPrevDisabled() }" ng-show="slides.length > 1">
  <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">previous</span>
</a>
<a role="button" href="" class="right carousel-control" ng-click="next()" ng-class="{ disabled: isNextDisabled() }" ng-show="slides.length > 1">
  <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">next</span>
</a>
<ol class="carousel-indicators" ng-show="slides.length > 1">
  <!-- ngRepeat: slide in slides | orderBy:indexOfSlide track by $index --><li ng-repeat="slide in slides | orderBy:indexOfSlide track by $index" ng-class="{ active: isActive(slide) }" ng-click="select(slide)" class="ng-scope">
    <span class="sr-only ng-binding">slide 1 of 5<!-- ngIf: isActive(slide) --></span>
  </li><!-- end ngRepeat: slide in slides | orderBy:indexOfSlide track by $index --><li ng-repeat="slide in slides | orderBy:indexOfSlide track by $index" ng-class="{ active: isActive(slide) }" ng-click="select(slide)" class="ng-scope">
    <span class="sr-only ng-binding">slide 2 of 5<!-- ngIf: isActive(slide) --></span>
  </li><!-- end ngRepeat: slide in slides | orderBy:indexOfSlide track by $index --><li ng-repeat="slide in slides | orderBy:indexOfSlide track by $index" ng-class="{ active: isActive(slide) }" ng-click="select(slide)" class="ng-scope">
    <span class="sr-only ng-binding">slide 3 of 5<!-- ngIf: isActive(slide) --></span>
  </li><!-- end ngRepeat: slide in slides | orderBy:indexOfSlide track by $index --><li ng-repeat="slide in slides | orderBy:indexOfSlide track by $index" ng-class="{ active: isActive(slide) }" ng-click="select(slide)" class="ng-scope active">
    <span class="sr-only ng-binding">slide 4 of 5<!-- ngIf: isActive(slide) --><span ng-if="isActive(slide)" class="ng-scope">, currently active</span><!-- end ngIf: isActive(slide) --></span>
  </li><!-- end ngRepeat: slide in slides | orderBy:indexOfSlide track by $index --><li ng-repeat="slide in slides | orderBy:indexOfSlide track by $index" ng-class="{ active: isActive(slide) }" ng-click="select(slide)" class="ng-scope">
    <span class="sr-only ng-binding">slide 5 of 5<!-- ngIf: isActive(slide) --></span>
  </li><!-- end ngRepeat: slide in slides | orderBy:indexOfSlide track by $index -->
</ol>
</div>
    </div>
</div><div class="mainAboutBlock" ng-style="{'background-color':settings.about_us_background_color}" style="background-color: rgb(255, 255, 255);">


    <div class="hed text-center">
        <h1 class="header_about ng-binding" ng-bind="settings.title" ng-style="{color:settings.title_color}" style="color: rgb(102, 102, 102);">Про нас</h1>
        <h3 class="info_bot ng-binding" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}" style="color: rgb(70, 130, 180); border-bottom-color: rgb(70, 130, 180);">Важлива інформація про навчання разом з нами</h3>
    </div>

    <div class="items_about row">
        <div>
            <div class="col-md-2 col-xs-3"></div>
            <div class="col-md-8 col-xs-6">

<!--                <div class="icon_about  card-group  ">-->
<!--                    <div class="row card">-->
<!--                        <div class="block_about  card-img-top" ng-repeat="item in listsItemMenu track by $index">-->
<!--                            <img id="image_about" src="{{item.image}}" >-->
<!--                        </div>-->
<!--                        <div class="title_about card-body" ng-style="{color:settings.subtitle_color}">{{item.title}}<p class="card-text"-->
<!--                                    ng-style="{color:settings.text_color}">{{item.description}}</p>-->
<!--                        </div>-->
<!--                        <div class="card-footer">-->
<!--                            <a href="{{item.link}}" ng-style="{color:settings.general_link_color}">детальніше ...</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->






                <div class="row  card-group">
                    <!-- ngRepeat: item in listsItemMenu track by $index --><div class="block_about card ng-scope" ng-repeat="item in listsItemMenu track by $index">

                        <div class="icon_about card-img-top">
                            <img id="image_about" src="http://intita/images/cms//images/cms/1/lists/182018929maxresdefault.jpg">

<!--                            <img id="image_about" src="   {{item.image}}" >-->
                        </div>
                        <div class="title_about card-body ng-binding" ng-style="{color:settings.subtitle_color}" style="color: rgb(70, 130, 180);">Про що мрієш ти?<p class="card-text ng-binding" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">Можливо, це свобода жити своїм життям?</p>
                        </div>


                        <div class="card-footer">
                            <a href="http://intita/teachers" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">детальніше ...</a>
                        </div>
                    </div><!-- end ngRepeat: item in listsItemMenu track by $index --><div class="block_about card ng-scope" ng-repeat="item in listsItemMenu track by $index">

                        <div class="icon_about card-img-top">
                            <img id="image_about" src="http://intita/images/cms//images/cms/1/lists/182018931d0b1d0bed0bbd18cd188d0b0d18f-d0bfd0b0d0bdd0b4d0b0-d0bdd0b0-d0b4d0b5d180d0b5d0b2d0b5-d181d0bfd0b8d182.jpg">

<!--                            <img id="image_about" src="   {{item.image}}" >-->
                        </div>
                        <div class="title_about card-body ng-binding" ng-style="{color:settings.subtitle_color}" style="color: rgb(70, 130, 180);">Ніжитись на сонечку як панда?<p class="card-text ng-binding" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">На відміну від традиційних закладів, ми навчаємо не задля оцінок. Ми працюємо індивідуально з кожним студентом, щоб досягти 100% засвоєння необхідних знань.</p>
                        </div>


                        <div class="card-footer">
                            <a href="http://intita/teachers" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">детальніше ...</a>
                        </div>
                    </div><!-- end ngRepeat: item in listsItemMenu track by $index --><div class="block_about card ng-scope" ng-repeat="item in listsItemMenu track by $index">

                        <div class="icon_about card-img-top">
                            <img id="image_about" src="http://intita/images/cms//images/cms/1/lists/182018932panda-colors-black-and-white-1.jpg">

<!--                            <img id="image_about" src="   {{item.image}}" >-->
                        </div>
                        <div class="title_about card-body ng-binding" ng-style="{color:settings.subtitle_color}" style="color: rgb(70, 130, 180);">Жувати бамбук?<p class="card-text ng-binding" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">і не паритись?</p>
                        </div>


                        <div class="card-footer">
                            <a href="http://intita/teachers" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">детальніше ...</a>
                        </div>
                    </div><!-- end ngRepeat: item in listsItemMenu track by $index -->
                </div>






                <div class="col-md-2 col-xs-3"></div>
            </div>
        </div>
    </div>
</div>






<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}" style="background-color: rgb(243, 243, 243);">

    <div class="container text-center">
        <h1 class="text-muted ng-binding" ng-style="{color:settings.title_color}" ng-bind="settings.title_2" style="color: rgb(102, 102, 102);">Як розпочати навчання?</h1>
        <h3 class="text-primary info_bot ng-binding" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}" ng-bind="settings.subtitle_2" style="color: rgb(70, 130, 180); border-bottom-color: rgb(70, 130, 180);">П’ять кроків до здійснення твоїх мрій</h3>
    </div>
    <div class="news_container">

        <!-- ngRepeat: list in lists track by $index --><div ng-repeat="list in lists track by $index" class="ng-scope">
            <!-- ngIf: $index%2==0 --><div ng-if="$index%2==0" class="ng-scope">
                <h3 class="text-left text ng-binding" ng-style="{color:settings.title_color}" style="color: rgb(102, 102, 102);">First title</h3>
                <p class="text-left text ng-binding" ng-style="{color:settings.news_date_color}" style="color: rgb(70, 130, 180);">2018-03-19 13:22:39</p>
                <div class="row text" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">
                    <div class="col-md-4 col-sm-5">
                        <img src="images/aboutus/1.jpg" class="img_news" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" style="border-color: rgb(75, 117, 164); border-style: solid; border-width: thin;">
                    </div>
                    <div class="col-md-8 col-sm-7 ng-binding" style="box-shadow: 0 0 5px #ACACAC">
                        Щоб отримати доступ до курсів та пройти безкоштовні модулі і заняття, зареєструйся на сайті. Реєстрація дозволить тобі оцінити якість та зручність нашого продукту, який стане для тебе надійним партнером і порадником в професійній самореалізації. Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor si …
                        <!-- ngIf: list.text.length > list.strLimit --><span ng-if="list.text.length > list.strLimit" class="ng-scope">
                            <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">Показати більше</a>
                        </span><!-- end ngIf: list.text.length > list.strLimit -->
                        <!-- ngIf: list.text.length == list.strLimit --></div>
                </div>
            </div><!-- end ngIf: $index%2==0 -->
            <!-- ngIf: $index%2!=0 -->
        </div><!-- end ngRepeat: list in lists track by $index --><div ng-repeat="list in lists track by $index" class="ng-scope">
            <!-- ngIf: $index%2==0 -->
            <!-- ngIf: $index%2!=0 --><div ng-if="$index%2!=0" class="ng-scope">
                <h3 class="text-right text ng-binding" ng-style="{color:settings.title_color}" style="color: rgb(102, 102, 102);">Second title</h3>
                <p class="text-right text ng-binding" ng-style="{color:settings.news_date_color}" style="color: rgb(70, 130, 180);">2018-03-19 13:22:39</p>
                <div class="row text" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">
                    <div class="col-md-8 col-sm-7 ng-binding" style="box-shadow: 0 0 5px #ACACAC">
                        Щоб стати спеціалістом певного напрямку та рівня (отримати професійну спеціалізацію), вибери для проходження відповідний курс. Якщо Тебе цікавить виключно поглиблення знань в певному напрямку інформаційних технологій, то вибери відповідний модуль для проходження. Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lo…
                        <!-- ngIf: list.text.length > lists[$index].strLimit --><span ng-if="list.text.length > lists[$index].strLimit" class="ng-scope">
                            <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">Показати більше</a>
                        </span><!-- end ngIf: list.text.length > lists[$index].strLimit -->
                        <!-- ngIf: list.text.length == lists[$index].strLimit -->
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <img src="images/aboutus/2.jpg" class="img_news" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" style="border-color: rgb(75, 117, 164); border-style: solid; border-width: thin;">
                    </div>
                </div>
            </div><!-- end ngIf: $index%2!=0 -->
        </div><!-- end ngRepeat: list in lists track by $index --><div ng-repeat="list in lists track by $index" class="ng-scope">
            <!-- ngIf: $index%2==0 --><div ng-if="$index%2==0" class="ng-scope">
                <h3 class="text-left text ng-binding" ng-style="{color:settings.title_color}" style="color: rgb(102, 102, 102);">Third title</h3>
                <p class="text-left text ng-binding" ng-style="{color:settings.news_date_color}" style="color: rgb(70, 130, 180);">2018-03-19 13:22:39</p>
                <div class="row text" ng-style="{color:settings.text_color}" style="color: rgb(105, 105, 105);">
                    <div class="col-md-4 col-sm-5">
                        <img src="images/aboutus/3.jpg" class="img_news" ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}" style="border-color: rgb(75, 117, 164); border-style: solid; border-width: thin;">
                    </div>
                    <div class="col-md-8 col-sm-7 ng-binding" style="box-shadow: 0 0 5px #ACACAC">
                        Щоб розпочати проходження курсу чи модуля, вибери схему оплати (вся сума за курс, оплата модулів, оплата потриместрово, помісячно тощо) та здійсни оплату зручним Тобі способом (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит). Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf Lorem ipsum dolor sit amet, consectetur adipisicing elithjgsdhfsgdshdfshdfsdf L …
                        <!-- ngIf: list.text.length > list.strLimit --><span ng-if="list.text.length > list.strLimit" class="ng-scope">
                            <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}" style="color: rgb(17, 73, 136);">Показати більше</a>
                        </span><!-- end ngIf: list.text.length > list.strLimit -->
                        <!-- ngIf: list.text.length == list.strLimit --></div>
                </div>
            </div><!-- end ngIf: $index%2==0 -->
            <!-- ngIf: $index%2!=0 -->
        </div><!-- end ngRepeat: list in lists track by $index -->
    </div>
</div><div id="footer_main" ng-style="{  'background-color':settings.footer_background_color,
                                    'border-bottom-color': settings.footer_border_color,
                                    'border-right-color': settings.footer_border_color,
                                    'border-left-color': settings.footer_border_color  }" class="row" style="background-color: rgb(250, 250, 250); border-bottom-color: rgb(68, 189, 246); border-right-color: rgb(68, 189, 246); border-left-color: rgb(68, 189, 246);">

    <div class="left_footer col-lg-2 col-md-2 col-sm-2 col-xs-2" ng-style="{'border-right-color':settings.footer_border_color}" style="border-right-color: rgb(68, 189, 246);">
        <table class="icon_table">
            <tbody><tr>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="https://twitter.com/INTITA_EDU" target="_blank" title="Twitter">
                        <img src="http://intita.com//images/mainpage/twitter.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="https://www.youtube.com/channel/UC2EMqcr4pEBuTGEJBaFgOzw" target="_blank" title="Youtube">
                        <img src="http://intita.com//images/mainpage/youtube.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="https://plus.google.com/u/0/116490432477798418410/posts" target="_blank" title="Google+">
                        <img src="http://intita.com//images/mainpage/googlePlus.png">
                    </a>
                </td>
            </tr>
            <tr>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="https://www.facebook.com/pages/INTITA/320360351410183" target="_blank" title="Facebook">
                        <img src="http://intita.com//images/mainpage/facebook.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="https://www.linkedin.com/company/intita?trk=biz-companies-cym" target="_blank" title="Linkedin">
                        <img src="http://intita.com//images/mainpage/inl.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}" style="border-radius: 15px; background-color: rgb(250, 250, 250);">
                    <a href="" target="_blank" title="Instagram">
                        <img src="http://intita.com/images/mainpage/instagram.png">
                    </a>
                </td>
            </tr>
            </tbody></table>
    </div>
    <div class="center_footer col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class=" row">
            <div class="left_part col-md-6 col-sm-5 col-xs-12">
                <div class="logo">
                    <a href="">
                        <img id="footerLogo" src="http://intita.com/images/mainpage/Logo_small.png">
                    </a>
                </div>
                <div class="footer_logo2">
                    <a href="/">
                        <img id="footerLogo800" src="http://intita.com/images/mainpage/Logo_small800.png">
                    </a>
                </div>
                <div class="footer_contact" ng-style="{color:settings.footer_link_color}" style="color: rgb(17, 73, 136);">
                    <div><span ng-bind="settings.mobile_phone" class="ng-binding">тел. моб: +38 067 431 74 24</span></div>
                    <div><span ng-bind="settings.mobile_phone_2" class="ng-binding">тел. моб: +38 073 209 97 43</span></div>
                    <div><span ng-bind="settings.email" class="ng-binding">ел. пошта: info@intita.com</span></div>
                </div>
            </div>

            <div class="footer_menu col-md-6 col-sm-7 hidden-xs">
                <!-- ngRepeat: section in listsItemMenu track by $index --><a ng-style="{color:settings.footer_link_color}" ng-repeat="section in listsItemMenu track by $index" href="http://intita/teachers" class="ng-scope" style="color: rgb(17, 73, 136);"><span class="ng-binding">Про що мрієш ти?</span></a><!-- end ngRepeat: section in listsItemMenu track by $index --><a ng-style="{color:settings.footer_link_color}" ng-repeat="section in listsItemMenu track by $index" href="http://intita/teachers" class="ng-scope" style="color: rgb(17, 73, 136);"><span class="ng-binding">Ніжитись на сонечку як панда?</span></a><!-- end ngRepeat: section in listsItemMenu track by $index --><a ng-style="{color:settings.footer_link_color}" ng-repeat="section in listsItemMenu track by $index" href="http://intita/teachers" class="ng-scope" style="color: rgb(17, 73, 136);"><span class="ng-binding">Жувати бамбук?</span></a><!-- end ngRepeat: section in listsItemMenu track by $index -->
            </div>
        </div>
    </div>


    <div class="right_footer col-lg-1 col-md-1 col-sm-1 col-xs-1" ng-style="{'border-left-color': settings.footer_border_color}" style="border-left-color: rgb(68, 189, 246);">
        <div class="right_footer_inside">
            <a href="javascript:void(0)"><img ng-style="{'border-radius': '20px', 'background-color': settings.icon_shadow_color}" id="img-go" src="http://intita.com/images/mainpage/go_up.png" style="border-radius: 20px; background-color: rgb(250, 250, 250);"></a>
        </div>
    </div>
</div>

        </div>
    