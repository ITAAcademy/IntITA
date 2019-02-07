/**
 * Created by adm on 19.07.2016.
 */

angular
    .module('teacherApp')
    .controller('organizationTableCtrl', organizationTableCtrl)
    .controller('organizationCtrl', organizationCtrl)
    .controller('liqpayCtrl', liqpayCtrl)
    .controller('liqpayPaymentsCtrl', liqpayPaymentsCtrl)

function organizationTableCtrl ($scope, organizationService, NgTableParams){
    $scope.changePageHeader('Організації');

    $scope.organizationsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return organizationService
                .organizationsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function organizationCtrl ($scope, organizationService, $state, $stateParams){
    $scope.changePageHeader('Організація');

    $scope.loadOrganizationData=function(){
        var promise = organizationService.organizationData({'id':$stateParams.id}).$promise.then(
            function successCallback(response) {
                return response.data;
            }, function errorCallback() {
                bootbox.alert("Отримати дані організації не вдалося");
            });
        return promise;
    };
    if($stateParams.id)  $scope.loadOrganizationData().then(function (data) {$scope.organization=data});

    $scope.sendFormOrganization= function (scenario) {
        if(scenario=='new') $scope.createOrganization();
        else $scope.updateOrganization();
    };
    $scope.createOrganization= function () {
        organizationService.create($scope.organization).$promise.then(function (data) {
            if (data.message === 'OK') {
                bootbox.alert('Організацію успішно створено',function () {
                    $state.go("organizations", {}, {reload: true});
                });
            } else {
                bootbox.alert('Під час створення організації виникла помилка');
            }
        });
    };
    $scope.updateOrganization= function () {
        organizationService.update($scope.organization).$promise.then(function (data) {
            if (data.message === 'OK') {
                bootbox.alert('Організацію успішно оновлено',function () {
                    $state.reload();
                });
            } else {
                bootbox.alert('Під час оновлення організації виникла помилка');
            }
        });
    };
}

function liqpayCtrl ($scope, liqpayService){
    $scope.changePageHeader('LiqPay');

    $scope.loadLiqPayData=function(){
        liqpayService.liqpayData().$promise.then(
            function successCallback(response) {
                $scope.liqpay = response.data;
            }, function errorCallback() {
                bootbox.alert("Отримати дані не вдалося");
            });
    };
    $scope.loadLiqPayData();

    $scope.sendLiqPay= function (data) {
        liqpayService.create(data).$promise.then(function (data) {
            if (data.message === 'OK') {
                bootbox.alert('Операцію успішно виконано');
                $scope.loadLiqPayData();
            } else {
                bootbox.alert('Виникла помилка');
            }
        });
    };
}

function liqpayPaymentsCtrl ($scope, NgTableParams, liqpayService, ngToast){
    $scope.changePageHeader('Бібліотечні проплати');

    $scope.libraryPaymentsTableParams = new NgTableParams({
        sorting: {
            'date': 'desc',
        },
    }, {
        getData: function (params) {
            return liqpayService
                .getPayments(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.onSelectUser = function ($item) {
        $scope.selectedUser = $item;
    };
    $scope.reloadUser = function(){
        $scope.selectedUser=null;
    };
    $scope.onSelectLibrary = function ($item) {
        $scope.selectedLibrary = $item;
    };
    $scope.reloadLibrary = function(){
        $scope.selectedLibrary=null;
    };
    $scope.liqPayStatusRequest = function(){
        if($scope.selectedUser && $scope.selectedLibrary){
            liqpayService.getStatus({'order_id':$scope.order_id}).$promise.then(function (data) {
                if (data.message === 'OK') {
                    if (data.status === 'ok') {
                        ngToast.create({
                            dismissButton: true,
                            className: 'success',
                            content: 'Проплату знайдено та оновлено',
                            timeout: 3000
                        });
                    }else if(data.status === 'error'){
                        ngToast.create({
                            dismissButton: true,
                            className: 'danger',
                            content: 'Проплату не знайдено',
                            timeout: 3000
                        });
                    }

                    $scope.libraryPaymentsTableParams.reload();
                } else {
                    bootbox.alert('Виникла помилка');
                }
            });
        }else{
            bootbox.alert('Оберіть користувача та книгу');
        }
    };
}