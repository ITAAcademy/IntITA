angular

    .module('cmsApp')
    .controller('cmsMainSettingsCtrl', ['$scope','cmsService',
        function ($scope, cmsService) {

            $scope.title_color= "#666666";
            $scope.subtitle_color="#4682B4";
            $scope.general_link_color= "#114988";
            $scope.general_hover_color="#666666";
            $scope.text_color= "#696969";

            $scope.about_us_background_color="#ffffff";
            $scope.news_background_color= "#f3f3f3";
            $scope.news_image_border_color="#4b75a4";
            $scope.news_text_box_shadow_color= "#ACACAC";


            $scope.header_background_color="#ffffff";
            $scope.header_link_color   = "#114988";
            $scope.header_hover_color="#666666";
            $scope.header_border_color= "#4b75a4";


            $scope.footer_background_color="#ffffff";
            $scope.footer_link_color   = "#114988";
            $scope.footer_hover_color="#666666";
            $scope.footer_border_color= "#4b75a4";
            $scope.icon_shadow_color= "#4b75a4";


        }
    ]);