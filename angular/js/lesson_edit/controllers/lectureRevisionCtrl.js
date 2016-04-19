/**
 * Created by Wizlight on 18.04.2016.
 */
angular
    .module('lectureRevision')
    .controller('lectureRevisionCtrl', lectureRevisionCtrl);

function lectureRevisionCtrl($scope, $http) {
    $scope.getLecturePages = function(id) {
        var promise = $http({
            url: basePath+'/revision/lecturePages',
            method: "POST",
            data: $.param({idRevision: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            return response.data;
        }, function errorCallback() {
            return false;
        });
        return promise;
    };
    $scope.getLecturePages(idRevision).then(function (response) {
        $scope.dataPages=response;
    });

    $scope.viewPage = function(pageId) {
        alert ('dummy '+pageId);
    };
    $scope.editPageRevision = function(pageId) {
        location.href=basePath+'/revision/editPageRevision?idPage='+pageId;
    };
    $scope.sendRevision = function(pageId) {
        $http({
            url: basePath+'/revision/sendPageRevision',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.approvePageRevision = function(pageId) {
        $http({
            url: basePath+'/revision/approvePageRevision',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.rejectPageRevision = function(pageId) {
        $http({
            url: basePath+'/revision/rejectPageRevision',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.cancelPageRevision = function(pageId) {
        $http({
            url: basePath+'/revision/cancelPageRevision',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.addPage = function() {
        $http({
            url: basePath+'/revision/addpage',
            method: "POST",
            data: $.param({idRevision:idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
                $('body,html').animate({scrollTop: $(document).height()}, 500);
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.up = function(pageId) {
        $http({
            url: basePath+'/revision/upPage',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.down = function(pageId) {
        $http({
            url: basePath+'/revision/downPage',
            method: "POST",
            data: $.param({idPage:pageId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getLecturePages(idRevision).then(function (response) {
                $scope.dataPages=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.delete = function(pageId) {
        //$http({
        //    url: basePath+'/revision/',
        //    method: "POST",
        //    data: $.param({idPage:pageId}),
        //    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        //}).then(function successCallback() {
        //    $scope.getLecturePages(idRevision).then(function (response) {
        //        $scope.dataPages=response;
        //    });
        //}, function errorCallback() {
        //    return false;
        //});
    };


}