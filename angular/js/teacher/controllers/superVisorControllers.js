/**
 * Created by adm on 19.07.2016.
 */

angular
    .module('teacherApp')
    .controller('superVisorCtrl', superVisorCtrl)
    .controller('offlineGroupsTableCtrl', offlineGroupsTableCtrl)
    .controller('offlineGroupCtrl', offlineGroupCtrl)
    .controller('offlineGroupSubgroupsTableCtrl', offlineGroupSubgroupsTableCtrl)
    .controller('offlineSubgroupsTableCtrl', offlineSubgroupsTableCtrl)
    .controller('offlineSubgroupCtrl', offlineSubgroupCtrl)
    .controller('offlineStudentsSVTableCtrl', offlineStudentsSVTableCtrl)
    .controller('studentsWithoutGroupSVTableCtrl', studentsWithoutGroupSVTableCtrl)
    .controller('groupAccessCtrl', groupAccessCtrl)
    .controller('offlineStudentSubgroupCtrl', offlineStudentSubgroupCtrl)
    .controller('trainersStudentsCtrl', trainersStudentsCtrl)
    .controller('groupModulesAttributesCtrl', groupModulesAttributesCtrl)
    .controller('groupModulesTeachersFormCtrl', groupModulesTeachersFormCtrl)
    .controller('lecturesRatingTableCtrl', lecturesRatingTableCtrl)
    .controller('modulesRatingTableCtrl', modulesRatingTableCtrl)
    .controller('offlineGroupStudentsCtrl', offlineGroupStudentsCtrl)
    .controller('coursesAccessCtrl', coursesAccessCtrl)
    .controller('modulesAccessCtrl', modulesAccessCtrl);

function superVisorCtrl (){
    $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
}

