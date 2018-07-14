<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}">
    <div class="container_n text-center stepHeaderCont">
        <div class="text-muted grid-title2 ">
            <div class="news_titles">
                <h1 class="" ng-style="{color:settings.title_color}" ng-bind="settings.title_2"></h1>
                <h3 class="text-primary  info_bot"
                    ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}"
                    ng-bind="settings.subtitle_2"></h3>
            </div>
            <div>
                <img class="edit hide_edit" data-toggle="modal"
                     data-target="#titlesModal"
                     src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
            </div>
        </div>
        <div id="add_news">
            <input class="btn btn-primary add_news hide_edit" name="add_news" value="Додати новину" type="submit"
                   onclick="" data-toggle="modal" data-target="#newsModal">
        </div>
    </div>
    <div class="news_container">
        <div class="news_box" ng-repeat="new in news track by $index">
            <div class="title_news">
                <div class="display_inl_bl">
                    <h3 ng-style="{color:settings.title_color}">{{new.title}}
                        <img class="edit-not-absolute hide_edit" type="image" data-toggle="modal"
                             data-target="#newsModalLeft{{$index}}"
                             src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>"></h3>
                    <div ng-include="templateUrl('newsModalLeft.html')" ng-init="index = $index"></div>
                </div>
            </div>
            <div class="text-date"><p ng-style="{color:settings.news_date_color}">{{new.date}}</p></div>
            <div class="row box_inside" ng-style="{color:settings.text_color}"
                 style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">
                <div class="img_news_box col-md-4 col-sm-6 col-xs-6">
                    <img src='{{new.id && domainPathNews+ new.img || new.img}}' ng-hide="new.id && !(new.img | isNotLink)" class="img_news"
                         ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                </div>
                <div>
                    <img class="edit hide_edit" data-toggle="modal"
                           data-target="#newsModalLeft{{$index}}"
                           src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                </div>
                <div class="text_out col-md-8 col-sm-6 col-xs-6">
                    <div class="box_new">
                        <div class=" box_text row">
                            {{new.text| limitTo:new.strLimit }} {{new.text.length > news[$index].strLimit ? '&hellip;'
                            : ''}}
                            <span ng-if="new.text.length > new.strLimit"
                                  data-hover="{{settings.general_hover_color}}"
                                  data-link="{{settings.general_link_color}}"
                                  onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                    <a href="" ng-click="showMore($index)"
                                       ng-style="{color:settings.general_link_color}">Показати більше</a>
                                </span>
                            <span ng-if="new.text.length == new.strLimit"
                                  data-hover="{{settings.general_hover_color}}"
                                  data-link="{{settings.general_link_color}}"
                                  onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                    <a href="" ng-click="showLess($index)"
                                       ng-style="{color:settings.general_link_color}">Приховати</a>
                                </span>
                        </div>
                    </div>
                    <div>
                        <input class="edit4 hide_edit" type="image" data-toggle="modal"
                               data-target="#newsModalLeft{{$index}}"
                               src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                    </div>
                </div>
            </div>
        </div>
</div>
