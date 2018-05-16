<div class="header" ng-style="{'background-color':settings.header_background_color, 'border-color': settings.header_border_color}" id="headerCms">
    <nav class="navbar">
        <div class="col-md-3 navbar-header">
            <a href="">
                <img ng-if="settings.logo" id="logo" ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
            </a>
        </div>
        <div class="col-md-9" >
            <ul class="nav navbar-nav">
                <li class="menu_hover" data-hover="{{settings.header_hover_color}}" data-link="{{settings.header_link_color}}"
                    onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)" ng-repeat="list in listsItemMenu track by $index"  >
                    <a href="{{list.link}}" ng-style="{color:settings.header_link_color}" >{{list.title}}</a>
                </li>
            </ul>
        </div>
        <div class="col-md-2"></div>
    </nav>
</div>


