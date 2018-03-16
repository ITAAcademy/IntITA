angular
    .module('libraryRouter',['ui.router'])
    .config(function ($stateProvider) {
    $stateProvider
        .state('library', {
            url: "/library",
            cache: false,
            abstract: true,
            template: '<ui-view></ui-view>'
        })
        .state('library.dashboard', {
            url: "",
            cache: false,
            controller: function ($scope) {
                $scope.changePageHeader('Бібліотека');
            },
            templateUrl: basePath + "/angular/js/teacher/templates/library/dashboard.html"
        })
        .state('library.list', {
            url: "/list",
            cache: false,
            controller: 'booksCtrl',
            templateUrl: basePath + "/angular/js/teacher/templates/library/list.html"
        })
        .state('library.addBook',{
            url: "/addBook",
            cache: false,
            templateUrl: basePath + "/angular/js/teacher/templates/library/addBook.html"
        })
        .state('library.editBook:id', {
            url: "/editBook/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath + "/angular/js/teacher/templates/library/editBook.html?id="+$stateParams.id;
            }
        })
        .state('library.addCategory',{
            url:"/addCategory",
            cache: false,
            controller: function ($scope) {
                $scope.changePageHeader('Додання категорії');
            },
            templateUrl: basePath + "/angular/js/teacher/templates/library/addCategory.html"
        })
});
