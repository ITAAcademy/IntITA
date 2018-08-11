angular
    .module('cmsDomainApp', ['ui.bootstrap', 'ngResource'])
    .run(['$rootScope','$http',
        function ($rootScope, $http) {
            $http.get(basePath + '/subdomainCms/subdomainName',{params: {base_path: basePath}}).success(function (response) {
                $rootScope.subDomainPath = response;
            });
        }
    ])
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
    .controller('mainCmsCtrl', ['$scope', '$http','cmsDomainService','$q', function ($scope, $http,cmsDomainService, $q) {
        $scope.myInterval = 3000;
        $scope.active = 0;

        $q.all([
            cmsDomainService.settingList(),
            cmsDomainService.menuList(),
            cmsDomainService.newsList(),
            cmsDomainService.menuSlider(),
        ])
            .then(function (response) {
                console.log(response);
                $scope.settings = response[0];
                $scope.listsItemMenu = response[1];
                $scope.news = response[2];
                $scope.slides = response[3];
            })
            .catch(function (error) {
                console.log(error)
                alert('Помилка завантаження данних')
            });
    }])
    .controller('sliderCtrl', ['$scope', '$http',
        function ($scope, $http) {
            $scope.myInterval = 3000;
            $scope.active = 0;

            $http.get(basePath + '/_teacher/_admin/cms/getMenuSlider').then(function successCallback(response) {
                if (response.data.length == 0) {
                    $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                        $scope.slides = response;
                        for (var i = 0; i < $scope.slides.length; i++) {
                            $scope.slides[i].src = generateRelativePath($scope.slides[i].src);
                        }
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

function generateRelativePath(src) {
    return basePath + '/domains/' + src;
}