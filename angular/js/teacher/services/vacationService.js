'use strict';

angular
    .module('teacherApp')
    .service('vacationService', ['$resource', 'transformRequest', '$http',
        function ($resource, transformRequest) {
            return $resource(
                '',
                {},
                {
                    list: {
                        url: basePath + '/_teacher/vacation/vacation/getVacationTypes',
                        method: 'GET',
                    },
                    getVacationType: {
                        url: basePath + '/_teacher/vacation/vacation/getVacationTypeData',
                        method: 'GET',
                    },
                    addVacationType : {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: basePath + '/_teacher/vacation/vacation/addVacationType',
                        transformRequest : transformRequest.bind(null)
                    },
                    getVacation: {
                        url: basePath + '/_teacher/vacation/vacation/getVacationData',
                        method: 'GET',
                    },
                    create: {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: basePath + '/_teacher/vacation/vacation/addVacation',
                        transformRequest : transformRequest.bind(null)
                    },
                    vacationList: {
                        url: basePath + '/_teacher/vacation/vacation/getVacationList',
                        method: 'GET'
                    },
                });
        }]);