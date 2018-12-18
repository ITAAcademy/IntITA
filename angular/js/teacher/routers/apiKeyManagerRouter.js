angular
    .module('apiKeyManagerRouter',['ui.router'])
    .config(function ($stateProvider) {
        $stateProvider
            .state('apiKeyManager', {
                url: "/api_key_manager",
                controller: function($scope){
                    $scope.changePageHeader('Api Key Manager');
                },
                templateUrl: basePath+"/_teacher/_api_key_manager/apiKeyManager/index",
            })
            .state('apiKeyManager/addrole/:role', {
                url: "/apiKeyManager/addrole/:role",
                cache: false,
                templateUrl: function ($stateParams) {
                    console.log("OK");
                    return basePath + "/_teacher/_api_key_manager/role/renderAddRoleForm/role/" + $stateParams.role;
                }
            })
    });