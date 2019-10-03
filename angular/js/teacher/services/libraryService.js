'use strict';

angular
    .module('teacherApp')
    .service('libraryService', ['$resource', 'transformRequest', '$http',
        function ($resource, transformRequest) {
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
                    getCategories: {
                        url: basePath + '/_teacher/library/libraryCategory/getCategories',
                        method: 'GET',
                    },
                    getCategory: {
                        url: basePath + '/_teacher/library/libraryCategory/getCategory',
                        method: 'GET',
                    },
                    list: {
                        url: basePath + '/_teacher/library/library/getLibraryList',
                        method: 'GET',
                    },
                    create: {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: basePath + '/_teacher/library/library/addBook',
                        transformRequest : transformRequest.bind(null)
                    },
                    getLibrary: {
                        url: basePath + '/_teacher/library/library/getLibraryData',
                        method: 'GET',
                    },
                    changeStatus: {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'},
                        url: basePath + '/_teacher/_director/liqpay/changeStatus',
                        transformRequest : transformRequest.bind(null)
                    },
                });
        }]);