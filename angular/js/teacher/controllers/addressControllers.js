/**
 * Created by adm on 19.07.2016.
 */

angular
    .module('teacherApp')
    .controller('addressCtrl', addressCtrl)
    .directive("cityValidation", cityValidation)

function addressCtrl($scope, $http, $resource, NgTableParams, $state) {
    $scope.changePageHeader('Адреса (країни, міста)');

    var url=basePath+"/_teacher/_super_admin/address";

    $scope.cityForm = {};

    $scope.countriesTable = new NgTableParams({},
        {
            getData: function (params) {
                return $resource(url + "/getCountriesList").get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });

    $scope.citiesTable = new NgTableParams({},
        {
            getData: function (params) {
                return $resource(url + "/getCitiesList").get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        }
    );

    $scope.regex = {
        titleUa: /^[А-ЕЖ-ЩЬЮЯІЄЇҐа-еж-щьюяієїґ\'\-\s]+$/,
        titleRu: /^[А-ГДЕЖЗИЙ-Яа-гдежзий-я\-\s]+$/,
        titleEn: /^[A-Za-z\'\-\s]+$/,
    };

    $scope.editCity = function () {
        country = $jq('#country').val();
        if (country == 0) {
            bootbox.alert('Виберіть країну.');
        } else {
            var fullUrl = url+"/updateCity";
            $http.post(fullUrl, $scope.cityForm)
            .then(function successCallback(response) {
                bootbox.alert(response.data, function () {
                    $state.go("address", {}, {reload: true});
                });
            }, function errorCallback() {
                bootbox.alert("Операцію не вдалося виконати.");
            });
        }
    };

    $scope.addCity = function () {
        country = $jq('#country').val();
        if (country == 0) {
            bootbox.alert('Виберіть країну.');
        } else {
            $scope.cityForm['country'] = country;
            var fullUrl = url+"/newCity";
            $http.post(fullUrl, $scope.cityForm)
            .then(function successCallback(response) {
                bootbox.alert(response.data, function () {
                    $state.go("address", {}, {reload: true});
                });
            }, function errorCallback() {
                bootbox.alert("Операцію не вдалося виконати.");
            });
        }
    };

    $scope.removeCity = function (city) {
        var fullUrl = url+"/removeCity";
        $http.post(fullUrl, {id: city.id})
        .then(function successCallback(response) {
            bootbox.alert(response.data, function () {
                $state.go("address", {}, {reload: true});
            });
        }, function errorCallback() {
            bootbox.alert("Операцію не вдалося виконати.");
        });
    }

    $scope.showEditModal = function (city) {
        $state.go('editcity/:id', {id: city.id});
    }
}

function cityValidation () {
    return {
        scope: {
            patternError: '=patternError',
            dirtyRequiredError: '=dirtyRequiredError',
        },
        templateUrl: "/angular/js/teacher/templates/cms/cityErrors.html"
    };
}
