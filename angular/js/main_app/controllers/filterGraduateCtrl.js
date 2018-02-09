/**
 * Created by Админ on 19.06.2017.
 */
angular
    .module('mainApp')
    .controller('filterGraduateCtrl', function($scope){


       $scope.selectFilter = function(){

            if($scope.input === undefined){
                $scope.input = '';
            }
           if($scope.selector === undefined){
               $scope.selector = 'rating';
           }

           $.fn.yiiListView.update(
               // this is the id of the CListView
               'ajaxListView',
               {
                   url:'graduate/UpdateAjaxFilter',
                   data: {
                           selector: $scope.selector,
                           input: $scope.input
                         }
               }
           )
       };

       $scope.searchInput = function(){

           if($scope.selector === undefined){
               $scope.selector = 'rating';
           }
           if($scope.input === undefined){
               $scope.input = '';
           }
           setTimeout(function () {
               $.fn.yiiListView.update(
                   // this is the id of the CListView
                   'ajaxListView',
                   {
                       url:'graduate/UpdateAjaxFilter',
                       data: {
                               selector: $scope.selector,
                               input: $scope.input
                             }
                   }
               )
           },
           // this is the delay
           300);
       };

    })
    .controller('showMoreGraduateCtrl', function($scope) {
        var sizeGraduate = 2;

        $scope.showMoreGraduate = function () {
            $.fn.yiiListView.update(
                // this is the id of the CListView
                'ajaxListView',
                {
                    url: 'graduate/ShowMoreGraduateAjaxFilter',
                    data: {
                        size: sizeGraduate
                    },
                    complete: function () {
                        $scope.currentGraduateCount = $('.GraduatesBlock').length;
                        console.log($scope.currentGraduateCount);
                        $scope.$apply();
                    }
                }
            );
            sizeGraduate++;
        };
    });
