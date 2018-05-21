/**
 * Created by adm on 16.07.2016.
 */
angular
    .module('adminRouter',['ui.router'])
    .config(function ($stateProvider) {
    $stateProvider
        .state('admin', {
            url: "/admin",
            cache: false,
            controller: function($scope){
                $scope.changePageHeader('Адміністратор');
            },
            templateUrl: basePath+"/_teacher/_admin/admin/index",
        })
        .state('admin/users/addrole/:role', {
            url: "/admin/users/addrole/:role",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/role/renderAddRoleForm/role/"+$stateParams.role;
            }
        })
        .state('admin/addrole', {
            url: "/admin/addrole",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/role/addRoleForm",
        })
        
        .state('admin/user/:id/addrole', {
            url: "/admin/user/:id/addrole",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/_admin/role/addRole/id/"+$stateParams.id;
            }
        })
        .state('admin/teacher/create', {
            url: "/admin/teacher/create",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/teachers/createForm",
        })
        .state('course/schema/:id', {
            url: "/course/schema/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/courseManage/schema/idCourse/"+$stateParams.id;
            }
        })
        .state('addLinkedCourse/:course/:lang', {
            url: "/addLinkedCourse/:course/:lang",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/courseManage/addLinkedCourse/course/"+$stateParams.course+"/lang/"+$stateParams.lang;
            }
        })
        .state('admin/usersemail', {
            url: "/admin/usersemail",
            cache: false,
            templateUrl: basePath+"/_teacher/users/usersEmail",
        })
        .state('admin/emailscategory', {
            url: "/admin/emailscategory",
            cache: false,
            templateUrl: basePath+"/_teacher/users/emailsCategory",
        })
        .state('admin/emailscategorycreate', {
            url: "/admin/emailscategorycreate",
            cache: false,
            templateUrl: basePath+"/_teacher/users/emailsCategoryCreate",
        })
        .state('admin/emailscategoryupdate/:id', {
            url: "/admin/emailscategoryupdate/:id",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath+"/_teacher/users/emailsCategoryUpdate/id/"+$stateParams.id;
            }
        })
        .state('admin/intita_cms', {
            url: "/admin/intita_cms",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/cms/index",
        })
        .state('admin/cms_list', {
            url: "/admin/cms_list",
            cache: false,
            templateUrl: basePath+"/angular/js/teacher/templates/cms/lists.html",
        })
        .state('admin/cms_slider', {
            url: "/admin/cms_slider",
            cache: false,
            templateUrl: basePath+"/angular/js/teacher/templates/cms/slider.html",
        })
        .state('admin/cms_news', {
            url: "/admin/cms_news",
            cache: false,
            templateUrl: basePath+"/angular/js/teacher/templates/cms/news.html",
        })
        .state('admin/cms_main_settings', {
            url: "/admin/cms_main_settings",
            cache: false,
            templateUrl: basePath+"/angular/js/teacher/templates/cms/main_settings.html",
        })
        .state('admin/subdomain', {
            url: "/admin/subdomain",
            cache: false,
            templateUrl: basePath+"/_teacher/_admin/cms/subdomain",
        })

});





