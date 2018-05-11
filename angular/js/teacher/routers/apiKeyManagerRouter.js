angular
    .module('apiKeyManagerRouter',['ui.router'])
    .config(function ($stateProvider) {
        $stateProvider
            .state('apiKeyManager/addrole/:role', {
                url: "/apiKeyManager/addrole/:role",
                cache: false,
                templateUrl: function ($stateParams) {
                    console.log("OK");
                    return basePath + "/_teacher/_api_key_manager/role/renderAddRoleForm/role/" + $stateParams.role;
                }
            })
    });