'use strict';

/* Services */

angular
    .module('cmsDomainApp')
    .factory('cmsDomainService', ['$resource','transformRequest',
        function ($resource, transformRequest) {
            var url = '_teacher/_admin/cms';
            return $resource(
                '',
                {},
                {
                    menuList: {
                        url: url + '/getMenuList',
                        method: 'GET',
                        isArray: true
                    },
                    newsList: {
                        url: url + '/getNews',
                        method: 'GET',
                        isArray: true
                    },
                    settingList:{
                        url: url + '/getSettings',
                        method: 'GET',
                    },
                    domainPath: {
                        url: url + '/getDomainPath',
                        method: 'GET',
                    },
                    menuSlider: {
                        url: url + '/getMenuSlider',
                        method: 'GET',
                        isArray: true
                    }
                });
        }])
