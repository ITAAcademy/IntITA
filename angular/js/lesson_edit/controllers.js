angular
    .module('lessonEdit')
    .controller('CKEditorCtrl', CKEditorCtrl)

function CKEditorCtrl($compile, $scope, $http) {
    $scope.editorOptions = {
        language: lang
    };
    $scope.editorOptionsTask = {
        language: lang,
        toolbar: 'task'
    };
    $scope.editorOptionsAnswer = {
        language: lang,
        toolbar: 'answer',
        height: '40px',
        //enterMode: CKEDITOR.ENTER_BR
};
    $scope.$on("ckeditor.ready", function (event) {
        $scope.isReady = true;
    });

    $scope.getBlockHtml = function (blockOrder, idLecture) {
        $http({
            url: basePath + '/lesson/editBlock',
            method: "POST",
            data: $.param({order: blockOrder, lecture: idLecture}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        })
            .success(function (response) {
                $scope.editRedactor = response;
            })
            .error(function () {
                alert($scope.errorMsg);
            })
    };

    $scope.answers = [{id: 1}];

    $scope.addAnswer = function () {
        $scope.answers.push({id: $scope.answers.length });
        var optionsNum = angular.element(document.querySelector("#optionsNum"));
        optionsNum.val(parseInt(optionsNum.val()) + 1);
    };
    $scope.deleteAnswer = function () {
        $scope.answers.splice(-1, 1);
        var optionsNum = angular.element(document.querySelector("#optionsNum"));
        if (optionsNum.val() > 0) {
            optionsNum.val(parseInt(optionsNum.val()) - 1);
        }
    };
    $scope.editAddAnswer = function () {
        $scope.editAnswers.push('');
        var optionsNum = angular.element(document.querySelector("#optionsNum"));
        optionsNum.val(parseInt(optionsNum.val()) + 1);
    };
    $scope.editDeleteAnswer = function () {
        $scope.editAnswers.splice(-1, 1);
        var optionsNum = angular.element(document.querySelector("#optionsNum"));
        if (optionsNum.val() > 0) {
            optionsNum.val(parseInt(optionsNum.val()) - 1);
        }
    };
}

angular
    .module('lessonEdit')
    .directive('editBlock', function ($compile) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    if (angular.element('.openCKE').length) {
                        alert(scope.editMsg);
                        return;
                    }
                    var orderBlock = element.attr('id').substring(1);
                    var template = '<textarea data-ng-cloak class="openCKE" ' +
                        'id="openCKE' + orderBlock + '" ng-init="editRedactor = getBlockHtml(' + orderBlock + ',' + idLecture + ');"  ' +
                        'ckeditor="editorOptions" name="editor" ng-model="editRedactor">' +
                        '</textarea>';
                    ($compile(template)(scope)).insertAfter(element);
                    element.hide();
                });
            }
        };
    })
    .directive('upBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    var order = element.parent().attr('id').substring(1);
                    $http({
                        url: basePath + '/lesson/upElement',
                        method: "POST",
                        data: $.param({idLecture: idLecture, order: order}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function () {
                            $.fn.yiiListView.update('blocks_list', {
                                complete: function () {
                                    var template = angular.element('#blockList').html();
                                    angular.element('#blockList').empty();
                                    angular.element('#blockList').append(($compile(template)(scope)));
                                    setTimeout(function () {
                                        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                    });
                                }
                            });
                        })
                        .error(function () {
                            alert(scope.errorMsg);
                        });
                });
            }
        };
    })
    .directive('downBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    var order = element.parent().attr('id').substring(1);
                    $http({
                        url: basePath + '/lesson/downElement',
                        method: "POST",
                        data: $.param({idLecture: idLecture, order: order}),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function () {
                            $.fn.yiiListView.update('blocks_list', {
                                complete: function () {
                                    var template = angular.element('#blockList').html();
                                    angular.element('#blockList').empty();
                                    angular.element('#blockList').append(($compile(template)(scope)));
                                    setTimeout(function () {
                                        MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                    });
                                }
                            });
                        })
                        .error(function () {
                            alert(scope.errorMsg);
                        });
                });
            }
        };
    })
    .directive('deleteBlock', function ($compile, $http) {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    if (confirm(scope.deleteMsg)) {
                        var order = element.parent().attr('id').substring(1);
                        $http({
                            url: basePath + '/lesson/deleteElement',
                            method: "POST",
                            data: $.param({idLecture: idLecture, order: order}),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                            .success(function () {
                                $.fn.yiiListView.update('blocks_list', {
                                    complete: function () {
                                        var template = angular.element('#blockList').html();
                                        angular.element('#blockList').empty();
                                        angular.element('#blockList').append(($compile(template)(scope)));
                                        setTimeout(function () {
                                            MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                                        });
                                    }
                                });
                            })
                            .error(function () {
                                alert(scope.errorMsg);
                            });
                    }
                });
            }
        };
    })
    .directive('selectedButton', function () {
        return {
            link: function (scope, element) {
                element.bind('click', function () {
                    var button = angular.element(document.querySelector(".selectedButton"));
                    if (button.length == 1) button.removeClass("selectedButton");
                    element.addClass("selectedButton");
                });
            }
        };
    })