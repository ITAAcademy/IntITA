/**
 * Created by HiTechnic on 14.02.2018.
 */
angular
    .module('teacherApp')
    .controller('languageLevelTableCtrl', ['$scope', '$state', '$http',
        function ($scope, $state, $http) {
            $scope.changePageHeader("Рівні англійської");
            var url = basePath + '/_teacher/_super_admin/config';
            $scope.languageLevels = [];
            $http.get(url + '/languageLevel')
                .then(function (response) {
                    $scope.languageLevels = response.data;
                });
        }
    ])
    .controller('languageLevelCtrl', ['$scope', '$state', '$http', '$stateParams',
            function ($scope, $state, $http, $stateParams) {
            $scope.changePageHeader("Рівень англійської");
            var url = basePath + '/_teacher/_super_admin/config';
            $scope.languageLevel={};

            $scope.createLanguageLevel = function () {
                    $http({
                        url: url + '/createLanguageLevels',
                        method: "POST",
                        data: $jq.param({
                            form_data: $scope.languageLevel
                        }),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                    })
                        .then(function successCallback(response) {
                                $state.go("configuration/language_levels", {}, {reload: true});
                            },
                            function errorCallback(response) {
                                bootbox.alert("Створити новий рівень англійської не вдалося. Помилка сервера.");
                            });
                };
            $scope.loadLanguageLevelData = function () {
                $http({
                    url: url + '/getLanguageLevelsData',
                    method: "POST",
                    data: $jq.param({id: $stateParams.id}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                })
                    .then(function successCallback(response) {
                        $scope.languageLevel = response.data;
                    }, function errorCallback() {
                        bootbox.alert("Отримати данні рівнів не вдалося");
                    });
            }

            if($stateParams.id) {
                $scope.loadLanguageLevelData();
            }

            $scope.editLanguageLevel = function () {
                $http({
                    url: url + '/updateLanguageLevels',
                    method: "POST",
                    data: $jq.param({
                        id: $stateParams.id,
                        data: $scope.languageLevel
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    $state.go("configuration/language_levels", {}, {reload: true});

                }, function errorCallback() {
                    bootbox.alert("Відредагувати рівень не вдалося. Помилка сервера.");
                });
            };
            $scope.sendLanguageLevelForm = function($scenario){
                if ($scenario === 'create')
                    $scope.createLanguageLevel();
                else if ($scenario === 'update')
                    $scope.editLanguageLevel();
            }
    }])