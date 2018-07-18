<div class="mainAboutBlock" ng-style="{'background-color':settings.about_us_background_color}">
    <div class="hed_title_us text-muted grid-title2 ">
        <div class="news_titles">
            <h1 class="header_about" ng-bind="settings.title" ng-style="{color:settings.title_color}"></h1>
            <h3 class="info_bot"
                ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}">
                {{settings.subtitle}}</h3>
        </div>
        <div>
            <img class="edit hide_edit" ng-click="" data-toggle="modal" data-target="#titlesModal"
                 src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
        </div>
    </div>
    <div class="items_about row">
        <div>
            <div class="col-md-2 col-xs-3"></div>
            <div class="col-md-8 col-xs-6">
                <div class="row  card-group" id="aboutBlock">
                    <div ng-include="templateUrl('/partial/fullMenu.html')"></div>
                    <img class="edit hide_edit top-right" ng-click="loadCmsMenuList()" data-toggle="modal"
                         data-target="#aboutUsModal"
                         src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>"/>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>




