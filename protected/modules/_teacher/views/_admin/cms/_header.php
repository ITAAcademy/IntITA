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
                        <img ng-if="settings.logo" id="logo" ng-hide="settings.id && !(settings.logo | isNotLink)"
                             ng-src='{{settings.id && domainPathLogo+settings.logo || settings.logo}}'>
                        <img class="edit hide_edit" data-toggle="modal" data-target="#logoModal"
                             src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
                    </a>
                </div>
            </div>
            <div class="col-md-9 menu_blok">
                <div class="menu_blok_inl_bl">
                    <div class="display_inl_bl" id="menuBlock">
                        <div ng-include="templateUrl('/partial/menu.html')"></div>
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
