<div class="mainAboutBlock"  ng-style="{'background-color':settings.about_us_background_color}">


    <div class="hed_title_us text-muted grid-title2 ">
            <div class="news_titles">
                <h1 class="header_about"  ng-bind="settings.title" ng-style="{color:settings.title_color}"></h1>
                <h3 class="info_bot" ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}">{{settings.subtitle}}</h3>

            </div>
            <div>
                <input class="edit3" type="image" ng-click="" data-toggle="modal" data-target="#Title1Modal" src="http://intita.com/images/editor/edt_20px.png">
                <div class="modal fade" id="Title1Modal" role="dialog">
                    <div class="modal-dialog  modal-sm">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Заголовок та підзаголовок меню</h4>
                            </div>


                            <div class="modal-body">


                                <div class="grid_group_title2" >
                                    <div class="intent" >
                                        <p class="in_intent_title title_color_style" ng-style="{color:settings.title_color}" >Заголовок</p>
                                        <!--                                        <p class="in_intent"  ng-style="{color:settings.title_color}" >Title color</p>-->
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
                                        <input class="in_rectangle_soc_title" type="text" ng-model="settings.title">
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
                                        <input class="in_rectangle_soc_title" type="text" ng-model="settings.subtitle">
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
    <div class="items_about row"  >
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


                    <div>
                        <input class="edit1" type="image" ng-click="loadCmsMenuList()" data-toggle="modal" data-target="#AboutUsModal" src="http://intita.com/images/editor/edt_20px.png">

                        <div class="modal fade" id="AboutUsModal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Редактор списка меню</h4>
                                    </div>


                                    <div class="modal-body">
                                        <div class="form-group form-link">
                                            <div ng-repeat="item in listsItemMenu track by $index" class="">
                                                <div class=" first_line box row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Меню" ng-model="item.title">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Посилання" ng-model="item.link">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                                <div class="second_line box row">
                                                    <div class="col-md-2">
                                                        <img class="preview"  ng-src='{{item.id && domainPath+item.image || item.image}}'>
                                                        <input id="img_menu_list_Update{{$index}}" enctype="multipart/form-data" type="file" class=" img_menu_list_Update  img_menu_list_style " placeholder="Логотип" name="img_menu_list_style">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control input" placeholder="Опис" ng-model="item.description" style="resize: none"></textarea>
                                                    </div>
                                                </div>

                                                <div class="third_line box row">
                                                    <div class="col-md-10 buttons_box">
                                                        <a href="javascript:void(0)">
                                                            <i class="fa fa-trash" title="Видалити" aria-hidden="true" ng-click="removeMenuLink(item.id,item.image)"></i>
                                                        </a>
                                                    </div >
                                                    <div class="col-md-2 buttons_box">
                                                        <button  class="btn btn-primary"  title="Зберегти" aria-hidden="true" ng-click="updateMenuLink(item, $index, item.image)" >Зберегти</button>

                                                    </div>
                                                </div>

                                                <div class="">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="" ng-if="listsItemMenu.length<3">
                                                <div class=" first_line box row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Меню" ng-model="newLink.title">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Посилання" ng-model="newLink.link">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                                <div class="second_line box row">
                                                    <div class="col-md-2">
                                                        <input id="img_menu_list" enctype="multipart/form-data" type="file" class=" img_menu_list_style" placeholder="Картинка" name="img_menu_list">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control input" placeholder="Опис" ng-model="newLink.description" style="resize: none"></textarea>
                                                    </div>
                                                </div>


                                                <div class="third_line box row">
                                                    <div class="col-md-12 buttons_box">
                                                        <a href="javascript:void(0)">
                                                            <button  class="btn btn-primary"  title="Зберегти" aria-hidden="true" ng-click="updateMenuLink(newLink)" >Зберегти</button>
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
                <div class="col-md-2 col-xs-3"></div>
            </div>
        </div>
    </div>
</div>





