angular
    .module('cmsApp')
    .controller('cmsMenuListCtrl', ['$scope','cmsService','$http',
        function ($scope, cmsService,$http) {
            $scope.changePageHeader('Menu list');

            $scope.loadCmsMenuList=function(){
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        if(response.length==0){
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
                                $scope.lists=response;
                            });
                        }

                        else{
                            $scope.lists=response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsMenuList();

            $scope.updateMenuLink=function(link,index,previousImage){
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if(index!==undefined){
                    var imageUpdateBlock = '#logoUpdate'+index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("logo",imageUpdate);
                    uploadImage.append("previousImage",previousImage);
                }
                else{
                    var image = $jq('#logo').prop('files')[0];
                    uploadImage.append("logo",image);
                }
                $http.post(basePath+'/_teacher/_admin/cms/updateMenuLink', uploadImage, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined },
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.loadCmsMenuList();
                    $scope.newLink={id:null, description:null,link:null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };
            $scope.removeMenuLink=function(id,image){
                cmsService.removeMenuLink({id:id,image:image}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsMenuList();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };
            $scope.getSettings = function () {
                cmsService.settingList().$promise
                    .then(function successCallback(response) {
                        if(response.length==0){
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response) {
                                $scope.settings=response;
                            });
                        }
                        else{
                            $scope.settings=response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            }
            $scope.getSettings();



            $scope.changeClass = function (e) {
                    $scope.linkColorSt = {color:  $scope.settings.footer_link_color};
            }
            $scope.changeClass1 = function (e) {
                 //   $scope.linkColorSt = {color:  $scope.settings.footer_hover_color};
            }

        }
        ])

    .controller('cmsNewsCtrl', ['$scope','cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Menu news');

            $scope.loadCmsNews=function(){
                cmsService.newsList().$promise
                    .then(function successCallback(response) {
                        if(response.length==0){
                            $http.get(basePath + '/files/cms/defaultMenu.json').success(function (response) {
                                $scope.lists=response;
                            });
                        }
                        else{
                            $scope.lists=response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsNews();

            $scope.updateNews=function(link,index,previousImage){
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if(index!==undefined){
                    console.log(previousImage);
                    var imageUpdateBlock = '#photoUpdate'+index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("photo",imageUpdate);
                    uploadImage.append("previousImage",previousImage);
                }
                else{
                    var image = $jq('#photo').prop('files')[0];
                    console.log(image);
                    uploadImage.append("photo",image);
                }
                $http.post(basePath+'/_teacher/_admin/cms/updateNews', uploadImage, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined },
                    transformRequest: angular.identity
                }).success(function () {
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