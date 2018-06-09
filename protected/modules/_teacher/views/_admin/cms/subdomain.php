<style>
.little_font{
font-size: 12px;
}
.grid{

    display: grid;
    grid-template-columns: 1fr 1fr;
    margin-left: 30px;
    margin-right: 30px;
}

@media(max-width:768px) {
    .grid{
        grid-template-columns: 1fr ;
    }
}


</style>

<div   ng-controller="subdomainCtrl">
<!--        -->

    <form  name='subdomainForm' >
        <div class="grid">
            <div >
                <div class="row">
                    <div class="little_font">Небільше 15 латинських символів, цифр або спеціальних символів</div>
                </div>
                <div class="row">
                    <input class="form-control" type="text" ng-required="true" ng-pattern="/^[a-zA-Z0-9_]+$/"  ng-minlength="1" ng-maxlength="15" placeholder="" ng-model="name">
                </div>
                <div class="row">
                    <div>Посилання на сайт буде мати вигляд: <a class="link_color">https://{{name}}.intita.com</a></div>
                </div>
                <div class="row">
                    <div ng-hide="true" ng-cloak class="clientValidationError" ng-show="subdomainForm.$invalid">
                        Введіть коректну назву (Небільше 15 латинських символів, цифр або спеціальних символів -,_)
                    </div>
                </div>
                <br>
                <div class="row">

                <button class="btn btn-primary"  ng-click="addSubdomain(name)" ng-disabled="subdomainForm.$invalid">Створити</button>
                </div>
            </div>
            <div ></div>

        </div>
    </form>



</div>
