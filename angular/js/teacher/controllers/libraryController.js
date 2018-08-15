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

            $scope.booksTable = new NgTableParams({
                sorting: {
                    'id': 'desc',
                },
            }, {
                getData: function (params) {
                    return libraryService
                        .list(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.removeBook = function (id) {
                var url = basePath + '/_teacher/library/library';
                bootbox.confirm('Ви впевнені, що бажаєте видалити книгу?', function (result) {
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
                                function errorCallback(response) {
                                    bootbox.alert(response.data.reason);
                                }
                            );
                    }
                });
            };
        }])
    .controller('libraryFormCtrl', ['$scope', 'libraryService', 'FileUploader','$state','$stateParams','ngToast', function ($scope, libraryService, FileUploader, $state, $stateParams, ngToast) {
        $scope.changePageHeader('Книга');
        $scope.newBookInit = function(){
            $scope.formData = {
                title: '',
                description: '',
                price: '',
                language: '',
                category: '',
                status: '',
                link: '',
                logo: '',
                position: '',
                publication_year: ''
            };
        };
        $scope.getLibrary = function () {
            libraryService.getLibrary({'id':$stateParams.id}).$promise
            .then(function successCallback(response) {
                response.data.price =  Number(response.data.price);
                response.data.paper_price =  Number(response.data.paper_price);
                response.data.position =  Number(response.data.position);
                response.data.publication_year =  Number(response.data.publication_year);
                $scope.formData = response.data;
            }, function errorCallback() {
                bootbox.alert("Отримати дані категорії не вдалося");
            });
        };

        if($stateParams.id){
            $scope.getLibrary();
        }else{
            $scope.newBookInit();
        }

        $scope.allCategory = function () {
            return libraryService
                .getCategories()
                .$promise
                .then(function (data) {
                    return data.rows;
                });
        };

        //files
        $scope.libraryId = null;
        var bookUploader = $scope.bookUploader = new FileUploader({
            url: basePath+'/_teacher/library/library/uploadBookFiles',
            removeAfterUpload: true
        });
        bookUploader.onBeforeUploadItem = function(item) {
            item.url = basePath+'/_teacher/library/library/uploadBookFiles?id=' + $scope.libraryId + '&type=link';
        };
        bookUploader.onCompleteAll = function() {
            if($stateParams.id){
                location.reload();
            }else{
                $state.go('library/list',{},{reload: true});
            }
        };
        bookUploader.onErrorItem = function(item, response, status, headers) {
            if(status==500)
                bootbox.alert("Виникла помилка при завантажені книги.");
        };
        bookUploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                return true;
            }
        });

        var demoBookUploader = $scope.demoBookUploader = new FileUploader({
            url: basePath+'/_teacher/library/library/uploadBookFiles',
            removeAfterUpload: true
        });
        demoBookUploader.onBeforeUploadItem = function(item) {
            item.url = basePath+'/_teacher/library/library/uploadBookFiles?id=' + $scope.libraryId + '&type=demo_link';
        };
        demoBookUploader.onErrorItem = function(item, response, status, headers) {
            if(status==500)
                bootbox.alert("Виникла помилка при завантажені книги.");
        };
        demoBookUploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                return true;
            }
        });

        var logoUploader = $scope.logoUploader = new FileUploader({
            url: basePath+'/_teacher/library/library/uploadBookFiles',
            removeAfterUpload: true
        });
        logoUploader.onBeforeUploadItem = function(item) {
            item.url = basePath+'/_teacher/library/library/uploadBookFiles?id=' + $scope.libraryId + '&type=logo';
        };
        logoUploader.onCompleteAll = function() {
            if($stateParams.id){
                location.reload();
            }else{
                $state.go('library/list',{},{reload: true});
            }
        };
        logoUploader.onErrorItem = function(item, response, status, headers) {
            if(status==500)
                bootbox.alert("Виникла помилка при завантажені книги.");
        };
        logoUploader.filters.push({
            name: 'imageFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        });

        logoUploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
            console.info('onWhenAddingFileFailed', item, filter, options);
        };
        //files

        $scope.submitFormAddBook = function () {
            libraryService
                .create($scope.formData)
                .$promise
                .then(function (data) {
                    if (data.message === 'OK') {
                        if(bookUploader.queue.length){
                            $scope.libraryId = data.id;
                            bookUploader.uploadAll();
                        }
                        if(logoUploader.queue.length){
                            $scope.libraryId = data.id;
                            logoUploader.uploadAll();
                        }
                        if(demoBookUploader.queue.length){
                            $scope.libraryId = data.id;
                            demoBookUploader.uploadAll();
                        }
                        ngToast.create({
                            dismissButton: true,
                            className: 'success',
                            content: 'Операцію успішно виконано',
                            timeout: 3000
                        });
                        if(!$stateParams.id){
                            $state.go('library/list',{},{reload: true});
                        }
                    } else {
                        bootbox.alert('Виникла помилка:'+'<br>'+data.reason);
                    }
                })
                .catch(function (error) {
                    bootbox.alert(error.data.reason);
                });
        };

        $scope.yearPicker = function ($event) {
            // $jq($event.currentTarget).removeClass('datepicker').datepicker().focus();
            $jq($event.currentTarget).monthYearPicker();
        }

        $jq.fn.monthYearPicker = function(options) {
            options = $jq.extend({
                dateFormat: 'yy',
                changeYear: true,
                showButtonPanel: true,
                showAnim: '',
                beforeShow: function(input, inst) {
                    $jq('.ui-datepicker-header, .ui-datepicker-year').css({color: '#000'});
                    setTimeout(function () {
                        var offsets = $jq(input).offset();
                        var top = offsets.top + 35;
                        inst.dpDiv.css({
                            top: top,
                            left: offsets.left,
                        });
                    }, 0);
                }
            }, options);
            function hideDaysFromCalendar() {
                var thisCalendar = $jq(this);
                $jq('.ui-datepicker-month, .ui-datepicker-prev, .ui-datepicker-next').css({display: 'none'});
                $jq('.ui-datepicker-header, .ui-datepicker-year').css({color: '#000'});
                $jq('.ui-datepicker-calendar').detach();
                // Also fix the click event on the Done button.
                $jq('.ui-datepicker-close').unbind('click').click(function() {
                    var year = $jq('#ui-datepicker-div .ui-datepicker-year :selected').val();
                    $scope.formData.publication_year = year;
                    thisCalendar.datepicker('setDate', new Date(year, 1));
                    $jq('#ui-datepicker-div').hide();
                });
            }
            $jq(this).datepicker(options).focus(hideDaysFromCalendar);
        }
    }])
    .controller('addCategoryCtrl', ['$scope', 'libraryService','ngToast', function ($scope, libraryService,ngToast) {
        $scope.changePageHeader('Категорія бібліотеки');
        $scope.newCategoryInit = function () {
            $scope.newCategory = {
                title_ua: '',
                title_ru: '',
                title_en: '',
            };
        };
        $scope.newCategoryInit();

        $scope.submitCategory = function () {
            libraryService
                .addCategory($scope.newCategory)
                .$promise
                .then(function successCallback() {
                    ngToast.create({
                        dismissButton: true,
                        className: 'success',
                        content: 'Категорію створено',
                        timeout: 3000
                    });
                    $scope.newCategoryInit();
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
        };
    }])
    .controller('updateCategoryCtrl', ['$scope', 'libraryService','ngToast', '$stateParams', function ($scope, libraryService,ngToast,$stateParams) {
        $scope.changePageHeader('Категорія бібліотеки');

        libraryService.getCategory({'id':$stateParams.id}).$promise
            .then(function successCallback(response) {
                $scope.newCategory = response.data;
            }, function errorCallback() {
                bootbox.alert("Отримати дані категорії не вдалося");
            });

        $scope.submitCategory = function () {
            libraryService
                .addCategory($scope.newCategory)
                .$promise
                .then(function successCallback() {
                    ngToast.create({
                        dismissButton: true,
                        className: 'success',
                        content: 'Категорію оновлено',
                        timeout: 3000
                    });
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
        };
    }])
    .controller('categoryBooksCtrl', ['$scope', 'libraryService', 'NgTableParams', function ($scope, libraryService, NgTableParams) {
        $scope.changePageHeader('Категорії бібліотеки');

        $scope.categoryBooksTable = new NgTableParams({}, {
            getData: function (params) {
                return libraryService
                    .getCategories(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
    }]);