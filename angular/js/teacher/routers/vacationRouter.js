angular
    .module('vacationRouter', ['ui.router'])
    .config(function ($stateProvider) {
        var url = basePath + "/_teacher/vacation"
        $stateProvider
        	.state('vacationCreate', {
                url: '/vacationCreate?vacation_type_id',
                templateUrl: function($stateParams) {
                    return url+"/vacation/vacationCreate?vacation_type_id="+$stateParams.vacation_type_id;
                }
            })
            .state('vacationsTypes', {
                url: '/vacationsTypes',
                templateUrl: url+"/vacation/vacationTypesList",
            })
            .state('vacationTypeUpdate', {
                url: '/vacationTypeUpdate?vacation_type_id',
                templateUrl: function($stateParams) {
                    return url+"/vacation/vacationTypeUpdate?vacation_type_id="+$stateParams.vacation_type_id;
                },
            })
            .state('vacationTypeCreate', {
                url: '/vacationTypeCreate',
                templateUrl: url+"/vacation/vacationTypeCreate",
            })
            .state('getVacation', {
                url: '/getVacation?id',
                templateUrl: function($stateParams) {
                    return url+"/vacation/getVacationData?id="+$stateParams.id;
                },
            })
            .state('vacationsList', {
                url: '/vacationsList',
                templateUrl: url+"/vacation/vacationList",
            })
            .state('vacationUpdate', {
                url: '/vacation/update?vacation_id',
                templateUrl: function($stateParams) {
                    return url+"/vacation/vacationUpdate?id="+$stateParams.vacation_id;
                },
            })

});