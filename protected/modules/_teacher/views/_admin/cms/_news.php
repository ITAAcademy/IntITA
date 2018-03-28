<div class="news_container">
    <div class="text-center">
        <h1 class="text-muted">Как проходит обучение?</h1>
        <h3 class="text-primary info_bot">Пять шагов к исполнению твоих желаний</h3>
    </div>

    <div ng-repeat="list in lists track by $index">
        <div ng-if="$index%2==0">
            <h3 class="text-left text">{{list.title}}</h3>
            <p class="text-left text">{{list.date}}</p>
            <div class="row text">
                <div class="col-md-4 col-sm-5">
                    <img src="/{{list.img}}" class="img_news">
                </div>
                <div class="col-md-8 col-sm-7">
                    {{list.text| limitTo:list.strLimit }} {{list.text.length > lists[$index].strLimit ? '&hellip;' : ''}}
                    <span ng-if="list.text.length > list.strLimit">
                        <a href="" ng-click="showMore($index)">Показати більше</a>
                    </span>
                    <span ng-if="list.text.length == list.strLimit">
                        <a href="" ng-click="showLess($index)">Приховати</a>
                </div>
            </div>
        </div>
        <div ng-if="$index%2!=0">
            <h3 class="text-right text">{{list.title}}</h3>
            <p class="text-right text">{{list.date}}</p>
            <div class="row text">
                <div class="col-md-8 col-sm-7">
                    {{list.text| limitTo:lists[$index].strLimit }}{{list.text.length > lists[$index].strLimit ? '&hellip;' : ''}}
                    <span ng-if="list.text.length > lists[$index].strLimit">
                        <a href="" ng-click="showMore($index)">Показати більше</a>
                    </span>
                    <span ng-if="list.text.length == lists[$index].strLimit">
                        <a href="" ng-click="showLess($index)">Приховати</a>
                    </span>
                </div>
                <div class="col-md-4 col-sm-5">
                    <img src="/{{list.img}}" class="img_news">
                </div>
            </div>
        </div>
    </div>
</div>