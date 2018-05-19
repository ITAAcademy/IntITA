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
            this.addCategory = function (data) {
                var promise = $http({
                    url: basePath + '/_teacher/library/libraryCategory/addCategory',
                    method: 'POST',
                    data: $jq.param({
                        data: data,
                    }),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    bootbox.alert('Ви успішно додали категорію');
                    return response.data.rows;
                }, function errorCallback() {
                    bootbox.alert("Помилка сервера. Спробуйте ще раз або зв'яжіться з адміністратором сайту.");
                    return false;
                });
                return promise;
            };
            this.sendFile = function (data) {
                var inputFile = document.getElementById(data.fileType);
                inputFile.addEventListener('change', function (ev) {
                    var localLink;
                    localLink = ev.target.files[0];
                    var fileBook = new FormData();
                    fileBook.append("file", localLink);
                    $http.post(basePath + '/_teacher/library/library/getBookFile', fileBook, {
                        withCredentials: true,
                        headers: {'Content-Type': undefined},
                        transformRequest: angular.identity
                    })
                        .then(function (response) {
                            if (data.fileType == "link") {
                                data.formData.link = response.data;
                            }
                            else {
                                data.formData.logo = response.data;
                            }
                        })
                });
            };
        }]);