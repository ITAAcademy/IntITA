function assignRole(url, role, tab) {
    user = $jq("#userId").val();
    if (user == 0) {
        bootbox.alert('Виберіть користувача.');
    } else {
        var posting = $jq.post(url, {userId: user, role: role});
        posting.done(function (response) {
                bootbox.alert(response, loadUsersIndex(tab));
            })
            .fail(function () {
                bootbox.alert("Користувачу не вдалося призначити обрану роль. Спробуйте повторити " +
                    "операцію пізніше або напишіть на адресу " + adminEmail, loadUsersIndex);
            });
    }
}

function cancelRole(url, role, user, tab) {
    if (!user) {
        user = $jq("#userId").val();
    }
    if (user == 0) {
        bootbox.alert('Виберіть користувача.');
    } else {
        var posting = $jq.post(url, {userId: user, role: role});
        posting.done(function (response) {
                bootbox.alert(response, loadUsersIndex(tab));
            })
            .fail(function () {
                bootbox.alert("Користувачу не вдалося відмінити обрану роль. Спробуйте повторити " +
                    "операцію пізніше або напишіть на адресу " + adminEmail, loadUsersIndex(tab));
            });
    }
}

function loadUsersIndex(tab) {
    if (tab == undefined) tab = 0;
    load(basePath + '/_teacher/_admin/users/index', 'Користувачі', '', tab);
}

