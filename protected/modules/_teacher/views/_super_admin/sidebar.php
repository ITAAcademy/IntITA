<li>
    <a href="#/superadmin" class="show_elem">
        <i class="fa fa-shield fa-fw"></i> Суперадмін
        <span ng-cloak class="label label-warning" ng-if="countOfNewResponses > 0">{{countOfNewResponses}}</span>
        <span ng-cloak class="label label-success" ng-if="countOfNewCities > 0">{{countOfNewCities}}</span>
    </a>
    <a href="#/superadmin" uib-tooltip="Суперадмін" tooltip-placement="right" class="hid" style="display: none">
        <i class="fa fa-shield fa-fw"></i>
        <span ng-cloak class="label label-warning" ng-if="countOfNewResponses > 0">{{countOfNewResponses}}</span>
        <span ng-cloak class="label label-success" ng-if="countOfNewCities > 0">{{countOfNewCities}}</span>
    </a>
</li>