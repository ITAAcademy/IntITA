/**
 * Created by adm on 26.07.2016.
 */
angular
    .module('teacherApp')
    .controller('studentCtrl', studentCtrl)
    .controller('offlineEducationCtrl', offlineEducationCtrl)
    .controller('invoicesByAgreement', invoicesByAgreement)
    .controller('studentPlainTasksCtrl', studentPlainTasksCtrl)
    .controller('studentPlainTaskViewCtrl', studentPlainTaskViewCtrl)
    .filter('htmlToShotPlaintext', function() {
        return function(text, mode) {
            if(text){
                var str=String(text).replace(/<[^>]+>/gm, '').replace(/&nbsp;/gi,'').replace(/&lt;/gi,'<').replace(/&amp;/gi,'&').replace(/&gt;/gi,'>').replace(/&quot;/gi,'"').trim();
                if(str.length>50 && !mode){
                    return $jq('<textarea />').html(str).text().substr(0, 50)+"..."
                }else{
                    return $jq('<textarea />').html(str).text();
                }
            }else return '';
        };
    })
    .filter('textToShotPlaintext', function() {
        return function(text, mode) {
            if(text){
                var str=String(text).trim();
                if(str.length>50 && !mode){
                    return $jq('<textarea />').html(str).text().substr(0, 50)+"..."
                }else{
                    return $jq('<textarea />').html(str).text();
                }
            }else return '';
        };
    })
    .filter('htmlToPlaintext', function() {
        return function(text) {
            if(text){
                return String(text).replace(/<[^>]+>/gm, '').replace(/&nbsp;/gi,'').replace(/&lt;/gi,'<').replace(/&amp;/gi,'&').replace(/&gt;/gi,'>').replace(/&quot;/gi,'"').trim();
            }else return '';
        };
    })
    .filter('spentTime', function() {
        return function(ms) {
            if(ms){
                var hours = Math.floor(ms/3600);
                var minutes = Math.floor((ms-hours*3600)/60);

                return hours + 'год. ' + minutes + 'хв.';
            }else return '';
        };
    })
    .filter("getDateDiff", function() {
        return function(timeArr) {
            var startDate = new Date(timeArr[0]);
            var endDate = new Date(timeArr[1]);
            var milisecondsDiff = endDate - startDate;

            return Math.floor(milisecondsDiff/(1000*60*60)).toLocaleString(undefined, {minimumIntegerDigits: 2}) + ":" + (Math.floor(milisecondsDiff/(1000*60))%60).toLocaleString(undefined, {minimumIntegerDigits: 2})  + ":" + (Math.floor(milisecondsDiff/1000)%60).toLocaleString(undefined, {minimumIntegerDigits: 2}) ;
        }
    })
    .filter("asDate", function () {
        return function (input) {
            return new Date(input);
        }
    });

