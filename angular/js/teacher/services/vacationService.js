'use strict';

angular
    .module('teacherApp')
    .service('vacationService', ['$resource', 'transformRequest', '$http',
        function ($resource, transformRequest) {
            var url = basePath + "/_teacher/vacation";
            return $resource(
                '',
                {},
                {
                    list: {
                        url: url + '/vacation/getVacationTypes',
                        method: 'GET',
                    },
                    getVacationType: {
                        url: url + '/vacation/getVacationTypeData',
                        method: 'GET',
                    },
                    addVacationType : {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: url + '/vacation/addVacationType',
                        transformRequest : transformRequest.bind(null)
                    },
                    getVacation: {
                        url: url + '/vacation/getVacationData',
                        method: 'GET',
                    },
                    create: {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: url + '/vacation/addVacation',
                        transformRequest : transformRequest.bind(null)
                    },
                    vacationList: {
                        url: url + '/vacation/getVacationList',
                        method: 'GET'
                    },
                });
        }]);