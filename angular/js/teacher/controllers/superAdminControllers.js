/**
 * Created by Wizlight on 03.04.2017.
 */

angular
    .module('teacherApp')
    .controller('mainSuperAdminCtrl', mainSuperAdminCtrl)
    .controller('bannersCtrl', bannersCtrl)
    .controller('bannersBootboxCtrl', bannersBootboxCtrl)
    .controller('subdomainsCtrl', subdomainsCtrl)
    .controller('bannersForGraduatesCtrl',bannersForGraduatesCtrl)
    .controller('bannersForGraduatesBootboxCtrl',bannersForGraduatesBootboxCtrl)

function mainSuperAdminCtrl($scope, $rootScope, $http) {
    $scope.getNewResponses=function(){
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/response/getNewResponsesCount',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response){;
            $rootScope.countOfNewResponses=response[0];
            $rootScope.countOfNewCities=response[1];
        }).error(function(){
            console.log("Отримати дані про нові відгуки про викладачів не вдалося");
        })
    };
    $scope.getNewResponses();
}

function bannersCtrl($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox, ngToast) {
    $scope.bannersTableUrl = basePath + '/_teacher/_super_admin/banners/list';
    $scope.bannersTableData = new NgTableParams({}, {
        getData: function(params) {
            NgTableDataService.setUrl($scope.bannersTableUrl);
            return NgTableDataService.getData(params.url())
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }

    });


    $scope.changeBannerStatus = function(bannerId, status){
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/banners/setAttribute',
            data:$jq.param({id:bannerId,attribute:'visible',value:1}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.bannersTableData.reload();

        })
    }

    $scope.dialogOptions = {
        size: 'large',
    };

    $scope.onDropComplete = function (position,bannerId, evt) {

        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/banners/changeBannerPosition',
            data:$jq.param({id:bannerId.id,position:position.slide_position}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.bannersTableData.reload();
        })

    }

    $scope.changeUrl = function (bannerId,newUrl) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/banners/setAttribute',
            data:$jq.param({id:bannerId,attribute:'url',value:newUrl}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                ngToast.create({
                    className: 'success',
                    content: 'Адресу змінено!'
                });
                $scope.bannersTableData.reload();
            }
            else{
                $ngBootbox.alert(response.message)
            }
        })
    }

    $scope.deleteBanner = function (bannerId) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/banners/deleteBanner',
            data:$jq.param({id:bannerId}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                ngToast.create({
                    className: 'success',
                    content: 'Банер видалено!'
                });
                $scope.bannersTableData.reload();
            }
        })
    };

    $scope.chandeState = function (bannerId,state) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/banners/setAttribute',
            data:$jq.param({id:bannerId,attribute:'visible', value: parseInt((!parseInt(state,10)*1),10)}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                $scope.bannersTableData.reload();
            }
        })
    };

    //Костыль для обновления NgTable
    $scope.$on('reloadNgTable', function (event, data) {
        $scope.bannersTableData.reload();
    });

}

function bannersBootboxCtrl($scope, $rootScope, FileUploader, $ngBootbox) {

    $scope.bannerUploader = new FileUploader({
        queueLimit: 1,
        url: basePath+'/_teacher/_super_admin/banners/addBannerImage',
        removeAfterUpload: true
    });
    $scope.bannerUploader.onCompleteAll = function () {
        //Костыль для обновления NgTable
        $rootScope.$broadcast('reloadNgTable', true);
        $ngBootbox.hideAll();
    };
}

