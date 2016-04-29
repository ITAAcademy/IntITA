/**
 * Created by Wizlight on 03.11.2015.
 */
angular
    .module('lectureRevisionApp')
    .controller('lectureRevisionCtrl',lectureRevisionCtrl);

function lectureRevisionCtrl($rootScope,$scope, $http, getLectureData) {
    //load from service lecture data for scope
    getLectureData.getData(idRevision).then(function(response){
        $rootScope.lectureData=response;
    });

    $scope.editPageRevision = function(pageId) {
        location.href=basePath+'/revision/editPageRevision?idPage='+pageId;
    };

    $scope.previewRevision = function(url) {
        location.href=url;
    };
    //send revision for approve
    $scope.sendRevision = function(id) {
        $http({
            url: basePath+'/revision/sendForApproveLecture',
            method: "POST",
            data: $.param({idRevision: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            getLectureData.getData(idRevision).then(function(response){
                $rootScope.lectureData=response;
                location.href=basePath+'/revision/previewLectureRevision?idRevision='+idRevision;
            });
        }, function errorCallback() {
            bootbox.alert("Відправити заняття на затвердження не вдалося. Зв'яжіться з адміністрацією");
            return false;
        });
    };
    //add new page for lecture revision
    $scope.addPage = function() {
        $http({
            url: basePath+'/revision/addPage',
            method: "POST",
            data: $.param({idRevision:idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            getLectureData.getData(idRevision).then(function(response){
                $rootScope.lectureData=response;
                $('body,html').animate({scrollTop: $(document).height()}, 500);
            });
        }, function errorCallback(response) {
            if(response.status==403){
                bootbox.alert('У вас недостатньо прав для редагування сторінки.');
            }
            return false;
        });
    };
    //reorder pages
    $scope.up = function(pageId) {
        $http({
            url: basePath+'/revision/upPage',
            method: "POST",
            data: $.param({idPage:pageId, idRevision: idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            getLectureData.getData(idRevision).then(function(response){
                $rootScope.lectureData=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.down = function(pageId) {
        $http({
            url: basePath+'/revision/downPage',
            method: "POST",
            data: $.param({idPage:pageId, idRevision: idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            getLectureData.getData(idRevision).then(function(response){
                $rootScope.lectureData=response;
            });
        }, function errorCallback() {
            return false;
        });
    };
    $scope.delete = function(pageId) {
        //$http({
        //    url: basePath+'/revision/deletePage',
        //    method: "POST",
        //    data: $.param({idPage:pageId}),
        //    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        //}).then(function successCallback() {
        //    getLectureData.getData(idRevision).then(function(response){
        //        $rootScope.lectureData=response;
        //    });
        //}, function errorCallback() {
        //    return false;
        //});
    };
    //check whether you can send the lecture for approval
    $scope.checkLecture = function() {
        $http({
            url: basePath+'/revision/checkLecture',
            method: "POST",
            data: $.param({idRevision:idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data);
        }, function errorCallback() {
            console.log('checkLecture error');
            return false;
        });
    };
    //approve lecture
    $scope.approveLecture = function() {
        $http({
            url: basePath+'/revision/sendForApproveLecture',
            method: "POST",
            data: $.param({idLecture:idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            bootbox.alert('Запит на підтвердження відправлено', function () {
                location.href = basePath+'/revision/previewLectureRevision?idRevision=' + idRevision;
            });
        }, function errorCallback(response) {
            console.log('error '+response.status);
            return false;
        });
    };
}
