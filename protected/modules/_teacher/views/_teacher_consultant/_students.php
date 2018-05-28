<?php
/**
 * @var $students array
 * @var $student StudentReg
 */
?>
<style type="text/css">
    span.group_name{
        text-decoration: none;
    }
    span.group_name:hover{
        text-decoration: underline;
    }
    span.module_name {
        color: #337ab7;
        text-decoration: none;
    }
    span.module_name:hover{
        text-decoration: underline;
    }
</style>
<div class="row" ng-controller="teacherConsultantStudentsCtrl">
    <h4>Групи студентів:</h4>
    <ul class="list-group">
        <li ng-repeat="group in studentsCategory track by $index" class="list-group-item">
            <div class="panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
						<span class="group_name" data-toggle="collapse" ng-click="showStudents(group)">
                            {{group.title}}
                        </span>
                    </h4>
                </div>
                <div id="collapse{{group.id}}" class="panel-collapse collapse">
                    <ul>
                        <li ng-repeat="student in group.students track by $index">
                            <a ng-href="#/users/profile/{{student.id}}">
                                {{student.firstName}} {{student.secondName}} {{student.email}}
                            </a>
                            Модуль:
                            <span class="module_name" ng-click="moduleLink(student.module_ID)">
                                {{student.title_ua}} ({{student.language}})
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</div>