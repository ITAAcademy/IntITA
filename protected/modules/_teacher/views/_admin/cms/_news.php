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
        <div>
            <input class="btn btn-primary add_news hide_edit" name="add_news" value="Додати новину" type="submit"
                   onclick="" data-toggle="modal" data-target="#newsModal">
        </div>
    </div>
    <div class="news_container">
        <div ng-repeat="new in news track by $index">
            <div class="box_out" ng-if="$index%2==0">
                <div class="title_news_left">
                    <div class=" display_inl_bl  ">
                        <h3 class="text-left  text " ng-style="{color:settings.title_color}">{{new.title}}
                            <img class="edit-not-absolute hide_edit" type="image" data-toggle="modal"
                                 data-target="#newsModalLeft{{$index}}"
                                 src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>"></h3>
                        <div ng-include="templateUrl('newsModalLeft.html')" ng-init="index = $index"></div>
                    </div>
                </div>
                <div class=" text-date_left "><p ng-style="{color:settings.news_date_color}">{{new.date}}</p></div>
                <div class="row box_inside" ng-style="{color:settings.text_color}"
                     style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">
                    <div class="col-md-4 col-sm-5 img_out img_out_left">
                        <div class="img_news_box1">
                            <img src='{{new.id && domainPathNews+ new.img || new.img}}' ng-hide="new.id && !(new.img | isNotLink)" class="img_news"
                                 ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                        </div>
                        <div>
                            <img class="edit hide_edit" data-toggle="modal"
                                   data-target="#newsModalLeft{{$index}}"
                                   src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                        </div>
                    </div>
                    <div class=" col-md-8 col-sm-7 text_out_left">
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


            <div class="box_out" ng-if="$index%2!=0">
                <div class="title_news_right">
                    <div class=" display_inl_bl  ">
                        <h3 class="text-right  text " ng-style="{color:settings.title_color}">{{new.title}}</h3>
                        <div>
                            <img class="edit6 hide_edit" data-toggle="modal"
                                   data-target="#newsModalRight{{$index}}"
                                   src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                            <div ng-include="templateUrl('newsModalRight.html')" ng-init="index = $index"></div>
                        </div>
                    </div>
                </div>
                <div class="  text-date_rigth"><p class="  text-date_p" ng-style="{color:settings.news_date_color}">
                        {{new.date}}</p></div>
                <div class="row box_inside_right" ng-style="{color:settings.text_color}"
                     style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">
                    <div class="col-md-8 col-sm-7 text_out_right">
                        <div class="box_new">
                            <div class=" box_text row">
                                {{new.text| limitTo:news[$index].strLimit }}{{new.text.length > news[$index].strLimit ?
                                '&hellip;' : ''}}
                                <span ng-if="new.text.length > news[$index].strLimit"
                                      data-hover="{{settings.general_hover_color}}"
                                      data-link="{{settings.general_link_color}}"
                                      onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showMore($index)"
                                           ng-style="{color:settings.general_link_color}">Показати більше</a>
                                    </span>
                                <span ng-if="new.text.length == news[$index].strLimit"
                                      data-hover="{{settings.general_hover_color}}"
                                      data-link="{{settings.general_link_color}}"
                                      onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showLess($index)"
                                           ng-style="{color:settings.general_link_color}">Приховати</a>
                                    </span>
                            </div>
                        </div>
                        <div>
                            <img class="edit hide_edit" data-toggle="modal"
                                   data-target="#newsModalRight{{$index}}"
                                   src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-5 img_out img_out_rigth">
                        <div class="img_news_box2">
                            <img src='{{new.id && domainPathNews+ new.img || new.img}}' class="img_news" ng-hide="new.id && !(new.img | isNotLink)"
                                 ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                        </div>
                        <div>
                            <input class="edit4 hide_edit" type="image" data-toggle="modal"
                                   data-target="#newsModalRight{{$index}}"
                                   src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
