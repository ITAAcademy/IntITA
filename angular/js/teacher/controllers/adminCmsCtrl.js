angular
    .module('cmsApp')
    .controller('cmsCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.domainPath = domainPath;
            $scope.domainPathNews = domainPathNews;
            $scope.data;
            $scope.buttonShow;



            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPathLogo = response.domainPath+'/logo/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.changePageHeader('Конструктор сайту');

            $scope.loadCmsMenuList = function () {
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
                                $scope.listsItemMenu = response;
                            });
                        } else {
                            $scope.listsItemMenu = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsMenuList();

            $scope.getSettings = function () {
                cmsService.settingList().$promise
                    .then(function successCallback(response) {
                        if (!response.id) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response) {
                                $scope.settings = response;
                            });
                        }
                        else {
                            $scope.settings = response;
                        }
                        $scope.buttonShow=true;
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });


            };
            $scope.getSettings();

            $scope.updateSettings = function (link,  previousImage) {
                var uploadSettings = new FormData(); // для того щоб передати дані з файлу в БД використовується  FormData()
                uploadSettings.append("data", angular.toJson(link));  //.append Вставляет содержимое, заданное параметром, в конец каждого элемента в наборе соответствующих элементов
                var imageUpdateBlock = '#logoUpdate';
                var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];  //Возвращает / изменяет значение свойств выбранных элементов.
                uploadSettings.append("photo", imageUpdate);               // записуємо нову картинку в БД
                uploadSettings.append("previousImage", previousImage);  // записуємо стару картинку
                $http.post(basePath + '/_teacher/_admin/cms/UpdateSettings', uploadSettings, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.getSettings();
                    bootbox.alert('Дані успішно збережені!');
                    $scope.newSettings = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });

            };

            $scope.showDefaultSettings =function (){
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response1) {
                                $scope.listsItemMenu = response1;
                            });
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response2) {
                                $scope.settings = response2;
                            });
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response3) {
                                $scope.lists = response3;
                                for (var i=0; i<$scope.lists.length; i++){
                                    $scope.lists[i].strLimit=500;
                                }
                            });
                        $scope.buttonShow=false;
                    };

            $scope.mySettings=function (){
                $scope.loadCmsMenuList();
                $scope.getSettings();
                $scope.loadCmsNews();
            };

            $scope.removeLogo = function (id, image) {
                cmsService.removeLogo({image: image, id: id}).$promise
                    .then(function successCallback() {
                        $scope.getSettings();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });

            };

            $scope.loadCmsNews = function () {
                cmsService.newsList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response) {
                                $scope.lists = response;
                                for (var i=0; i<$scope.lists.length; i++){
                                    $scope.lists[i].strLimit=500;
                                }
                            });
                        }
                        else {
                            $scope.lists = response;
                            for (var i=0; i<$scope.lists.length; i++){
                                $scope.lists[i].strLimit=500;
                            }
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });

            };

            $scope.showMore = function(i) {
                $scope.lists[i].strLimit = $scope.lists[i].text.length;
            };
            $scope.showLess = function(i) {
                $scope.lists[i].strLimit = 500;
            };

            $scope.loadCmsNews();
        }
    ])

    .controller('cmsMenuListCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Menu list');

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath+'/lists/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsMenuList = function () {
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
                                $scope.lists = response;
                            });
                        }
                        else {
                            $scope.lists = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsMenuList();

            $scope.updateMenuLink = function (link, index, previousImage) {
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#logoUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("logo", imageUpdate);
                    uploadImage.append("previousImage", previousImage);
                }
                else {
                    var image = $jq('#logo').prop('files')[0];
                    uploadImage.append("logo", image);
                }
                $http.post(basePath + '/_teacher/_admin/cms/updateMenuLink', uploadImage, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.loadCmsMenuList();
                    $scope.newLink = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };
            $scope.removeMenuLink = function (id, image) {
                cmsService.removeMenuLink({id: id, image: image}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsMenuList();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };
            $scope.getSettings = function () {
                cmsService.settingList().$promise
                    .then(function successCallback(response) {
                        if (!response.id) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response) {
                                $scope.settings = response;
                            });
                        }
                        else {
                            $scope.settings = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            }
            $scope.getSettings();
        }
    ])

    .controller('cmsNewsCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Конструктор новин');

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPathNews = response.domainPath+'/news/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsNews = function () {
                cmsService.newsList().$promise
                    .then(function successCallback(response){
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response) {
                                $scope.lists = response;
                            });
                        }
                        else {
                            $scope.lists = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsNews();

            $scope.updateNews = function (link, index, previousImage) {

                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#photoUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("photo", imageUpdate);
                    uploadImage.append("previousImage", previousImage);
                }
                else {
                    var image = $jq('#photo').prop('files')[0];
                    uploadImage.append("photo", image);
                }
                $http.post(basePath + '/_teacher/_admin/cms/updateNews', uploadImage, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.loadCmsNews();
                    $scope.newNews = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };

            $scope.removeNews = function (id, image) {
                cmsService.removeNews({id: id, image: image}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsNews();
                    }, function errorCallback(response){
                        bootbox.alert(response.data.reason);
                    });
            };
        }
    ])

    .controller('subdomainCtrl', ['$scope', '$rootScope', '$http', 'NgTableDataService', 'NgTableParams', '$ngBootbox', 'ngToast',
        function ($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox, ngToast) {
        $scope.subdomainsTableUrl = basePath + '/_teacher/_admin/cms/organizationSubdomain';
        $scope.subdomainsTableData = new NgTableParams({}, {
            getData: function(params) {
                NgTableDataService.setUrl($scope.subdomainsTableUrl);
                return NgTableDataService.getData(params.url())
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });

        $scope.addSubdomain = function (subdomain) {
            $http({
                method:'POST',
                url: basePath + '/_teacher/_admin/cms/addSubdomain',
                data:$jq.param({subdomain:subdomain}),
                headers:{'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                if (response.data === true){
                    ngToast.create({
                        className: 'success',
                        content: 'Субдомен додано!'
                    });
                    $scope.subdomainsTableData.reload();
                }
                else{
                    $ngBootbox.alert(response.message)
                }
            })
        }
    }])

    .controller('sliderCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.myInterval = 3000;
            $scope.active = 1;

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath+'/carousel/';

                    cmsService.menuSlider().$promise
                        .then(function successCallback(response) {
                            if (response.length == 0) {
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

                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });
        }
    ])
    .controller('cmsMenuSliderCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Menu slider');

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath+'/carousel/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsSliderList = function () {
                cmsService.menuSlider().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                                $scope.lists = response;
                            });
                        } else {
                            $scope.lists = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsSliderList();

            $scope.updateSliderData = function (link, index, previousImage) {
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#slideUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("slide", imageUpdate);
                    uploadImage.append("previousImage", previousImage);
                }
                else {
                    var image = $jq('#slide').prop('files')[0];
                    uploadImage.append("slide", image);
                }
                $http.post(basePath + '/_teacher/_admin/cms/updateMenuSlider', uploadImage, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).then(function successCallback() {
                    $scope.loadCmsSliderList();
                    $scope.newLink = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };
            //Видалення данних про поточний слайд
            $scope.removeCurrentSlide = function (id, image) {
                cmsService.removeMenuSlider({id: id, image: image}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsSliderList();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };

        }
    ]);

function changeColorOff (e) {
    element= jQuery(e).children();
    element.css("color", e.getAttribute("data-link"));
}

function changeColorOn (e) {
    element= jQuery(e).children();
    element.css("color",e.getAttribute("data-hover"));
}
