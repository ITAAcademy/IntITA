'use strict';

/* Services */

angular
    .module('teacherApp')
    .factory('liqpayService', ['$resource','transformRequest',
        function ($resource, transformRequest) {
            var url = basePath+'/_teacher/_director/liqpay';
            return $resource(
                '',
                {},
                {
                    create: {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: url + '/createLiqpay',
                        transformRequest : transformRequest.bind(null)
                    },
                    liqpayData: {
                        method: 'GET',
                        url: url + '/getLiqpay',
                    },
                });
        }])