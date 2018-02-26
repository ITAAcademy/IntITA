/**
 * Created by adm on 26.07.2016.
 */
angular
    .module('trainerRouter', ['ui.router']).
config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    $stateProvider
        .state('trainer', {
            url: "/trainer",
            cache: false,
            controller: function ($scope) {
                $scope.changePageHeader('Тренер');
            },
            templateUrl: basePath + "/_teacher/cabinet/loadPage/?page=trainer",
        })
        .state('trainerStudentsTable/students', {
            url: "/trainerStudentsTable",
            cache: false,
            templateUrl: basePath+"/_teacher/users/students?organization=1&trainer=1",
        })
        .state('trainerStudentsTable/students.main', {
            url: '/main',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/users/attachStudents?trainer=1",
                }
            }
        })
        .state('trainerStudentsTable/students.personalInfo', {
            url: '/personalInfo',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/users/personalInfo?trainer=1"
                }
            }
        })
        .state('trainerStudentsTable/students.career', {
            url: '/career',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/users/careerInfo?trainer=1"
                }
            }
        })
        .state('trainerStudentsTable/students.contract', {
            url: '/contract',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/users/contractInfo?trainer=1"
                }
            }
        })
        .state('trainerStudentsTable/students.visit', {
            url: '/visit',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/users/visitInfo?trainer=1",
                }
            }
        })
        .state('trainerStudentsTable/students.studentsProjects', {
            url: '/studentsProjects',
            views: {
                'studentsTabs': {
                    templateUrl: basePath+"/_teacher/_trainer/trainer/studentsProjects",
                }
            }
        })
        .state('studentsProject', {
            url: "/studentsProject/:projectId",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath + "/_teacher/_trainer/trainer/showFiles/projectId/" + $stateParams.projectId;
            }
        })

        .state('trainer/viewStudent/:studentId', {
            url: "/trainer/viewStudent/:studentId",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath + "/_teacher/_trainer/trainer/viewStudent/id/" + $stateParams.studentId;
            }
        })
        .state('trainer/changeTeacher/modude/:idModule/student/:studentId', {
            url: "/trainer/changeTeacher/modude/:idModule/student/:studentId",
            cache: false,
            templateUrl: function ($stateParams) {
                return basePath + "/_teacher/_trainer/trainer/editTeacherModule/id/"+$stateParams.studentId+"/idModule/" + $stateParams.idModule;
            }
        })
        .state('trainer/students/agreements', {
            url: "/trainer/students/agreements",
            cache         : false,
            templateUrl: basePath + "/_teacher/_trainer/trainer/renderTrainerUsersAgreements"
        })
});