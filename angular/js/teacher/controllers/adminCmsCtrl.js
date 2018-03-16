angular
    .module('cmsApp')
    .controller('cmsMenuListCtrl', ['$scope','cmsService',
        function ($scope, cmsService) {
            $scope.changePageHeader('Menu list');

            $scope.loadCmsMenuList=function(){
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        $scope.lists=response;
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsMenuList();

            $scope.updateMenuLink=function(link){
                cmsService.updateMenuLink({data:angular.toJson(link)}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsMenuList();
                        $scope.newLink={id:null, description:null,link:null};
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };
            $scope.removeMenuLink=function(id){
                cmsService.removeMenuLink({id:id}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsMenuList();
                    }, function errorCallback(response) {
                        console.log(response);
                        bootbox.alert(response.data.reason);
                    });
            };
        }
        ])

        .controller('cmsNewsCtrl', ['$scope','cmsService',
            function ($scope, cmsService) {
                $scope.changePageHeader('Menu news');

                $scope.loadCmsNews=function(){
                    cmsService.newsList().$promise
                        .then(function successCallback(response) {
                            $scope.lists=response;
                        }, function errorCallback() {
                            bootbox.alert("Отримати дані списку новин не вдалося");
                        });
                };
                $scope.loadCmsNews();

                $scope.updateNews=function(link){
                    cmsService.updateNews({data:angular.toJson(link)}).$promise
                        .then(function successCallback() {
                            $scope.loadCmsNews();
                            $scope.newNews={id:null, description:null,link:null};
                        }, function errorCallback(response) {
                            bootbox.alert(response.data.reason);
                        });
                };
                $scope.removeNews=function(id){
                    cmsService.removeNews({id:id}).$promise
                        .then(function successCallback() {
                            $scope.loadCmsNews();
                        }, function errorCallback(response) {
                            bootbox.alert(response.data.reason);
                        });
                };
            }
        ]);