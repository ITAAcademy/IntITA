angular
    .module('teacherApp')
    .controller('vacationCtrl',
        ['$scope', '$http', 'NgTableParams', '$resource', '$stateParams', 'FileUploader','$rootScope',
        function ($scope, $http, NgTableParams, $resource, $stateParams, FileUploader, $rootScope) {
            $scope.changePageHeader('Відпустки');
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
            $scope.formData = {
                task_name: '',
                description: '',
                logo: '',
                vacation_type_id: $rootScope.vacationTypes !== undefined ? $rootScope.vacationTypes[getSelectedVacationId()] : $scope.getVacationType(),
                // vacation_type_id: function(selectedVacationId) {
                //     console.log($rootScope.vacationTypes[selectedTypeId]);
                //     return $rootScope.vacationTypes[selectedTypeId];
                // },
            };
            $scope.submitFormAddVacation = function () {
            libraryService
                .create($scope.formData)
                .$promise
                .then(function (data) {
                    if (data.message === 'OK') {
                        if(logoUploader.queue.length){
                            $scope.libraryId = data.id;
                            logoUploader.uploadAll();
                        }
                        ngToast.create({
                            dismissButton: true,
                            className: 'success',
                            content: 'Операцію успішно виконано',
                            timeout: 3000
                        });
                    } else {
                        bootbox.alert('Виникла помилка:'+'<br>'+data.reason);
                    }
                })
                .catch(function (error) {
                    bootbox.alert(error.data.reason);
                });
        };
    }])
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
            $scope.changePageHeader('Відпустка');
            $scope.newTypeInit = function(){
                $scope.newType = {
                    title_ua: '',
                    title_ru: '',
                    title_en: '',
                    position: '',
                };
            };
            $scope.getVacation = function () {
                vacationService.getVacation({'id':$stateParams.vacation_type_id}).$promise
                .then(function successCallback(response) {
                    response.data.position =  Number(response.data.position);
                    $scope.newType = response.data;
                }, function errorCallback() {
                    bootbox.alert("Отримати дані відпустки не вдалося");
                });
            };
            if($stateParams.vacation_type_id){
                $scope.getVacation();
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

