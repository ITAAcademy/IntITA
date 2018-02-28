/**
 * Created by Wizlight on 01.12.2015.
 */
angular
    .module('lessonApp')
    .service('paramService', [
        '$injector','$rootScope', '$state', '$stateParams',
        function($injector, $rootScope, $state, $statePara) {
            "use strict";
            var finishedLecture = document.querySelector("#scriptData [data-finished-lecture]").getAttribute("data-finished-lecture");
            var isAdmin = document.querySelector("#scriptData [data-is-admin]").getAttribute("data-is-admin");
            var editMode = document.querySelector("#scriptData [data-edit-mode]").getAttribute("data-edit-mode");

            if (parseInt(editMode || isAdmin)) {
                var lastAccessPage = 1;
            } else {
                var lastAccessPage = document.querySelector("#scriptData [data-last-access-page]").getAttribute("data-last-access-page");
            }

            this.getStartParam = function($rootScope, $state, $stateParams) {
                $rootScope.editMode = editMode;
                $rootScope.isAdmin = parseInt(isAdmin);
                $rootScope.lastAccessPage = parseInt(lastAccessPage);
                $rootScope.finishedLecture = parseInt(finishedLecture);

                $rootScope.$state = $state;
                $rootScope.$stateParams = $stateParams;
            };
        }
    ]);