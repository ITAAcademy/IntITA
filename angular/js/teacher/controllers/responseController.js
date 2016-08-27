/**
 * Created by adm on 10.08.2016.
 */
angular
    .module('teacherApp')
    .controller('responseCtrl',responseCtrl)
    .controller('responseModelCtrl',responseModelCtrl);


function responseCtrl ($scope, $http, DTOptionsBuilder, DTColumnDefBuilder){

    $http.get(basePath+'/_teacher/_admin/response/getTeacherResponsesList').then(function (data) {
        $scope.responsesList = data.data["data"];
    });

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withPaginationType('simple_numbers')
        .withLanguageSource(basePath + '/scripts/cabinet/Ukranian.json');

    $scope.dtColumnDefs = [
        DTColumnDefBuilder.newColumnDef(4).withOption('width', '10%'),
    ];
}

function responseModelCtrl ($scope, $http, $state,$stateParams){
    $scope.loadResponse=function(id){
        $http.get(basePath+'/_teacher/_admin/response/loadJsonModel/id/'+id).then(function (response) {
            $scope.response = response.data;
        });
    };
    $scope.loadResponse($stateParams.responseId);
    
    $scope.updateResponse = function(responseId){
        var text = angular.element('#response').bbcode();
        var publish = document.getElementById('Response_is_checked').value;
        $http({
            method: 'POST',
            url: basePath+'/_teacher/_admin/response/updateResponseText/id/'+responseId,
            data: $jq.param({'response': text, 'publish':publish}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
        }).success(function(data){
            bootbox.alert(data, function(){
                $state.go("response/detail/:responseId", {responseId:responseId}, {reload: true});
            });
        }).error(function(data){
            bootbox.alert(data);
        })
    };

    $scope.deleteResponse = function(responseId){
        bootbox.confirm("Видалити відгук?", function (result) {
            if(result){
                $http({
                    method: 'POST',
                    url: basePath+'/_teacher/_admin/response/delete/id/'+responseId,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                }).success(function(){
                    bootbox.alert('Операцію виконано', function () {
                        $state.go('response', {}, {reload: true});
                    });
                }).error(function () {
                    bootbox.alert('Операцію не вдалося виконати.');
                })
            }
            else {
                bootbox.alert('Операцію відмінено.')
            }
        })

    };

    $scope.changeResponseStatus = function(responseId,status){
        var url;
        switch (status){
            case 'publish':
                url = basePath + '/_teacher/_admin/response/setpublish/id/'+responseId;
                break;
            case 'hide':
                url = basePath + '/_teacher/_admin/response/unsetpublish/id/'+responseId;
                break
        }
        bootbox.confirm("Змінити статус відгука?", function (result) {
            if(result){
                $http({
                    method: 'POST',
                    url: url,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                }).success(function(){
                    bootbox.alert("Операцію успішно виконано.",function() {
                        $scope.loadResponse($stateParams.responseId);
                    })
                }).error(function () {
                    bootbox.alert('Операцію не вдалося виконати.');
                })
            }
        })

    };
}