function studentCtrl($scope, $rootScope, $http, NgTableParams,$resource, $state, studentService) {
    $scope.getNewPlainTasksMarks=function(){
        studentService.newPlainTasksMarks()
            .$promise
            .then(function successCallback(response) {
                $rootScope.countOfNewPlainTasksMarks=response.data;
            }, function errorCallback() {
                console.log("Отримати дані про нові оцінки по простих завданнях не вдалося");
            });
    };
    $scope.getNewPlainTasksMarks();
    
    $scope.getTodayConsultations = function() {
        initTodayConsultationsTable();

        // NEXT iteration
        $scope.todayConsultationsTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath + '/_teacher/_student/student/getTodayConsultationsList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });
    };
    $scope.getPastConsultations = function(){
        $scope.pastConsultationsTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getPastConsultationsList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });
    };

    $scope.getCanceledConsultations = function(){
        $scope.canceledConsultationsTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getCancelConsultationsList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });
    };

    $scope.getPlannedConsultations = function(){
        $scope.plannedConsultationsTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getPlannedConsultationsList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });
    };

    $scope.getStudentAgreements = function(){
        $scope.agreementsTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getAgreementsList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
            }
        });
    };

    $scope.getStudentPaidCourses = function(){
        $scope.paidCoursesTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getPayCoursesList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    $scope.usd = data.usd;
                    //todo
                    data.rows.forEach(function(row) {
                        var paid=0;
                        row.internalPayment.forEach(function (pays) {
                            paid = paid+Number(pays.summa);
                        });
                        row.paidAmount=parseFloat(paid).toFixed(2);
                    });
                    return data.rows;
                });
            }
        });
    };
    $scope.usd = null;
    $scope.getStudentPaidModules = function(){
        $scope.paidModulesTable = new NgTableParams({
            page: 1,
            count: 10
        }, {
            getData: function (params) {
                return $resource(basePath+'/_teacher/_student/student/getPayModulesList').get(params.url()).$promise.then(function (data) {
                    params.total(data.count);
                    //todo
                    data.rows.forEach(function(row) {
                        var paid=0;
                        row.internalPayment.forEach(function (pays) {
                            paid = paid+Number(pays.summa);
                        });
                        row.paidAmount=parseFloat(paid).toFixed(2);
                    });
                    $scope.usd = data.usd;
                    return data.rows;
                });
            }
        });
    };

    $scope.cancelConsultation = function(consultationId){
        bootbox.confirm('Відмінити консультацію?',function(result){
            if (result){
                $http({
                    method:'POST',
                    url:basePath+'/_teacher/_student/student/cancelConsultation?id='+consultationId,
                }).success(function(response){
                    if (response==='success'){
                        $state.go('student/consultations');
                    }
                    else{
                        bootbox.alert('Что-то пошло не так!')
                    }
                }).error(function(){
                    bootbox.alert('Что-то пошло не так!')
                })
            }
        })
    }
}

function offlineEducationCtrl($scope, $http) {
    $scope.changePageHeader('Офлайн навчання');
    $http({
        method: 'POST',
        url: basePath+'/_teacher/_student/student/getOfflineEducationData',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    }).then(function successCallback(response) {
        $scope.subgroups=response.data;
    }, function errorCallback() {
        bootbox.alert("Завантажити дані офлайн навчання не вдалося. Зв\'яжіться з адміністрацією.");
    });
}

