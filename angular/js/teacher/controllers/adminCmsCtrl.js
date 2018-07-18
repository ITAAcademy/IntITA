angular
    .module('cmsApp')
    .controller('cmsCtrl', ['$scope', 'cmsService', '$http', 'ngToast','$q',
        function ($scope, cmsService, $http, ngToast, $q) {
            $scope.changePageHeader('Конструктор сайту');

            $scope.domainPath = domainPath;
            $scope.domainPathNews = domainPathNews;
            $scope.data = '';
            $scope.buttonShow = '';
            $scope.SubdomainAns = '';
            $scope.pathToCmsTemplates = basePath + "/angular/js/teacher/templates/cms/";
            $scope.templateUrl = function (template) {
                return $scope.pathToCmsTemplates + template;
            }
            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPathLogo = response.domainPath + '/logo/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.getSubdomain = function () {
                cmsService.Subdomain().$promise
                    .then(function successCallback(response) {
                        if (response !== undefined) {
                            $scope.SubdomainAns = false;
                        } else {
                            $scope.SubdomainAns = true;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            };
            $scope.getSubdomain();

            $scope.loadCmsMenuList = function () {
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
                                $scope.domainListsItemMenuEmpty = true;
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

            $scope.updateMenuLink = function (link, index) {
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#img_menu_list_Update' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("img_menu_list", imageUpdate);
                }
                else {
                    var image = $jq('#img_menu_list').prop('files')[0];
                    uploadImage.append("img_menu_list", image);
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
                $scope.loadCmsMenuList();
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
                                $scope.settings.logo = generateRelativePath($scope.settings.logo);
                            });
                        }
                        else {
                            $scope.settings = response;
                        }
                        $scope.buttonShow = true;
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            };
            $scope.getSettings();

            $scope.updateSettings = function (link) {
                var uploadSettings = new FormData(); // для того щоб передати дані з файлу в БД використовується  FormData()
                uploadSettings.append("data", angular.toJson(link));  //.append Вставляет содержимое, заданное параметром, в конец каждого элемента в наборе соответствующих элементов
                var imageUpdateBlock = '#logoUpdate';
                var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];  //Возвращает / изменяет значение свойств выбранных элементов.
                uploadSettings.append("photo", imageUpdate);               // записуємо нову картинку в БД
                $http.post(basePath + '/_teacher/_admin/cms/UpdateSettings', uploadSettings, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.getSettings();
                    ngToast.create({
                        content: 'Дані успішно збережені!',
                        className: 'success',
                        dismissOnTimeout: true,
                        timeout: 2000
                    });
                    $scope.newSettings = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };

            $scope.showDefaultSettings = function () {
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response1) {
                    $scope.listsItemMenu = response1;
                });
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response2) {
                    $scope.settings = response2;
                });
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response3) {
                    $scope.news = response3;
                    for (var i = 0; i < $scope.news.length; i++) {
                        $scope.news[i].strLimit = 500;
                    }
                });
                $scope.buttonShow = false;
            };

            $scope.removeLogoCms = function (id, image) {

                cmsService.removeLogo({image: image, id: id}).$promise
                    .then(function successCallback() {

                        function reset_form_element(e) {
                            e.wrap('<form>').parent('form').trigger('reset');
                            e.unwrap();
                        }

                        $('#logo_clear').on('click', function (e) {
                            reset_form_element($('#logoUpdate'));
                            e.preventDefault();
                        });

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
                                $scope.news = response;
                                for (var i = 0; i < $scope.news.length; i++) {
                                    $scope.news[i].strLimit = 500;
                                }
                            });
                        }
                        else {
                            $scope.news_reverse = response;
                            $scope.news = $scope.news_reverse.slice().reverse();
                            for (var i = 0; i < $scope.news.length; i++) {
                                $scope.news[i].strLimit = 500;
                            }
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку новин не вдалося");
                    });
            };


            $scope.updateNews = function (link, index) {

                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#photoUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("photo", imageUpdate);
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
                    document.getElementById("photo").value = "";
                    $jq('#newsModal').modal('hide');
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };

            $scope.removeNews = function (id, image) {
                cmsService.removeNews({id: id, image: image}).$promise
                    .then(function successCallback() {
                        $scope.loadCmsNews();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };

            $scope.showMore = function (i) {
                $scope.news[i].strLimit = $scope.news[i].text.length;
            };
            $scope.showLess = function (i) {
                $scope.news[i].strLimit = 500;
            };

            $scope.loadCmsNews();

            $scope.generatePage = function () {
                console.log("CMS controller");
                if($scope.domainListsItemMenuEmpty){
                    $scope.listsItemMenu.forEach(function(item, i) {
                        $scope.updateMenuLink(item, i);
                    });
                }
                var content = document.getElementById("cms_content_generate");
                $jq(".hide_edit").hide();
                if (content != null) {
                    $q.all([
                        $http.get($scope.templateUrl('/partial/menu.html')),
                        $http.get($scope.templateUrl('/partial/slider.html')),
                        $http.get($scope.templateUrl('/partial/fullMenu.html')),
                        $http.get($scope.templateUrl('/partial/news.html'))])
                        .then(function (response) {
                            $jq("#menuBlock").html(response[0].data);
                            $jq("#sliderBlock").html(response[1].data);
                            $jq("#aboutBlock").html(response[2].data);
                            $jq("#newsBlock").html(response[3].data);
                            $jq.ajax({
                                method: "POST",
                                url: basePath + '/_teacher/_admin/cms/generatePage',
                                dataType: 'html',
                                data: {data: content.innerHTML},
                                success: function () {
                                    location.reload();
                                }
                            });
                        })
                        .catch(function (error) {
                            console.log(error)
                            alert('Помилка завантаження данних')
                        });
                }
            };
        }
    ])



    .controller('settingsCtrl', ['$scope', 'cmsService', '$http', 'ngToast',
        function ($scope, cmsService, $http, ngToast) {

            $scope.data;
            $scope.buttonShow;

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPathLogo = response.domainPath + '/logo/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.changePageHeader('Налаштування кольорів');

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
                        $scope.buttonShow = true;
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            };

            $scope.getSettings();

            $scope.updateSettings = function (link) {

                var uploadSettings = new FormData(); // для того щоб передати дані з файлу в БД використовується  FormData()
                uploadSettings.append("data", angular.toJson(link));  //.append Вставляет содержимое, заданное параметром, в конец каждого элемента в наборе соответствующих элементов
                var imageUpdateBlock = '#logoUpdate';
                var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];  //Возвращает / изменяет значение свойств выбранных элементов.
                uploadSettings.append("photo", imageUpdate);               // записуємо нову картинку в БД
                $http.post(basePath + '/_teacher/_admin/cms/UpdateSettings', uploadSettings, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    $scope.getSettings();
                    ngToast.create({
                        content: 'Дані успішно збережені!',
                        className: 'success',
                        dismissOnTimeout: true,
                        timeout: 2000
                    });
                    $scope.newSettings = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });

            };

            $scope.showDefaultSettings = function () {
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response1) {
                    $scope.listsItemMenu = response1;
                });
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSettings.json').success(function (response2) {
                    $scope.settings = response2;
                });
                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response3) {
                    $scope.news = response3;
                    for (var i = 0; i < $scope.news.length; i++) {
                        $scope.news[i].strLimit = 500;
                    }
                });
                $scope.buttonShow = false;
            };

            $scope.mySettings = function () {
                $scope.getSettings();
            };

            $scope.removeLogo = function (id, image) {
                cmsService.removeLogo({image: image, id: id}).$promise
                    .then(function successCallback() {
                        $scope.getSettings();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };

            $scope.showMore = function (i) {
                $scope.news[i].strLimit = $scope.news[i].text.length;
            };
            $scope.showLess = function (i) {
                $scope.news[i].strLimit = 500;
            };
        }
    ])


    .controller('subdomainCtrl', ['$scope', '$rootScope', '$http', 'NgTableDataService', 'NgTableParams', '$ngBootbox', 'ngToast',
        function ($scope, $rootScope, $http, NgTableDataService, NgTableParams, $ngBootbox, ngToast) {
            $scope.changePageHeader('Створення доменного імені сайту');
            $scope.addSubdomain = function (subdomain) {
                $http({
                    method: 'POST',
                    url: basePath + '/_teacher/_admin/cms/addSubdomain',
                    data: $jq.param({subdomain: subdomain}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function (response) {
                    if (response.data === true) {
                        ngToast.create({
                            className: 'success',
                            content: 'Субдомен додано!'
                        });
                        location.reload();
                    }
                    else {
                        $ngBootbox.alert(response.message);
                    }
                })
            }
        }])


    .controller('cmsMenuListCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Редактор списка меню');

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath + '/lists/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsMenuList = function () {
                cmsService.menuList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultMenu.json').success(function (response) {
                                $scope.listsItemMenu = response;
                            });
                        }
                        else {
                            $scope.listsItemMenu = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsMenuList();

            $scope.updateMenuLink = function (link, index) {
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#img_menu_list_Update' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("img_menu_list", imageUpdate);
                }
                else {
                    var image = $jq('#img_menu_list').prop('files')[0];
                    uploadImage.append("img_menu_list", image);
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
                $scope.loadCmsMenuList();

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

    .controller('cmsSocialNetworksCtrl', ['$scope', 'cmsService', '$http', 'ngToast',
        function ($scope, cmsService, $http, ngToast) {
            $scope.changePageHeader('Редактор соцмереж');
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
                        $scope.buttonShow = true;
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані не вдалося");
                    });
            };
            $scope.getSettings();

            $scope.updateSocialNetworks = function (link) {

                var uploadSettings = new FormData(); // для того щоб передати дані з файлу в БД використовується  FormData()
                uploadSettings.append("data", angular.toJson(link));  //.append Вставляет содержимое, заданное параметром, в конец каждого элемента в наборе соответствующих элементов

                $http.post(basePath + '/_teacher/_admin/cms/UpdateSocialNetworks', uploadSettings, {
                    withCredentials: true,
                    headers: {'Content-Type': undefined},
                    transformRequest: angular.identity
                }).success(function () {
                    ngToast.create({
                        content: 'Дані успішно збережені!',
                        className: 'success',
                        dismissOnTimeout: true,
                        timeout: 2000
                    });

                    $scope.getSettings();
                    $scope.newSettings = {id: null, description: null, link: null};
                }, function errorCallback(response) {
                    bootbox.alert(response.data.reason);
                });
            };
        }
    ])

    .controller('cmsNewsCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Конструктор новин');

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPathNews = response.domainPath + '/news/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsNews = function () {
                cmsService.newsList().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultNews.json').success(function (response) {
                                $scope.news = response;
                            });
                        }
                        else {
                            $scope.news_reverse = response;
                            $scope.news = $scope.news_reverse.slice().reverse();
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку новин не вдалося");
                    });
            };
            $scope.loadCmsNews();

            $scope.updateNews = function (link, index) {

                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#photoUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("photo", imageUpdate);
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
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };
        }
    ])



    .controller('sliderCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.myInterval = 3000;
            $scope.active = 0;

            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath + '/carousel/';

                    cmsService.menuSlider().$promise
                        .then(function successCallback(response) {
                            if (response.length == 0) {
                                $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                                    $scope.slides = response;
                                    for (var i = 0; i < $scope.slides.length; i++) {
                                        $scope.slides[i].src = generateRelativePath($scope.slides[i].src);
                                    }
                                });
                            } else {
                                $scope.slides = response;
                                for (var i = 0; i < $scope.slides.length; i++) {
                                    $scope.slides[i].src = $scope.domainPath + $scope.slides[i].src;
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
                    $scope.domainPath = response.domainPath + '/carousel/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            $scope.loadCmsSliderList = function () {
                cmsService.menuSlider().$promise
                    .then(function successCallback(response) {
                        if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                                $scope.slides = response;
                            });
                        } else {
                            $scope.slides = response;
                        }
                    }, function errorCallback() {
                        bootbox.alert("Отримати дані списку меню не вдалося");
                    });
            };
            $scope.loadCmsSliderList();

            $scope.updateSliderData = function (link, index) {
                var uploadImage = new FormData();
                uploadImage.append("data", angular.toJson(link));
                if (index !== undefined) {
                    var imageUpdateBlock = '#slideUpdate' + index;
                    var imageUpdate = $jq(imageUpdateBlock).prop('files')[0];
                    uploadImage.append("slide", imageUpdate);
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
    ])
    // .filter('isNotLink', function () {
    //     return function (input) {
    //         return input.indexOf("https://") == -1 && input.indexOf("http://") == -1
    //     };
    // })

function changeColorOff(e) {
    element = jQuery(e).children();
    element.css("color", e.getAttribute("data-link"));
}

function changeColorOn(e) {
    element = jQuery(e).children();
    element.css("color", e.getAttribute("data-hover"));
}

function generateRelativePath(src) {
    return basePath + '/domains/' + src;
}
