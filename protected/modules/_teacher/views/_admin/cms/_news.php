<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}" >
    <div class="container_n text-center">
        <h1 class="text-muted" ng-style="{color:settings.title_color}"  ng-bind="settings.title_2"></h1>
        <h3 class="text-primary info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}"   ng-bind="settings.subtitle_2"></h3>
    </div>
    <div class="news_container" >

        <div ng-repeat="list in lists track by $index">
            <div ng-if="$index%2==0">
                <h3 class="text-left text" ng-style="{color:settings.title_color}">{{list.title}}</h3>
                <p class="text-left text" ng-style="{color:settings.news_date_color}">{{list.date}}</p>
                <div class="row text" id="column_news1" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">
                    <div class="col-md-4 col-sm-5" id="img_news_box1" >
                        <img src='{{list.id && domainPathNews+ list.img || list.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}">
                    </div>
                    <div class="col-md-8 col-sm-7 box_text" >
                        {{list.text| limitTo:list.strLimit }} {{list.text.length > lists[$index].strLimit ? '&hellip;' : ''}}
                        <span ng-if="list.text.length > list.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                              onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                            <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}">Показати більше</a>
                        </span>
                        <span ng-if="list.text.length == list.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                              onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                            <a href="" ng-click="showLess($index)" ng-style="{color:settings.general_link_color}">Приховати</a>
                    </div>
                </div>
            </div>
            <div ng-if="$index%2!=0">
                <h3 class="text-right text" ng-style="{color:settings.title_color}">{{list.title}}</h3>
                <p class="text-right text" ng-style="{color:settings.news_date_color}">{{list.date}}</p>
                <div class="row text" id="column_news2" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}" >
                    <div class="col-md-8 col-sm-7  box_text" >
                        {{list.text| limitTo:lists[$index].strLimit }}{{list.text.length > lists[$index].strLimit ? '&hellip;' : ''}}
                        <span ng-if="list.text.length > lists[$index].strLimit"  data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                              onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                            <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}">Показати більше</a>
                        </span>
                        <span ng-if="list.text.length == lists[$index].strLimit"   data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                              onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                            <a href="" ng-click="showLess($index)" ng-style="{color:settings.general_link_color}">Приховати</a>
                        </span>
                    </div>
                    <div class="col-md-4 col-sm-5" id="img_news_box2">
                        <img src='{{list.id && domainPathNews+ list.img || list.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': 'thin'}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>