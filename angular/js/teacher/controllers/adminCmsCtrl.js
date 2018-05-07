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
                cmsService.removeLogo({image: image}).$promise
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

    .controller('sliderCtrl', ['$scope',
        function ($scope) {
            $scope.myInterval = 3000;   /*період зміни слайдів*/
            $scope.active = 0;   /*індекс першого слайду*/
            var slides = $scope.slides = [];   /*масив об'єктів з властивостями слайдів*/
            var currIndex = 0;   /*поточна кількість доданих слайдів*/

            var sliders_src = [
                'https://intita.com/images/mainpage/5acb3f77a8ea7.jpg',
                'https://intita.com/images/mainpage/5acb3f1e920d6.jpg',
                'https://intita.com/images/mainpage/5ac254f8e1d60.jpg',
                'https://intita.com/images/mainpage/5acb3f4195982.jpg',
                'https://intita.com/images/mainpage/5ac2558437b4b.jpg'
            ];
            var slide_text = [
                "Ми гарантуємо Тобі отримання пропозиції працевлаштування\
                після успішного завершення навчання!",
                "Хочеш стати висококласним спеціалістом? Приймай правильне рішення - навчайся з нами!\
                Ми працюємо на результат!",
                "Не втрать свій шанс змінити світ - отримай якісну та сучасну освіту\
                і стань класним спеціалістом!",
                "Не втрачай шансу на творчу, цікаву та перспективну працю –\
                плануй своє професійне майбутнє вже сьогодні!",
                "Один рік цікавого навчання - і ти станеш гарним програмістом,\
                готовим працювати в індустрії інформаційних технологій!",
                "Мрієш заробляти улюбленою справою і отримувати задоволення від професії?\
                Скористайся можливістю потрапити у світ інформаційних технологій!",
                "В майбутньому буде два типи робіт: ті, де Ти будеш керувати комп'ютером - програмувати,\
                і ті, де машини вказуватимуть, що робити Тобі!"
            ];

            $scope.addSlide = function() {   /*функція для додавання нового слайду*/
                slides.push({
                    image: sliders_src[currIndex],   /*адреса зображення*/
                    text: slide_text[currIndex],   /*стрічка тексту*/
                    id: currIndex++   /*індекс поточного слайду*/
                });
            };

            for (var i = 0; i < sliders_src.length; i++) {   /*формування початкового набору слайдів*/
                $scope.addSlide();
            }
        }
    ])
    .controller('cmsMenuSliderCtrl', ['$scope', 'cmsService', '$http',
        function ($scope, cmsService, $http) {
            $scope.changePageHeader('Menu slider');

            //отримання шляху до домена. Навіщо тут проміс?
            cmsService.domainPath().$promise
                .then(function successCallback(response) {
                    $scope.domainPath = response.domainPath+'/lists/';
                }, function errorCallback() {
                    bootbox.alert("Отримати піддомен не вдалося");
                });

            //Завантаження данних
            $scope.loadCmsMenuList = function () {
                cmsService.menuList().$promise   //основний запит. Чому виклик функції? Синтаксис
                    .then(function successCallback(response) {
                        // if (response.length == 0) {
                            $http.get(basePath + '/angular/js/teacher/templates/cms/defaultSlider.json').success(function (response) {
                                $scope.lists = response;
                            });
                        // }
                        // else {
                            $scope.lists = response;
                        // }
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
                cmsService.removeMenuLink({id: id, image: image}).$promise   //тут не поняв нічого
                    .then(function successCallback() {
                        $scope.loadCmsMenuList();
                    }, function errorCallback(response) {
                        bootbox.alert(response.data.reason);
                    });
            };

        }
    ])