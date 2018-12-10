angular
    .module('moduleRevisionsApp')
    .controller('moduleRevisionCtrl',moduleRevisionCtrl)
    .controller('moduleEditTagsCtrl',moduleEditTagsCtrl);

function moduleRevisionCtrl($rootScope,$scope, $http, getModuleData, moduleRevisionsActions, moduleRevisionMessage, $timeout) {
    redirectFromEdit=true;
    //revisions status
    $scope.revisionProposedToRelease='proposed_to_release';
    $scope.revisionReleased='released';
    $scope.revisionApproved='approved';
    //revisions status

    $scope.tempId=[];
    //load from service lecture data for scope
    getModuleData.getData(idRevision).then(function(response){
        $rootScope.moduleData=response;
        $scope.model = generateList();
        $scope.onDrop = function(srcList, srcIndex, targetList, targetIndex) {
            if(srcIndex<targetIndex){
                targetIndex-=1;
            }
            var deletedElement=srcList.splice(srcIndex,1)[0];
            srcList.splice(targetIndex,0,deletedElement);
            updateOrder($scope.model);
            return true;
        };
        function updateOrder(arr) {
            for(var i=0; i<arr.length;i++){
                arr[i].module_order = i+1;
            }
        }
        function generateList() {
            return response.lectures.map(function(letter) {
                return {
                    labelFunc: function(index) {
                        letter.module_order=index+1;
                        return letter;
                    }
                };
            });
        }
        $scope.model.map(function (currentValue,index) {
            $scope.model[index] = currentValue.labelFunc(index);

        });
        $scope.lectureInModule=$rootScope.moduleData.lectures;
        getModuleData.getApprovedLecture().then(function(response){
            $scope.approvedLecture=response;
            if($scope.approvedLecture.current){
                $.each($scope.approvedLecture.current, function(status) {
                    $.each($scope.approvedLecture.current[status], function(index) {
                        $.each($scope.lectureInModule, function(indexInModule) {
                            if($scope.lectureInModule[indexInModule]['id_lecture_revision']==$scope.approvedLecture.current[status][index]['id_lecture_revision']){
                                $scope.tempId.push($scope.lectureInModule[indexInModule]['id_lecture_revision']);
                                return false;
                            }
                        });
                    });
                    $scope.approvedLecture.current[status] = $scope.approvedLecture.current[status].filter(function(value) {
                        return !find($scope.tempId,value.id_lecture_revision)
                    });
                });
            }
            $scope.initializing = true;
        });
    });

    //find exist value in array or not
    function find(array, value) {

        for (var i = 0; i < array.length; i++) {
            if (array[i] == value) return true;
        }

        return false;
    }


    $scope.addRevisionToModuleFromCurrentList = function (lectureRevisionId, index, status) {
        var revision=_.find($scope.approvedLecture.current[status], {id_lecture_revision:lectureRevisionId});
        revision.list='current';
        revision.status=status;
        _.remove($scope.approvedLecture.current[status], revision);
        revision.module_order = $scope.model.length+1;
        $scope.model.push(revision);
    };
    $scope.addRevisionToModuleFromForeignList= function (lectureRevisionId, index, status) {
        var revision=_.find($scope.approvedLecture.foreign[status], {id_lecture_revision:lectureRevisionId});
        revision.list='foreign';
        revision.status=status;
        _.remove($scope.approvedLecture.foreign[status], revision);
        revision.module_order = $scope.model.length+1;
        $scope.model.push(revision);
    };
    $scope.removeRevisionFromModule= function (lectureRevisionId, index) {
        var revision=$scope.model[index];
        if(revision.list=='foreign'){
            $scope.approvedLecture.foreign[revision.status].push(revision);
        }else{
            if($scope.approvedLecture.current[revision.status]){
                $scope.approvedLecture.current[revision.status].push(revision);
            }else{
                switch (revision.status) {
                    case "Готова до релізу":
                        $scope.approvedLecture.current['proposed_to_release'].push(revision);
                        break;
                    case "Реліз":
                        $scope.approvedLecture.current['released'].push(revision);
                        break;
                    case "Затверджена":
                        $scope.approvedLecture.current['approved'].push(revision);
                        break;
                }
            }
        }
        $scope.model.splice(index, 1);
        for(var i=1; i<=$scope.model.length-index;i++){
            $scope.model[index-1+i].module_order-=1;
        }
    };
    //reorder pages
    $scope.editModuleRevision = function (lectureList) {
        if($scope.enabled!=false){
            $scope.revisionSaving=true;
            $scope.enabled=false;
            var object = {};
            lectureList.forEach(function (item, index) {
                object[item.id_lecture_revision] = {
                    id_lecture_revision: item.id_lecture_revision,
                    lecture_order: index + 1
                };
            });
            $http({
                url: basePath + '/moduleRevision/editModuleRevision',
                method: "POST",
                data: $.param({moduleLectures: JSON.stringify(object), id_module_revision: idRevision}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function successCallback() {
                bootbox.alert("Зміни збережено", function () {
                    location.reload();
                });
                $scope.enabled=true;
            }, function errorCallback() {
                bootbox.alert("Зберегти зміни в ревізію не вдалося. Зв'яжіться з адміністрацією");
                $scope.enabled=true;
                return false;
            });
        }
    };
    $scope.previewModuleRevision = function(url) {
        if(!$scope.revisionSaving){
            bootbox.alert("Спочатку збережи зміни, які ти вніс в наповнені модуля");
        }else{
            location.href=url;
        }
    };
    //edit revision
    $scope.editModuleRevisionPage = function(url) {
        location.href=url;
    };
    //approve revision
    $scope.approveModuleRevision = function(id) {
        moduleRevisionsActions.approveModuleRevision(id).then(function(){
            getModuleData.getData(idRevision).then(function(response) {
                $rootScope.moduleData = response;
            });
        });
    };
    //send revision for approve
    $scope.sendModuleRevision = function(id, redirect) {
        if(!$scope.revisionSaving){
            bootbox.alert("Спочатку збережи зміни, які ти вніс в наповнені модуля");
        }else{
            moduleRevisionsActions.sendModuleRevision(id).then(function(senResponse){
                if(senResponse){
                    bootbox.alert(senResponse, function () {
                        getModuleData.getData(idRevision).then(function (response) {
                            $rootScope.moduleData = response;
                            if (redirect) {
                                location.href = basePath + '/moduleRevision/previewModuleRevision?idRevision=' + idRevision;
                            }
                        });
                    });
                } else{
                    getModuleData.getData(idRevision).then(function (response) {
                        $rootScope.moduleData = response;
                        if (redirect) {
                            location.href = basePath + '/moduleRevision/previewModuleRevision?idRevision=' + idRevision;
                        }
                    });
                }
            });
        }
    };
    //canceled edit revision by the editor
    $scope.cancelModuleEditByEditor = function(id, redirect) {
        if(!$scope.revisionSaving){
            bootbox.alert("Спочатку збережи зміни, які ти вніс в наповнені модуля");
        }else{
            moduleRevisionsActions.cancelModuleEditByEditor(id).then(function(){
                getModuleData.getData(idRevision).then(function(response) {
                    $rootScope.moduleData = response;
                    if(redirect){
                        location.href=basePath+'/moduleRevision/previewModuleRevision?idRevision='+idRevision;
                    }
                });
            });
        }
    };

    $scope.cancelSendModuleRevision = function(id) {
        moduleRevisionsActions.cancelSendModuleRevision(id).then(function(){
            getModuleData.getData(idRevision).then(function(response) {
                $rootScope.moduleData = response;
            });
        });
    };

    $scope.cancelModuleRevision = function(id) {
        moduleRevisionsActions.cancelModuleRevision(id).then(function(){
            getModuleData.getData(idRevision).then(function(response) {
                $rootScope.moduleData = response;
            });
        });
    };

    $scope.rejectModuleRevision = function(id) {
        bootbox.dialog({
            title: "Ти впевнений, що хочеш відхилити ревізію?",
                message: '<div class="panel-body"><div class="row"><form role="form" name="rejectMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="rejectMessageText" placeholder="тут можна залишити коментар при відхилені ревізії"></textarea>'+
                '</div></form></div></div>',
                buttons: {success: {label: "Підтвердити", className: "btn btn-primary",
                    callback: function () {
                        var comment = $('#rejectMessageText').val();
                        moduleRevisionsActions.rejectModuleRevision(id, comment).then(function(){
                            getModuleData.getData(idRevision).then(function(response) {
                                $rootScope.moduleData = response;
                            });
                        });
                    }
                },
                    cancel: {label: "Скасувати", className: "btn btn-default",
                        callback: function () {
                        }
                    }
                }
            }
        );
    };

    $scope.releaseModuleRevision = function(id) {
        if($scope.enabled!=false) {
            $scope.enabled = false;
            moduleRevisionsActions.releaseModuleRevision(id).then(function () {
                $scope.enabled=true;
                getModuleData.getData(idRevision).then(function (response) {
                    $rootScope.moduleData = response;
                });
            });
        }
    };

    $scope.restoreModuleEditByEditor = function(id) {
        moduleRevisionsActions.restoreModuleEditByEditor(id).then(function(){
            getModuleData.getData(idRevision).then(function(response) {
                $rootScope.moduleData = response;
            });
        });
    };

    $scope.checkModuleRevision = function() {
        $http({
            url: basePath+'/moduleRevision/checkModuleRevision',
            method: "POST",
            data: $.param({idRevision:idRevision}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data);
        }, function errorCallback(response) {
            console.log('checkLecture error');
            console.log(response);
            return false;
        });
    };

    $scope.sendModuleRevisionMessage = function(idRevision) {
        moduleRevisionMessage.sendMessage(idRevision);
    };

    //watch if model lectureInModule changes and not saved
    $scope.$watchCollection('lectureInModule', function(newValue, oldValue) {
        if ($scope.initializing) {
            if (newValue !== oldValue) {
                $scope.revisionSaving=false;
            }
        }
    });

    //check unsaved text blocks
    $scope.revisionSaving=true;
    $(window).bind("beforeunload",function(event) {
        if(!$scope.revisionSaving)
            return "Ви дійсно хочете покинути сторінку? На сторінці знаходяться не збережені дані";
    });
}

function moduleEditTagsCtrl($scope, $http) {
    $scope.moduleTags=[];
    //manipulations with module tags
    $scope.tagsList = function() {
        var promise=$http({
            url: basePath+'/module/getTagsList',
            method: "POST",
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            $scope.tags=response.data;
        }, function errorCallback() {
            bootbox.alert('Виникла помилка при завантажені хмарини тегів');
            return false;
        });
        return promise;
    };
    $scope.tagsList().then(function(response) {
        $http({
            url: basePath+'/module/getModuleTags',
            method: "POST",
            data: $.param({idModule:idModule}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            $scope.moduleTags=response.data;
            $.each($scope.moduleTags, function(indexModuleTag) {
                $.each($scope.tags, function(indexTag) {
                    if($scope.tags[indexTag]['id']==$scope.moduleTags[indexModuleTag]['id']){
                        $scope.tags.splice(indexTag, 1);
                        return false;
                    }
                });
            });
        }, function errorCallback() {
            bootbox.alert('Виникла помилка при завантажені хмарини тегів модуля');
            return false;
        });
    });

    $scope.addTag = function(tag,index) {
        $scope.moduleTags.push({id: tag.id, tag: tag.tag});
        $scope.tags.splice(index, 1);
    };
    $scope.removeTag = function(tag,index) {
        $scope.tags.push({id: tag.id, tag: tag.tag});
        $scope.moduleTags.splice(index, 1);
    };
    //manipulations with module tags
    
    $scope.editModuleTags = function() {
        $http({
            url: basePath+'/module/editModuleTags',
            method: "POST",
            data: $.param({moduleTags:$scope.moduleTags,idModule:idModule}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            if(response.data!='')
                bootbox.alert(response.data, function (){
                    location.reload();
                });
            else{
                location.reload();
            }
        }, function errorCallback() {

            bootbox.alert('Виникла помилка при створені модуля. Зв\'яжіться з адміністрацією.');
            return false;
        });
    };
}

function getImgName (str){
    if (str.lastIndexOf('\\')){
        var i = str.lastIndexOf('\\')+1;
    }
    else{
        var i = str.lastIndexOf('/')+1;
    }
    var filename = str.slice(i);
    var uploaded = document.getElementById("avatarInfo");
    uploaded.innerHTML = filename;
}

/**
 * Created by Wizlight on 14.01.2016.
 */
function CheckFile(file)
{
    var msg;
    var error=0;
    var maxSize=1024*1024*5;
    if(file.files[0].size>maxSize)
        error=error+1;
    var filesExt = ['jpg', 'gif', 'png','jpeg'];
    var parts = $(file).val().split('.');
    if(filesExt.join().search(parts[parts.length - 1]) == -1){
        error=error+2;
    }
    if(error!=0){
        switch (error) {
            case 1:
                msg='Файл перевищує 5 Мб';
                break;
            case 2:
                msg='Неправильний формат файлу';
                break;
            case 3:
                msg='Файл перевищує 5 Мб. Неправильний формат файлу';
                break;
        }
        $('#errorMessage').text(msg);
        $('#errorMessage').show();
        $('#imgButton').attr('disabled','true');
    }else{
        $('#errorMessage').hide();
        $('#imgButton').removeAttr('disabled');
    }
}
