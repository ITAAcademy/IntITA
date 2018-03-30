'use strict';

/* Services */

angular
    .module('cmsApp')
    .factory('cmsService', ['$resource','transformRequest',
        function ($resource, transformRequest) {
            var url = basePath+'/_teacher/_admin/cms';
            return $resource(
                '',
                {},
                {
                    menuList: {
                        url: url + '/getMenuList',
                        method: 'GET',
                        isArray: true
                    },
                    updateMenuLink: {
                        url: url + '/updateMenuLink',
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        transformRequest : transformRequest.bind(null)
                    },
                    removeMenuLink: {
                        url: url + '/removeMenuLink',
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        transformRequest : transformRequest.bind(null)
                    },

                    newsList: {
                        url: url + '/getNews',
                        method: 'GET',
                        isArray: true
                    },
                    updateNews: {
                        url: url + '/updateNews',
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        transformRequest : transformRequest.bind(null)
                    },
                    removeNews: {
                        url: url + '/removeNews',
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        transformRequest : transformRequest.bind(null)
                    },
                    settingList:{
                        url: url + '/getSettings',
                        method: 'GET',
                        //isArray: true
                    },
                    updateSettings: {
                        url: url + '/updateSettings',
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        transformRequest : transformRequest.bind(null)
                    },



                });
        }])
