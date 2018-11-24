<div id="footer" ng-style="{'background-color':settings.footer_background_color, 'border-color': settings.footer_border_color}">
    <div id="footer_main" ng-style="{  'background-color':settings.footer_background_color,
                                    'border-right-color': settings.footer_border_color,
                                    'border-left-color': settings.footer_border_color  }" class="row">
        <div class="left_footer col-lg-2 col-md-2 col-sm-2 col-xs-2"
             ng-style="{'border-right-color':settings.footer_border_color}">
            <img class="edit hide_edit top-right" data-toggle="modal" data-target="#socialNetworksModal"
                 src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
            <div class="social_inl_bl">
                <a ng-if="settings.twitter" href="{{settings.twitter}}" target="_blank" title="Twitter">
                    <img src="http://intita.com/images/mainpage/twitter.png">
                </a>
                <a ng-if="settings.youtube" href="{{settings.youtube}}" target="_blank" title="Youtube">
                    <img src="http://intita.com/images/mainpage/youtube.png">
                </a>
                <a ng-if="settings.google" href="{{settings.google}} " target="_blank" title="Google+">
                    <img src="http://intita.com/images/mainpage/googlePlus.png">
                </a>
                <a ng-if="settings.facebook" href="{{settings.facebook}}" target="_blank" title="Facebook">
                    <img src="http://intita.com/images/mainpage/facebook.png">
                </a>
                <a ng-if="settings.linkedin" href="{{settings.linkedin}}" target="_blank" title="Linkedin">
                    <img src="http://intita.com/images/mainpage/inl.png">
                </a>
                <a ng-if="settings.instagram" href="{{settings.instagram}}" target="_blank" title="Instagram">
                    <img src="http://intita.com/images/mainpage/instagram.png">
                </a>
            </div>
        </div>
        <div class="center_footer col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <div class=" row">
                <div class="left_part col-md-6 col-sm-5 col-xs-12">
                    <div class="logo">
                        <a href="" id="footerLogo">
                            <span ng-include="templateUrl('/partial/logo.html')"></span>
                        </a>
                    </div>
                    <div class="footer_contact" ng-style="{color:settings.footer_link_color}">
                        <div><span ng-bind="settings.mobile_phone"></span></div>
                        <div><span ng-bind="settings.mobile_phone_2"></span></div>
                        <div><span ng-bind="settings.email"></span></div>
                    </div>
                </div>
                <div class="footer_menu col-md-6 col-sm-7 hidden-xs" id="footerMenu">
                    <div ng-include="templateUrl('/partial/menu.html')"></div>
                </div>
            </div>
        </div>

        <div class="right_footer col-lg-1 col-md-1 col-sm-1 col-xs-1"
             ng-style="{'border-left-color': settings.footer_border_color}">
            <div class="right_footer_inside">
                <a href="javascript:void(0)"><img
                            ng-style="{'border-radius': '20px', 'background-color': settings.icon_shadow_color}" id="img-go"
                            src="http://intita.com/images/mainpage/go_up.png"></a>
            </div>
        </div>
    </div>
</div>
