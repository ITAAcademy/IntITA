<div ng-cloak ng-controller="sliderCtrl" id="sliderBlock">

    <div  id="slider" class="owl-carousel" style="opacity: 1; display: block;">
        <div uib-carousel active="active" interval="myInterval" no-wrap="noWrapSlides">
            <div uib-slide class="slide" ng-repeat="slide in slides track by slide.id" index="slide.id">
                <div>
                    <img ng-src="{{slide.image}}">
                    <p>{{slide.text}}</p>
                </div>
            </div>
        </div>
    </div>

</div>