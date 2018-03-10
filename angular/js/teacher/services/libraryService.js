'use strict';

angular
    .module('teacherApp')
    .service('libraryService',['$resource','transformRequest', '$http',
        function ($resource, transformRequest,$http) {
            var url = basePath + '/_teacher/library/library';
            this.booksList = function (data) {
                var promise = $http({
                    url: url + '/getLibraryList',
                    method: "GET",
                    params:data,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.addBook = function(data){
                var promise = $http({
                    url: url + '/addBook',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.getCategory = function(){
                var promise = $http({
                    url: basePath+'/_teacher/library/libraryCategory/getCategory',
                    method: 'GET',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.editBook = function(data){
                var promise = $http({
                    url: url + '/updateLibraryData',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.addCategory = function(data){
                var promise = $http({
                    url: basePath+'/_teacher/library/libraryCategory/addCategory',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
        }]);