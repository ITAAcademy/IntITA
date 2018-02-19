/**
 * Created by HiTechnic on 14.02.2018.
 */
angular
    .module('teacherApp')
    .controller('languageLevelTableCtrl', languageLevelTableCtrl);

function languageLevelTableCtrl($scope, $state, $http) {
    $scope.changePageHeader("Рівні англійської");
    var url = basePath + '/_teacher/_super_admin/config/languageLevels';
    $scope.languageLevels = [];
    $http.get(url)
        .then(function (response) {
            $scope.languageLevels = response.data;
        });

    $scope.createLanguageLevel= function () { $scope.changePageHeader("Ркої");
        $http({
            url: url + '/createLanguageLevels',
            method: "POST",
            data: $jq.param({
                title: $scope.languageLevels.title,
                description: $scope.languageLevels.description,
                order: $scope.languageLevels.order
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        })
            .then(function successCallback(response) {
            bootbox.alert(response.data, function(){
                $state.go("configuration/language_levels", {}, {reload: true});
            });
        }, function errorCallback() {
            bootbox.alert("Створити новий рівень англійської не вдалося. Помилка сервера.");
        }); console.log($scope.languageLevels);
    };
}