function initCountriesList(){
    $jq('#countriesTable').DataTable({
        "autoWidth": false,
        "order": [[ 0, "asc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/address/getCountriesList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "width": "10%",
                "data": "id"
            },
            {
                "data": "title_ua"
            },
            {
                "data": "title_ru"
            },
            {
                "data": "title_en"
            }
        ],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initCitiesList(){
    $jq('#citiesTable').DataTable({
        "autoWidth": false,
        "order": [[ 0, "asc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/address/getCitiesList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "width": "10%",
                "data": "id"
            },
            {
                "data": "country"
            },
            {
                "data": "title_ua"
            },
            {
                "data": "title_ru"
            },
            {
                "data": "title_en"
            }
        ],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initUsersTable() {
    $jq('#usersTable').DataTable({
        "autoWidth": false,
        "order": [[ 2, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getUsersList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name"
            },
            {"data": "email"},
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                "width": "20%",
                "data": "profile",
                "render": function (url) {
                    return '<a href="' + url + '" target="_blank">Профіль користувача</a>';
                }
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initConsultantsRolesTable() {
    $jq('#consultantsTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getConsultantsList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name",
                "render": function (name) {
                    return '<a href="#" onclick="load(\'' + name["url"] + '\',  \'' + name["title"] + ' \');">' + name["title"] + '</a>';
                }
            },
            {
                "data": "email",
                "render": function (email) {
                    return '<a href="#" onclick="load(\'' + email["url"] + '\', \'Співробітник\');">' + email["title"] + '</a>';
                }
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initTrainersTable() {
    $jq('#trainersTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getTrainersList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name",
                "render": function (name) {
                    return '<a href="#" onclick="load(\'' + name["url"] + '\', \'' + name["title"] + ' \');">' + name["title"] + '</a>';
                }
            },
            {
                "data": "email",
                "render": function (email) {
                    return '<a href="#" onclick="load(\'' + email["url"] + '\', \'Співробітник\');">' + email["title"] + '</a>';
                }
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initTeachersTable() {
    $jq('#teachersTable').DataTable({
        "autoWidth": false,
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getTeachersList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name",
                "render": function (name) {
                    return '<a href="#" onclick="load(\'' + name["url"] + '\',  \'' + name["title"] + ' \');">' + name["title"] + '</a>';
                }
            },
            {
                "data": "email",
                "render": function (email) {
                    return '<a href="#" onclick="load(\'' + email["url"] + '\', \'Співробітник\');">' + email["title"] + '</a>';
                }
            },
            {
                "width": "20%",
                "data": "profile",
                "render": function (url) {
                    return '<a href="' + url + '" target="_blank">Персональна сторінка</a>';
                }
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initAdminsTable() {
    $jq('#adminsTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getAdminsList",
            "dataSrc": "data"
        },
        "columns": [
            {"data": "name"},
            {"data": "email"},
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "10%",
                "data": "profile",
                "render": function (url) {
                    return '<a href="' + url + '" target="_blank">Профіль</a>';
                }
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initAccountantsTable() {
    $jq('#accountantsTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getAccountantsList",
            "dataSrc": "data"
        },
        "columns": [
            {"data": "name"},
            {"data": "email"},
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "10%",
                "data": "profile",
                "render": function (url) {
                    return '<a href="' + url + '" target="_blank">Профіль</a>';
                }
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function addTrainer(url, scenario) {
    var id = document.getElementById('user').value;
    var trainerId = (scenario == "remove") ? 0 : $jq("#trainer").val();
    var oldTrainerId = 0;//(scenario != "new") ? $jq("#oldTrainerId").val() : 0;
    if (trainerId == 0 && scenario != "remove") {
        showDialog("Виберіть тренера.");
    }
    $jq.ajax({
        url: url,
        type: 'post',
        data: {'userId': id, 'trainerId': trainerId, 'oldTrainerId': oldTrainerId},
        success: function (response) {
            if (response == "success") {
                bootbox.alert("Операцію успішно виконано.", function () {
                    load(basePath + "/_teacher/_admin/users/index", 'Користувачі', '', '4');
                });
            } else {
                showDialog("Операцію не вдалося виконати.");
            }
        },
        error: function () {
            showDialog("Операцію не вдалося виконати.");
        }
    });
}

function initContentManagersTable() {
    $jq('#contentManagersTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getContentManagersList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name",
                "render": function (name) {
                    return '<a href="#" onclick="load(\'' + name["url"] + '\', \'' + name["title"] + '\');">' + name["title"] + '</a>';
                }
            },
            {
                "data": "email",
                "render": function (email) {
                    return '<a href="#" onclick="load(\'' + email["url"] + '\', \'Співробітник\');">' + email["title"] + '</a>';
                }
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initTeacherConsultantsTable() {
    $jq('#teacherConsultantsTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getTeacherConsultantsList",
            "dataSrc": "data"
        },
        "columns": [
            {
                "data": "name",
                "render": function (name) {
                    return '<a href="#" onclick="load(\'' + name["url"] + '\',  \'' + name["title"] + ' \');">' + name["title"] + '</a>';
                }
            },
            {
                "data": "email",
                "render": function (email) {
                    return '<a href="#" onclick="load(\'' + email["url"] + '\', \'Співробітник\');">' + email["title"] + '</a>';
                }
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

function initTenantsTable(){
    $jq('#tenantsTable').DataTable({
        "autoWidth": false,
        "order": [[ 3, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getTenantsList",
            "dataSrc": "data"
        },
        "columns": [
            {"data": "name"},
            {"data": "email"},
            {
                type: 'de_date', targets: 1 ,
                "width": "15%",
                "data": "register"
            },
            {
                type: 'de_date', targets: 1 ,
                "width": "15%",
                "data": "cancelDate"
            },
            {
                "width": "10%",
                "data": "profile",
                "render": function (url) {
                    return '<a href="' + url + '" target="_blank">Профіль</a>';
                }
            },
            {
                "width": "5%",
                "data": "mailto",
                "render": function (url) {
                    return '<a class="btnChat"  href="' + url + '"  data-toggle="tooltip" data-placement="top" title="Приватне повідомлення">' +
                        '<i class="fa fa-envelope fa-fw"></i></a>';
                }
            },
            {
                "width": "5%",
                "data": "cancel",
                "render": function (params) {
                    return '<a href="#" onclick="cancelRole(' + params + ')"><i class="fa fa-trash fa-fw"></i></a>';
                }
            }],
        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },
        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    });
}

/**
 * Created by anton on 11.02.16.
 */

/**
 * Initialises students table
 */
function initStudentsList() {
    return $jq('#studentsTable').DataTable( {
        "order": [[ 2, "desc" ]],
        "ajax": {
            "url": basePath + "/_teacher/_admin/users/getStudentsList",
            "dataSrc": "data"
        },
        "columns": [
            { data: "student-name" },
            { data: "email" },
            {
                type: 'de_datetime', targets: 0,
                data: "date"
            },
            { data: "trainer-name" },
            {
                "width": "10%",
                data: "url",
                "render": function (url) {
                    return '<a href="#" onclick="load(\'' + url + '\', \'Редагувати тренера студента\');">редагувати</a>';
                }
            }
        ],

        "createdRow": function (row, data, index) {
            $jq(row).addClass('gradeX');
        },

        language: {
            "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Ukranian.json"
        }
    } );
};


/**
 * Updates table data
 * @param startDate
 * @param endDate
 */
function updateStudentList(startDate, endDate) {
    var request = basePath + "/_teacher/_admin/users/getStudentsList";
    if (startDate != null && startDate !== "") {
        request += '?startDate=' + startDate;
        if (endDate != null && endDate !== "") {
            request += '&endDate=' + endDate;
        }
    }
    $jq('#studentsTable').DataTable().ajax.url(request).load();
}


// language data for datapicker
var lang = {
    closeText: 'Закрити',
    prevText: '&#x3C;Попередній',
    nextText: 'Наступний&#x3E;',
    currentText: 'Сьогодні',
    monthNames: ['Січень','Лютий','Березень','Квітень','Травень','Червень', 'Липень','Серпень','Вересень','Жовтень','Листопад','Грудень'],
    monthNamesShort: ['Січ','Лют','Бер','Кві','Тра','Чер',
        'Лип','Сер','Вер','Жов','Лис','Гру'],
    dayNames: ['неділя','понеділок','вівторок','середа','четвер','п\'ятниця','субота'],
    dayNamesShort: ['нед','пон','вів','сер','чет','п\'ят','сбт'],
    dayNamesMin: ['Нд','Пн','Вт','Ср','Чт','Пт','Сб'],
    weekHeader: 'Тиждень',
    dateFormat: 'yy-mm-dd',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};


