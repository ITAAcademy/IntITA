angular
    .module('teacherApp')
    .constant('vacationStatuses', [
        {
            id: '1',
            value: 'Відхилено',
        },
        {
            id: '2',
            value: 'Затвердженно',
        },
        {
            id: '3',
            value: 'Новий',
        },
    ])
    .controller('vacationCtrl',
        ['$scope', 'vacationService', 'NgTableParams', 'vacationStatuses', '$http',
        function ($scope, vacationService, NgTableParams, vacationStatuses, $http) {
            $scope.changePageHeader('Відпустки');
            $scope.vacationTable = new NgTableParams({
                sorting: {
                    'id': 'desc',
                },
            }, {
                getData: function (params) {
                    return vacationService
                        .vacationList(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.getStatusName = function (statusId) {
                var status = vacationStatuses.filter(function(item) {
                    return item.id === statusId;
                });
                return status[0].value;
            };
            $scope.removeVacation = function (id) {
                var url = basePath + '/_teacher/vacation/vacation';
                bootbox.confirm('Ви впевнені, що бажаєте видалити відпустку?', function (result) {
                    if (result) {
                        $http({
                            method: 'POST',
                            url: url + '/removeVacation',
                            data: $jq.param({id: id}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                        .then(
                            function successCallback() {
                                if(bootbox.alert("Відпустку видалено.")){
                                    $scope.vacationTable.reload();
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
    .controller('vacationFormCtrl',
        ['$scope', '$http', '$stateParams', 'FileUploader','$rootScope', 'vacationService', 'ngToast', '$state', 'vacationStatuses',
        function ($scope, $http, $stateParams, FileUploader, $rootScope, vacationService, ngToast, $state, vacationStatuses) {
            $scope.changePageHeader('Відпустка');
            function getSelectedVacationId() {
                var element = angular.element(document.querySelector( '#vacationIndex'));
                return Number(element.data('selected-vacation')) - 1;
            };
            $scope.isBenefitsOrOvertime = function(extentionForm) {
                return Boolean(Number(extentionForm));
            };
            $scope.getVacationType = function() {
                vacationService.list().$promise
                .then(function successCallback(response) {
                    $rootScope.vacationTypes = response.data;
                    $scope.formData.vacation_type_id = $rootScope.vacationTypes[getSelectedVacationId()];
                }, function errorCallback() {
                    console.log("Отримати типи відпусток не вдалося");
                });
            };
            $scope.statusSelect = vacationStatuses;
            $scope.newTypeInit = function(){
                $scope.formData = {
                    task_name: '',
                    description: '',
                    status: vacationStatuses[2],
                    vacation_type_id: $rootScope.vacationTypes !== undefined ? $rootScope.vacationTypes[getSelectedVacationId()] : $scope.getVacationType(),
                    start_date: '',
                    end_date: '',
                    comment: '',
                    file_src: '',
                };
            };
            $scope.getVacation = function () {
                vacationService.getVacation({'id':$stateParams.vacation_id}).$promise
                .then(function successCallback(response) {
                    $scope.formData = response.data;
                    $scope.formData.status = vacationStatuses[Number(response.data.status) - 1];
                    $scope.formData.vacation_type_id = $rootScope.vacationTypes !== undefined ? $rootScope.vacationTypes[Number(response.data.vacation_type_id) - 1] : $scope.getVacationType();
                    $scope.formData.start_date = new Date(response.data.start_date);
                    $scope.formData.end_date = new Date(response.data.end_date);
                }, function errorCallback() {
                    bootbox.alert("Отримати дані відпустки не вдалося");
                });
            };

            if($stateParams.vacation_id){
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
            $scope.start_date = new DateOptions();
            $scope.end_date = new DateOptions();
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
            $scope.extensionFormValue = function (data) {
                return Number(data) === 1 ? `&cuvee;` : null;
            }
        }
    ])
    .controller('vacationTypeFormCtrl',
        ['$scope', '$stateParams', 'vacationService', 'ngToast', '$state', '$rootScope',
        function ($scope, $stateParams, vacationService, ngToast, $state, $rootScope) {
            $scope.changePageHeader('Тип відпустки');
            $scope.newTypeInit = function(){
                $scope.newType = {
                    title_ua: '',
                    title_ru: '',
                    title_en: '',
                    position: '',
                    extension_form: '',
                };
            };
            $scope.getVacationType = function () {
                vacationService.getVacationType({'id':$stateParams.vacation_type_id}).$promise
                .then(function successCallback(response) {
                    response.data.position =  Number(response.data.position);
                    response.data.extension_form = Boolean(Number(response.data.extension_form));
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
                titleUa: /^[А-ЕЖ-ЩЬЮЯІЄЇҐа-еж-щьюяієїґ()\'\-\s]+$/,
                titleRu: /^[А-ГДЕЖЗИЙ-ЯЁа-гдежзий-яё()\-\s]+$/,
                titleEn: /^[A-Za-z()\'\-\s]+$/,
            };
            function preparingDataToStore(formData) {
                formData.extension_form = formData.extension_form === true ? '1' : '0';
                return formData;
            }
            function getVacationType() {
                vacationService.list().$promise
                .then(function successCallback(response) {
                    $rootScope.vacationTypes = response.data;
                }, function errorCallback() {
                    console.log("Отримати типи відпусток не вдалося");
                });
            };
            $scope.submitType = function () {
                vacationService
                    .addVacationType(preparingDataToStore($scope.newType))
                    .$promise
                    .then(function successCallback() {
                        getVacationType();
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

