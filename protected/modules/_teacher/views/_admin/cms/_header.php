<div class="header" ng-style="{'background-color':settings.header_background_color, 'border-color': settings.header_border_color}" id="headerCms">
    <nav class="navbar row">
        <div class="col-md-1 col-sm-0">
        </div>
        <div class="col-md-10 col-sm-12 row header_box">
             <div class="col-md-3 ">
                 <div class=" navbar-header_logo">
                    <a href="">
                        <img ng-if="settings.logo" id="logo" ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                    </a>
                     <div>
                         <input class="edit hide_edit" type="image" data-toggle="modal" data-target="#LogoModal" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">

                         <div class="modal fade" id="LogoModal" role="dialog">
                             <div class="modal-dialog modal-sm">
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                         <h4 class="modal-title">Завантажити логотип</h4>
                                     </div>
                                     <div class="modal-body">
                                         <div class="grid_group3" >
                                             <div class="in_group3" >
                                                 <div class="intent" >
                                                     <p class="in_intent" >Logo </p>
                                                 </div>
                                             </div>
                                             <div class="in_group3" >
                                                 <a  href="/">
                                                     <img ng-if="settings.logo" class="preview" id="logo_img"  ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                                                 </a>
                                             </div>
                                             <div class="in_group3-1" >
                                                 <div class="intent">
                                                     <a href="javascript:void(0)">
                                                         <i class="fa fa-trash" title="Видалити" aria-hidden="true" id="logo_clear"  ng-click="removeLogoCms(settings.id, settings.logo)"></i>
                                                     </a>
                                                 </div>

                                                 <div class="logo" >
                                                     <input id="logoUpdate" enctype="multipart/form-data" type="file" class="form-control image_update" ng-model="settings.logo" value="settings.logo" placeholder="Лого компанії" name="photo">
                                                 </div>
                                             </div>
                                             <div class="in_group3" >
                                                 <div class="intent" >
                                                     <p class="logo-discription">Пропорції лого 9*16, розмір файла до 1 МБ, формат файлу JPG, GIF, PNG, SVG</p>
                                                 </div>
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
            </div>
            <div class="col-md-9 menu_blok">
                <div class="menu_blok_inl_bl">
                    <div class="display_inl_bl">
                        <ul class="nav navbar-nav ">
                            <li class="menu_hover" data-hover="{{settings.header_hover_color}}" data-link="{{settings.header_link_color}}"
                                onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)" ng-repeat="list in listsItemMenu track by $index"  >
                                <a href="{{list.link}}" ng-style="{color:settings.header_link_color}" >{{list.title}}</a>
                            </li>
                        </ul>
                        <div>
                            <input class="edit7 hide_edit" type="image" data-toggle="modal" data-target="#ListModal" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">

                            <div class="modal fade" id="ListModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Редактор списка меню</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="grid_group_menu_header" >
                                                <div class="intent" >
                                                    <p class="in_intent_title " ng-style="{color:settings.header_link_color}" >Гіперпосилання в хідері</p>
                                                </div>
                                                <div  class="square" >
                                                    <input  class="in_square" type="color" ng-model="settings.header_link_color">
                                                </div>
                                                <div class="rectangle" >
                                                    <input class="in_rectangle"  ng-model="settings.header_link_color" color-picker color-picker-model="settings.header_link_color" type="text">
                                                </div>
                                            </div>
                                            <div class="grid_group_menu_header" >
                                                <div class="intent" >
                                                    <p class="in_intent_title " ng-style="{color:settings.header_hover_color}" >Ховер хідера</p>
                                                </div>
                                                <div  class="square" >
                                                    <input  class="in_square" type="color" ng-model="settings.header_hover_color">
                                                </div>
                                                <div class="rectangle" >
                                                    <input class="in_rectangle"  ng-model="settings.header_hover_color" color-picker color-picker-model="settings.header_hover_color" type="text">
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
                </div>
            </div>
            <div class="col-md-1">
                <div>
                    <input class="edit1 hide_edit" type="image" ng-click="" data-toggle="modal" data-target="#HeaderModal" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">

                    <div class="modal fade" id="HeaderModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Редактор хедера</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="grid_group_menu_header" >
                                        <div class="intent" >
                                            <p class="in_intent_title " ng-style="{'background-color':settings.header_background_color}" >Фон хідера</p>
                                        </div>
                                        <div  class="square" >
                                            <input  class="in_square" type="color" ng-model="settings.header_background_color">
                                        </div>
                                        <div class="rectangle" >
                                            <input class="in_rectangle"  ng-model="settings.header_background_color" color-picker color-picker-model="settings.header_background_color" type="text">
                                        </div>
                                    </div>
                                    <div class="grid_group_menu_header" >
                                        <div class="intent" >
                                            <p class="in_intent_title " ng-style="{'border-color':settings.header_border_color, 'border-style': 'solid', 'border-width': 'thin'}" >Рамка в хідері</p>
                                        </div>
                                        <div  class="square" >
                                            <input  class="in_square" type="color" ng-model="settings.header_border_color">
                                        </div>
                                        <div class="rectangle" >
                                            <input class="in_rectangle"  ng-model="settings.header_border_color" color-picker color-picker-model="settings.header_border_color" type="text">
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
        </div>
    </nav>
</div>
