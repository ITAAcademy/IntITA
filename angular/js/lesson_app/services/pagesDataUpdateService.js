/**
 * Created by Wizlight on 10.12.2015.
 */
angular
    .module('lessonApp')
    .service('pagesUpdateService', [
        '$rootScope','$http',
        function($rootScope, $http) {
            this.pagesDataUpdate = function (){
                $http({
                    url: basePath + '/lesson/GetPageData',
                    method: "POST",
                    data: $.param({lecture: idLecture}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function(response){
                    $rootScope.pageData = response.data;
                    var count = $rootScope.pageData.length;

                    for (var i = 0; i < count; i++) {
                        $rootScope.totalPages = count;
                        if (i == (count - 1) && $rootScope.pageData[i]['isDone']){
                            $rootScope.lastAccessPage = i+1;
                            $rootScope.pageChanged=!$rootScope.pageChanged;
                            break;
                        }
                        if ($rootScope.pageData[i]['isDone'] && !$rootScope.pageData[i+1]['isDone']){
                            $rootScope.lastAccessPage = i+1;
                            $rootScope.pageChanged=!$rootScope.pageChanged;
                            break;
                        }
                    }
                });
            };
            this.updateRating = function (){
                $http({
                    url: basePath + '/lesson/updateRating',
                    method: "POST",
                    data: $.param({lecture: idLecture}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function(response){
                    $rootScope.lectureRating = Number(response.data);
                });
            };
        }
    ]);