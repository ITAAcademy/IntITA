angular
    .module('teacherApp')
    .directive('stringToNumber', function () { //When you edit book, it must be for price
        return {
            require: 'ngModel',
            link: function (scope, element, attrs, ngModel) {
                ngModel.$parsers.push(function (value) {
                    return '' + value;
                });
                ngModel.$formatters.push(function (value) {
                    return parseFloat(value, 10);
                });
            }
        };
    })
    .controller('booksCtrl',
        ['$scope', '$http', 'NgTableParams', '$resource', 'libraryService', function ($scope, $http, NgTableParams, $resource, libraryService) {
            $scope.changePageHeader('Список книг');
            $scope.allCategoryArrForList = [];
            $scope.allCategoryForList = function () {
                return libraryService
                    .getCategory()
                    .then(function (data) {
                        for (var key in data) {
                            if (data[key].title_ua !== undefined) {
                                $scope.allCategoryArrForList.push({id: data[key].id, title: data[key].title_ua});
                            }
                        }
                        return $scope.allCategoryArrForList;
                    });
            };
            $scope.allCategoryForList();
            $scope.booksTable = new NgTableParams({}, {
                getData: function (params) {
                    return libraryService
                        .booksList(params.url())
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.removeBook = function (id) {
                var url = basePath + '/_teacher/library/library';
                bootbox.confirm('Видалити книгу?', function (result) {
                    if (result) {
                        $http({
                            method: 'POST',
                            url: url + '/removeBook',
                            data: $jq.param({id: id}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                            .then(
                                function successCallback() {
                                    if(bootbox.alert("Книгу видалено.")){
                                        $scope.booksTable.reload();
                                    }
                                },
                                function errorCallback() {
                                    bootbox.alert("Операцію не вдалося виконати.");
                                }
                            );
                    }
                    else {
                        bootbox.alert("Операцію відмінено.");
                    }
                });
            };
        }])
    .controller('libraryFormCtrl', ['$scope', 'libraryService', function ($scope, libraryService) {
        $scope.changePageHeader('Додання книги');
        $scope.formData = {
            title: '',
            description: '',
            price: '',
            language: '',
            category: '',
            status: '',
            link: '',
            logo: ''
        };
        $scope.allCategoryArr = [];
        $scope.allCategory = function () {
            return libraryService
                .getCategory()
                .then(function (data) {
                    for (var key in data) {
                        if (data[key].title_ua !== undefined) {
                            $scope.allCategoryArr.push(data[key]);
                        }
                    }
                    return $scope.allCategoryArr;
                });
        };
        $scope.allCategory();

        $scope.submitFormAddBook = function () {
            if ($scope.formData.title) {
                libraryService.sendFile({
                    formData: $scope.formData
                });
                libraryService.sendLogo({
                    formData: $scope.formData
                });
                libraryService.addBook({
                    'data': $scope.formData
                });
            } else {
                bootbox.alert("Введіть назву книжки");
            }
        };
    }])
    .controller('editBookCtrl', ['$scope', 'libraryService', '$http', 'NgTableParams', '$stateParams', function ($scope, libraryService, $http, NgTableParams, $stateParams) {
        $scope.changePageHeader('Редагування книги');
        $scope.allCategoryArr = [];
        $scope.allCategory = function () {
            return libraryService
                .getCategory()
                .then(function (data) {
                    for (var key in data) {
                        if (data[key].title_ua !== undefined) {
                            $scope.allCategoryArr.push(data[key]);
                        }
                    }
                    return $scope.allCategoryArr;
                });
        };
        $scope.allCategory();
        var url = basePath + '/_teacher/library/library';
        $scope.loadBookData = function () {
            $http({
                url: url + '/getLibraryData',
                method: "POST",
                data: $jq.param({id: $stateParams.id}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function successCallback(response) {
                $scope.formData = response.data;
            }, function errorCallback() {
                bootbox.alert("Отримати дані про книгу не вдалося");
            });
        };
        $scope.loadBookData();

        $scope.updateForm = function () {
            libraryService.editBook({
                'data': $scope.formData
            });
        };
    }])
    .controller('addCategoryCtrl', ['$scope', 'libraryService', function ($scope, libraryService) {
        $scope.newCategory = {
            title_ua: '',
            title_ru: '',
            title_en: '',
        };
        $scope.submitCategory = function () {
            libraryService.addCategory({
                'data': $scope.newCategory
            });
        };
    }]);