function subdomainsCtrl($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox, ngToast) {
       $scope.subdomainsTableUrl = basePath + '/_teacher/_super_admin/subdomains/list';
       $scope.subdomainsTableData = new NgTableParams({}, {
        getData: function(params) {
         NgTableDataService.setUrl($scope.subdomainsTableUrl);
         return NgTableDataService.getData(params.url())
         .then(function (data) {
          params.total(data.count);
          return data.rows;
         });
        }
       });
 
     $scope.addSubdomain = function (subdomain) {
      $http({
       method:'POST',
       url: basePath + '/_teacher/_super_admin/subdomains/addSubdomain',
       data:$jq.param({subdomain:subdomain}),
       headers:{'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (response) {
       if (response.data === true){
        ngToast.create({
         className: 'success',
         content: 'Субдомен додано!'
        });
        $scope.subdomainsTableData.reload();
       }
       else{
        $ngBootbox.alert(response.message)
       }
      })
     }
     
     $scope.changeActive = function (subdomainId,state) {
      $http({
       method:'POST',
       url: basePath + '/_teacher/_super_admin/subdomains/changeSubdomain',
       data:$jq.param({id:subdomainId,attribute:'active', value: parseInt((!parseInt(state,10)*1),10)}),
       headers:{'Content-Type': 'application/x-www-form-urlencoded'}
      }).success(function (response) {
       if (response.data === true){
        ngToast.create({
         className: 'success',
         content: 'Субдомен змінено!'
        });
        $scope.subdomainsTableData.reload();
       }
       else {
        ngToast.create({
         className: 'error',
         content: response.message,
        });
       }
      })
     };
     
}

function bannersForGraduatesCtrl($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox, ngToast) {
    $scope.bannersForGraduatesTableUrl = basePath + '/_teacher/_super_admin/bannersForGraduates/list';
    $scope.bannersForGraduatesTableData = new NgTableParams({}, {
        getData: function(params) {
            NgTableDataService.setUrl($scope.bannersForGraduatesTableUrl);
            return NgTableDataService.getData(params.url())
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
    $scope.changeBannerStatus = function(bannerId, status){
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/setAttribute',
            data:$jq.param({id:bannerId,attribute:'visible',value:1}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.bannersForGraduatesTableData.reload();
        })
    }
    $scope.dialogOptions = {
        size: 'large',
    };
    $scope.onDropComplete = function (position,bannerId, evt) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/changeBannerPosition',
            data:$jq.param({id:bannerId.id,position:position.slide_position}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.bannersForGraduatesTableData.reload();
        })
    }
    $scope.changeUrl = function (bannerId,newUrl) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/setAttribute',
            data:$jq.param({id:bannerId,attribute:'url',value:newUrl}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                ngToast.create({
                    className: 'success',
                    content: 'Адресу змінено!'
                });
                $scope.bannersForGraduatesTableData.reload();
            }
            else{
                $ngBootbox.alert(response.message)
            }
        })
    }
    $scope.changeTitle = function (bannerId,newTitle) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/setTitle',
            data:$jq.param({id:bannerId,attribute:'text',value:newTitle}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                ngToast.create({
                    className: 'success',
                    content: 'Назву змінено!'
                });
                $scope.bannersForGraduatesTableData.reload();
            }
            else{
                $ngBootbox.alert(response.message)
            }
        })
    }
    $scope.deleteBanner = function (bannerId) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/deleteBanner',
            data:$jq.param({id:bannerId}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                ngToast.create({
                    className: 'success',
                    content: 'Банер видалено!'
                });
                $scope.bannersForGraduatesTableData.reload();
            }
        })
    };
    $scope.chandeState = function (bannerId,state) {
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/bannersForGraduates/setAttribute',
            data:$jq.param({id:bannerId,attribute:'visible', value: parseInt((!parseInt(state,10)*1),10)}),
            headers:{'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            if (response.data === true){
                $scope.bannersForGraduatesTableData.reload();
            }
        })
    };
    //Костыль для обновления NgTable
    $scope.$on('reloadNgTable', function (event, data) {
        $scope.bannersForGraduatesTableData.reload();
    });
}

function bannersForGraduatesBootboxCtrl($scope, $rootScope, FileUploader, $ngBootbox) {
    $scope.bannerForGraduatesUploader = new FileUploader({
        queueLimit: 1,
        url: basePath+'/_teacher/_super_admin/bannersForGraduates/addBannerImage',
        removeAfterUpload: true
    });
    $scope.bannerForGraduatesUploader.onCompleteAll = function () {
        //Костыль для обновления NgTable
        $rootScope.$broadcast('reloadNgTable', true);
        $ngBootbox.hideAll();
    };
}