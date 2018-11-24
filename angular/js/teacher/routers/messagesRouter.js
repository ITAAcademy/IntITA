/**
 * Created by adm on 26.07.2016.
 */
angular
    .module('messagesRouter',['ui.router']).
config(function ($stateProvider, $urlRouterProvider, $locationProvider) {
    $stateProvider
        .state('dialog/:messageId', {
            url: "/dialog/:messageId",
            cache         : false,
            controller:"messagesCtrl",
            templateUrl: function($stateParams){
                return   basePath+'/_teacher/messages/dialog/?messageId='+$stateParams.messageId
            },
        })
        .state('deletedmessage/:idMessage', {
            url: "/deletedmessage/:idMessage",
            cache         : false,
            controller:function($scope){
                $scope.changePageHeader('Видалене повідомлення')
            },
            templateUrl: function($stateParams){
                return   basePath+'/_teacher/messages/message/?id='+$stateParams.idMessage
            }
        })
        .state('messages/message/:idMessage', {
            url: "/messages/message/:idMessage",
            cache         : false,
            controller:function($scope){
                $scope.$emit('openMessage','');
                $scope.changePageHeader('Повідомлення')
            },
            templateUrl: function($stateParams){
                return   basePath+'/_teacher/messages/message/?id='+$stateParams.idMessage
            }
        })
});
