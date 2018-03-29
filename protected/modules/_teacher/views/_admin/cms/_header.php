<div class="header">
    <nav class="navbar">
        <div class="col-md-3 navbar-header">
            <a href="/IntITA/">
                <img id="logo" src="http://localhost/IntITA/images/mainpage/Logo_bigUA.png">
            </a>
        </div>
        <div class="col-md-9" >
            <ul class="nav navbar-nav">
                <li ng-repeat="list in listsItemMenu track by $index"><a href="/{{list.link}}">{{list.title}}</a></li>
            </ul>
        </div>
        <div class="col-md-2"></div>
    </nav>
</div>


