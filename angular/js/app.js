'use strict';
angular.module('chatIntITAMessenger', []);

var csrftoken =  (function() {
    var metas = window.document.getElementsByTagName('meta');
    // finding one has csrf token 
    for(var i=0 ; i < metas.length ; i++) {
        if ( metas[i].name === "csrf-token") {
            return  metas[i].content;       
        }
    }
})();

/* App Module */
angular
    .module('mainApp', [
        'mainApp.directives',
        'ui.bootstrap',
        'oi.select',
        'ngResource',
        'paymentsSchemes.directives',
        'ngSanitize',
        'ui.select',
        'chatIntITAMessenger',
        'angularFileUpload',
        'angular-loading-bar',
        'ngImgCrop',
        'ngBootbox',
        'angular-carousel',
        'documents'
    ])
    .config(function ($httpProvider) {
        $httpProvider.defaults.headers.post = { 'YII_CSRF_TOKEN': csrftoken }
    });
