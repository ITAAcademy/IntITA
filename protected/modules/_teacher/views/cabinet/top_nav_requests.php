<li ng-repeat="request in requests.newRequests ">
    <a class='requestList' href="#/requests/message/{{request.id}}">
        <div>
            Запит відправлено від: <strong>{{request.requestUser.fullName}}</strong>
            <br>
            <span class="pull-right text-muted"><em></em></span>
            <div ng-if="request.type==3">Запит на затвердження модуля:
                <em>{{request.idRevision.properties.title_ua}}</em></div>
            <div ng-if="request.type==4">Запит на затвердження заняття:
                <em>{{request.idRevision.properties.title_ua}}</em></div>
        </div>
    </a>
</li>
<li class="divider"></li>
<li>
    <a class="text-center" href="#">
        <strong><a href="#/requests">
                Всі запити</a></strong>
        <i class="fa fa-angle-right"></i>
    </a>
</li>