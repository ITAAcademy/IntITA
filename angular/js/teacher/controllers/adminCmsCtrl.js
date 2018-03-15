angular
    .module('cmsApp')
    .controller('cmsMenuListCtrl', ['$scope','cmsService','$http',
        function ($scope, cmsService,$http) {
            $scope.changePageHeader('Menu list');

            $scope.loadCmsMenuList=function(){
                cmsService.menuList().$promise
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
        }
        ]);