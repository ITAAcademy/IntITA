angular
    .module('teacherApp')
    .directive('stringToNumber', function() {
        return {
            require: 'ngModel',
            link: function(scope, element, attrs, ngModel) {
                ngModel.$parsers.push(function(value) {
                    return '' + value;
                });
                ngModel.$formatters.push(function(value) {
                    return parseFloat(value, 10);
                });
            }
        };
    })//
    .controller('booksCtrl',
        ['$scope', '$http','NgTableParams','$resource','libraryService', function ($scope, $http,NgTableParams,$resource,libraryService) {
            $scope.changePageHeader('Список книг');
            $scope.allCategoryArrForList = [];
            $scope.allCategoryForList = function(){
                return libraryService
                    .getCategory()
                    .then(function (data) {
                        for(var key in data){
                            if (data[key].title_ua !== undefined){
                                $scope.allCategoryArrForList.push({id: data[key].id,title:data[key].title_ua});
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
                var url=basePath + '/_teacher/library/library';
                bootbox.confirm('Видалити книгу?',function(result){
                    if(result){
                        $http({
                                method: 'POST',
                                url: url+'/removeBook',
                                data: $jq.param({id:id}),
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            })
                            .then(
                                function successCallback() {
                                    bootbox.alert("Книгу видалено.");
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
        .controller('libraryFormCtrl',['$scope','libraryService','$http',function ($scope,libraryService,$http) {
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
            $scope.allCategory = function(){
                return libraryService
                    .getCategory()
                    .then(function (data) {
                        for(var key in data){
                            if (data[key].title_ua !== undefined){
                                $scope.allCategoryArr.push(data[key]);
                            }
                        }
                        return $scope.allCategoryArr;
                    });
            };
            $scope.allCategory();

            var inputWithFiles = document.querySelectorAll('input[type=file]');
            var book,logo;
            inputWithFiles[0].addEventListener('change',function (ev) {
                book = ev.target.files[0];
                var fileBook = new FormData();
                fileBook.append("file", book);
                $http.post(basePath + '/_teacher/library/library/getBookFile', fileBook, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined },
                    transformRequest: angular.identity
                })
                    .success(function (response) {
                        $scope.link = basePath + "/"+response;
                        $scope.formData.link =  $scope.link;
                    })
            });
            inputWithFiles[1].addEventListener('change',function (ev) {
                logo = ev.target.files[0];
                var fileLogo = new FormData();
                fileLogo.append("file", logo);
                $http.post(basePath + '/_teacher/library/library/getImg', fileLogo, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined },
                    transformRequest: angular.identity
                })
                .success(function (response) {
                    $scope.logo = basePath + "/"+response;
                    $scope.formData.logo =  $scope.logo;
                })
            });

            $scope.submitFormAddBook = function () {
                for(var category in $scope.allCategoryArr){
                    if($scope.allCategoryArr[category].title_ua == $scope.formData.category){
                        $scope.formData.category = $scope.allCategoryArr[category].id;
                    }
                }
                if($scope.formData.description&&$scope.formData.language&&$scope.formData.price&&$scope.formData.title){
                    libraryService.addBook({
                        'data' : $scope.formData
                    });
                    bootbox.alert("Ви успішно додали книгу!");
                }
                else{
                    bootbox.alert("Не вірно введені дані");
                }

            };
        }])
    .controller('editBookCtrl',['$scope','libraryService','$http','NgTableParams','$stateParams',function ($scope,libraryService,$http,NgTableParams,$stateParams){
        $scope.changePageHeader('Редагування книги');
        $scope.allCategoryArrEdit = [];
        $scope.allCategoryArr = [];
        $scope.allCategory = function(){
            return libraryService
                .getCategory()
                .then(function (data) {
                    for(var key in data){
                        if (data[key].title_ua !== undefined){
                            $scope.allCategoryArr.push(data[key]);
                        }
                    }
                    return $scope.allCategoryArr;
                });
        };
        $scope.allCategory();
        $scope.allCategoryEdit = function(){
            return libraryService
                .getCategory()
                .then(function (data) {
                    for(var key in data){
                        if (data[key].title_ua !== undefined){
                            $scope.allCategoryArrEdit.push(data[key].title_ua);
                        }
                    }
                    return $scope.allCategoryArrEdit;
                });
        };
        $scope.allCategoryEdit();
        var url=basePath + '/_teacher/library/library';
        $scope.loadBookData=function(){
            $http({
                url: url+'/getLibraryData',
                method: "POST",
                data: $jq.param({id:$stateParams.id}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function successCallback(response) {
                $scope.bookInfoForUpdating=response.data;
                $scope.formData = {
                    id: $scope.bookInfoForUpdating.id,
                    title: $scope.bookInfoForUpdating.title,
                    description: $scope.bookInfoForUpdating.description,
                    price: $scope.bookInfoForUpdating.price,
                    language: $scope.bookInfoForUpdating.language,
                    category: $scope.bookInfoForUpdating.libraryDependsBookCategories,
                    status: $scope.bookInfoForUpdating.status,
                    link: $scope.bookInfoForUpdating.link,
                    logo: $scope.bookInfoForUpdating.logo
                };
            }, function errorCallback() {
                bootbox.alert("Отримати дані про книгу не вдалося");
            });
        };
        $scope.loadBookData();
        var inputWithFiles = document.querySelectorAll('input[type=file]');
        var book,logo;
        inputWithFiles[0].addEventListener('change',function (ev) {
            book = ev.target.files[0];
            var fileBook = new FormData();
            fileBook.append("file", book);
            $http.post(basePath + '/_teacher/library/library/getBookFile', fileBook, {
                withCredentials: true,
                headers: {'Content-Type': undefined },
                transformRequest: angular.identity
            })
                .success(function (response) {
                    $scope.link = basePath + "/"+response;
                    $scope.formData.link =  $scope.link;
                })
        });
        inputWithFiles[1].addEventListener('change',function (ev) {
            logo = ev.target.files[0];
            var fileLogo = new FormData();
            fileLogo.append("file", logo);
            $http.post(basePath + '/_teacher/library/library/getImg', fileLogo, {
                withCredentials: true,
                headers: {'Content-Type': undefined },
                transformRequest: angular.identity
            })
                .success(function (response) {
                    $scope.logo = basePath + "/"+response;
                    $scope.formData.logo =  $scope.logo;
                })
        });
        $scope.updateForm = function () {
            for(var category in $scope.allCategoryArr){
                if($scope.allCategoryArr[category].title_ua == $scope.formData.category){
                    $scope.formData.category = $scope.allCategoryArr[category].id;
                }
            }
            libraryService.editBook({
                'data' : $scope.formData
            });
            bootbox.alert("Ви успішно обновили книгу!");
        };

    }])
    .controller('addCategoryCtrl',['$scope','libraryService',function($scope,libraryService){
        $scope.newCategory = {
          title_ua: '',
            title_ru: '',
            title_en: '',
        };
        $scope.submitCategory = function () {
            libraryService.addCategory({
                'data' : $scope.newCategory
            });
            bootbox.alert("Ви успішно додали категорію!");
        };

    }]);