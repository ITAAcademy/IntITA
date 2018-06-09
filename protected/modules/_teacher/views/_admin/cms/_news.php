<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}" >
    <div class="container_n text-center stepHeaderCont">
        <div class="text-muted grid-title2 ">
            <div class="news_titles">
                <h1 class="" ng-style="{color:settings.title_color}"  ng-bind="settings.title_2"></h1>
                <h3 class="text-primary  info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}"   ng-bind="settings.subtitle_2"></h3>
            </div>
            <div>
                <input class="edit3" type="image" ng-click="removeLogo()" data-toggle="modal" data-target="#Title2Modal" src="http://intita.com/images/editor/edt_20px.png">
                <div class="modal fade" id="Title2Modal" role="dialog">
                    <div class="modal-dialog ">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Завантажити логотип</h4>
                            </div>


                            <div class="modal-body">
                                <div class="grid_group_title1" >
                                    <div class="rectangle" >
                                        <input class="in_rectangle_soc" type="text" ng-model="settings.title">
                                    </div>
                                </div>

                                <div class="grid_group_title2" >
                                    <div class="intent" >
                                        <p class="in_intent title_color_style" ng-style="{color:settings.title_color}" >Заголовок</p>
                                        <p class="in_intent"  ng-style="{color:settings.title_color}" >Title color</p>
                                    </div>
                                    <div  class="square" >
                                        <input  class="in_square" type="color" ng-model="settings.title_color">
                                    </div>
                                    <div class="rectangle" >
                                        <input class="in_rectangle"  ng-model="settings.title_color" color-picker color-picker-model="settings.title_color" type="text">
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="updateSettings(settings, settings.logo )" >Зберегти</button>
                            </div>
                        </div>

                    </div>
            </div>
        </div>





    </div>
    <div class="news_container" >

        <div ng-repeat="list in lists track by $index">
            <div class="box_out" ng-if="$index%2==0">
                <div class="row box_inside" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">


                    <div class="col-md-4 col-sm-5 img_out img_out_left" >
                        <div class="img_news_box1">
                            <img src='{{list.id && domainPathNews+ list.img || list.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                        </div>
                    </div>

                    <div class=" col-md-8 col-sm-7 text_out_left">
                        <div   class="box_new">
                            <div><h3 class="text-left text" ng-style="{color:settings.title_color}">{{list.title}}</h3></div>

                            <div class=" box_text row" >
                                {{list.text| limitTo:list.strLimit }} {{list.text.length > lists[$index].strLimit ? '&hellip;' : ''}}
                                <span ng-if="list.text.length > list.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                      onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                    <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}">Показати більше</a>
                                </span>
                                <span ng-if="list.text.length == list.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                      onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                    <a href="" ng-click="showLess($index)" ng-style="{color:settings.general_link_color}">Приховати</a>
                            </div>

                            <div class="text-date text-date_left "><p   ng-style="{color:settings.news_date_color}">{{list.date}}</p></div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="box_out" ng-if="$index%2!=0">
                <div class="row box_inside_right" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}" >
                    <div class="col-md-8 col-sm-7 text_out" >
                        <div   class="box_new">
                            <div><h3 class="text-right text" ng-style="{color:settings.title_color}">{{list.title}}</h3></div>


                            <div class=" box_text row" >
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

                            <div class="text-date  text-date_rigth"><p  ng-style="{color:settings.news_date_color}">{{list.date}}</p></div>
                        </div>
                    </div>



                    <div class="col-md-4 col-sm-5 img_out img_out_rigth">
                        <div class="img_news_box2">
                            <img src='{{list.id && domainPathNews+ list.img || list.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <style>
        .grid-title2{
            display: grid;
            grid-template-columns: 8fr 1fr;
        }
        .grid_group_title1{
            display: grid;
            grid-template-columns: 1fr;
        }
        .grid_group_title2{
            display: grid;
            grid-template-columns: 3fr 1fr 2fr;
        }
    </style>