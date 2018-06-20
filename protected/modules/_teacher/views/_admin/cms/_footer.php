<div id="footer_main"  ng-style="{  'background-color':settings.footer_background_color,
                                    'border-bgoogleottom-color': settings.footer_border_color,
                                    'border-right-color': settings.footer_border_color,
                                    'border-left-color': settings.footer_border_color  }"   class="row" >

    <div class="left_footer col-lg-2 col-md-2 col-sm-2 col-xs-2" ng-style="{'border-right-color':settings.footer_border_color}">
        <table class="icon_table">
            <tbody ><tr>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.twitter}}" target="_blank" title="Twitter">
                        <img src="http://intita.com//images/mainpage/twitter.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.youtube}}" target="_blank" title="Youtube">
                        <img src="http://intita.com//images/mainpage/youtube.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.google}} " target="_blank" title="Google+">
                        <img src="http://intita.com//images/mainpage/googlePlus.png">
                    </a>
                </td>
            </tr>
            <tr>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.facebook}}" target="_blank" title="Facebook">
                        <img src="http://intita.com//images/mainpage/facebook.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.linkedin}}" target="_blank" title="Linkedin">
                        <img src="http://intita.com//images/mainpage/inl.png">
                    </a>
                </td>
                <td ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                    <a href="{{settings.instagram}}" target="_blank" title="Instagram">
                        <img src="http://intita.com/images/mainpage/instagram.png">
                    </a>
                </td>
            </tr>
            </tbody></table>
        <input class="edit1" type="image" ng-click="Modal_window()" data-toggle="modal" data-target="#SocialNetworksModal" src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">

        <div class="modal fade" id="SocialNetworksModal" role="dialog">
            <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Завантажити логотип</h4>
                    </div>


                    <div class="modal-body">
                        <div class="form-group form-link" >
                                    <div class="grid_group_color" >
                                        <div class=" intent">
                                            <p class="in_intent"  >Колір іконок:</p>
                                        </div>
                                        <div  class=" square" >
                                            <input  class="in_square" type="color" ng-model="settings.icon_shadow_color">
                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle form-control" ng-model="settings.icon_shadow_color" color-picker color-picker-model="settings.icon_shadow_color" type="text">
                                        </div>

                                    </div>
                                    <div class=" grid" >
                                        <div class=" " >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.twitter}}" target="_blank" title="Twitter">
                                                    <img src="http://intita.com//images/mainpage/twitter.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" type="text" placeholder="Введіть посилання на сторінку" ng-model="settings.twitter">
                                        </div>
                                    </div>
                                    <div class=" grid" >
                                        <div class="" >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.youtube}}" target="_blank" title="Youtube">
                                                    <img src="http://intita.com//images/mainpage/youtube.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" placeholder="Введіть посилання на сторінку"  type="text" ng-model="settings.youtube">
                                        </div>
                                    </div>
                                    <div class=" grid" >
                                        <div class=" " >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.google}}" target="_blank" title="Google+">
                                                    <img src="http://intita.com//images/mainpage/googlePlus.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" placeholder="Введіть посилання на сторінку"  type="text" ng-model="settings.google">
                                        </div>
                                    </div>
                                    <div class=" grid" >
                                        <div class=" " >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.facebook}}" target="_blank" title="Facebook">
                                                    <img src="http://intita.com//images/mainpage/facebook.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" placeholder="Введіть посилання на сторінку"  type="text" ng-model="settings.facebook">
                                        </div>
                                    </div>
                                    <div class=" grid" >
                                        <div class=" " >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.linkedin}}" target="_blank" title="Linkedin">
                                                    <img src="http://intita.com//images/mainpage/inl.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" placeholder="Введіть посилання на сторінку"  type="text" ng-model="settings.linkedin">
                                        </div>
                                    </div>
                                    <div class=" grid" >
                                        <div class=" " >
                                            <div class="intent-img" ng-style="{'border-radius': '15px', 'background-color': settings.icon_shadow_color}">
                                                <a href="{{settings.instagram}}" target="_blank" title="Instagram">
                                                    <img src="http://intita.com//images/mainpage/instagram.png">
                                                </a>
                                            </div>

                                        </div>
                                        <div class=" rectangle" >
                                            <input class="in_rectangle_soc form-control" placeholder="Введіть посилання на сторінку"  type="text" ng-model="settings.instagram">
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="updateSettings(settings, settings.logo )">Зберегти</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="center_footer col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <div class=" row">
            <div class="left_part col-md-6 col-sm-5 col-xs-12">
                <div  class="logo">
                    <a href="">
                        <img ng-if="settings.logo" id="footerLogo" ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                    </a>
                </div>
                <div class="footer_contact" ng-style="{color:settings.footer_link_color}"  >
                    <div><span ng-bind="settings.mobile_phone"></span></div>
                    <div><span ng-bind="settings.mobile_phone_2"></span></div>
                    <div><span ng-bind="settings.email"></span></div>
                </div>
            </div>
            <div class="footer_menu col-md-6 col-sm-7 hidden-xs">
                <a data-hover="{{settings.footer_hover_color}}" data-link="{{settings.footer_link_color}}" onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)"
                   ng-repeat="section in listsItemMenu track by $index" href={{section.link}}><span  ng-style="{color:settings.footer_link_color}">{{section.title}}</span></a>
            </div>
        </div>
    </div>

    <div class="right_footer col-lg-1 col-md-1 col-sm-1 col-xs-1" ng-style="{'border-left-color': settings.footer_border_color}" >
        <div class="right_footer_inside">
            <a  href="javascript:void(0)"><img ng-style="{'border-radius': '20px', 'background-color': settings.icon_shadow_color}" id="img-go" src="http://intita.com/images/mainpage/go_up.png"></a>
        </div>
    </div>
</div>


<style>



</style>
