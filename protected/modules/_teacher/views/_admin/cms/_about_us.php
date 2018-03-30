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
                </div>
            <div class="col-md-2 col-xs-3"></div>
        </div>
    </div>
</div>

