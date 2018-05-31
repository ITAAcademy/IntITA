'use strict';

angular
    .module('teacherApp')
    .service('libraryService', ['$resource', 'transformRequest', '$http',
        function ($resource, transformRequest, $http) {
            var url = basePath + '/_teacher/library/library';
            this.booksList = function (data) {
                var promise = $http({
                    url: url + '/getLibraryList',
                    method: "GET",
                    params: data,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.addBook = function (data) {
                var promise = $http({
                    url: url + '/addBook',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    bootbox.alert("Ви успішно додали книгу!");
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.getCategory = function () {
                var promise = $http({
                    url: basePath + '/_teacher/library/libraryCategory/getCategory',
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
            this.editBook = function (data) {
                var link = document.getElementById('link').files[0];
                var logo = document.getElementById('logo').files[0];
                var filesBook = new FormData();
                filesBook.append("link", link);
                filesBook.append("logo", logo);
                if (link != undefined){
                    data.data.link = link.name;
                }
                if (logo != undefined){
                    data.data.logo = logo.name;
                }
                $http.post(url+'/getBookFile', filesBook, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                });
                var promise = $http({
                    url: url + '/updateLibraryData',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    bootbox.alert("Ви успішно обновили книгу!");
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.sendFile = function (data) {
                    var localLink = document.getElementById('link').files[0];
                    data.formData.link = localLink.name;
                    var fileBook = new FormData();
                    fileBook.append("file", localLink);
                    $http.post(basePath + '/_teacher/library/library/getBookFile', fileBook, {
                        withCredentials: true,
                        headers: {'Content-Type': undefined},
                        transformRequest: angular.identity
                    })
            };
            this.sendLogo = function (data) {
                var localLink = document.getElementById('logo').files[0];
                data.formData.logo = localLink.name;
                var fileBook = new FormData();
                fileBook.append("file", localLink);
                $http.post(basePath + '/_teacher/library/library/getBookFile', fileBook, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                })
            };

            return $resource(
                '',
                {},
                {
                    addCategory : {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: basePath + '/_teacher/library/libraryCategory/addCategory',
                        transformRequest : transformRequest.bind(null)
                    },
                });
        }]);