<div class="mainAboutBlock"  ng-style="{'background-color':settings.about_us_background_color}">



    <div class="hed text-center">
        <h1 class="header_about"  ng-style="{color:settings.title_color}">{{settings.title}}</h1>
        <h3 class="info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.footer_border_color}">{{settings.subtitle}}</h3>
    </div>

    <div class="items_about row">
        <div>
            <div class="col-md-2 col-xs-3"></div>
            <div class="col-md-8 col-xs-6">


                <div class="row">
                    <div class="block_about " ng-repeat="item in settings.items track by $index">
                        <div class="icon_about">
                            <img src="{{item.img}}">
                        </div>
                        <div class="title_about" ng-style="{color:settings.subtitle_color}">{{item.name}}<p
                                    ng-style="{color:settings.text_color}">{{item.text}}</p>
                        </div>
                        <a href="{{item.href}}" ng-style="{color:settings.general_link_color}">детальніше ...</a>
                    </div>


<!---->
<!---->
<!--                    <div class="block_about col-md-4 col-sm-6 col-xs-12">-->
<!--                        <div class="icon_about">-->
<!--                            <img src="https://intita.com/images/aboutus/image1.png">-->
<!--                        </div>-->
<!--                        <div class="title_about" ng-style="{color:settings.subtitle_color}" >Про що мрієш ти?<p ng-style="{color:settings.text_color}">-->
<!--                                Можливо, це свобода жити-->
<!--                                своїм життям? Самостійно керувати-->
<!--                                власним часом з можливістю-->
<!--                                заробляти, улюбленою справою-->
<!--                                і отримувати задоволення-->
<!--                                від сучасної професії?</p>-->
<!--                        </div>-->
<!--                        <a href="/aboutus/1/" ng-style="{color:settings.general_link_color}">детальніше ...</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="block_about col-md-4 col-sm-6 col-xs-12">-->
<!---->
<!--                        <div class="icon_about">-->
<!--                            <img src="https://intita.com/images/aboutus/image2.png">-->
<!--                        </div>-->
<!--                        <div class="title_about" ng-style="{color:settings.subtitle_color}">Навчання майбутнього<p ng-style="{color:settings.text_color}">-->
<!--                                На відміну від традиційних-->
<!--                                закладів, ми навчаємо-->
<!--                                не задля оцінок. Ми працюємо-->
<!--                                індивідуально з кожним-->
<!--                                студентом, щоб досягти 100%-->
<!--                                засвоєння необхідних знань.</p>-->
<!--                        </div>-->
<!--                        <a href="/aboutus/2/" ng-style="{color:settings.general_link_color}">детальніше ...</a>-->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="block_about col-md-4 col-md-offset-0   col-sm-6 col-sm-offset-3  col-xs-12 col-xs-offset-0">-->
<!--                        <div class="icon_about">-->
<!--                            <img src="https://intita.com/images/aboutus/image3.png">-->
<!--                        </div>-->
<!--                        <div class="title_about" ng-style="{color:settings.subtitle_color}">Важливі питання<p ng-style="{color:settings.text_color}">-->
<!--                                Ми пропонуємо кожному-->
<!--                                нашому випускнику гарантоване-->
<!--                                отримання пропозиції-->
<!--                                працевлаштування протягом 4-6-ти-->
<!--                                місяців після успішного-->
<!--                                завершення навчання.</p>-->
<!--                        </div>-->
<!--                        <a href="/aboutus/3/" ng-style="{color:settings.general_link_color}">детальніше ...</a>-->
<!--                    </div>-->
<!--                </div>-->

            </div>
            <div class="col-md-2 col-xs-3"></div>
        </div>
    </div>
</div>


