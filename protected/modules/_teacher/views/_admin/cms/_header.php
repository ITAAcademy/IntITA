<div class="header"
     ng-style="{'background-color':settings.header_background_color, 'border-color': settings.header_border_color}"
     id="headerCms">
    <nav class="navbar row">
        <div class="col-md-1 col-sm-0">
        </div>
        <div class="col-md-10 col-sm-12 row header_box">
            <div class="col-md-3 ">
                <div class=" navbar-header_logo">
                    <a href="">
                        <img ng-if="settings.logo" id="logo"
                             ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                        <img class="edit hide_edit" data-toggle="modal" data-target="#logoModal"
                             src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                    </a>
                </div>
            </div>
            <div class="col-md-9 menu_blok">
                <div class="menu_blok_inl_bl">
                    <div class="display_inl_bl">
                        <ul class="nav navbar-nav ">
                            <li class="menu_hover" data-hover="{{settings.header_hover_color}}"
                                data-link="{{settings.header_link_color}}"
                                onmouseenter="changeColorOn(this)" onmouseleave="changeColorOff(this)"
                                ng-repeat="list in listsItemMenu track by $index">
                                <a href="{{list.link}}" ng-style="{color:settings.header_link_color}">{{list.title}}</a>
                            </li>
                        </ul>
                        <div>
                            <img class="edit hide_edit" type="image" data-toggle="modal" data-target="#listModal"
                                 src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="edit hide_edit pull-right" type="image" ng-click="" data-toggle="modal"
             data-target="#headerModal"
             src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
    </nav>
</div>
