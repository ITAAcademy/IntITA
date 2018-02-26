/**
 * Created by adm on 19.07.2016.
 */
angular
    .module('teacherApp')
    .controller('trainerStudentsCtrl', trainerStudentsCtrl)
    .controller('trainersStudentViewCtrl', trainersStudentViewCtrl)
    .controller('studentsProjectsCtrl', studentsProjectsCtrl)
    .factory('myFactory', myFactory);

function myFactory() {
    return {
        careerTbl: '',
        visitTbl: ''
    }
}


function trainerStudentsCtrl($scope, trainerService, NgTableParams){
    $scope.changePageHeader('Закріплені студенти');
    $scope.trainersStudentsTableParams = new NgTableParams({
        sorting: {
            "start_time": 'desc'
        },
    }, {
        getData: function (params) {
            return trainerService
                .trainersStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function trainersStudentViewCtrl($scope, trainerService, NgTableParams){
    $scope.trainersStudentsTableParams = new NgTableParams({
        sorting: {
            "start_time": 'desc'
        },
    }, {
        getData: function (params) {
            return trainerService
                .trainersStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function studentsProjectsCtrl($scope, NgTableDataService, NgTableParams, $http, $state, $stateParams) {
    NgTableDataService.setUrl(basePath+'/_teacher/_trainer/trainer/getStudentsProjectList');
    $scope.studentProjectTable = new NgTableParams({
        sorting: {
        },
    }, {
        getData: function(params) {
            return NgTableDataService.getData(params.url())
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.approveProject = function (projectId) {
        bootbox.confirm('Затвердити проект?',function (result) {
            if (result){
                $http({
                    method: 'POST',
                    url: basePath+"/_teacher/_trainer/trainer/approveStudentProject",
                    data: $jq.param({id: projectId}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    bootbox.alert(response.data.message, function () {
                        $scope.studentProjectTable.reload();
                    });
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        })
    }

    $scope.viewProject = function (projectId) {
        bootbox.confirm('Переглянути останню версію проекту?',function (result) {
            if (result){
                $http({
                    method: 'POST',
                    url: basePath+"/_teacher/_trainer/trainer/viewStudentProject",
                    data: $jq.param({id: projectId}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    bootbox.alert(response.data.message, function () {
                        $scope.studentProjectTable.reload();
                    });
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        })
    };

    if ($state.is('studentsProject')){
        $scope.files = $http({
            method:'GET',
            url: basePath+'/_teacher/_trainer/trainer/getProjectFiles/projectId/'+$stateParams.projectId
        }).then(function (response) {
            $scope.files = response.data;
        });

        $scope.getFileContent = function () {
            $http({
                method:'GET',
                url: basePath+'/_teacher/_trainer/trainer/getFileContent'
            }).then(function (response) {
                $scope.file = response.data;
            });
        }

        $scope.$watch( 'projectFiles.currentNode', function( newObj, oldObj ) {
            if( $scope.projectFiles && angular.isObject($scope.projectFiles.currentNode) ) {
                $http({
                    method:'GET',
                    url: basePath+'/_teacher/_trainer/trainer/getFileContent?path='+$scope.projectFiles.currentNode.path+'&fileName='+$scope.projectFiles.currentNode.name,
                }).then(function (response) {
                    $scope.file = response.data;
                });
            }
        }, false);

    }

}