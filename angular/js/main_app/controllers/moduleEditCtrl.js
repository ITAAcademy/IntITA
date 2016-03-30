/**
 * Created by Wizlight on 15.02.2016.
 */
angular
    .module('mainApp')
    .controller('moduleEditCtrl',moduleEditCtrl)

function moduleEditCtrl($http,$scope) {
        switch (lang) {
        case 'ua':
            $scope.saveMsg='Назву заняття змінено';
            $scope.msg='Ти впевнений, що хочеш видалити дане заняття?';
            break;
        case 'ru':
            $scope.saveMsg='Название занятия изменено';
            $scope.msg='Ты уверен, что хочешь удалить данное занятие?';
            break;
        case 'en':
            $scope.saveMsg='The lecture title edited';
            $scope.msg='Are you sure you want to remove this lecture?';
            break;
        default:
            $scope.saveMsg='Назву заняття змінено';
            $scope.msg='Ти впевнений, що хочеш видалити дане заняття?';
            break;
    }

    $scope.getModuleData=function (idModule) {
        $('#moduleLoading').show();
        var promise = $http({
            url: basePath+'/module/moduleData',
            method: "POST",
            data: $.param({id: idModule}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            return response.data;
        }, function errorCallback() {
            return false;
        });
        return promise;
    };
    $scope.getModuleData(idModule).then(function (response) {
        moduleListUpdate(response);
        $('#moduleLoading').hide();
    });

    $scope.upLecture=function (idLecture, idModule) {
        $('#lessonForm').hide();
        $http({
            url: basePath+'/module/upLesson',
            method: "POST",
            data: $.param({idLecture: idLecture,idModule: idModule}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getModuleData(idModule).then(function (response) {
                moduleHideEditField();
                moduleListUpdate(response);
                $('#moduleLoading').hide();
            });
        }, function errorCallback() {
            bootbox.alert('Не вдалось перемістити заняття');
        });
    };
    $scope.downLecture=function (idLecture, idModule) {
        $('#lessonForm').hide();
        $http({
            url: basePath+'/module/downLesson',
            method: "POST",
            data: $.param({idLecture: idLecture,idModule: idModule}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.getModuleData(idModule).then(function (response) {
                moduleHideEditField();
                moduleListUpdate(response);
                $('#moduleLoading').hide();
            });
        }, function errorCallback() {
            bootbox.alert('Не вдалось перемістити заняття');
        });
    }
    $scope.deleteLecture=function (idLecture, idModule) {
        $('#lessonForm').hide();

        bootbox.confirm($scope.msg, function(result){
            if(result){
                $http({
                    url: basePath+'/module/unableLesson',
                    method: "POST",
                    data: $.param({idLecture: idLecture,idModule: idModule}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback() {
                    $scope.getModuleData(idModule).then(function (response) {
                        moduleHideEditField();
                        moduleListUpdate(response);
                        $('#moduleLoading').hide();
                    });
                }, function errorCallback() {
                    bootbox.alert('Не вдалось дезактивувати заняття');
                });
            };
        })
    };

    $scope.showForm=function () {
        document.getElementById('lessonForm').style.display = 'block';
        $('html, body').animate({
            scrollTop: $("#titleUa").offset().top
        }, 1000);
    };
    $scope.hideForm=function (id) {
        $form = document.getElementById(id);
        $form.style.display = 'none';
    }
    $scope.saveTitle=function(idLecture,idModule,event){
        var lectureTitle=angular.element(event.currentTarget).prev().val();
        $http({
            url: basePath + '/module/UpdateLectureTitle',
            method: "POST",
            data: $.param({lectureId: idLecture,title:lectureTitle}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            if(response.data=='success'){
                $scope.getModuleData(idModule).then(function (response) {
                    moduleListUpdate(response);
                    $('#moduleLoading').hide();
                    bootbox.alert($scope.saveMsg, function () {
                        angular.element(event.currentTarget).next().click();
                    });
                });
            }else{
                bootbox.alert(response.data[0]);
            }
        }, function errorCallback() {
            bootbox.alert('Назву заняття змінити не вдалося');
        });
    }

    function moduleListUpdate(response){
        $scope.lectures=response;
        for(var i=0;i<$scope.lectures.rawData.length;i++){
            if($scope.lectures.rawData[i]['title_'+lang]=='')
                $scope.lectures.rawData[i].title=$scope.lectures.rawData[i].title_ua;
            else $scope.lectures.rawData[i].title=$scope.lectures.rawData[i]['title_'+lang];
        }
    }
    function moduleHideEditField(){
        angular.element(document.querySelectorAll(".moduleTitle")).show();
        angular.element(document.querySelectorAll(".editTitle")).hide();
    }
}
