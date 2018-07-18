angular
    .module('cmsDomainApp', ['ui.bootstrap', 'ngResource'])
    .filter('isNotLink', function() {
        return function (input) {
            return input.indexOf("https://")==-1 && input.indexOf("http://")==-1
        };
    })
    .factory('transformRequest', ['$filter', function ($filter) {
        /* https://github.com/knowledgecode/jquery-param/blob/master/jquery-param.js */
        return function transformRequest(a) {
            var s = [], rbracket = /\[\]$/,
                isArray = function (obj) {
                    return Object.prototype.toString.call(obj) === '[object Array]';
                },
                add = function (k, v) {
                    v = typeof v === 'function' ? v() : v === null ? '' : v === undefined ? '' : v;
                    if (v instanceof Date) {
                        v = $filter('date')(v, 'yyyy-MM-dd HH:mm:ss')
                    }
                    s[s.length] = encodeURIComponent(k) + '=' + encodeURIComponent(v);
                },
                buildParams = function (prefix, obj) {
                    var i, len, key;

                    if (prefix) {
                        if (isArray(obj)) {
                            for (i = 0, len = obj.length; i < len; i++) {
                                if (rbracket.test(prefix)) {
                                    add(prefix, obj[i]);
                                } else {
                                    buildParams(prefix + '[' + (typeof obj[i] === 'object' ? i : '') + ']', obj[i]);
                                }
                            }
                        } else if (obj && String(obj) === '[object Object]') {
                            for (key in obj) {
                                buildParams(prefix + '[' + key + ']', obj[key]);
                            }
                        } else {
                            add(prefix, obj);
                        }
                    } else if (isArray(obj)) {
                        for (i = 0, len = obj.length; i < len; i++) {
                            add(obj[i].name, obj[i].value);
                        }
                    } else {
                        for (key in obj) {
                            buildParams(key, obj[key]);
                        }
                    }
                    return s;
                };

            return buildParams('', a).join('&').replace(/%20/g, '+');
        }

    }])
    .controller('mainCmsCtrl', ['$scope', '$http','cmsDomainService','$rootScope' , function ($scope, $http,cmsDomainService,$rootScope) {
        // basePath = window.location.protocol + "//" + window.location.host;
        basePath = window.location.protocol + "//" + window.location.host + '/IntITA';
        cmsDomainService.menuList().$promise
            .then(function successCallback(response) {
                console.log(response)
                $scope.listsItemMenu = response;
            }, function errorCallback(error) {
                console.log(error)
                alert("Отримати дані списку меню не вдалося");
            });
        // $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
        //     $scope.listsItemMenu = response;
        // });
        $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response) {
            $scope.settings = response;
        });
        $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response) {
            $scope.news = response;
        });
    }])
    .controller('sliderCtrl', ['$scope', '$http',
        function ($scope, $http) {
            $scope.myInterval = 3000;
            $scope.active = 0;

            // cmsService.domainPath().$promise
            //     .then(function successCallback(response) {
            //         $scope.domainPath = response.domainPath+'/carousel/';
            $http.get(basePath + '/_teacher/_admin/cms/getMenuSlider').then(function successCallback(response) {
                if (response.data.length == 0) {
                    $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                        $scope.slides = response;
                    });
                } else {
                    $scope.slides = response;
                    for(var i=0; i<$scope.slides.length; i++){
                        $scope.slides[i].src = $scope.domainPath+$scope.slides[i].src;
                    }
                }
            }, function errorCallback() {
                bootbox.alert("Отримати дані списку меню не вдалося");
            });
        }
    ])