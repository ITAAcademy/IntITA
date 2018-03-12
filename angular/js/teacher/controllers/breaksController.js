/**
 * Created by peace_data on 10.03.2018.
 */
angular
    .module('teacherApp')
    .controller('breakStartTableCtrl', breakStartTableCtrl)
    .controller('breakStartCtrl', breakStartCtrl);

function breakStartTableCtrl ($scope, breakService, $state, $http){
    $scope.changePageHeader("Варіанти причин");

    var url=basePath+'/_teacher/_super_admin/config';

    $scope.loadBreaks=function(){
        return breakService
            .getBreaksList()
            .then(function (data) {
                $scope.break=data;
            });
    };
    $scope.loadBreaks();

    $scope.createBreak= function () {
        $http({
            url: url+'/createBreak',
            method: "POST",
            data: $jq.param({
                description: $scope.break.description
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data, function(){
                $state.go("configuration/breaks", {}, {reload: true});
            });
        }, function errorCallback() {
            bootbox.alert("Створити варіант причини не вдалося. Помилка сервера.");
        });
    };
}

function breakStartCtrl ($scope, $state, $http, $stateParams){
    $scope.changePageHeader("Причина");
    var url=basePath+'/_teacher/_super_admin/config';
    $scope.loadBreakData=function(){
        $http({
            url: url+'/getBreakData',
            method: "POST",
            data: $jq.param({id:$stateParams.id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            $scope.break=response.data;
        }, function errorCallback() {
            bootbox.alert("Отримати дані про причину не вдалося");
        });
    };
    $scope.loadBreakData();

    $scope.editBreak= function () {
        $http({
            url: url+'/updateBreak',
            method: "POST",
            data: $jq.param({
                id:$stateParams.id,
                description: $scope.break.description
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data, function(){
                $state.go("configuration/breaks", {}, {reload: true});
            });
        }, function errorCallback() {
            bootbox.alert("Відредагувати причину не вдалося. Помилка сервера.");
        });
    };
}
