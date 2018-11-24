<div class="news_wrapper" ng-style="{'background-color':settings.news_background_color}">
    <div class="container_n text-center stepHeaderCont">
        <div class="text-muted grid-title2 ">
            <div class="news_titles">
                <h1 class="" ng-style="{color:settings.title_color}" ng-bind="settings.title_2"></h1>
                <h3 class="text-primary  info_bot"
                    ng-style="{color:settings.subtitle_color, 'border-bottom-color': settings.subtitle_color}"
                    ng-bind="settings.subtitle_2"></h3>
            </div>
            <div>
                <img class="edit hide_edit" data-toggle="modal"
                     data-target="#titlesModal"
                     src="<?php echo StaticFilesHelper::fullPathTo('css', 'images/cms/pen.png') ?>">
            </div>
        </div>
        <div id="add_news">
            <input class="btn btn-primary add_news hide_edit" name="add_news" value="Додати новину" type="submit"
                   onclick="" data-toggle="modal" data-target="#newsModal">
        </div>
    </div>
    <div class="news_container" id="newsBlock">
        <div ng-include="templateUrl('/partial/news.html')"></div>
    </div>
</div>
