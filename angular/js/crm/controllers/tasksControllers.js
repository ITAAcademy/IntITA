/**
 * Created by adm on 19.07.2016.
 */

angular
    .module('crmApp')
    .controller('crmTaskCtrl', ['$attrs', '$scope', '$rootScope', '$stateParams',
        function ($attrs, $scope, $rootScope, $stateParams) {
            $scope.changePageHeader('Завдання');

            $scope.currentTaskId = $stateParams.id;
            $scope.teacherMode = $attrs.teachermode1;
            $scope.editorOptionsCrm = {toolbar: 'main'};
            $scope.currentDate = currentDate;
            $scope.currentUser = user;
            $scope.rolesCanEditCrmTasks = rolesCanEditCrmTasks;
            $scope.pathToCrmTemplates = basePath + '/angular/js/crm/templates';
            $scope.chatPath = chatPath;
            $scope.pathToCrmFiles = basePath + '/files/crm/tasks';

            var conn = new ab.Session('wss://' + window.location.host + '/wss/',
                function () {
                    conn.subscribe('changeTask-' + user, function (topic, data) {
                        console.log('Task changed');
                        $rootScope.loadTasks($rootScope.roleId);
                        $rootScope.updateTaskManagerCounter();
                    });
                },
                function () {
                    console.warn('WebSocket connection closed');
                },
                {'skipSubprotocolCheck': true}
            );
        }])
    .controller('crmTasksCtrl', ['$attrs', '$scope', 'crmTaskServices', 'ngToast', '$rootScope', 'NgTableParams', '$state', 'lodash', '$filter', '$uibModal', '$timeout', '$window','usersService',
        function ($attrs, $scope, crmTaskServices, ngToast, $rootScope, NgTableParams, $state, lodash, $filter, $uibModal, $timeout, $window, usersService) {
            $scope.changePageHeader('Завдання');
            var initializing = true;
            var isMobile = {
                Android: function () { return navigator.userAgent.match(/Android/i); },
                BlackBerry: function () {return navigator.userAgent.match(/BlackBerry/i); },
                iOS: function () {return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
                Opera: function () {return navigator.userAgent.match(/Opera Mini/i); },
                Windows: function () {return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i); },
                any: function () {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); },
            };
            // deny drag&drop for mobile devices
            $scope.canDrag = isMobile.any() ? false : true;

            $rootScope.$on('$stateChangeStart',
                function(event, toState, toParams, fromState, fromParams){
                    $scope.changeRouterState(toState.name);
                })

            $scope.changeRouterState=function (state) {
                switch (state) {
                    case 'tasks.executant':
                        $scope.changePageHeader('Мої завдання');
                        $rootScope.roleId = 1;
                        $scope.applyTasksFilter();
                        break;
                    case 'tasks.collaborator':
                        $scope.changePageHeader('Завдання в яких допомагаю');
                        $rootScope.roleId = 3;
                        $scope.applyTasksFilter();
                        break;
                    case 'tasks.producer':
                        $scope.changePageHeader('Завдання які доручив');
                        $rootScope.roleId = 2;
                        $scope.applyTasksFilter();
                        break;
                    case 'tasks.observer':
                        $scope.changePageHeader('Завдання в яких спостерігаю');
                        $rootScope.roleId = 4;
                        $scope.applyTasksFilter();
                        break;
                    case 'tasks.all':
                        $scope.changePageHeader('Усі завдання зі мною');
                        $rootScope.roleId = 0;
                        $scope.applyTasksFilter();
                        break;
                    default:
                        $scope.changePageHeader('Мої завдання');
                        $rootScope.roleId = 1;
                        $scope.applyTasksFilter();
                        break;
                }
            }

            $scope.teacherMode = $attrs.teachermode1;
            $scope.currentDate = currentDate;
            $scope.board = 1;
            $scope.currentUser = user;
            $scope.rolesCanEditCrmTasks = rolesCanEditCrmTasks;
            $scope.pathToCrmTemplates = basePath + '/angular/js/crm/templates';
            $scope.chatPath = chatPath;
            $scope.pathToCrmFiles = basePath + '/files/crm/tasks';
            $scope.filter = {};

            var conn = new ab.Session('wss://' + window.location.host + '/wss/',
                function () {
                    conn.subscribe('changeTask-' + user, function (topic, data) {
                        console.log('Task changed');
                        $rootScope.loadTasks($rootScope.roleId);
                        $rootScope.updateTaskManagerCounter();
                    });
                },
                function () {
                    console.warn('WebSocket connection closed');
                },
                {'skipSubprotocolCheck': true}
            );

            $scope.tabs = [
                {title: "Мої", route: "executant"},
                {title: "Допомагаю", route: "collaborator"},
                {title: "Доручив", route: "producer"},
                {title: "Спостерігаю", route: "observer"},
                {title: "Усі", route: "all"},
            ];
            $scope.crmPrioritiesList = [
                {id: "1", title: 'Низький'},
                {id: "2", title: 'Середній'},
                {id: "3", title: 'Високий'},
                {id: "4", title: 'Терміновий'},
            ];
            $scope.crmParentTypes = [
                {id: "1", title: 'Основні задачі'},
                {id: "2", title: 'Підзадачі'},
            ];

            $scope.getGroupsNames = function () {
                usersService
                    .getGroupNumber()
                    .$promise
                    .then(function (data) {
                        $scope.groupsNames = data;
                    })
            };
            $scope.getGroupsNames();

            $scope.getCrmTasksTypeList = function () {
                crmTaskServices
                    .crmTasksTypeList()
                    .$promise
                    .then(function (response) {
                        return $scope.crmTypesList = response.map(function (item) {
                            return {id: item.id, title: item.title_ua}
                        });
                    });
            };
            $scope.getCrmTasksTypeList();

            $scope.openCrmModal = function (size, parentSelector, clear, id) {
                if (clear) {
                    $scope.currentTaskId = null;
                }
                var parentElem = parentSelector ?
                    angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
                $uibModal.open({
                    animation: true,
                    ariaLabelledBy: 'modal-title',
                    ariaDescribedBy: 'modal-body',
                    templateUrl: basePath + '/angular/js/crm/templates/crmModalContent.html',
                    scope: $scope,
                    size: size,
                    appendTo: parentElem,
                });
            };

            $rootScope.getTasksCount = function () {
                crmTaskServices
                    .activeCrmTasksCount()
                    .$promise
                    .then(function (data) {
                        $scope.rolesCount = data;
                        $scope.tabs.forEach(function (item, i) {
                            if (lodash.find($scope.rolesCount, ['role', item.route])) {
                                item.count = lodash.find($scope.rolesCount, ['role', item.route]).count;
                            }
                            if ('tasks.' + item.route == $state.current.name) {
                                $scope.active = i;
                            }
                        });
                    });
            };
            $rootScope.getTasksCount();

            $scope.editorOptionsCrm = {toolbar: 'main'};

            $scope.getTask = function (id) {
                if (!$scope.taskLoading) {
                    $scope.taskLoading = true;
                    $scope.currentTaskId = id;
                    $scope.openCrmModal('lg', null, null);
                    $scope.taskLoading = false;
                }
            }

            $rootScope.loadTasks = function (idRole, filterName, fullName, filterId, filterPriority, filterType, filterParentType, groupsName) {
                if ($scope.board == 1) {
                    return $scope.loadKanbanTasks(idRole, filterName, fullName, filterId, filterPriority, filterType, filterParentType, groupsName).then(function (data) {
                        $scope.setKanbanHeight();
                    });
                } else {
                    return $scope.loadTableTasks(idRole);
                }
            };

            $scope.applyTasksFilter = function (keyEvent) {
                if (!keyEvent || keyEvent.which === 13) {
                    $rootScope.loadTasks(
                        $rootScope.roleId,
                        $scope.filter.name,
                        $scope.filter.fullName,
                        $scope.filter.id,
                        $scope.filter.priority,
                        $scope.filter.type,
                        $scope.filter.parentType,
                        $scope.filter.groupsNames
                    );
                }
            },

            $scope.clearFilter = function () {
                $scope.filter={};
                $rootScope.loadTasks($rootScope.roleId);
            },

            $scope.crmStateList = crmTaskServices
                .crmStateList()
                .$promise
                .then(function (data) {
                    return $scope.crmStates = data.map(function (item) {
                        return {id: item.id, title: item.description}
                    });
                });

            $scope.loadTableTasks = function (idRole) {
                var promise = $scope.tasksTableParams = new NgTableParams({
                    sorting: {
                        'idTask.priority': 'desc',
                        // assigned_date: 'desc',
                    },
                    id: idRole
                }, {
                    getData: function (params) {
                        return crmTaskServices
                            .getTasks(params.url())
                            .$promise
                            .then(function (data) {
                                params.total(data.count);
                                return data.rows;
                            });
                    }
                });
                return promise;
            };

            $scope.loadKanbanTasks = function (idRole, filterName, fullName, filterId, filterPriority, filterType, filterParentType, groupsName) {
                var promise = $scope.crmCanbanTasksList =
                    crmTaskServices
                        .getTasks({
                            'sorting[idTask.priority]': 'desc',
                            id: idRole,
                            'filter[idTask.name]': filterName,
                            'filter[idUser.fullName]': fullName,
                            'filter[idTask.id]': filterId,
                            'filter[idTask.priority]': filterPriority,
                            'filter[idTask.type]': filterType,
                            'filter[idTask.parentType]': filterParentType,
                            'filter[idTask.groupsNames]': groupsName,
                        })
                        .$promise
                        .then(function (data) {
                            $scope.crmCards = data.rows.map(function (item) {
                                return {
                                    id: item.idTask.id,
                                    title: item.idTask.name,
                                    observers: item.idTask.observers,
                                    producer: item.idTask.producerName.id,
                                    producerName: item.idTask.producerName.fullName,
                                    producerAvatar: basePath + '/images/avatars/' + item.idTask.producerName.avatar,
                                    executant: item.idTask.executantName.id,
                                    executantName: item.idTask.executantName.fullName,
                                    executantAvatar: basePath + '/images/avatars/' + item.idTask.executantName.avatar,
                                    description: $filter('limitTo')(item.idTask.body, 70),
                                    changeDate: item.idTask.change_date,
                                    status: "concept",
                                    type: "task",
                                    stage_id: item.idTask.id_state,
                                    lastChangeBy: item.lastChangeBy,
                                    lastChangeByAvatar: item.lastChangeByAvatar,
                                    lastChangeDate: item.lastChangeDate,
                                    spent_time: item.spent_time,
                                    endTask: item.idTask.endTask,
                                    deadline: item.idTask.deadline,
                                    createdBy: item.idTask.created_by,
                                    priorityTitle: item.idTask.priorityModel.title,
                                    priority: item.idTask.priorityModel.description
                                }
                            });

                            $scope.initCrmKanban($scope.crmCards);

                            $timeout(function () {
                                $scope.setKanbanHeight()
                            }, 3000);

                            return true;
                        });
                return promise;
            };

            $scope.setKanbanHeight = function () {
                var heights = angular.element(".kanban-column").map(function () {
                    return angular.element(this).height();
                }).get(), maxHeight = Math.max.apply(null, heights);
                if ($window.innerWidth > 800) {
                    $scope.kanbanHeight = {'min-height': maxHeight};
                }
            };

            $scope.$watch('board', function () {
                if (initializing) {
                    $timeout(function() { initializing = false; });
                } else {
                    if (typeof $rootScope.roleId != 'undefined') $rootScope.loadTasks($rootScope.roleId);
                }
            });

            $scope.getKanban = function () {
                return basePath + '/angular/js/crm/templates/crmKanban.html';
            };

            $scope.bugs = ['expect_to_execute', 'executed', 'paused', 'completed'];

            $scope.initCrmKanban = function (crmCards) {
                // object for stages
                $scope.stages =
                    [
                        {"id": 1, "name": "Очікує на виконання"},
                        {"id": 2, "name": "Виконується"},
                        {"id": 3, "name": "Призупинено"},
                        {"id": 4, "name": "Завершено"},
                    ];
                // object for tasks
                $scope.tasks = crmCards;
            };

            // function for drag start
            $scope.dragStart = function dragStart(event, task) {
                task.dragging = true;
            }

            // function for on dropping
            $scope.onDrop = function onDrop(data, event, stage) {
                if (data && data.stage_id != stage.id) {
                    $scope.changeKanbanState(data, stage.id, data.stage_id);
                }
                if (data) data.dragging = false;
            };

            $scope.changeKanbanState = function (task, newstate, oldstate) {
                if (oldstate == 4 && !$scope.canComplete(task)) {
                    bootbox.alert('Співвиконавець не може виконувати дії з завершеними завданнями');
                }else if (newstate == 4 && !$scope.canComplete(task)) {
                    bootbox.alert('Співвиконавець не може завершити завдання');
                } else if (newstate == 1 && !$scope.canComplete(task)) {
                    bootbox.alert('Співвиконавець не може перенести завдання в статус очікування');
                } else {
                    crmTaskServices.changeTaskState({id: task.id, state: newstate}).$promise.then(function () {
                        if ($scope.board == 1) {
                            $scope.loadKanbanTasks($rootScope.roleId);
                            $scope.setKanbanHeight();
                        } else {
                            $scope.loadTableTasks($rootScope.roleId)
                            $scope.tasksTableParams.reload();
                        }
                    });
                }
            };

            $scope.cancelKanbanCrmTask = function (task) {
                bootbox.confirm('Ти впевнений, що хочеш видалити завдання?', function (result) {
                    if (result) {
                        crmTaskServices.cancelCrmTask({id: task.id}).$promise
                            .then(function (data) {
                                if ($scope.board == 1) {
                                    $scope.loadKanbanTasks($rootScope.roleId);
                                    $scope.setKanbanHeight();
                                } else {
                                    $scope.loadTableTasks($rootScope.roleId)
                                    $scope.tasksTableParams.reload();
                                }
                            });
                    }
                });
            };
            $scope.scrollTo = function (cl) {
                $jq('html, body').animate({
                    scrollTop: $jq('.' + cl).offset().top
                }, 'slow');
            };

            $scope.changeRouterState($state.$current.name);

            $scope.canComplete = function (task) {
                if(task.producer==$scope.currentUser || task.executant==$scope.currentUser || _.isObject(_.find(task.observers, {id: String($scope.currentUser)}))){
                    return true;
                }else{
                    return false;
                }
            }
        }])
    .controller('crmManagerCtrl', ['$scope', 'crmTaskServices','NgTableParams','$state','$rootScope',
        function ($scope, crmTaskServices, NgTableParams, $state, $rootScope) {
            $scope.changePageHeader('Менеджер завдань');

            $scope.events = [
                {title: "Створено", route: "created", count: $rootScope.createdCount},
                {title: "Відредаговано", route: "updated", count: $rootScope.updatedCount},
                {title: "Змінено статус", route: "changed", count: $rootScope.statesCount},
                {title: "Відкоментовано", route: "commented", count: $rootScope.commentsCount},
                {title: "Надано роль", route: "set_role", count: $rootScope.rolesCount},
                {title: "Усі", route: "all", count: $rootScope.taskManagerCount},
            ];
            $scope.events.forEach(function (item, i) {
                if ('tasksManager.' + item.route == $state.current.name) {
                    $scope.active = i;
                }
            });

            $scope.visitedTasksManager = function () {
                crmTaskServices
                    .visitedTasksManager()
                    .$promise
                    .then(function (data) {
                    });
            };

            $scope.getTasksManager = function () {
                crmTaskServices
                    .tasksManagerList()
                    .$promise
                    .then(function (data) {
                        $scope.tasks = data;
                        $scope.newTaskEvents = $scope.taskManagerCount;
                        $scope.visitedTasksManager();
                    });
            };

            $scope.getTasksManager();

            $scope.createdEventsTableParams = new NgTableParams({
                    sorting: {
                        created_date: 'desc',
                    },
                }, {
                    getData: function (params) {
                        return crmTaskServices
                            .getCreatedEvents(params.url())
                            .$promise
                            .then(function (data) {
                                params.total(data.count);
                                return data.rows;
                            });
                    }
            });
            $scope.updatedEventsTableParams = new NgTableParams({
                sorting: {
                    change_date: 'desc',
                },
            }, {
                getData: function (params) {
                    return crmTaskServices
                        .getUpdatedEvents(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.changedEventsTableParams = new NgTableParams({
                sorting: {
                    change_date: 'desc',
                },
            }, {
                getData: function (params) {
                    return crmTaskServices
                        .getChangedEvents(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.commentedEventsTableParams = new NgTableParams({
                sorting: {
                    create_date: 'desc',
                },
            }, {
                getData: function (params) {
                    return crmTaskServices
                        .getCommentedEvents(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
            $scope.setRoleEventsTableParams = new NgTableParams({
                sorting: {
                    assigned_date: 'desc',
                },
            }, {
                getData: function (params) {
                    return crmTaskServices
                        .getSetRoleEvents(params.url())
                        .$promise
                        .then(function (data) {
                            params.total(data.count);
                            return data.rows;
                        });
                }
            });
        }]);