function invoicesByAgreement($scope, NgTableParams, $stateParams, studentService, agreementsService, $uibModal, documentsServices, FileUploader, $http) {
    $scope.open = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };


    $scope.changePageHeader('Договір/рахунки');

    $scope.invoiceUrl=basePath+'/invoice/';
    $scope.editAgreementData=true;

    $scope.invoicesTable = new NgTableParams({}, {
        getData: function (params) {
            $scope.currentDate = currentDate;
            $scope.params=params.url();
            $scope.params.id=$stateParams.agreementId?$stateParams.agreementId:$scope.agreementId;
            return studentService
                .invoicesByAgreement($scope.params)
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    //get paid amount for each invoice
                    data.rows.forEach(function(row) {
                        var paid=0;
                        row.internalPayment.forEach(function (pays) {
                            paid = paid+Number(pays.summa);
                        });
                        row.paidAmount=parseFloat(paid).toFixed(2);
                    });
                    return data.rows;
                });
        }
    });

    //contract views
    $scope.getAgreementTemplate=function(agreementId) {
        agreementsService
            .getAgreementTemplate({'agreementId': agreementId})
            .$promise
            .then(function successCallback(response) {
                $scope.agreementTemplate = response.data.template;
            }, function errorCallback() {
                bootbox.alert("Шаблон договору отримати не вдалося");
            });
    }

    $scope.writtenAgreementPreview=function(agreementId){
        studentService
            .getWrittenAgreementData({'id': agreementId})
            .$promise
            .then(function (data) {
                $scope.writtenAgreement=data;
                $scope.getAgreementTemplate(agreementId);
            });
    };

    $scope.getAgreementContract=function(agreementId){
        studentService
            .getAgreementContract({'id': agreementId})
            .$promise
            .then(function (response) {
                $scope.contract=response;
            });
    };

    $scope.checkAgreementPdf = function (agreementId) {
        studentService
            .checkAgreementPdf({agreementId:agreementId})
            .$promise
            .then(function (response) {
                $scope.actualAgreement=response.data;
                $scope.waitingForApproval= $scope.actualAgreement.checked_by_accountant==1 &&
                    $scope.actualAgreement.checked_by_user==0 && $scope.actualAgreement.checked==0;
                if ($scope.actualAgreement) {
                    if (parseInt($scope.actualAgreement.checked)) {
                        $scope.pdfAgreement=true;
                    }else{
                        $scope.pdfAgreement=false;
                        $scope.agreementTemplate = $scope.actualAgreement.html_for_edit;
                    }
                }else{
                    $scope.pdfAgreement=false;
                }
                $scope.writtenAgreementPreview(agreementId);
            });
    };

    $scope.sendCheckedWrittenAgreementRequest = function (agreementId) {
        $scope.openInformationDialog = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: basePath + '/angular/js/teacher/templates/accountancy/information.html',
            scope: $scope,
            size: 'md',
            appendTo: false,
        });
    };

    $scope.sendWrtnAgrRequest = function (agreementId) {
        $scope.openInformationDialog.close();
        studentService
            .writtenAgreementRequest({'id': agreementId})
            .$promise
            .then(function successCallback(response) {
                if(response.message=='error'){
                    switch ( response.reason ) {
                        case 1:
                            if(!$scope.openPassportDialog || !$scope.openPassportDialog.opened.status){
                                $scope.passport = JSON.parse(response.passport);
                                $scope.inn = JSON.parse(response.inn);
                                $scope.passport.issued_date = $scope.passport.issued_date ? new Date($scope.passport.issued_date) : null;
                                $scope.openPassportDialog = $uibModal.open({
                                    animation: true,
                                    ariaLabelledBy: 'modal-title',
                                    ariaDescribedBy: 'modal-body',
                                    templateUrl: basePath + '/angular/js/teacher/templates/accountancy/passportForm.html',
                                    scope: $scope,
                                    size: 'md',
                                    appendTo: false,
                                });
                            }
                            break;
                        case 2:
                            if(!$scope.openInnDialog || !$scope.openInnDialog.opened.status) {
                                $scope.inn = JSON.parse(response.inn);
                                $scope.openInnDialog = $uibModal.open({
                                    animation: true,
                                    ariaLabelledBy: 'modal-title',
                                    ariaDescribedBy: 'modal-body',
                                    templateUrl: basePath + '/angular/js/teacher/templates/accountancy/innForm.html',
                                    scope: $scope,
                                    size: 'md',
                                    appendTo: false,
                                });
                            }
                            break;
                        case 3:
                            $scope.passport = JSON.parse(response.passport);
                            $scope.inn = JSON.parse(response.inn);
                            $scope.passport.issued_date = $scope.passport.issued_date ? new Date($scope.passport.issued_date) : null;
                            $scope.openPassportDialog = $uibModal.open({
                                animation: true,
                                ariaLabelledBy: 'modal-title',
                                ariaDescribedBy: 'modal-body',
                                templateUrl: basePath + '/angular/js/teacher/templates/accountancy/passportForm.html',
                                scope: $scope,
                                size: 'md',
                                appendTo: false,
                            });
                            $scope.openInnDialog = $uibModal.open({
                                animation: true,
                                ariaLabelledBy: 'modal-title',
                                ariaDescribedBy: 'modal-body',
                                templateUrl: basePath + '/angular/js/teacher/templates/accountancy/innForm.html',
                                scope: $scope,
                                size: 'md',
                                appendTo: false,
                            });
                            break;
                    }
                }else{
                    bootbox.alert(response.reason);
                }
                $scope.getWrittenAgreementRequestStatus(agreementId);
            }, function errorCallback(response) {
                bootbox.alert(response.reason);
            })
    }


    // datepickers options
    $scope.dateOptionsDeadline = new DateOptions();
    $scope.dateOptionsStart = new DateOptions();
    $scope.dateOptionsEnd = new DateOptions();
    function DateOptions() {
        this.popupOpened = false;
        this.maxDate = new Date();
        this.startingDay = 1;
    }

    DateOptions.prototype.open = function () {
        this.popupOpened = true;
    };

    $scope.saveDocumentsData = function (document) {
        if($jq("#issued_date").val()!=''){
            document.issued_date=$jq("#issued_date").val();
        }else{
            document.issued_date=null;
        }
        documentsServices
            .saveData(document)
            .$promise
            .then(function (data) {
                if (data.message === 'OK') {
                    if(documentUploader.queue.length){
                        documentUploader.uploadAll();
                    }else if(innUploader.queue.length){
                        innUploader.uploadAll();
                    }else{
                        $scope.writtenAgreementPreview($stateParams.agreementId);
                        if(document.type==1) $scope.openPassportDialog.close();
                        if(document.type==2) $scope.openInnDialog.close();
                        $scope.sendWrtnAgrRequest($stateParams.agreementId);
                    }
                } else {
                    bootbox.alert('Виникла помилка:'+'<br>'+data.reason);
                    $scope.openPassportDialog.close();
                    $scope.openInnDialog.close();
                }
            })
            .catch(function (error) {
                bootbox.alert(error.data.reason);
            });
    };

    $scope.getWrittenAgreementRequestStatus = function (agreementId) {
        studentService
            .writtenAgreementRequestStatus({'id':agreementId})
            .$promise
            .then(function (response) {
                $scope.writtenAgreementRequestStatus=response.data;
            });
    };
    $scope.getWrittenAgreementRequestStatus($stateParams.agreementId);

    $scope.updateUserAgreementData = function(type, data, attributes){
        var helperData = updateUserAgreementDataHelper(data, attributes);
        bootbox.dialog({
                title: "Змінити дані",
                message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="dataText" ' +
                'placeholder='+helperData.placeholder+'>' +helperData.data+ '</textarea>'+'</div></form></div></div>',
                buttons:
                    {success:
                        {label: "Підтвердити", className: "btn btn-primary",
                            callback: function () {
                                var data = $jq('#dataText').val();
                                data = userAgreementDataValidate(type, data, attributes);
                                if (data !== undefined && data !== null) {
                                    studentService
                                        .updateUserAgreementData({type:type,attribute: attributes,data: data})
                                        .$promise
                                        .then(function (data) {
                                            $scope.writtenAgreementPreview($stateParams.agreementId);
                                        });
                                }
                            }
                        },
                        cancel:
                            {label: "Скасувати", className: "btn btn-default",
                                callback: function () {
                                }
                            }
                    }
            }
        );
    }

    function updateUserAgreementDataHelper(data, attributes) {
        var placeholder = 'тут можна ввести нові дані';
        if (attributes === 'issued_date') {
            placeholder = '11.11.2011';
            data = parseDate(data);
        }
        return {
            data: data,
            placeholder: placeholder
        };
    }

    $scope.regexpDocumentsForm = {
        userFullName: /^[а-еж-щьюяієїґА-ЕЖ-ЩЬЮЯІЇЄҐ\-\'’]*$/,
        pasportNumber: /^([а-еж-щьюяієїґ]{2}\d{6})$|^(\d{6})$/i,
        issued: /^[а-еж-щьюяієїґ\-\s\'’]*$/i,
        issuedDate: /^[0-3]?[0-9][.]{1}[0-3]?[0-9][.]{1}(?:[0-9]{2})?[0-9]{2}$/,
        innNumber: /^\d{10}$/
    }

    function userAgreementDataValidate(type, data, attributes) {
        switch(Number(type)) {
            case 1:
                return documentTypeOneValidate(attributes, data);
            case 2:
                return validationResponse(data.match($scope.regexpDocumentsForm.innNumber), attributes);
            default:
                return data;
        }
    }

    function documentTypeOneValidate(attributes, data) {
        switch(attributes) {
            case 'last_name':
            case 'first_name':
            case 'middle_name':
                return validationResponse(data.match($scope.regexpDocumentsForm.userFullName), attributes);
            case 'number':
                return validationResponse(data.match($scope.regexpDocumentsForm.pasportNumber), attributes);
            case 'issued':
                return validationResponse(data.match($scope.regexpDocumentsForm.issued), attributes);
            case 'issued_date':
                return validationResponse(data.match($scope.regexpDocumentsForm.issuedDate), attributes);
            default:
                return null;
        }
    }

    function validationResponse(data, attributes) {
        if (data) {
            return data[0];
        } else {
            bootbox.alert(`Введено неприпустимий символ в поле ${attributes}`);
        }
    }

    function parseDate(date) {
        date = new Date(date);
        return date.getDate() + '.' + (date.getMonth() + 1) + '.' + date.getFullYear();
    }


    $scope.phoneMask = '(093)888-8888';

    $scope.updateUserData = function(data,attributes){
        var isPhone = attributes === 'phone';
        if(!data){
            data='';
            var placeholder='Введіть атрибут '+ attributes;
        }
        isPhone ? setPrompt(data, attributes) : setDialog(data, placeholder, attributes);
    }

    function setPrompt(data, attributes) {
        var placeholder='Введіть номер телефону '+ $scope.phoneMask;
        bootbox.prompt({
            title: "Змінити дані",
            placeholder: placeholder,
            value: data,
            buttons: {
                confirm: {
                    label: 'Підтвердити',
                    className: "btn btn-primary"
                }
            },
            callback: function (data) {
                data = userPhoneValidation(data);
                if (data !== undefined && data !== null) {
                    setStudenService(data, attributes)
                }
            }

        });
    }

    function setDialog(data, placeholder, attributes) {
        bootbox.dialog({
            title: "Змінити дані",
            message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="dataText" ' +
                'placeholder="'+placeholder+'">' +data+ '</textarea>'+'</div></form></div></div>',
            buttons:
                {success:
                    {label: "Підтвердити", className: "btn btn-primary",
                        callback: function () {
                            var data = $jq('#dataText').val();
                            setStudenService(data, attributes);
                        }
                    },
                    cancel:
                        {label: "Скасувати", className: "btn btn-default",
                            callback: function () {
                            }
                        }
                }
            }
        );
    }

    function setStudenService(data, attributes) {
        studentService
            .updateUserData({attribute: attributes,data: data})
            .$promise
            .then(function (data) {
                $scope.writtenAgreementPreview($stateParams.agreementId);
        });
    }

    function userPhoneValidation(data) {
        if (data !== null) {
            var phoneRegex = /^[+]{0,1}[3]{0,1}[8]{0,1}[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
            var isPhone = data.match(phoneRegex);
            if (isPhone) {
                return isPhone[0];
            } else {
                bootbox.alert('Ви ввели невалідний номер телефону!<br>Приклад номеру телефону - '+ $scope.phoneMask);
            }
        }
        return null;
    }

    $scope.checkWrittenAgreementRequestByUser = function (data) {
        studentService
            .checkAgreementByUser(
                {
                    'id': data.id,
                })
            .$promise
            .then(function (response) {
                $scope.checkAgreementPdf(data.id_agreement);
            })
            .catch(function (error) {
                bootbox.alert(error.data.reason);
            })
    };

    $scope.getAgreementPdf = function (id) {
        studentService
            .getAgreementFile({'id':id})
            .$promise
            .then(function (response) {
                $scope.agreementPdf=response.data;
            })
            .catch(function (error) {
                bootbox.alert("Отримати файл договору не вдалося");
            })
    }
    $scope.getDocument = function (documentID) {
        bootbox.alert({
            message: "<img width='100%' src='" + basePath + '/profile/getdocument?documentId=' + documentID + "'>",
            size: 'large'
        })
    }

    $scope.open = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
    };

    $scope.dateOptions = {
        formatYear: 'yy',
        startingDay: 1
    };

    //documents
    var documentUploader = $scope.documentUploader = new FileUploader({
        url: basePath+'/studentreg/uploadDocuments?type=1',
        removeAfterUpload: true
    });
    documentUploader.onCompleteAll = function() {
        $scope.writtenAgreementPreview($stateParams.agreementId);
        $scope.openPassportDialog.close();
        $scope.loadDocuments();
    };
    documentUploader.onErrorItem = function(item, response, status, headers) {
        if(status==500)
            bootbox.alert("Виникла помилка при завантажені документа.");
    };

    var innUploader = $scope.innUploader = new FileUploader({
        url: basePath+'/studentreg/uploadDocuments?type=2',
        removeAfterUpload: true
    });
    innUploader.onCompleteAll = function() {
        $scope.writtenAgreementPreview($stateParams.agreementId);
        $scope.openInnDialog.close();
        $scope.loadDocuments();
    };
    innUploader.onErrorItem = function(item, response, status, headers) {
        if(status==500)
            bootbox.alert("Виникла помилка при завантажені документа.");
    };

    documentUploader.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });
    innUploader.filters.push({
        name: 'imageFilter',
        fn: function(item /*{File|FileLikeObject}*/, options) {
            var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
            return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
        }
    });

    documentUploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
        console.info('onWhenAddingFileFailed', item, filter, options);
    };
    innUploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
        console.info('onWhenAddingFileFailed', item, filter, options);
    };

    $scope.loadDocuments=function () {
        documentsServices
            .getAllUserDocuments()
            .$promise
            .then(function (data) {
                data.forEach(function(row) {
                    if(row.type==1 && $scope.passport){
                        $scope.passport.documentsFiles = row.documentsFiles;
                    }
                    if(row.type==2 && $scope.inn){
                        $scope.inn.documentsFiles = row.documentsFiles;
                    }
                });
            });
    };

    $scope.removeDocumentsFileDialog=function (id) {
        $scope.fileId = id;
        $scope.removeDialog = $uibModal.open({
            animation: true,
            ariaLabelledBy: 'modal-title',
            ariaDescribedBy: 'modal-body',
            templateUrl: basePath + '/angular/js/teacher/templates/accountancy/deleteFileDialog.html',
            scope: $scope,
            size: 'md',
            appendTo: false,
        });
    }

    $scope.removeDocumentsFile=function (id) {
        $http({
            url: basePath + "/studentreg/removeuserdocumentsfile",
            method: "POST",
            data: $jq.param({id: id}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.writtenAgreementPreview($stateParams.agreementId);
            $scope.loadDocuments();
            $scope.removeDialog.close();
        }, function errorCallback() {
            bootbox.alert("Виникла помилка при видалені документу.");
        });
    }
}

