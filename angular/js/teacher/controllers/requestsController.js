/**
 * Created by adm on 20.09.2016.
 */
angular
    .module('teacherApp')
    .controller('requestsCtrl', requestsCtrl);

function requestsCtrl($scope, $http, $ngBootbox, $state, NgTableDataService, NgTableParams) {

    $scope.comment = "";

    $scope.initActiveRequests = function () {
        $scope.activeRequestsTable = new NgTableParams({
            sorting: {
                id: 'desc'
            },
        }, {
            getData: function (params) {
                NgTableDataService.setUrl(basePath + "/_teacher/_admin/request/getActiveRequestsList");
                return NgTableDataService.getData(params.url())
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
//        initActiveRequestsTable();
    }
    $scope.initApprovedRequests = function () {
        $scope.approwedRequestsTable = new NgTableParams({
            sorting: {
                id: 'desc'
            },
        }, {
            getData: function (params) {
                NgTableDataService.setUrl(basePath + "/_teacher/_admin/request/getApprovedRequestsList");
                return NgTableDataService.getData(params.url())
                    .then(function (data) {
                        console.log(data);
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
    }
    $scope.initDeletedRequests = function () {
        $scope.deletedRequestsTable = new NgTableParams({
            sorting: {
                id: 'desc'
            },
        }, {
            getData: function (params) {
                NgTableDataService.setUrl(basePath + "/_teacher/_admin/request/getDeletedRequestsList");
                return NgTableDataService.getData(params.url())
                    .then(function (data) {
                        console.log(data);
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
        //initDeletedRequestsTable();
    }
    $scope.initRejectedRevisionRequests = function () {
        $scope.rejectedRequestsTable = new NgTableParams({
            sorting: {
                id: 'desc'
            },
        }, {
            getData: function (params) {
                NgTableDataService.setUrl(basePath + "/_teacher/_admin/request/getRejectedRevisionRequestsList");
                return NgTableDataService.getData(params.url())
                    .then(function (data) {
                        console.log(data);
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
        //initRejectedRevisionRequestsTable();
    }

    //$scope.initActiveRequests();


    $scope.setRequestStatus = function (message, user) {
        $http({
            url: basePath + '/_teacher/_admin/request/approve',
            method: "POST",
            data: $jq.param({message: message, user: user}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function (response) {
                $scope.$emit('openMessage', '');
                $ngBootbox.alert('Операцію виконано успішно').then(
                    function () {
                        $state.go('requests');
                    }
                )
            }
        )
            .error(function (response) {
                $ngBootbox.alert(response.reason);
            });
    };

    $scope.setCoworkerRequest = function (message, user) {
        $http({
            url: basePath + '/_teacher/_admin/teachers/create',
            method: "POST",
            data: $jq.param({message: message, user: user}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function (response) {
                $ngBootbox.alert('Операцію виконано успішно').then(
                    function () {
                        $state.go('requests');
                    }
                )
            }
        )
            .error(function (response) {
                $ngBootbox.alert(response.reason);
            });
    };

    $scope.cancelMessage = function () {
        $ngBootbox.alert('Операцію відмінено.');
    }

    $scope.cancelRequest = function (message, user) {
        var comment = $jq('#rejectMessageText').val();
        $http({
            url: basePath + '/_teacher/_admin/request/reject',
            method: "POST",
            data: $jq.param({message: message, user: user, comment: comment}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function (response) {
                $ngBootbox.alert('Операцію виконано успішно').then(
                    function () {
                        $scope.$emit('openMessage', '');
                        $jq('#rejectMessageText').val("");
                        $state.go('requests');
                    }
                )
            }
        )
            .error(function (response) {
                console.log(response);
                $ngBootbox.alert(response.reason);
            });
    }

    $scope.deleteRequest = function (message, user) {
        $http({
            url: basePath + '/_teacher/_admin/request/delete',
            method: "POST",
            data: $jq.param({message: message, user: user}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function (response) {
                $ngBootbox.alert('Операцію виконано успішно').then(
                    function () {
                        $scope.$emit('openMessage', '');
                        $state.go('requests');
                    }
                )
            }
        )
            .error(function (response) {
                $ngBootbox.alert(response.reason);
            });
    }
}