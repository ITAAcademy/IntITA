/**
 * Created by Wizlight on 03.04.2017.
 */

angular
    .module('teacherApp')
    .controller('mainSuperAdminCtrl', mainSuperAdminCtrl)
    .controller('bannersCtrl', bannersCtrl)
    .controller('bannersBootboxCtrl', bannersBootboxCtrl)

function mainSuperAdminCtrl($scope, $rootScope, $http) {
    $scope.getNewResponses=function(){
        $http({
            method:'POST',
            url: basePath + '/_teacher/_super_admin/response/getNewResponsesCount',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response){;
            $rootScope.countOfNewResponses=response;
        }).error(function(){
            console.log("Отримати дані про нові відгуки про викладачів не вдалося");
        })
    };
    $scope.getNewResponses();
}

function bannersCtrl($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox) {
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
        size: 'large'
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
        console.log(data);
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