function studentPlainTasksCtrl($scope, $rootScope, NgTableParams, studentService) {
    $scope.changePageHeader('Завдання з розгорнутою відповідю');
    //set new plain task marks as read
    $scope.readNewPlainTasksMarks=function(){
        studentService.readNewPlainTasksMarks()
            .$promise
            .then(function successCallback() {
                $rootScope.countOfNewPlainTasksMarks=0;
            }, function errorCallback() {
                console.log("Виникла помилка при спробі відмітити нові оцінки на прості задачі, як переглянуті");
            });
    };
    $scope.readNewPlainTasksMarks();

    $scope.marks = [{id:'0', title:'не зарах.'}, {id:'1', title:'зарах.'}, {id:'null', title:'не перевірено'}];

    $scope.studentPlainTasksAnswersTable = new NgTableParams({
        sorting: {
            'plainTaskMark.time': 'desc'
        },
    }, {
        getData: function (params) {
            return studentService
                .studentPlainTasksAnswers(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);

                    $jq(".question span").remove();
                    $jq(".question script").remove();

                    setTimeout(function() {
                        MathJax.Hub.Config({
                            tex2jax: {
                                inlineMath: [['$','$'], ['\\(','\\)']]
                            },
                            "HTML-CSS": {
                                linebreaks: { automatic: true }
                            },
                            SVG: {
                                linebreaks: { automatic: true }
                            }
                        });
                        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
                    });
                    return data.rows;
                });
        }
    });
}

function studentPlainTaskViewCtrl($scope, NgTableParams, $stateParams, studentService) {
    $scope.changePageHeader('Завдання з розгорнутою відповідю');

    $scope.studentPlainTasksAnswersTable = new NgTableParams({}, {
        getData: function (params) {
            $scope.params=params.url();
            $scope.params.id=$stateParams.id;
            return studentService
                .studentPlainTasksAnswers($scope.params)
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    setTimeout(function() {
                        MathJax.Hub.Config({
                            tex2jax: {
                                inlineMath: [['$','$'], ['\\(','\\)']]
                            },
                            "HTML-CSS": {
                                linebreaks: { automatic: true }
                            },
                            SVG: {
                                linebreaks: { automatic: true }
                            }
                        });
                        MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
                    });
                    return data.rows;
                });
        }
    });
}

angular
    .module('teacherApp')
    .controller('writtenAgreementCtrl', ['$scope', 'studentService',
    function ($scope, studentService) {
        $scope.writtenAgreementPreview=function(agreementId){
            studentService
                .getWrittenAgreementData({'id': agreementId})
                .$promise
                .then(function (data) {
                    $scope.writtenAgreement=data;
                });
        };
    }])