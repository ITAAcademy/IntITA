

<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}" >
    <div class="container_n text-center stepHeaderCont">
        <div class="text-muted grid-title2 ">
            <div class="news_titles">
                <h1 class="" ng-style="{color:settings.title_color}"  ng-bind="settings.title_2"></h1>
                <h3 class="text-primary  info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}"   ng-bind="settings.subtitle_2"></h3>
            </div>
            <div>
                <input class="position_left hide_edit" type="image" ng-click="" data-toggle="modal" data-target="#Title2Modal" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                <div class="modal fade" id="Title2Modal" role="dialog">
                    <div class="modal-dialog  modal-sm">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Заголовок та підзаголовок новин</h4>
                            </div>
                            <div class="modal-body">
                                <div class="grid_group_title2" >
                                    <div class="intent" >
                                        <p class="in_intent_title title_color_style position_left" ng-style="{color:settings.title_color}" >Заголовок</p>
                                    </div>
                                    <div  class="square" >
                                        <input  class="in_square" type="color" ng-model="settings.title_color">
                                    </div>
                                    <div class="rectangle" >
                                        <input class="in_rectangle"  ng-model="settings.title_color" color-picker color-picker-model="settings.title_color" type="text">
                                    </div>
                                </div>
                                <div class="grid_group_title1" >
                                    <div class="" ><p>Контент</p>
                                    </div>
                                    <div class="rectangle" >
                                        <input class="in_rectangle_soc_title" type="text" ng-model="settings.title_2">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="grid_group_title2" >
                                    <div class="intent" >
                                        <p class="in_intent_title title_color_style" ng-style="{color:settings.subtitle_color}" >Підзаголовок</p>
                                        <!--                                        <p class="in_intent"  ng-style="{color:settings.title_color}" >Title color</p>-->
                                    </div>
                                    <div  class="square" >
                                        <input  class="in_square" type="color" ng-model="settings.subtitle_color">
                                    </div>
                                    <div class="rectangle" >
                                        <input class="in_rectangle"  ng-model="settings.subtitle_color" color-picker color-picker-model="settings.subtitle_color" type="text">
                                    </div>
                                </div>
                                <div class="grid_group_title1" >
                                    <div class="" ><p>Контент</p>
                                    </div>
                                    <div class="rectangle" >
                                        <input class="in_rectangle_soc_title" type="text" ng-model="settings.subtitle_2">
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

        <div>
            <input class="btn btn-primary add_news hide_edit"  name="add_news" value="Додати новину" type="submit"  onclick="" data-toggle="modal" data-target="#AddNewsModal" >
            <div class="modal fade" id="AddNewsModal" role="dialog">
                <div class="modal-dialog ">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Додати новину</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-link" >
                                <div class="grid_group_add_news box " >
                                    <div class="">
                                    <p class="in_intent_news"  >Заголовок</p>
                                    </div>
                                    <div class="rectangle">
                                        <input type="text" class="form-control" placeholder="Заголовок" ng-model="newNews.title">
                                    </div>
                                </div>
                                <div class="grid_group_add_news box " >
                                    <div class="  ">
                                        <p class="in_intent_news"  >Зображення</p>
                                    </div>
                                    <div class="rectangle news_img ">
                                        <input id="photo" enctype="multipart/form-data" type="file" class="form-control  rectangle_news" placeholder="Фото новини" name="photo">
                                    </div>
                                </div>
                                <div class="grid_group_add_news box " >
                                    <div class=" ">
                                        <p class="in_intent_news" >Контент</p>
                                    </div>
                                    <div class="rectangle">
                                        <textarea class="form-control" placeholder="Текст новини" ng-model="newNews.text" style="resize: none"></textarea>
                                    </div>
                                </div>
                                    <div class="third_line box row">
                                        <div class="col-md-12 buttons_box">
                                            <a href="javascript:void(0)">
                                                <button  class="btn btn-primary"  title="Зберегти" aria-hidden="true" ng-click="updateNews(newNews)" >Зберегти</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="news_container" >
            <div ng-repeat="new in news track by $index" >
                <div class="box_out" ng-if="$index%2==0">
                        <div class="title_news_left">
                            <div class=" display_inl_bl  ">
                                <h3 class="text-left  text " ng-style="{color:settings.title_color}">{{new.title}}</h3>
                                <div>
                                    <input class="edit5 hide_edit" id="OneNewsModalLeft" type="image"  data-toggle="modal" data-target="#NewsModalLeft{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                                    <div  class="modal fade" id="NewsModalLeft{{$index}}" role="dialog">
                                        <div class="modal-dialog ">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" id="news_editLeft">Редактор новин</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group form-link">
                                                        <div  class="grid_news box ">
                                                            <div class="">
                                                                <p class="position_left"  >Заголовок</p>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" class="form-control"  ng-model="new.title">
                                                            </div>
                                                        </div>
                                                        <div  class="grid_news box ">
                                                            <div class=" ">
                                                                <p class="position_left" ng-style="{color:settings.text_color}" >Колір тексту</p>
                                                            </div>
                                                            <div class="grid_news" >
                                                                <div  class="square " >
                                                                    <input  class="in_square position_left" type="color" ng-model="settings.text_color">
                                                                </div>
                                                                <div class="rectangle" >
                                                                    <input class="in_rectangle position_left" ng-model="settings.text_color" color-picker color-picker-model="settings.text_color" type="text" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  class="grid_news box ">
                                                            <div class="  ">
                                                                <p class="position_left"  >Зображення</p>
                                                            </div>
                                                            <div class="image_news">
                                                                <img class="preview"  ng-src='{{new.id && domainPathNews + new.img || new.img}}'>
                                                                <input id="photoUpdate{{$index}}" enctype="multipart/form-data" type="file" class="form-control image_input photoUpdate" placeholder="Фото новин" name="photo">
                                                            </div>
                                                        </div>
                                                        <div  class="grid_news box ">
                                                            <div class=" ">
                                                                <p class="position_left" >Текст новини</p>
                                                            </div>
                                                            <div class="">
                                                                <textarea class="form-control"  ng-model="new.text" style="resize: none"></textarea>
                                                            </div>
                                                        </div>
                                                        <div  class="grid_news box ">
                                                            <div class=" ">
                                                                <p class="position_left" >Дата</p>
                                                            </div>
                                                            <div class="">
                                                                <input type="text" class="form-control" placeholder="Дата" ng-model="new.date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="removeNews(new.id, new.img)" >Видалити</button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"  ng-click="updateSettings(settings, settings.logo); updateNews(new, $index, new.img)" >Зберегти</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class=" text-date_left "><p   ng-style="{color:settings.news_date_color}">{{new.date}}</p></div>
                    <div class="row box_inside" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}">
                        <div class="col-md-4 col-sm-5 img_out img_out_left" >
                            <div class="img_news_box1">
                                <img src='{{new.id && domainPathNews+ new.img || new.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                            </div>
                            <div>
                                <input class="edit4 hide_edit" id="OneNewsModalLeft2" type="image"  data-toggle="modal" data-target="#NewsModalLeft{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                            </div>
                        </div>
                        <div class=" col-md-8 col-sm-7 text_out_left">
                            <div   class="box_new">
                                <div class=" box_text row" >
                                    {{new.text| limitTo:new.strLimit }} {{new.text.length > news[$index].strLimit ? '&hellip;' : ''}}
                                    <span ng-if="new.text.length > new.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                          onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}">Показати більше</a>
                                    </span>
                                    <span ng-if="new.text.length == new.strLimit" data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                          onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showLess($index)" ng-style="{color:settings.general_link_color}">Приховати</a>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <input class="edit4 hide_edit" id="OneNewsModalLeft3" type="image"  data-toggle="modal" data-target="#NewsModalLeft{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="box_out" ng-if="$index%2!=0">
                    <div class="title_news_right">
                        <div class=" display_inl_bl  ">
                            <h3 class="text-right  text " ng-style="{color:settings.title_color}">{{new.title}}</h3>
                            <div>
                                <input class="edit6 hide_edit" id="OneNewsModalRight" type="image"  data-toggle="modal" data-target="#NewsModalRight{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                                <div  class="modal fade" id="NewsModalRight{{$index}}" role="dialog">
                                    <div class="modal-dialog ">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" id="news_editRight">Редактор новин</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group form-link">
                                                    <div  class="grid_news box ">
                                                        <div class="">
                                                            <p class="position_left"  >Заголовок</p>
                                                        </div>
                                                        <div class="">
                                                            <input type="text" class="form-control"  ng-model="new.title">
                                                        </div>
                                                    </div>
                                                    <div  class="grid_news box ">
                                                        <div class=" ">
                                                            <p class="position_left" ng-style="{color:settings.text_color}" >Колір тексту</p>
                                                        </div>
                                                        <div class="grid_news" >
                                                            <div  class="square " >
                                                                <input  class="in_square position_left" type="color" ng-model="settings.text_color">
                                                            </div>
                                                            <div class="rectangle" >
                                                                <input class="in_rectangle position_left" ng-model="settings.text_color" color-picker color-picker-model="settings.text_color" type="text" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class="grid_news box ">
                                                        <div class="  ">
                                                            <p class="position_left"  >Зображення</p>
                                                        </div>
                                                        <div class="image_news">
                                                            <img class="preview"  ng-src='{{new.id && domainPathNews + new.img || new.img}}'>
                                                            <input id="photoUpdate{{$index}}" enctype="multipart/form-data" type="file" class="form-control image_input photoUpdate" placeholder="Фото новин" name="photo">
                                                        </div>
                                                    </div>
                                                    <div  class="grid_news box ">
                                                        <div class=" ">
                                                            <p class="position_left" >Текст новини</p>
                                                        </div>
                                                        <div class="">
                                                            <textarea class="form-control"  ng-model="new.text" style="resize: none"></textarea>
                                                        </div>
                                                    </div>
                                                    <div  class="grid_news box ">
                                                        <div class=" ">
                                                            <p class="position_left" >Дата</p>
                                                        </div>
                                                        <div class="">
                                                            <input type="text" class="form-control" placeholder="Дата" ng-model="new.date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="removeNews(new.id, new.img)" >Видалити</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"  ng-click="updateSettings(settings, settings.logo); updateNews(new, $index, new.img)" >Зберегти</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="  text-date_rigth"><p class="  text-date_p"  ng-style="{color:settings.news_date_color}">{{new.date}}</p></div>

                    <div class="row box_inside_right" ng-style="{color:settings.text_color}"  style="box-shadow: 0 0 5px {{settings.news_text_border_color}}" >
                        <div class="col-md-8 col-sm-7 text_out_right" >
                            <div   class="box_new">
                                <div class=" box_text row" >
                                    {{new.text| limitTo:news[$index].strLimit }}{{new.text.length > news[$index].strLimit ? '&hellip;' : ''}}
                                    <span ng-if="new.text.length > news[$index].strLimit"  data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                          onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showMore($index)" ng-style="{color:settings.general_link_color}">Показати більше</a>
                                    </span>
                                    <span ng-if="new.text.length == news[$index].strLimit"   data-hover="{{settings.general_hover_color}}" data-link="{{settings.general_link_color}}"
                                          onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)">
                                        <a href="" ng-click="showLess($index)" ng-style="{color:settings.general_link_color}">Приховати</a>
                                    </span>
                                </div>
                            </div>
                            <div>
                                <input class="edit4 hide_edit" id="OneNewsModalRight3" type="image"  data-toggle="modal" data-target="#NewsModalRight{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-5 img_out img_out_rigth">
                            <div class="img_news_box2">
                                <img src='{{new.id && domainPathNews+ new.img || new.img}}' class="img_news"  ng-style="{'border-color':settings.news_image_border_color, 'border-style': 'solid', 'border-width': '2px'}">
                            </div>
                            <div>
                                <input class="edit4 hide_edit" id="OneNewsModalRight2" type="image"  data-toggle="modal" data-target="#NewsModalRight{{$index}}" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
