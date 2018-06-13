<div class="mainAboutBlock"  ng-style="{'background-color':settings.about_us_background_color}">


    <div class="hed text-center row">
            <h1 class="header_about"  ng-bind="settings.title" ng-style="{color:settings.title_color}"></h1>
            <h3 class="info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}">{{settings.subtitle}}</h3>

    </div>

    <div class="items_about row">
        <div>
            <div class="col-md-2 col-xs-3"></div>
            <div class="col-md-8 col-xs-6">
                <div class="row  card-group">
                    <div class="block_about card" ng-repeat="item in listsItemMenu track by $index">
                        <div class="icon_about card-img-top">
                            <img class="image_about" ng-src='{{item.id && domainPath+item.image || item.image}}'>
                        </div>
                        <div class="title_about card-body" ng-style="{color:settings.subtitle_color}">{{item.title}}<p class="card-text"
                                    ng-style="{color:settings.text_color}">{{item.description}}</p>
                        </div>
                        <div class="card-footer" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                             onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                            <a href="{{item.link}}" ng-style="{color:settings.general_link_color}">детальніше ...</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-3"></div>
            </div>
        </div>
    </div>
</div>





