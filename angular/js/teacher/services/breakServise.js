'use strict';

angular
    .module('teacherApp')
    .service('breakService', [
        '$http',
        function($http) {
            this.getBreaksList = function () {
                var promise = $http({
                    url: basePath + "/studentreg/getBreaksList",
                    method: "POST",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
                }).then(function successCallback(response) {
                    return response.data;
                }, function errorCallback() {
                    console.log("Виникла помилка при завантажені варіантів причин. Зв'яжіться з адміністратором сайту.");
                });
                return promise;
            };
        }
    ]);