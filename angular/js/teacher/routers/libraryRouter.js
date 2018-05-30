var url = basePath+"/_teacher/library"

angular
    .module('libraryRouter',['ui.router'])
    .config(function ($stateProvider) {
    $stateProvider
        .state('library', {
            url: "/library",
            cache: false,
            controller: function($scope){
                $scope.changePageHeader('Бібліотека');
            },
            templateUrl: url+"/library/dashboard",
        })
        .state('library/list', {
            url: "/library/list",
            cache: false,
            templateUrl: url+"/library/index",
        })
        .state('library/addBook',{
            url: "/library/addBook",
            cache: false,
            templateUrl: url+"/library/create",
        })
        .state('library/editBook:id', {
            url: "/library/editBook/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return url+"/library/update/id/"+$stateParams.id
            }
        })
        .state('library/addCategory',{
            url:"/library/addCategory",
            cache: false,
            templateUrl: url+"/library/createCategory"
        })
});
