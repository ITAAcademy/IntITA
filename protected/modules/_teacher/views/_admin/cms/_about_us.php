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


                    <div>
                        <input class="edit1" type="image" ng-click="" data-toggle="modal" data-target="#AboutUsModal" src="http://intita.com/images/editor/edt_20px.png">

                        <div class="modal fade" id="AboutUsModal" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Редактор списка меню</h4>
                                    </div>


                                    <div class="modal-body">
                                        <div class="form-group form-link" ng-controller="cmsMenuListCtrl">
                                            <div ng-repeat="list in lists track by $index" class="">
                                                <div class=" first_line box row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Меню" ng-model="list.title">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="Посилання" ng-model="list.link">
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                                <div class="second_line box row">
                                                    <div class="col-md-2">
                                                        <img class="preview"  ng-src='{{list.id && domainPath+list.image || list.image}}'>
                                                        <input id="img_menu_list_Update{{$index}}" enctype="multipart/form-data" type="file" class=" img_menu_list_Update  img_menu_list_style " placeholder="Логотип" name="img_menu_list_style">
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control input" placeholder="Опис" ng-model="list.description" style="resize: none"></textarea>
                                                    </div>
                                                </div>

                                                <div class="third_line box row">
                                                    <div class="col-md-10 buttons_box">
                                                        <a href="javascript:void(0)">
                                                            <i class="fa fa-trash" title="Видалити" aria-hidden="true" ng-click="removeMenuLink(list.id,list.image)"></i>
                                                        </a>
                                                    </div >
                                                    <div class="col-md-2 buttons_box">
                                                        <button  class="btn btn-primary"  title="Зберегти" aria-hidden="true" ng-click="updateMenuLink(list, $index, list.image)" >Зберегти</button>

                                                    </div>
                                                </div>

                                                <div class="">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="" ng-if="lists.length<3">
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