function offlineGroupsTableCtrl ($scope, superVisorService, NgTableParams){
    $scope.changePageHeader('Офлайнові групи');
    $scope.offlineGroupsTableParams = new NgTableParams({
        sorting: {
            "start_date": 'desc'
        },
    }, {
        getData: function (params) {
            return superVisorService
                .offlineGroupsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function offlineSubgroupsTableCtrl ($scope, superVisorService, NgTableParams){
    $scope.offlineSubgroupsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return superVisorService
                .offlineSubgroupsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}


function offlineStudentsSVTableCtrl ($scope, superVisorService, NgTableParams){
    $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
    $scope.changePageHeader('Студенти в підгрупах');
    $scope.offlineStudentsTableParams = new NgTableParams({}, {
        getData: function (params) {
            return superVisorService
                .offlineStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    console.log();
                    return data.rows;
                });
        }
    });
}

function studentsWithoutGroupSVTableCtrl ($scope, superVisorService, NgTableParams){
    $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
    $scope.changePageHeader('Студенти(офлайн ф.н.), які не в групі');
    $scope.studentsWithoutGroupTableParams = new NgTableParams({}, {
        getData: function (params) {
            return superVisorService
                .studentsWithoutGroupList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function offlineGroupSubgroupsTableCtrl ($scope, superVisorService, NgTableParams, $stateParams){
    $scope.groupId=$stateParams.id;
    $scope.offlineGroupSubgroupsTableParams = new NgTableParams({'id':$scope.groupId}, {
        getData: function (params) {
            return superVisorService
                .offlineGroupSubgroupsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function offlineGroupCtrl ($scope, $state, $http, $stateParams, superVisorService, NgTableParams, typeAhead, $filter, chatIntITAMessenger, lodash){
    $scope.changePageHeader('Офлайн група');

    $scope.tabs = [
        { title: "Підгрупи", route: "offlineSubgrups"},
        { title: "Студенти", route: "offlineStudents"},
        { title: "Доступ до курсів", route: "coursesAccess"},
        { title: "Доступ до модулів", route: "modulesAccess"},
        { title: "Викладачі", route: "modulesTeachers"},
    ];

    $scope.tabs.forEach(function(item, i) {
        if('supervisorGroup.'+item.route==$state.current.name) {
            $scope.active=i;
        }
    });

    if($stateParams.id){
        $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
        $scope.groupId=$stateParams.id;
        $scope.offlineStudentsTableParams = new NgTableParams({'idGroup':$scope.groupId}, {
            getData: function (params) {
                return superVisorService
                    .offlineStudentsList(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
        $scope.groupCoursesAccessParams = new NgTableParams({'idGroup':$scope.groupId}, {
            getData: function (params) {
                return superVisorService
                    .courseAccessList(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        $scope.courseServices=data.rows;
                        return data.rows;
                    });
            }
        });
        $scope.groupModulesAccessParams = new NgTableParams({'idGroup':$scope.groupId}, {
            getData: function (params) {
                return superVisorService
                    .moduleAccessList(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        $scope.moduleServices=data.rows;
                        return data.rows;
                    });
            }
        });

        $scope.date = $filter('date')(new Date(), "yyyy-MM-dd");
    }

    $scope.cancelGroupAccess=function(idGroup, idService, type){
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/cancelGroupAccess',
            method: "POST",
            data: $jq.param({
                idGroup:idGroup,
                idService:idService
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
           if(type=='course'){
               $scope.groupCoursesAccessParams.reload();
           }else if(type=='module'){
               $scope.groupModulesAccessParams.reload();
           }
        }, function errorCallback() {
            bootbox.alert("Виникла помилка");
        });
    };
    
    $scope.loadGroupData=function(){
        superVisorService.groupData({'id':$stateParams.id}).$promise
            .then(function successCallback(response) {
                $scope.group=response.group;
                $scope.loadCityToModel($scope.group.city);
                $scope.loadCuratorToModel($scope.group.chat_author_id);
                $scope.changePageHeader('Офлайн група: '+$scope.group.name);
                $scope.selectedSpecialization=lodash.find($scope.specializations, ['id', $scope.group.specialization]).id;
            }, function errorCallback() {
                bootbox.alert("Отримати дані групи не вдалося");
            });
    };
    
    $scope.loadSpecializations=function(){
        return superVisorService
            .getSpecializationsList()
            .$promise
            .then(function (data) {
                $scope.specializations=data;
                if($stateParams.id)
                    $scope.loadGroupData();
                else $scope.loadCuratorToModel();
            });
    };
    $scope.loadSpecializations();

    $scope.sendFormOfflineGroup= function (scenario) {
        if(scenario=='new') $scope.createOfflineGroup();
        else $scope.editOfflineGroup();
    };
    $scope.createOfflineGroup= function () {
        if(!$scope.selectedCity){
            bootbox.alert('Виберіть місто з існуючого списку');
            return;
        }
        if(!$scope.selectedCurator){
            bootbox.alert('Виберіть керівника чату групи з існуючого списку');
            return;
        }
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/createOfflineGroup',
            method: "POST",
            data: $jq.param({
                name: $scope.group.name,
                date:$scope.group.start_date,
                specialization:$scope.selectedSpecialization,
                city:$scope.selectedCity.id,
                chat_author:$scope.selectedCurator.id
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data.message, function(){
                if(response.data.idSubgroup){
                    chatIntITAMessenger.updateGroup(response.data.idGroup).then(function () {
                        $state.go("supervisor/offlineGroups", {}, {reload: true});
                    });
                }else{
                    $state.go("supervisor/offlineGroups", {}, {reload: true});
                }
            });
        }, function errorCallback() {
            bootbox.alert("Створити групу не вдалося. Помилка сервера.");
        });
    };
    $scope.editOfflineGroup= function () {
        if(!$scope.selectedCity){
            bootbox.alert('Виберіть місто з існуючого списку');
            return;
        }
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/updateOfflineGroup',
            method: "POST",
            data: $jq.param({
                id:$stateParams.id,
                name: $scope.group.name,
                date:$scope.group.start_date,
                specialization:$scope.selectedSpecialization,
                city:$scope.selectedCity.id,
                chat_author:$scope.selectedCurator.id
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data, function(){
                chatIntITAMessenger.updateGroup($stateParams.id).then(function () {
                    $state.go("supervisor/offlineGroup/:id", {id:$stateParams.id}, {reload: true});
                });
            });
        }, function errorCallback() {
            bootbox.alert("Оновити групу не вдалося. Помилка сервера.");
        });
    };

    //select curator
    $scope.loadCuratorToModel=function(curatorId){
        curatorId = typeof curatorId !== 'undefined' ? curatorId :'';
        $http.get(basePath + "/_teacher/_supervisor/superVisor/getCuratorById/?id="+curatorId).then(function (response) {
            $scope.curatorEntered = response.data.fullName;
            $scope.selectedCurator={id: response.data.id, name: response.data.fullName};
        });
    };
    $scope.onSelectCurator = function ($item) {
        $scope.selectedCurator = $item;
    };
    $scope.reloadCurator = function(){
        $scope.selectedCurator=null;
    };
    var chatAuthorsTypeaheadUrl = basePath + '/_teacher/_supervisor/superVisor/chatAuthorsByQuery';
    $scope.getChatAuthors = function(value){
        return typeAhead.getData(chatAuthorsTypeaheadUrl,{query : value});
    };
    //select city
    $scope.loadCityToModel=function(cityId){
        $http.get(basePath + "/_teacher/_supervisor/superVisor/getCityById/?id="+cityId).then(function (response) {
            $scope.cityEntered = response.data;
            $scope.selectedCity={id: cityId, title: response.data};
        });
    };
    $scope.onSelect = function ($item) {
        $scope.selectedCity = $item;
    };
    $scope.reload = function(){
        $scope.selectedCity=null;
    };
    var citiesTypeaheadUrl = basePath + '/_teacher/_supervisor/superVisor/citiesByQuery';
    $scope.getCities = function(value){
        return typeAhead.getData(citiesTypeaheadUrl,{query : value});
    };

    $scope.updateGroupChat=function(groupId){
        chatIntITAMessenger.updateGroup(groupId);
    };
}

function offlineSubgroupCtrl ($scope, $state, $http, $stateParams, superVisorService, NgTableParams, typeAhead, chatIntITAMessenger, lodash, usersService){
    $scope.onSelectCurator = function ($item) {
        $scope.selectedCurator = $item;
    };
    $scope.reloadCurator = function(){
        $scope.selectedCurator=null;
    };
    $scope.onSelectTrainer = function ($item) {
        $scope.selectedTrainer = $item;
    };
    $scope.reloadTrainer = function(){
        $scope.selectedTrainer=null;
    };
    var chatAuthorsTypeaheadUrl = basePath + '/_teacher/_supervisor/superVisor/chatAuthorsByQuery';
    $scope.getChatAuthors = function(value){
        return typeAhead.getData(chatAuthorsTypeaheadUrl,{query : value});
    };
    //select curator

    $scope.loadSubgroupData=function(subgroupId){
        superVisorService.subgroupData({'id':subgroupId}).$promise
            .then(function successCallback(response) {
                $scope.subgroup=response.subgroup;
                $scope.subgroupTrainer=response.subgroupTrainer;
                if($scope.subgroupTrainer){
                    $scope.trainerEntered = response.subgroupTrainer.fullName;
                    $scope.selectedTrainer={id: response.subgroupTrainer.id, name: response.subgroupTrainer.fullName};
                }
                $scope.changePageHeader('Офлайн підгрупа: '+$scope.subgroup.name);
                $scope.loadGroupData($scope.subgroup.group);
            }, function errorCallback() {
                bootbox.alert("Отримати дані підгрупи не вдалося");
            });
    };

    $scope.loadGroupData=function(groupId){
        superVisorService.groupData({'id':groupId}).$promise
            .then(function successCallback(response) {
                $scope.group=response.group;
            }, function errorCallback() {
                bootbox.alert("Отримати дані групи не вдалося");
            });
    };

    if($stateParams.groupId) {
        $scope.groupId=$stateParams.groupId;
        $scope.loadGroupData($scope.groupId);
    }
    if($stateParams.id) {
        $scope.shifts = [{id:'1', title:'ранкова'},{id:'2', title:'вечірня'},{id:'3', title:'байдуже'}];
        $scope.types = [];
        $scope.subgroupId = $stateParams.id;
        $scope.offlineStudentsTableParams = new NgTableParams({'idSubgroup': $scope.subgroupId}, {
            getData: function (params) {
                return superVisorService
                    .offlineStudentsList(params.url())
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });
        $scope.loadSubgroupData($scope.subgroupId);
        $scope.offlineCanceledStudentsTableParams = new NgTableParams({}, {
            getData: function (params) {
                return superVisorService
                    .offlineCanceledStudentsList(lodash.merge({idSubgroup:$scope.subgroupId}, params.url()))
                    .$promise
                    .then(function (data) {
                        params.total(data.count);
                        return data.rows;
                    });
            }
        });

        $scope.types = usersService
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
    };

    $scope.sendFormSubgroup= function (scenario, name, groupId, subgroupData, selectedTrainer,subgroupId, journal, link) {
        if(scenario=='new') $scope.addSubgroup(name, groupId, subgroupData, selectedTrainer, journal, link);
        else $scope.editSubgroup(name, subgroupData, selectedTrainer,subgroupId, journal, link);
    };

    $scope.addSubgroup= function (name, groupId, subgroupData, selectedTrainer, journal, link) {
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/addSubgroup',
            method: "POST",
            data: $jq.param({
                name: name,
                group: groupId,
                data: subgroupData,
                journal: journal,
                link: link,
                trainer: selectedTrainer
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data.message, function(){
                if(response.data.idSubgroup){
                    chatIntITAMessenger.updateSubgroup(response.data.idSubgroup).then(function () {
                        $state.go("supervisor/offlineGroup/:id", {id:$scope.groupId}, {reload: true});
                    });
                }else{
                    $state.go("supervisor/offlineGroup/:id", {id:$scope.groupId}, {reload: true});
                }
            });
        }, function errorCallback() {
            bootbox.alert("Створити групу не вдалося. Помилка сервера.");
        });
    };
    $scope.editSubgroup= function (name, subgroupData, selectedTrainer,subgroupId, journal, link) {
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/updateSubgroup',
            method: "POST",
            data: $jq.param({
                id:subgroupId,
                name: name,
                data: subgroupData,
                journal: journal,
                link: link,
                trainer: selectedTrainer
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            bootbox.alert(response.data, function(){
                chatIntITAMessenger.updateSubgroup(subgroupId).then(function () {
                    $state.go("supervisor/offlineSubgroup/:id", {id:$scope.subgroupId}, {reload: true});
                });
            });
        }, function errorCallback() {
            bootbox.alert("Редагувати підгрупу не вдалося. Помилка сервера.");
        });
    };
    $scope.goBack= function () {
        if($stateParams.groupId) {
            $state.go('supervisorGroup.offlineSubgrups', {id:$stateParams.groupId}, {reload: true});
        } else if($stateParams.id) {
            $state.go('supervisor/offlineSubgroup/:id', {id:$stateParams.id}, {reload: true});
        }
    };
    
    $scope.updateSubgroupChat=function(subgroupId){
        chatIntITAMessenger.updateSubgroup(subgroupId);
    };

    $scope.updateSubgroupLink=function(link){
        superVisorService.updateSubgroupLink(link).$promise
            .then(function successCallback() {
                $scope.loadSubgroupData(link.id_subgroup);
                $scope.newLink={id_subgroup:link.id_subgroup, description:null,link:null};
            }, function errorCallback() {
                bootbox.alert("Оновити посилання не вдалося");
            });
    };
    $scope.removeSubgroupLink=function(link){
        superVisorService.removeSubgroupLink(link).$promise
            .then(function successCallback() {
                $scope.loadSubgroupData(link.id_subgroup);
            }, function errorCallback() {
                bootbox.alert("Видалити посилання не вдалося");
            });
    };
}

function groupAccessCtrl ($scope, $http, $stateParams, superVisorService){
    $scope.changePageHeader('Доступ групи до контенту');
    $scope.end_date='3000-12-31';

    $scope.loadGroupData=function(groupId){
        superVisorService.groupData({'id':groupId}).$promise
            .then(function successCallback(response) {
                $scope.selectedGroup=response.group;
                $scope.groupSelected=response.group.name;
            }, function errorCallback() {
                bootbox.alert("Отримати дані групи не вдалося");
            });
    };
    $scope.loadGroupAccess=function(groupId,serviceId){
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/getGroupAccess',
            method: "POST",
            data: $jq.param({
                groupId:groupId,
                serviceId:serviceId
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback(response) {
            $scope.groupSelected=response.data.group;
            $scope.serviceSelected=response.data.service;
            $scope.end_date=response.data.endDate;
        }, function errorCallback() {
            bootbox.alert("Отримати дані не вдалося");
        });
    };

    if($stateParams.service && $stateParams.group) {
        $scope.defaultService=$stateParams.service;
        $scope.defaultGroup=$stateParams.group;
        $scope.loadGroupAccess($scope.defaultGroup, $scope.defaultService);
    }else if(!$stateParams.service && $stateParams.group){
        $scope.defaultGroup=$stateParams.group;
        $scope.loadGroupData($stateParams.group);
    }

    $scope.onSelectGroup = function ($item) {
        $scope.selectedGroup = $item;
    };
    $scope.reloadGroup = function(){
        $scope.selectedGroup=null;
    };
    $scope.onSelectService = function ($item) {
        $scope.selectedContent = $item;
    };
    $scope.reloadService = function(){
        $scope.selectedContent=null;
    };
    $scope.clearContent = function(){
        $scope.selectedContent=null;
        $scope.serviceSelected=null;
    };
    
    $scope.sendGroupAccessToContent=function(scenario, idGroup, idContent, endDate, serviceType){
        if(scenario=='create')
            $scope.createGroupAccessToContent(idGroup, idContent, endDate, serviceType);
        else $scope.updateGroupAccessToContent($scope.defaultGroup, $scope.defaultService, endDate);
    };

    $scope.createGroupAccessToContent=function(idGroup, idContent, endDate, serviceType){
        if(idGroup && idContent && endDate && serviceType){
            $http({
                url: basePath+'/_teacher/_supervisor/superVisor/setGroupAccessToService',
                method: "POST",
                data: $jq.param({
                    idGroup:idGroup,
                    idContent:idContent,
                    endDate:endDate,
                    serviceType:serviceType
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function successCallback(response) {
                $scope.addUIHandlers(response.data);
                $scope.clearContent();
            }, function errorCallback(response) {
                console.log(response);
                bootbox.alert("Виникла помилка");
            });
        }else{
            bootbox.alert("Введіть всі необхідні дані форми");
        }
    };

    $scope.updateGroupAccessToContent=function(idGroup, idService, endDate){
        if(idGroup && idService && endDate){
            $http({
                url: basePath+'/_teacher/_supervisor/superVisor/updateGroupAccessToService',
                method: "POST",
                data: $jq.param({
                    idGroup:idGroup,
                    idService:idService,
                    endDate:endDate,
                }),
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
            }).then(function successCallback(response) {
                $scope.addUIHandlers(response.data);
            }, function errorCallback(response) {
                console.log(response);
                bootbox.alert("Виникла помилка");
            });
        }else{
            bootbox.alert("Введіть всі необхідні дані форми");
        }
    };

    $scope.cancelGroupAccess=function(idGroup, idService){
        $http({
            url: basePath+'/_teacher/_supervisor/superVisor/cancelGroupAccess',
            method: "POST",
            data: $jq.param({
                idGroup:idGroup,
                idService:idService
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}
        }).then(function successCallback() {
            $scope.loadGroupAccess(idGroup, idService);
        }, function errorCallback() {
            bootbox.alert("Виникла помилка");
        });
    };
}

function offlineStudentSubgroupCtrl ($scope, $http, superVisorService, $stateParams, $filter, chatIntITAMessenger, userService){
    $scope.onSelectUser = function ($item) {
        $scope.selectedUser = $item;
    };
    $scope.reloadUser = function(){
        $scope.selectedUser=null;
    };
    $scope.onSelectGroup = function ($item) {
        $scope.selectedGroup = $item;
        superVisorService
            .offlineGroupSubgroupsList({'id':$scope.selectedGroup.id})
            .$promise
            .then(function (data) {
                $scope.subgroupsList=data.rows;
            });
    };
    $scope.reloadGroup = function(){
        $scope.selectedGroup=null;
        $scope.selectedSubgroup=null;
        $scope.subgroupsList=null;
    };
    
    $scope.clearInputs=function () {
        $scope.formData.userSelected=null;
        $scope.selectedModule=null;
        $scope.selectedUser=null;
        $scope.formData.moduleSelected=null;
    };

    $scope.loadUserData=function(userId){
        userService.userProfileData({userId: userId})
            .$promise
            .then(function (response) {
                $scope.selectedUser = response;
                $scope.userSelected = response.firstName+' '+response.secondName+' '+response.email;
                $scope.defaultStudent=$scope.selectedUser.id;
            });
    };

    $scope.loadGroupData=function(groupId) {
        superVisorService.groupData({'id':groupId}).$promise
            .then(function successCallback(response) {
                $scope.defaultGroup=true;
                $scope.selectedGroup=response.group;
                $scope.groupSelected=response.group.name;
                $scope.services=response.services;
            }, function errorCallback() {
                bootbox.alert("Отримати дані групи не вдалося");
            });
    };
    $scope.loadSubgroupData=function(subgroupId){
        superVisorService.subgroupData({'id':subgroupId}).$promise
            .then(function successCallback(response) {
                $scope.subgroup=response.subgroup;
                superVisorService
                    .offlineGroupSubgroupsList({'id':$scope.subgroup.group})
                    .$promise
                    .then(function (data) {
                        $scope.subgroupsList=data.rows;
                        $scope.selectedSubgroup={id:subgroupId};
                    });
                $scope.loadGroupData($scope.subgroup.group);
            }, function errorCallback() {
                bootbox.alert("Отримати дані підгрупи не вдалося");
            });
    };
    $scope.loadOfflineStudentModel=function(offlineStudentModelId){
        $http.get(basePath + "/_teacher/_supervisor/superVisor/getOfflineStudentModel/?id="+offlineStudentModelId).then(function (response) {
            $scope.studentModel=response.data;
            $scope.start_date=response.data.startDate;
            $scope.graduate_date = response.data.graduateDate;
            $scope.end_date = response.data.endDate;
            $scope.loadUserData(response.data.id);
            $scope.loadSubgroupData(response.data.idSubgroup);
        });
    };
    
    if($stateParams.studentId) {
        $scope.start_date= $filter('date')(new Date(), "yyyy-MM-dd");
        $scope.loadUserData($stateParams.studentId);
    }else if($stateParams.studentModelId){
        $scope.studentModelId=$stateParams.studentModelId;
        $scope.loadOfflineStudentModel($scope.studentModelId);
    }else if($stateParams.subgroupId){
        $scope.defaultSubgroup=true;
        $scope.loadSubgroupData($stateParams.subgroupId);
        $scope.start_date= $filter('date')(new Date(), "yyyy-MM-dd");
    }

    $scope.sendOfflineStudentSubgroupForm=function(scenario, idUser,idSubgroup,startDate, graduateDate, modelId, rating){
        if(scenario=='create')
            $scope.addStudentToSubgroup(idUser,idSubgroup,startDate);
        else $scope.updateOfflineStudentSubgroup(idUser, idSubgroup, startDate, graduateDate, modelId, rating);
    };

    $scope.addStudentToSubgroup=function (idUser,idSubgroup,startDate) {
        if ($scope.selectedGroup==null) {
            bootbox.alert("Виберіть групу");
        } else if(idSubgroup==null){
            bootbox.alert("Виберіть підгрупу");
        } else if(idUser==null){
            bootbox.alert("Виберіть студента");
        }else{
            $http({
                method: 'POST',
                url: basePath+'/_teacher/_supervisor/superVisor/addStudentToSubgroup',
                data: $jq.param({userId: idUser, subgroupId: idSubgroup, startDate: startDate}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function successCallback(response) {
                chatIntITAMessenger.updateSubgroup(idSubgroup);

                $scope.addUIHandlers(response.data);
                if($stateParams.subgroupId){
                    $scope.reloadUser();
                    $scope.userSelected=null;
                    $scope.studentSubgroup.student.$setPristine();
                }else if($stateParams.studentId){
                    $scope.reloadGroup();
                    $scope.groupSelected=null;
                    $scope.studentSubgroup.group.$setPristine();
                    $scope.loadUserData(idUser);
                }
            }, function errorCallback() {
                bootbox.alert("Операцію не вдалося виконати");
            });
        }
    };

    $scope.updateOfflineStudentSubgroup=function (idUser, idSubgroup, startDate, graduateDate, modelId, services) {
        services.modules.forEach(function (item, key) {
            if (item.rat) {
                item.rat = item.rat/10;
            }
        });
        services.courses.forEach(function (item, key) {
            if (item.rat) {
                item.rat = item.rat/10;
            }
        });
        $http({
            method: 'POST',
            url: basePath+'/_teacher/_supervisor/superVisor/updateOfflineStudent',
            data: $jq.param({
                userId: idUser, subgroupId: idSubgroup,
                startDate: startDate, graduateDate: graduateDate,
                modelId: modelId,
                services: services}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function successCallback(response) {
            $scope.addUIHandlers(response.data.message);
            $scope.loadOfflineStudentModel($scope.studentModelId);
        }, function errorCallback() {
            bootbox.alert("Операцію не вдалося виконати");
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
                                            $scope.loadOfflineStudentModel($scope.studentModelId);
                                            $scope.addUIHandlers(response.data);
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

    $scope.onSelectGroup = function ($item) {
        $scope.selectedGroup = $item;
        superVisorService
            .offlineGroupSubgroupsList({'id':$scope.selectedGroup.id})
            .$promise
            .then(function (data) {
                $scope.subgroupsList=data.rows;
            });
    };
    $scope.reloadGroup = function(){
        $scope.selectedGroup=null;
        $scope.selectedSubgroup=null;
        $scope.subgroupsList=null;
    };
}


function trainersStudentsCtrl ($scope, superVisorService, NgTableParams, $stateParams){
    $scope.changePageHeader('Студенти закріплені за тренером');
    
    $scope.onSelectUser = function ($item) {
        $scope.selectedUser = $item;
    };
    $scope.reloadUser = function(){
        $scope.selectedUser=null;
    };
    
    $scope.trainersStudentsTableParams = new NgTableParams({trainer:$stateParams.idTrainer}, {
        getData: function (params) {
            return superVisorService
                .trainersStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
    
    $scope.addTrainer=function (trainerId, userId) {
        if (!trainerId) {
            bootbox.alert("Виберіть тренера.");
            return;
        }
        superVisorService
            .setTrainer({trainerId:trainerId,userId:userId})
            .$promise
            .then(function (response) {
                $scope.addUIHandlers(response.data);
                $scope.clearInputs();
                $scope.trainersStudentsTableParams.reload();
            });
    };
    
    $scope.cancelTrainer=function (userId) {
        superVisorService
            .removeTrainer({userId:userId})
            .$promise
            .then(function (response) {
                $scope.addUIHandlers(response.data);
                $scope.clearInputs();
                $scope.trainersStudentsTableParams.reload();
            });
    };

    $scope.clearInputs=function () {
        $scope.userSelected=null;
        $scope.selectedUser=null;
    };
}

function groupModulesAttributesCtrl ($scope, superVisorService){
    superVisorService
        .courseModuleAccessList({'idGroup':$scope.groupId})
        .$promise
        .then(function (response) {
            $scope.courses=response.courses;
            $scope.modules=response.modules;
        });
}

function groupModulesTeachersFormCtrl ($scope, $http, $state,$templateCache,$stateParams){
    $scope.changePageHeader('Призначення викладача модулю групи');
    $scope.selectedTeacher = null;
    $scope.onSelect = function ($item) {
        $scope.selectedTeacher = $item;
    };

    $scope.assignGroupTeacherModule = function (groupId,moduleId) {
        if ($scope.selectedTeacher)
            $http({
                method:'POST',
                url:basePath + '/_teacher/_supervisor/superVisor/assignTeacherForGroupModule',
                data: $jq.param({teacher: $scope.selectedTeacher.id, module: moduleId, group: groupId}),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response){
                bootbox.alert(response,function(){
                    $templateCache.remove(basePath + "/_teacher/_supervisor/superVisor/editOfflineGroupTeacherModule/idGroup/"+$stateParams.idGroup+"/idModule/" + $stateParams.idModule);
                    $state.reload();
                });
            }).error(function(){
                bootbox.alert("Операцію не вдалося виконати.");
            })

    };

    $scope.cancelGroupTeacherModule = function(modelId){
        $http({
            method:'POST',
            url: basePath+'/_teacher/_supervisor/superVisor/cancelTeacherForGroupModule',
            data: $jq.param({id: modelId}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response){
            bootbox.alert(response,function(){
                $templateCache.remove(basePath + "/_teacher/_supervisor/superVisor/editOfflineGroupTeacherModule/idGroup/"+$stateParams.idGroup+"/idModule/" + $stateParams.idModule);
                $state.reload();
            });
        }).error(function(){
            bootbox.alert("Операцію не вдалося виконати.");
        });
    };
}
function lecturesRatingTableCtrl($scope, superVisorService, NgTableParams) {
    $scope.lecturesRatingTableParams = new NgTableParams({}, {
        getData: function (params) {
            return superVisorService
                .lecturesRatingList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function modulesRatingTableCtrl($scope, superVisorService, NgTableParams) {
    $scope.modulesRatingTableParams = new NgTableParams({}, {
        getData: function (params) {
            return superVisorService
                .modulesRatingList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function offlineGroupStudentsCtrl ($scope, $state, $stateParams, superVisorService, NgTableParams){
    $scope.changePageHeader('Офлайн студенти');

    $scope.offlineStudentsTableParams = new NgTableParams({'idGroup':$scope.groupId}, {
        getData: function (params) {
            return superVisorService
                .offlineStudentsList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    return data.rows;
                });
        }
    });
}

function coursesAccessCtrl ($scope, $state, $stateParams, superVisorService, NgTableParams) {
    $scope.changePageHeader('Доступ до курсів');

    $scope.groupCoursesAccessParams = new NgTableParams({'idGroup': $scope.groupId}, {
        getData: function (params) {
            return superVisorService
                .courseAccessList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    $scope.courseServices = data.rows;
                    return data.rows;
                });
        }
    });
}

function modulesAccessCtrl ($scope, $state, $stateParams, superVisorService, NgTableParams) {
    $scope.changePageHeader('Доступ до модулів');

    $scope.groupModulesAccessParams = new NgTableParams({'idGroup':$scope.groupId}, {
        getData: function (params) {
            return superVisorService
                .moduleAccessList(params.url())
                .$promise
                .then(function (data) {
                    params.total(data.count);
                    $scope.moduleServices=data.rows;
                    return data.rows;
                });
        }
    });
}
