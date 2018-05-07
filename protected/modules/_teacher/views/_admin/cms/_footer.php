<div id="footer_main"  ng-style="{  'background-color':settings.footer_background_color,
                                    'border-bottom-color': settings.footer_border_color,
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
                <a ng-style="{color:settings.footer_link_color}"  ng-repeat="section in listsItemMenu track by $index" href={{section.link}}><span>{{section.title}}</span></a>
            </div>
        </div>
    </div>


    <div class="right_footer col-lg-1 col-md-1 col-sm-1 col-xs-1" ng-style="{'border-left-color': settings.footer_border_color}" >
        <div class="right_footer_inside">
            <a  href="javascript:void(0)"><img ng-style="{'border-radius': '20px', 'background-color': settings.icon_shadow_color}" id="img-go" src="http://intita.com/images/mainpage/go_up.png"></a>
        </div>
    </div>
</div>

