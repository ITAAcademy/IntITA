angular
    .module('teacherApp')
    .controller('vacationCtrl',
        ['$scope', 'vacationService', 'NgTableParams',
        function ($scope, vacationService, NgTableParams) {
            $scope.changePageHeader('Відпустки');
            $scope.vacationTable = new NgTableParams({
                sorting: {
                    'id': 'desc',
                },
            }, {
                getData: function (params) {
                    return vacationService
                        .list(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            var statusSelect = [
                {
                    id: '0',
                    value: 'Відхилено',
                },
                {
                    id: '1',
                    value: 'Затвердженно',
                },
                {
                    id: '2',
                    value: 'Новий',
                },
            ];
            $scope.getStatusName = function (statusId) {
                var status = statusSelect.filter(function(item) {
                    return item.id === statusId;
                });
                return status[0].value;
            }
        }
    ])
    .controller('vacationFormCtrl',
        ['$scope', '$http', '$stateParams', 'FileUploader','$rootScope', 'vacationService', 'ngToast', '$state',
        function ($scope, $http, $stateParams, FileUploader, $rootScope, vacationService, ngToast, $state) {
            $scope.changePageHeader('Відпустка');
            function getSelectedVacationId() {
                var element = angular.element(document.querySelector( '#vacationIndex'));
                return Number(element.data('selected-vacation')) - 1;
            };
            $scope.isBenefitsOrOvertime = function(selectedTypeId) {
                var benefits = 7;
                var overtime = 6;
                return Number(benefits) === Number(selectedTypeId) || Number(overtime) === Number(selectedTypeId);
            };
            $scope.getVacationType = function() {
                $http({
                    method:'POST',
                    url: basePath + '/_teacher/vacation/vacation/getVacationTypes',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function(response){
                    $rootScope.vacationTypes = response;
                    $scope.formData.vacation_type_id = $rootScope.vacationTypes[getSelectedVacationId()];
                }).error(function(){
                    console.log("Отримати типи відпусток не вдалося");
                })
            };
            $scope.statusSelect = [
                {
                    id: '0',
                    value: 'Відхилено',
                },
                {
                    id: '1',
                    value: 'Затвердженно',
                },
                {
                    id: '2',
                    value: 'Новий',
                },
            ];
            
            $scope.newTypeInit = function(){
                $scope.formData = {
                    task_name: '',
                    description: '',
                    status: $scope.statusSelect[2],
                    vacation_type_id: $rootScope.vacationTypes !== undefined ? $rootScope.vacationTypes[getSelectedVacationId()] : $scope.getVacationType(),
                    start_date: '',
                    end_date: '',
                    comment: '',
                    file_src: '',
                };
            };
            $scope.getVacation = function () {
                vacationService.getVacation({'id':$stateParams.id}).$promise
                .then(function successCallback(response) {
                    $scope.formData = response.data;
                }, function errorCallback() {
                    bootbox.alert("Отримати дані відпустки не вдалося");
                });
            };
            if($stateParams.id){
                $scope.getVacation();
            }else{
                $scope.newTypeInit();
            }
            //files
            $scope.vacationId = null;
            var vacationUploader = $scope.vacationUploader = new FileUploader({
                url: basePath+'/_teacher/vacation/vacation/uploadVacationFile',
                removeAfterUpload: true
            });
            vacationUploader.onBeforeUploadItem = function(item) {
                item.url = basePath+'/_teacher/vacation/vacation/uploadVacationFile?id=' + $scope.vacationId;
            };
            vacationUploader.onCompleteAll = function() {
                location.reload();
            };
            vacationUploader.onErrorItem = function(item, response, status, headers) {
                if(status==500)
                    bootbox.alert("Виникла помилка при завантажені скан-копії відпустки.");
            };
            vacationUploader.filters.push({
                name: 'imageFilter',
                fn: function(item /*{File|FileLikeObject}*/, options) {
                    return true;
                }
            });
            // datepickers options
            $scope.dateFrom = new DateOptions();
            $scope.dateTo = new DateOptions();
            function DateOptions() {
                this.popupOpened = false;
                this.maxDate = new Date(2020, 5, 22);
                this.minDate = new Date();
                this.startingDay = 1;
            }
            DateOptions.prototype.open = function () {
                this.popupOpened = true;
            };
            function preparingDataToStore (formData) {
                formData.vacation_type_id = formData.vacation_type_id.id;
                formData.status = formData.status.id;
                return formData;
            }
            $scope.submitFormAddVacation = function () {
            vacationService
                .create(preparingDataToStore($scope.formData))
                .$promise
                .then(function (data) {
                    if (data.message === 'OK') {
                        if(vacationUploader.queue.length){
                            $scope.vacationId = data.id;
                            vacationUploader.uploadAll();
                        }
                        ngToast.create({
                            dismissButton: true,
                            className: 'success',
                            content: 'Операцію успішно виконано',
                            timeout: 3000
                        });
                        $state.go('vacationsList', {}, {reload: true});
                    } else {
                        bootbox.alert('Виникла помилка:'+'<br>'+data.reason);
                    }
                })
                .catch(function (error) {
                    bootbox.alert(error.data.reason);
                });
            };
            $scope.onVacationTypeChange = function (vacationType) {
                $scope.isBenefitsOrOvertime(vacationType.id);
            }
        }
    ])
    .controller('vacationTypesCtrl',
        ['$scope', '$http', 'NgTableParams', 'vacationService',
        function ($scope, $http, NgTableParams, vacationService) {
            $scope.changePageHeader('Типи відпусток');
            $scope.vacationTypesTable = new NgTableParams({},
                {
                    getData: function (params) {
                        return vacationService
                            .list(params.url())
                            .$promise
                            .then(function (data) {
                                params.total(data.count);
                                return data.rows;
                            });
                }
            });
            $scope.vacationTypeRemove = function (id) {
                var url = basePath + '/_teacher/vacation/vacation';
                bootbox.confirm('Ви впевнені, що бажаєте видалити відпустку?', function (result) {
                    if (result) {
                        $http({
                            method: 'POST',
                            url: url + '/vacationTypeRemove',
                            data: $jq.param({id: id}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                            .then(
                                function successCallback() {
                                    if(bootbox.alert("Відпустку видалено.")){
                                        $scope.vacationTypesTable.reload();
                                    }
                                },
                                function errorCallback(response) {
                                    bootbox.alert(response.data.reason);
                                }
                            );
                    }
                });
            };
        }
    ])
    .controller('vacationTypeFormCtrl',
        ['$scope', '$stateParams', 'vacationService', 'ngToast', '$state',
        function ($scope, $stateParams, vacationService, ngToast, $state) {
            $scope.changePageHeader('Тип відпустки');
            $scope.newTypeInit = function(){
                $scope.newType = {
                    title_ua: '',
                    title_ru: '',
                    title_en: '',
                    position: '',
                };
            };
            $scope.getVacationType = function () {
                vacationService.getVacationType({'id':$stateParams.vacation_type_id}).$promise
                .then(function successCallback(response) {
                    response.data.position =  Number(response.data.position);
                    $scope.newType = response.data;
                }, function errorCallback() {
                    bootbox.alert("Отримати дані відпустки не вдалося");
                });
            };
            if($stateParams.vacation_type_id){
                $scope.getVacationType();
            }else{
                $scope.newTypeInit();
            }
            $scope.regex = {
                titleUa: /^[А-ЕЖ-ЩЬЮЯІЄЇҐа-еж-щьюяієїґ\'\-\s]+$/,
                titleRu: /^[А-ГДЕЖЗИЙ-Яа-гдежзий-я\-\s]+$/,
                titleEn: /^[A-Za-z\'\-\s]+$/,
            };
            $scope.submitType = function () {
                vacationService
                    .addVacationType($scope.newType)
                    .$promise
                    .then(function successCallback() {
                        ngToast.create({
                            dismissButton: true,
                            className: 'success',
                            content: 'Тип відпустки оновлено',
                            timeout: 3000
                        });
                        $state.go('vacationsTypes', {}, {reload: true});
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };
        }
    ])

