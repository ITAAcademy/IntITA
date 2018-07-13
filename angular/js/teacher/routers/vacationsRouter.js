angular
    .module('vacationsRouter', ['ui.router'])
    .config(function ($stateProvider) {
        var url = basePath + "/_teacher/vacation"
        $stateProvider
            .state('vacations', {
                url: "/vacations",
                cache: false,
                controller: function ($scope) {
                    $scope.changePageHeader('Відпустки');
                },
                // template:'<p>Hello World</p>'
                templateUrl: url + "/vacation/dashboard",
            })
            .state('vacationTypes', {
                url: "/vacationTypes",
                cache: false,
                controller: function ($scope) {
                    $scope.changePageHeader('Типи');
                },
                // template:'<p>Hello World</p>'
                templateUrl: url + "/vacationTypes/index",
            })
            .state('vacationTypes/create', {
                url: "/vacationTypes/create",
                cache: false,
                templateUrl: url + "/vacationTypes/create",
            })
            // .state('library/list', {
            //     url: "/library/list",
            //     cache: false,
            //     templateUrl: url + "/library/index",
            // })
            // .state('library/create', {
            //     url: "/library/create",
            //     cache: false,
            //     templateUrl: url + "/library/create",
            // })
            // .state('library/update/:id', {
            //     url: "/library/update/:id",
            //     cache: false,
            //     templateUrl: function ($stateParams) {
            //         return url + "/library/update/id/" + $stateParams.id
            //     }
            // })
            // .state('library/addCategory', {
            //     url: "/library/addCategory",
            //     cache: false,
            //     templateUrl: url + "/libraryCategory/create"
            // })
            // .state('library/categoryList', {
            //     url: "/library/categoryList",
            //     cache: false,
            //     templateUrl: url + "/libraryCategory/index"
            // })
            // .state('library/category/:id', {
            //     url: "/library/category/:id",
            //     cache: false,
            //     templateUrl: function ($stateParams) {
            //         return url + "/libraryCategory/update/id/" + $stateParams.id
            //     }
            // })
    });
