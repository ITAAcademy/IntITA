angular
    .module('teacherApp')
    .controller('usersTableCtrl',usersTableCtrl)
    .controller('studentsTableCtrl',studentsTableCtrl)
    .controller('withoutRolesTableCtrl',withoutRolesTableCtrl)
    .controller('adminsTableCtrl',adminsTableCtrl)
    .controller('accountantsTableCtrl',accountantsTableCtrl)
    .controller('contentManagersTableCtrl',contentManagersTableCtrl)
    .controller('teacherConsultantsTableCtrl',teacherConsultantsTableCtrl)
    .controller('tenantsTableCtrl',tenantsTableCtrl)
    .controller('trainersTableCtrl',trainersTableCtrl)
    .controller('blockedUsersCtrl',blockedUsersCtrl)
    .controller('superVisorsTableCtrl', superVisorsTableCtrl)
    .controller('authorsTableCtrl', authorsTableCtrl)
    .controller('offlineStudentsTableCtrl', offlineStudentsTableCtrl)
    .controller('userProfileCtrl',userProfileCtrl)
    .controller('usersEmailCtrl',usersEmailCtrl)
    .controller('emailCategoryTableCtrl',emailCategoryTableCtrl)
    .controller('emailCategoryCtrl',emailCategoryCtrl)
    .controller('directorsTableCtrl', directorsTableCtrl)
    .controller('auditorsTableCtrl', auditorsTableCtrl)
    .controller('superAdminsTableCtrl', superAdminsTableCtrl)
    .controller('usersTabsCtrl', usersTabsCtrl)
    .controller('organizationUsersTabsCtrl', organizationUsersTabsCtrl)
    .controller('addStudentTrainerCtrl', addStudentTrainerCtrl)
    .controller('changeTrainersCtrl', changeTrainersCtrl)
    .controller('studentsInfoCtrl', studentsInfoCtrl)
    .controller('personalInfoCtrl', personalInfoCtrl)
    .controller('careerStudentsCtrl', careerStudentsCtrl)
    .controller('contractStudentsCtrl', contractStudentsCtrl)
    .controller('visitInfoCtrl', visitInfoCtrl)
    .controller('apiKeyManagerTableCtrl', apiKeyManagerTableCtrl)

