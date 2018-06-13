<div ng-cloak ng-controller="sliderCtrl" id="sliderBlock">
    <div  id="slider" class="owl-carousel" style="opacity: 1; display: block;">
        <div uib-carousel active="active" interval="myInterval">
            <div uib-slide class="slide" ng-repeat="slide in slides track by $index" index="$index">
                <div>
                    <img ng-src="{{slide.src}}">
                    <p class="title">{{slide.title}}</p>
                    <p class="description">{{slide.description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>