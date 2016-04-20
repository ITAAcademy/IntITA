/**
 * Created by Wizlight on 15.02.2016.
 */
angular
    .module('mainApp')
    .controller('profileCtrl',profileCtrl);

function profileCtrl($http,$scope) {
    $scope.getProfileData=function (userId) {
        var promise = $http({
            url: basePath+'/studentreg/getProfileData',
            method: "POST",
            data: $.param({id: userId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            return response.data;
        }, function errorCallback() {
            return false;
        });
        return promise;
    };
    $scope.getProfileData(userId).then(function (response) {
        $scope.profileData=response;
        if(response.interests) $scope.interests=response.interests.split(',');
        var networksArr=[
            [$scope.profileData.facebook, 'Facebook'],
            [$scope.profileData.googleplus, 'Googleplus'],
            [$scope.profileData.linkedin, 'Linkedin'],
            [$scope.profileData.vkontakte, 'Vkontakte'],
            [$scope.profileData.twitter, 'Twitter']
        ];
        $scope.networks=[];
        for (var i = 0; i < networksArr.length; i++) {
            if (networksArr[i][0]) {
                $scope.networks.push(networksArr[i]);
            }
        }
    });
}