function blockedUsersCtrl ($http, $scope, usersService, NgTableParams) {
    $scope.blockedUsersTable = new NgTableParams({
        sorting: {
            locked_date: 'desc'
        },
    }, {
        getData: function (params) {
            return usersService
                .blockedUsersList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
    $scope.changeUserStatus=function (url, user, message) {
        bootbox.confirm(message, function (response) {
            if (response) {
                $http({
                    method: 'POST',
                    url: url,
                    data: $jq.param({user: user}),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback(response) {
                    bootbox.confirm(response.data, function () {
                        $scope.blockedUsersTable.reload();
                    });
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        });
    }
};

function usersTableCtrl ($scope, usersService, NgTableParams){
    $scope.usersTableParams = new NgTableParams({
        sorting: {
            reg_time: 'desc'
        },
    }, {
        getData: function (params) {
            return usersService
                .usersList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}
function studentsTableCtrl ($scope, usersService, NgTableParams, $attrs){
    $jq("#startDate").datepicker(lang);
    $jq("#endDate").datepicker(lang);
    $scope.changePageHeader('Закріплені студенти');
    $jq(function() {
        $jq( "#from" ).datepicker({
            dateFormat: 'dd-mm-yy',
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $jq( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $jq( "#to" ).datepicker({
            dateFormat:'yy-mm-dd',
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $jq( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
    // // $scope.changePageHeader('Закріплені студенти');
    // // $scope.trainersStudentsTableParams = new NgTableParams({
    // //     sorting: {
    // //         "start_time": 'desc'
    // //     },
    // // }, {
    // //     getData: function (params) {
    // //         return trainerService
    // //             .trainersStudentsList(params.url())
    // //             .$promise
    // //             .then(function (data) {
    // //                 params.total(data.count);
    // //                 return data.rows;
    // //             });
    // //     }
    // // });
    //
    // $scope.studentsTableParams = new NgTableParams({
    //     organization:$attrs.organization,
    //     sorting: {
    //         "start_date": 'desc'
    //     },
    // }, {
    //     getData: function (params) {
    //         $scope.params=params.url();
    //         $scope.params.startDate=$scope.startDate;
    //         $scope.params.endDate=$scope.endDate;
    //         return usersService
    //             .studentsList($scope.params)
    //             .$promise
    //             .then(function (data) {
    //                 params.total(data.count);
    //                 return data.rows;
    //             });
    //     }
    // });
    //
    // $scope.updateStudentList=function(organization, startDate, endDate){
    //     $scope.studentsTableParams = new NgTableParams({}, {
    //         getData: function (params) {
    //             $scope.params=params.url();
    //             $scope.params.startDate=startDate;
    //             $scope.params.endDate=endDate;
    //             $scope.params.organization=organization;
    //             return usersService
    //                 .studentsList($scope.params)
    //                 .$promise
    //                 .then(function (data) {
    //                     params.total(data.count);
    //                     return data.rows;
    //                 });
    //         }
    //     });
    // }
}

function offlineStudentsTableCtrl ($scope, usersService, NgTableParams, $attrs){
    $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
    $scope.offlineStudentsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .offlineStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function withoutRolesTableCtrl ($scope, usersService, NgTableParams){
    $scope.withoutRolesTableParams = new NgTableParams({
        sorting: {
            reg_time: 'desc'
        },
    }, {
        getData: function (params) {
            return usersService
                .withoutRolesList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}
function adminsTableCtrl ($scope, usersService, NgTableParams, roleService, $attrs){
    $scope.adminsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .adminsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelRoleByDirector = function (user, role, organization) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelRoleByDirector({'userId': user, 'role': role, 'organizationId':organization}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.adminsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    }
}
function accountantsTableCtrl ($scope, usersService, NgTableParams,roleService, $attrs){
    $scope.accountantsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .accountantsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.accountantsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}
function contentManagersTableCtrl ($scope, usersService, NgTableParams,roleService, $attrs){
    $scope.contentManagersTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .contentManagersList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.contentManagersTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}
function teacherConsultantsTableCtrl ($scope, usersService, NgTableParams,roleService, $attrs){
    $scope.teacherConsultantsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .teacherConsultantsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.teacherConsultantsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}
function tenantsTableCtrl ($scope, usersService, NgTableParams,roleService, $attrs){
    $scope.tenantsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .tenantsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.tenantsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}

function trainersTableCtrl ($scope, usersService, NgTableParams,roleService, $attrs){
    $scope.trainersTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .trainersList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.trainersTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}

function changeTrainersCtrl($scope, usersService, roleService, $attrs) {

    $scope.getTrainers = function() {
        usersService
            .actualTrainers()
            .$promise
            .then(function (data) {
                $scope.trainers = data;
            });
        $jq('#apply-btn').prop('disabled', true);
    };
    $scope.getTrainers();

    $scope.getAllActualTrainers = function() {
        usersService
            .allActualTrainers()
            .$promise
            .then(function (data) {
                $scope.allTrainers = data;
            });
        $jq('#apply-btn').prop('disabled', true);
    };
    $scope.getAllTrainers();

    $scope.getAllTrainers = function() {
        usersService
            .allActualTrainers()
            .$promise
            .then(function (data) {
                $scope.allTrainers = data;
            });
        $jq('#apply-btn').prop('disabled', true);
    };
    $scope.getAllTrainers();

    $jq('#selectNewTrainer, #selectOldTrainer').on('change', function(){
        setTimeout(function(){
            if( $scope.id_oldTrainer != $scope.id_newTrainer && $scope.id_oldTrainer != undefined
                && $scope.id_newTrainer != undefined ){
                $jq('#apply-btn').prop('disabled', false);
            }else{
                $jq('#apply-btn').prop('disabled', true);
            }
        }, 100);
    });

    $scope.exchangeTrainers = function(id_old, id_new){
        usersService
            .exchangeTrainers({'id_old':id_old, 'id_new':id_new})
            .$promise
            .then(function () {
                    console.info('success, exchanged trainers');
		            $scope.addUIHandlers('Операцію успішно виконано');
                },
                function (error) {
                    console.error(error);
	                bootbox.alert("Операцію не вдалося виконати");
                });
    };
}

function superVisorsTableCtrl ($scope, usersService, NgTableParams, roleService, $attrs){
    $scope.superVisorsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .superVisorsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.superVisorsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}

function authorsTableCtrl ($scope, usersService, NgTableParams, roleService, $attrs){
    $scope.authorsTableParams = new NgTableParams({organization:$attrs.organization}, {
        getData: function (params) {
            return usersService
                .authorsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.authorsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };
}

function userProfileCtrl ($http, $scope, $stateParams, roleService, $rootScope, $q, userService, $state, agreementsService, usersService, $resource, chatIntITAMessenger, superVisorService){
    $scope.changePageHeader('Профіль користувача');
    $scope.userId=$stateParams.id;
    $scope.formData={};
    $rootScope.$on('mailAddressCreated', function (event, data) {
        $scope.teacher.teacher.corporate_mail = data.mailbox;
    });

    $q.all([
        userService.userProfileData({userId: $scope.userId}),
        userService.userOfflineEducationData({userId: $scope.userId}),
        userService.teacherProfileData({userId: $scope.userId}),
        userService.userRoleData({userId: $scope.userId}),
        userService.rolesHistory({userId: $scope.userId}),
        userService.studentAttributes({userId: $scope.userId}),
    ]).then(function (results) {
        $scope.user = results[0];
        $scope.offline = results[1];
        $scope.teacher = results[2];
        $scope.roles = results[3];
        $scope.historyRoles = results[4];
        $scope.studentAttributes = results[5];
    });

    $scope.reloadRolesData=function(userId){
        userService.userRoleData({userId: userId})
            .$promise
            .then(function (results) {
                $scope.roles = results;
            });
    };
    $scope.reloadUserProfileData=function(userId){
        userService.userProfileData({userId: userId})
            .$promise
            .then(function (results) {
                $scope.user = results;
            });
    };

    $scope.changeUserStatus=function (url, user) {
        $http({
            method: 'POST',
            url: url,
            data: $jq.param({user: user}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback() {
            $scope.reloadUserProfileData($scope.userId);
        }, function errorCallback() {
            bootbox.alert("Операцію не вдалося виконати");
        });
    };
    $scope.assignLocalRole = function (user, role) {
        if(user && role){
            roleService
                .assignLocalRole({
                    'userId': user,
                    'role': role,
                })
                .$promise
                .then(function successCallback(response) {
                    $scope.addUIHandlers(response.data);
                    $scope.reloadRolesData($scope.userId);
                }, function errorCallback(response) {
                    console.log(response);
                    bootbox.alert("Операцію не вдалося виконати");
                });
        }
    };

    $scope.cancelLocalRole = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelLocalRole({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.reloadRolesData($scope.userId);
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    };

    //type: course/module
    $scope.createUserWrittenAgreement = function (type, id, form, schema) {
        if(user && role){
            agreementsService
                .createUserWrittenAgreement({
                    'type': type,
                    'id': id,
                    'form': form,
                    'paymentSchema': schema
                })
                .$promise
                .then(function successCallback(response) {
                    $scope.addUIHandlers(response.data);
                    $scope.reloadRolesData($scope.userId);
                }, function errorCallback(response) {
                    console.log(response);
                    bootbox.alert("Операцію не вдалося виконати");
                });
        }
    };

    $scope.createAccount=function (url, course, module, scenario, offerScenario, schema, educationForm, selectedScheme, user) {
        if(typeof selectedScheme=='string'){
            selectedScheme=JSON.parse(selectedScheme);
        }
        $scope.educationForm=selectedScheme.educForm;
        $scope.schemeId=selectedScheme.schemeId;
        if (typeof selectedScheme=='undefined' || $scope.schemeId == 0) {
            bootbox.alert("Виберіть схему проплати.");
        } else {
            $scope.createAgreement(url, $scope.schemeId, course, $scope.educationForm, module, scenario, user);
        }
    };

    $scope.createAgreement=function (url, schema, course, educationForm, module, scenario, user) {
        $http({
            method: 'POST',
            url: url,
            data: $jq.param({
                payment: schema,
                course: course,
                educationForm: educationForm,
                module: module,
                scenario: scenario,
                user: user
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .then(function (response) {
                $state.go('accountant/studentagreement/id/:id',{id:response.data},{reload:true});
            })
            .catch(function (error) {
                bootbox.alert(error.data.reason);
            })
    };

    $scope.collapse=function (el) {
        $jq(el).toggle("medium");
    };

    $scope.addMailAddressDialogOptions = {
        templateUrl: basePath + '/angular/js/teacher/templates/addMailAddress.html',
        scope: $scope,
        title: 'Адреса корпоративної пошти без домену',
    };

    $scope.hideMailError = function () {
        $scope.usernameError = undefined;
    }
    $scope.addCorpAddress = function () {
        if ($scope.mailForm.mailAddress.$dirty && $scope.mailForm.mailAddress.$valid) {
            $http({
                method: 'POST',
                url: basePath + "/_teacher/user/addCorpMail",
                data: $jq.param({userId: $stateParams.id, address: $scope.address}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function (response) {
                if (response.error == undefined) {
                    $scope.$emit('mailAddressCreated', response);
                    $ngBootbox.hideAll();
                }
                else {
                    $scope.usernameError = response.error.username[0];
                }
            })
        }

    };

    var subGroupsArray =$resource(basePath+'/_teacher/newsletter/getSubGroups');

    $scope.getGroupsNames = function () {
        usersService
            .getGroupNumber()
            .$promise
            .then(function (data) {
                $scope.groupsNames = data;
            })
    };
    $scope.getGroupsNames();

    $scope.getSubGroups = function(query) {

        return subGroupsArray.query({query:query}).$promise.then(function(response) {

            return response;
        });
    };

    $scope.addStudentToSubgroup=function (idUser,idSubgroup,dateInSubgroup) {
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
            return [year, month, day].join('-');
        }
        dateInSubgroup = formatDate(dateInSubgroup);
        $http({
            method: 'POST',
            url: basePath+'/_teacher/_supervisor/superVisor/addStudentToSubgroup',
            data: $jq.param({userId: idUser, subgroupId: idSubgroup, startDate: dateInSubgroup}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            chatIntITAMessenger.updateSubgroup(idSubgroup);
            $scope.addUIHandlers(response.data);
            $scope.reloadUserOfflineEducationData();
        }, function errorCallback() {
            bootbox.alert("Операцію не вдалося виконати");
        });
    };

    $scope.reloadUserOfflineEducationData=function(){
        userService.userOfflineEducationData({userId: $scope.userId})
            .$promise
            .then(function (results) {
                $scope.offline = results;
            });
    };

    $scope.cancelStudentFromSubgroup=function (idUser, idSubgroup) {
        $scope.option_str = '<option selected="true" disabled="disabled">Вибери причину...</option>';

        superVisorService
            .getAllReasons()
            .$promise
            .then(function(response){
                    var res_length = response.length;
                    for(var i=0; i<res_length; i++){
                        $scope.option_str = $scope.option_str+'<option value="'+response[i].id+'">'+response[i].description+'</option>';
                    }

                    bootbox.dialog({
                            title: "Вибери, будь ласка, причину виключення:",
                            message: '<div class="panel-body"><div class="row"><form role="form" name="rejectMessage"><div class="form-group col-md-12">'+
                            '<select class="form-control" id="selected_reason">'+$scope.option_str+'</select>'+
                            '<input type="text" id="datepicker" class="form-control" placeholder="Виберіть дату" style="margin-top: 25px;">'+
                            '<textarea class="form-control custom-control" id="comment" rows="7" cols="45" name="text" placeholder="Ваш коментар ..." style="margin-top: 25px;"></textarea>'+
                            '</div></form></div></div>',
                            buttons: {
                                success: {label: "Підтвердити", className: "btn btn-primary apply-btn",
                                    callback: function () {
                                        var reasonId = $jq('#selected_reason').val();

                                        var comment = $jq('#comment').val();
                                        if(comment == ''){
                                            comment = null;
                                        }

                                        var dateObject = $jq("#datepicker").datepicker( 'getDate' );
                                        var year = dateObject.getFullYear();
                                        var month = dateObject.getMonth()+1;
                                        var day = dateObject.getDate();
                                        var full_date = year+'-'+month+'-'+day;
                                        $http({
                                            method: 'POST',
                                            url: basePath+'/_teacher/_supervisor/superVisor/cancelStudentFromSubgroup',
                                            data: $jq.param({userId: idUser, subgroupId: idSubgroup, reasonId: reasonId, fullDate: full_date, comment: comment}),
                                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                                        }).then(function successCallback(response) {
                                            chatIntITAMessenger.updateSubgroup(idSubgroup);
                                            $scope.addUIHandlers(response.data);
                                            $scope.reloadUserOfflineEducationData();
                                        }, function errorCallback() {
                                            bootbox.alert("Операцію не вдалося виконати");
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
                    $jq('.apply-btn').prop('disabled', true);

                    $jq('#selected_reason' && '#datepicker').on('change', function () {
                        $jq('.apply-btn').prop('disabled', false);
                    });

                    $jq(function () {
                        var firstday = new Date();
                        $jq('#datepicker').datepicker().on('changeDate', function (e) {
                            $jq(this).datepicker('hide');
                        });
                    });
                },
                function (error) {
                    console.error(error);
                });
    };
}

function usersEmailCtrl ($http, $scope,  usersService, NgTableParams, $ngBootbox) {
    $scope.emailsCategoriesList = usersService
        .emailsCategoryList()
        .$promise
        .then(function (data) {
            $scope.emailsCategory=data;
            return data.map(function (item) {
                return {id: item.id, title: item.title}
            })
        });

    $scope.usersEmailTableParams = new NgTableParams({}, {
        getData: function (params) {
            return usersService
                .usersEmailList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.uploadFile =function (files) {
        $scope.errormsg='';
        $scope.error=false;
        var filesExt = ['xlsx', 'xls'];
        var parts = files[0].name.split('.');
        if(filesExt.join().search(parts[parts.length - 1]) == -1){
            $scope.error=true;
            $scope.errormsg='Неправильний тип файлу';
            return false;
        }

        var file_data = files[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $jq.ajax({
            url: basePath + "/_teacher/users/saveExcelFile", // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function () {
                bootbox.alert('Файл завантажено');
                $scope.isFile = true;
            }
        });
    };

    $scope.importExcel=function (emailCategory) {
        $ngBootbox.confirm("Імпортувати список email`ів? ").then(function () {
            $http({
                method: 'POST',
                url: basePath+"/_teacher/users/importExcel",
                data: $jq.param({categoryId: emailCategory}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function successCallback() {
                $scope.usersEmailTableParams.reload();
            }, function errorCallback() {
                $scope.isFile=false;
                bootbox.alert("Операцію не вдалося виконати");
            });
        })

    }

    $scope.addNewEmail=function (email,emailCategory) {
        $http({
            method: 'POST',
            url: basePath+"/_teacher/users/addNewEmail",
            data: $jq.param({
                email: email,
                categoryId:emailCategory
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback() {
            $scope.usersEmailTableParams.reload();
            $scope.newEmail=null;
        }, function errorCallback() {
            bootbox.alert("Операцію не вдалося виконати");
        });
    }

    $scope.removeEmail=function (email, category) {
        bootbox.confirm('Видалити email?', function (result) {
            if (result) {
                $http({
                    method: 'POST',
                    data: $jq.param({email: email, category:category}),
                    url: basePath + "/_teacher/users/removeEmail",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback() {
                    $scope.usersEmailTableParams.reload();
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        });
    }

    $scope.truncateEmailsTable=function (emailCategory) {
        bootbox.confirm("Очистити базу email'ів вибраної категорії?", function (result) {
            if (result) {
                $http({
                    method: 'POST',
                    data: $jq.param({categoryId:emailCategory}),
                    url: basePath + "/_teacher/users/truncateEmailsTable",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback() {
                    $scope.usersEmailTableParams.reload();
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        });
    }
};

function emailCategoryTableCtrl ($scope,  usersService, $http) {
    $scope.loadEmailCategory=function(){
        return usersService
            .emailsCategoryList()
            .$promise
            .then(function (data) {
                $scope.emailsCategory=data;
            });
    };
    $scope.loadEmailCategory();

    $scope.removeEmailCategory=function (categoryId) {
        bootbox.confirm("При видаленні цієї категорії буде видалено всі email'и які в неї входять. Ви впевнені, що хочите видалити?", function (result) {
            if (result) {
                $http({
                    method: 'POST',
                    data: $jq.param({categoryId: categoryId}),
                    url: basePath + "/_teacher/users/removeEmailCategory",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function successCallback() {
                    location.reload();
                }, function errorCallback() {
                    bootbox.alert("Операцію не вдалося виконати");
                });
            }
        });
    }
};

function emailCategoryCtrl ($http, $scope,  usersService, $stateParams, $state) {
    $scope.loadEmailCategory=function(id){
        usersService.emailCategoryData({'id':id})
            .$promise
            .then(function successCallback(response) {
                $scope.emailCategory=response;
            }, function errorCallback() {
                bootbox.alert("Отримати дані не вдалося");
            });
    };
    if($stateParams.id){
        $scope.loadEmailCategory($stateParams.id);
    }

    $scope.sendEmailCategory= function (scenario) {
        if(scenario=='new') $scope.createEmailCategory();
        else $scope.editEmailCategory();
    };
    $scope.createEmailCategory= function () {
        $http({
            url: basePath + "/_teacher/users/createEmailCategory",
            method: "POST",
            data: $jq.param({
                name: $scope.emailCategory.title,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $state.go("admin/emailscategory", {}, {reload: true});
        }, function errorCallback() {
            bootbox.alert("Створити категорію емейлів не вдалося. Помилка сервера.");
        });
    };
    $scope.editEmailCategory= function () {
        $http({
            url: basePath + "/_teacher/users/updateEmailCategory",
            method: "POST",
            data: $jq.param({
                id:$stateParams.id,
                name: $scope.emailCategory.title,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $state.go("admin/emailscategory", {}, {reload: true});
        }, function errorCallback() {
            bootbox.alert("Оновити дані не вдалося. Помилка сервера.");
        });
    };
};

function directorsTableCtrl ($scope, usersService, NgTableParams, roleService){
    $scope.directorsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return usersService
                .directorsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelRoleByDirector = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelRoleByDirector({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.directorsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    }
}

function auditorsTableCtrl ($scope, usersService, NgTableParams, roleService){
    $scope.auditorsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return usersService
                .auditorsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelRoleByDirector = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelRoleByDirector({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.auditorsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    }
}

function superAdminsTableCtrl ($scope, usersService, NgTableParams, roleService){
    $scope.superAdminsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return usersService
                .superAdminsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelRoleByDirector = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelRoleByDirector({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.superAdminsTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    }
}

function usersTabsCtrl ($scope, $state, usersService, lodash) {
    $scope.changePageHeader('Користувачі');

    $scope.tabs = [
        { title: "Зареєстровані користувачі", route: "registeredUsers"},
        { title: "Заблоковані користувачі", route: "blockedUsers"},
        { title: "Користувачі без ролі", route: "withoutRole"},
        { title: "Студенти", route: "students"},
        { title: "Офлайн студенти", route: "offlineStudents"},
        { title: "Директора", route: "directors"},
        { title: "Аудитори", route: "auditors"},
        { title: "Суперадміни", route: "superAdmins"},
        { title: "Співробітники", route: "coworkers"},
        { title: "Адміністратори", route: "admins"},
        { title: "Супервайзери", route: "supervisors"},
        { title: "Бухгалтери", route: "accountants"},
        { title: "Контент менеджери", route: "contentManagers"},
        { title: "Тренери", route: "trainers"},
        { title: "Автори контенту", route: "contentAuthors"},
        { title: "Викладачі", route: "teacherConsultants"},
        { title: "Консультанти", route: "tenants"},
        { title: "Api Key Manager", route: "apiKeyManagers"},
    ];

    usersService
        .usersCount()
        .$promise
        .then(function (data) {
            $scope.rolesCount=data;
            $scope.tabs.forEach(function(item, i) {
                if(lodash.find($scope.rolesCount, ['role', item.route])){
                    item.count=lodash.find($scope.rolesCount, ['role', item.route]).count;
                }
                if('users.'+item.route==$state.current.name) {
                    $scope.active=i;
                }
            });
        });
}

function organizationUsersTabsCtrl ($scope, $state, usersService, lodash) {
    $scope.changePageHeader('Користувачі');

    $scope.tabs = [
        { title: "Зареєстровані користувачі", route: "registeredUsers"},
        { title: "Студенти", route: "students"},
        { title: "Офлайн студенти", route: "offlineStudents"},
        { title: "Директора", route: "directors"},
        { title: "Аудитори", route: "auditors"},
        { title: "Суперадміни", route: "superAdmins"},
        { title: "Співробітники", route: "coworkers"},
        { title: "Адміністратори", route: "admins"},
        { title: "Супервайзери", route: "supervisors"},
        { title: "Бухгалтери", route: "accountants"},
        { title: "Контент менеджери", route: "contentManagers"},
        { title: "Тренери", route: "trainers"},
        { title: "Автори контенту", route: "contentAuthors"},
        { title: "Викладачі", route: "teacherConsultants"},
        { title: "Консультанти", route: "tenants"},
        { title: "Api Key Manager", route: "apiKeyManagers"},
    ];

    usersService
        .organizationUsersCount()
        .$promise
        .then(function (data) {
            $scope.rolesCount=data;
            $scope.tabs.forEach(function(item, i) {
                if(lodash.find($scope.rolesCount, ['role', item.route])){
                    item.count=lodash.find($scope.rolesCount, ['role', item.route]).count;
                }
                if('organization.'+item.route==$state.current.name) {
                    $scope.active=i;
                }
            });
        });
}

function addStudentTrainerCtrl ($scope, $stateParams, userService, superVisorService){
    $scope.changePageHeader('Додати тренера');
    $scope.userId=$stateParams.id;
    $scope.formData={};

    $scope.loadUserTrainerData=function(userId){
        userService.userOrganizationTrainer({userId: userId})
            .$promise
            .then(function (results) {
                $scope.student = results;
            });
    };

    $scope.loadUserTrainerData($scope.userId);

    $scope.onSelectTrainer = function ($item) {
        $scope.selectedTrainer = $item;
    };
    $scope.reloadTrainer = function(){
        $scope.selectedTrainer=null;
    };
    $scope.clearTrainerInputs=function () {
        $scope.trainerSelected=null;
        $scope.selectedTrainer=null;
    };

    $scope.addTrainer=function (trainerId, userId) {
        if (!trainerId) {
            bootbox.alert("Виберіть тренера.");
            return;
        }
        superVisorService
            .setTrainer({trainerId:trainerId,userId:userId})
            .$promise
            .then(function (response) {
                $scope.clearTrainerInputs();
                if (response.data == "success") {
                    bootbox.alert('Операцію успішно виконано.', function () {
                        $scope.loadUserTrainerData($scope.userId);
                    });
                }else{
                    bootbox.alert(response.data)
                    $scope.loadUserTrainerData($scope.userId);
                }
            });
    };
    $scope.cancelTrainer=function (userId) {
        superVisorService
            .removeTrainer({userId:userId})
            .$promise
            .then(function (response) {
                if (response.data == "success") {
                    bootbox.alert('Операцію успішно виконано.', function () {
                        $scope.loadUserTrainerData($scope.userId);
                    });
                }else{
                    $scope.loadUserTrainerData($scope.userId);
                    bootbox.alert(response.data)
                }
            });
    };

    $scope.collapse=function (el) {
        $jq(el).toggle("medium");
    };
}

function studentsInfoCtrl($scope, $state, trainerService, usersService, NgTableParams, lodash, myFactory, $attrs) {
    $scope.educationForms = [{id:'1', title:'онлайн'},{id:'3', title:'онлайн/офлайн'}];
    $scope.organization = $attrs.organization;
    $scope.trainer = $attrs.trainer;

    $scope.changePageHeader('Cтуденти');

    $scope.studentsTableParams = new NgTableParams({
        organization:$scope.organization,
        trainersScope:$scope.trainer,
        sorting: {
            "start_date": 'desc'
        },
    }, {
        getData: function (params) {
            $scope.params=params.url();
            $scope.params.startDate=$scope.startDate;
            $scope.params.endDate=$scope.endDate;
            return usersService
                .studentsList($scope.params)
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.updateStudentList=function(organization, startDate, endDate){
        $scope.studentsTableParams = new NgTableParams({}, {
            getData: function (params) {
                $scope.params=params.url();
                $scope.params.startDate=startDate;
                $scope.params.endDate=endDate;
                $scope.params.organization=organization;
                return usersService
                    .studentsList($scope.params)
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
    }

    $scope.myFactory = myFactory;

    $scope.tabs = [
        { title: "Закріплені студенти", route: "main"},
        { title: "Особиста інформація", route: "personalInfo"},
        { title: "Кар'єра", route: "career"},
        { title: "Договора", route: "contract"},
        { title: "Відвідування", route: "visit"},
    ];
    if($scope.trainer){
        $scope.tabs.push({ title: "Проекти", route: "studentsProjects"});
        $scope.tabs.forEach(function(item, i) {
            if('trainerStudentsTable/students.'+item.route==$state.current.name) {
                $scope.active=i;
            }
        });
    }else{
        $scope.tabs.forEach(function(item, i) {
            if('studentsTable/students.'+item.route==$state.current.name) {
                $scope.active=i;
            }
        });
    }

    $scope.educationForm = usersService
        .getEducationForm()
        .$promise
        .then(
            function (data) {
                var result = data;
                $scope.educForm = [];
                $scope.educForm = $scope.educForm.concat(result);
                return $scope.educForm;
            }
        )
        .catch(function() {
            bootbox.alert('Помилка, зверніться до адміністратора');
        });

    $scope.educationTime = usersService
        .getEducationTime()
        .$promise
        .then(function (data) {
            var result = data;
            $scope.educTime = [];
            $scope.educTime = $scope.educTime.concat(result);
            return $scope.educTime;
        })
        .catch(function () {
            bootbox.alert('Помилка, зверніться до адміністратора');
        });

    $scope.groupsNames = usersService
        .getGroupNumber()
        .$promise
        .then(function (data) {
            var res = data;
            $scope.temp = [];
            $scope.temp = $scope.temp.concat(res);
            return $scope.temp;
        })
        .catch(function () {
            bootbox.alert('Помилка, зверніться до адміністратора');
        });

    $scope.studyOption = function (id, id_user) {

        var online = 'онлайн',  // id=1
            offline = 'офлайн',  // id=2
            on_off_line = 'онлайн/офлайн';  // id=3

        setTimeout(function () {
            $jq('#formOption :input').filter(function(){return this.value == id}).attr('checked', true);
        }, 50);

        bootbox.dialog({
            title: "Виберіть нове значення.",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form id="formOption" class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-offset-4 col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-0" value="1"> '+ online +' </label> ' +
            '</div><div class="radio"> <label for="awesomeness-1"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-1" value="2">'+ offline +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="3">'+ on_off_line +'</label> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Зберегти",
                    className: "btn-success",
                    callback: function () {
                        var answer = $jq("input[name='awesomeness']:checked").val();
                        if(answer != undefined){
                            usersService
                                .changeFormStudy({'id_study_form': answer, 'id_student': id_user})
                                .$promise
                                .then(
                                    function(){
                                        if($scope.myFactory.careerTbl){
                                            $scope.myFactory.careerTbl.reload();
                                        }
                                        if($scope.myFactory.visitTbl){
                                            $scope.myFactory.visitTbl.reload();
                                        }
                                    },
                                    function () {
                                        console.log(error);
                                    }
                                )
                        }
                    }
                }
            }
        });
    };

    $scope.studyTime = function (id_study_time, id_student) {

        var morning = 'ранкова',
            evening = 'вечірня',
            whatever = 'байдуже';

        setTimeout(function(){
            $jq('#timeOption :input').filter(function(){return this.value == id_study_time}).attr('checked', true);
        }, 50);

        bootbox.dialog({
            title: "Виберіть нове значення.",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form id="timeOption" class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-offset-4 col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-0" value="1"> '+ morning +' </label> ' +
            '</div><div class="radio"> <label for="awesomeness-1"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-1" value="2">'+ evening +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="3">'+ whatever +'</label> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Зберегти",
                    className: "btn-success",
                    callback: function () {
                        // var name = $jq('#name').val();
                        var answer = $jq("input[name='awesomeness']:checked").val();
                        if(answer != undefined){
                            usersService
                                .changeTimeStudy({'id_time_form': answer, 'id_student': id_student})
                                .$promise
                                .then(
                                    function(){
                                        if($scope.myFactory.careerTbl){
                                            $scope.myFactory.careerTbl.reload();
                                        }
                                        if($scope.myFactory.visitTbl){
                                            $scope.myFactory.visitTbl.reload();
                                        }
                                    },
                                    function (error) {
                                        console.log(error);
                                    }
                                )
                        }
                    }
                }
            }
        });
    };
}

function personalInfoCtrl($scope, trainerService, usersService, NgTableParams) {
    $scope.changePageHeader('Особиста інформація');
    $scope.studentPersonalInfoTableParams = new NgTableParams({
            organization:$scope.organization,
            trainersScope:$scope.trainer,
        },
        {
            getData: function (params) {
                return usersService
                    .studentsPersonalInfo(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
    $scope.updateStudentInfo = function (id_student, attr, text) {
        text=text?text:'';
        bootbox.dialog({
                title: "Введіть нову назву:",
                message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="commentMessageText" ' +
                'placeholder="тут можна ввести нову назву поля">' +text+ '</textarea>'+'</div></form></div></div>',
                buttons:
                    {success:
                            {label: "Підтвердити", className: "btn btn-primary",
                                callback: function () {
                                    var data = $jq('#commentMessageText').val();
                                    usersService.updateStudentData({id_student: id_student, data: data, attr: attr})
                                        .$promise
                                        .then(function(){
                                            $scope.studentPersonalInfoTableParams.reload();
                                        });
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
}


function careerStudentsCtrl($scope, trainerService, usersService, NgTableParams, myFactory) {
    $scope.changePageHeader("Кар'єра");
    $scope.myFactory = myFactory;

    $scope.studentsSpecializations = usersService
        .getSpecializationGroup()
        .$promise
        .then(function (data) {
            var result = data;
            $scope.studentSpec = [{id:'0', title:'Всі студенти'}];
            $scope.studentSpec = $scope.studentSpec.concat(result);
            return $scope.studentSpec;
        })
        .catch(function() {
            bootbox.alert('Помилка, зверніться до адміністратора');
        });

    $scope.payForm = usersService
        .getPayForm()
        .$promise
        .then(function (data) {
            var result = data;
            $scope.pay_form = [];
            $scope.pay_form = $scope.pay_form.concat(result);
            return $scope.pay_form;
        })
        .catch(function () {
            bootbox.alert('Помилка, зверніться до адміністратора');
        });

    $scope.studentCareerInfoTableParams = new NgTableParams(
        {
            trainersScope:$scope.trainer,
            filter:{'specializations.id':'null'}},
        {
            getData: function (params) {
                return usersService
                    .studentsCareerInfo(params.url())
                    .$promise
                    .then(function (data) {
                        $scope.specOfStudents = [];

                        for(var item in data.rows){
                            if(!$scope.isEmpty(data.rows[item].specializations)){
                                var specs = data.rows[item].specializations;
                                var temp_arr = [];
                                for(var i in specs){
                                    temp_arr.push(specs[i].id);
                                }
                                var temp_obj = {
                                    id_student: data.rows[item].id_student,
                                    value_spec: temp_arr
                                };
                                $scope.specOfStudents.push(temp_obj);
                            }
                        }
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
    $scope.myFactory.careerTbl = $scope.studentCareerInfoTableParams;

    $scope.updateCareerInfo = function (id_student, attr, text) {
        text=text?text:'';
        bootbox.dialog({
                title: "Введіть нову назву:",
                message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="commentMessageText" ' +
                'placeholder="тут можна ввести нову назву поля">' +text+ '</textarea>'+'</div></form></div></div>',
                buttons:
                    {success:
                            {label: "Підтвердити", className: "btn btn-primary",
                                callback: function () {
                                    var data = $jq('#commentMessageText').val();
                                    usersService.updateStudentData({id_student: id_student, data: data, attr: attr})
                                        .$promise
                                        .then(function(){
                                            $scope.studentCareerInfoTableParams.reload();
                                        });
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
    };

    $scope.isEmpty = function (obj){
        if (!obj){
            return true;
        }

        if (!(typeof(obj) === 'number') && !Object.keys(obj).length){
            return true;
        }

        return false;
    };

    $scope.checkArrays = function ( arrA, arrB ){

        //check if lengths are different
        if(arrA == null || arrA.length !== arrB.length) return false;

        //slice so we do not effect the original
        //sort makes sure they are in order
        //join makes it a string so we can do a string compare
        var cA = arrA.slice().sort().join(",");
        var cB = arrB.slice().sort().join(",");

        return cA===cB;
    };

    $scope.selectSpecialization = function(id, id_student, hasValue){
        $scope.optionValue = [];

        if(hasValue){
            $scope.checked_value = [];
        }

        for(var i in $scope.specOfStudents){
            if($scope.specOfStudents[i].id_student == id_student){
                $scope.checked_value = $scope.specOfStudents[i].value_spec;

            }
        }

        for(var i=2; i<$scope.studentSpec.length; i++){
            var temp = {
                text: $scope.studentSpec[i].title,
                value: $scope.studentSpec[i].id
            };
            $scope.optionValue.push(temp);
        }

        bootbox.prompt({
            title: "Виберіть нові значення:",
            value: $scope.checked_value,
            inputType: 'checkbox',
            inputOptions: $scope.optionValue,
            callback: function (result) {
                if(!$scope.checkArrays(result, $scope.checked_value) && result != null){

                    $scope.checked_value = [];
                    var results = [];
                    result.splice(0, 0, id);
                    results.push(result);

                    usersService
                        .updateSpecialization({data: results})
                        .$promise
                        .then(
                            function () {
                                $scope.studentCareerInfoTableParams.reload();
                            },
                            function () {
                                console.error(error);
                            }
                        )
                }
            }
        });
    };

    $scope.changePayForm = function(id_student, pay_id){

        setTimeout(function(){
            $jq('#payOption :input').filter(function(){return this.value == pay_id}).attr('checked', true);
        }, 50);

        bootbox.dialog({
            title: "Виберіть нове значення.",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form id="payOption" class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<div class="col-md-offset-4 col-md-4"> <div class="radio" > <label for="awesomeness-0"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-0" value="1"> '+$scope.pay_form[1].title+' </label> ' +
            '</div><div class="radio"> <label for="awesomeness-1"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-1" value="2">'+ $scope.pay_form[2].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="3">'+ $scope.pay_form[3].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="4">'+ $scope.pay_form[4].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="6">'+ $scope.pay_form[5].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="12">'+ $scope.pay_form[6].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="24">'+ $scope.pay_form[7].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="36">'+ $scope.pay_form[8].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="48">'+ $scope.pay_form[9].title +'</label> ' +
            '</div><div class="radio"> <label for="awesomeness-2"> ' +
            '<input type="radio" name="awesomeness" id="awesomeness-2" value="60">'+ $scope.pay_form[10].title +'</label> ' +
            '</div> ' +
            '</div> ' +
            '</div> ' +
            '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Зберегти",
                    className: "btn-success",
                    callback: function () {
                        var answer = $jq("input[name='awesomeness']:checked").val();
                        if(answer != undefined){
                            usersService
                                .changePayForm({'id_pay': answer, 'id_student': id_student})
                                .$promise
                                .then(
                                    function(){
                                        $scope.studentCareerInfoTableParams.reload();
                                    },
                                    function (error) {
                                        console.log(error);
                                    }
                                )
                        }
                    }
                }
            }
        });
    }
}


function contractStudentsCtrl($scope, trainerService, usersService, NgTableParams, agreementsService, agreementsInformation, paymentSchemaService) {
    $scope.changePageHeader("Договір");
    $scope.currentDate = currentDate;

    $scope.agreementsTableParams = new NgTableParams({sorting: {create_date: "desc"}}, {
        getData: function (params) {
            return agreementsService
                .list(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    agreementsInformation.setInformation(data);
                    return data.rows;
                });
        }
    });

    $scope.getSchemas = paymentSchemaService
        .query()
        .$promise
        .then(function (data) {
            return data.map(function (item) {
                return {id: item.pay_count, title: item.title_ua}
            })
        });

    $scope.getAgreementStatuses = paymentSchemaService
        .statuses()
        .$promise
        .then(function (data) {
            return data.map(function (item) {
                return {id: item.id, title: item.title_ua}
            })
        });

    $scope.updateContractInfo = function (id_student, attr, text) {
        text = text?text:'';
        bootbox.dialog({
                title: "Введіть нову назву:",
                message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="commentMessageText" ' +
                'placeholder="тут можна ввести нову назву поля">' +text+ '</textarea>'+'</div></form></div></div>',
                buttons:
                    {success:
                            {label: "Підтвердити", className: "btn btn-primary",
                                callback: function () {
                                    var data = $jq('#commentMessageText').val();
                                    usersService.updateStudentData({id_student: id_student, data: data, attr: attr})
                                        .$promise
                                        .then(function(){
                                            $scope.agreementsTableParams.reload();
                                        });
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
}


function visitInfoCtrl($scope, trainerService, usersService, NgTableParams, myFactory) {
    $scope.changePageHeader("Відвідування");
    $scope.myFactory = myFactory;

    $scope.studentVisitInfoTableParams = new NgTableParams({trainersScope:$scope.trainer},
        {
            getData: function (params) {
                return usersService
                    .studentVisitInfo(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    })
            }
        });
    $scope.myFactory.visitTbl = $scope.studentVisitInfoTableParams;

    $scope.updateVisitInfo = function (id_student, attr, text) {
        text=text?text:'';
        bootbox.dialog({
                title: "Введіть нову назву:",
                message: '<div class="panel-body"><div class="row"><form role="form" name="commentMessage"><div class="form-group col-md-12">'+
                '<textarea class="form-control" style="resize: none" rows="6" id="commentMessageText" ' +
                'placeholder="тут можна ввести нову назву поля">' +text+ '</textarea>'+'</div></form></div></div>',
                buttons:
                    {success:
                            {label: "Підтвердити", className: "btn btn-primary",
                                callback: function () {
                                    var data = $jq('#commentMessageText').val();
                                    usersService.updateStudentData({id_student: id_student, data: data, attr: attr})
                                        .$promise
                                        .then(function(){
                                            $scope.studentVisitInfoTableParams.reload();
                                        });
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
    };

    $scope.cancelType = usersService
        .getCancelType()
        .$promise
        .then(function (data) {
            var temp = data;
            $scope.reason = [];
            $scope.reason = $scope.reason.concat(temp);
            return $scope.reason;
        })
        .catch(function(){
            bootbox.alert('Помилка, зверніться до адміністратора');
        });
}
function apiKeyManagerTableCtrl($scope, usersService, NgTableParams, roleService) {
    $scope.apiKeyManagerTableParams = new NgTableParams({}, {
        getData: function (params) {
            return usersService
                .apiKeyManagersList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });

    $scope.cancelRoleByDirector = function (user, role) {
        bootbox.confirm('Скасувати роль?', function (result) {
            if (result) {roleService.cancelRoleByDirector({'userId': user, 'role': role}).$promise.then(function successCallback(response) {
                if(response.data=='success') $scope.apiKeyManagerTableParams.reload();
                else bootbox.alert(response.data);
            }, function errorCallback() { bootbox.alert("Операцію не вдалося виконати");});}
        });
    }
}
