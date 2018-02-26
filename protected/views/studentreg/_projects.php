<?php
/**
 * Created by PhpStorm.
 * User: adm
 * Date: 09.06.2017
 * Time: 12:36
 */

?>
<?php if ($owner) {?>
    <p class="text-right">
        <a href="" ng-click="show_project=!show_project" class="about_project" ng-class="{'collapsed': !show_project}">Інструкція</a>
    </p>
    <div ng-if="show_project">
        <div>
            Якщо твій проект знаходиться на gitlab, виконай:
            <ul>
                <li>
                    Settings->Repository->Deploy keys->CI Press Enable
                </li>
                <li>
                    Дочекайся затвердження проекта тренером
                </li>
            </ul>
        </div>
        <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'project1.jpg');?>">
        <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'project2.jpg');?>">
    </div>
<div class="col-md-12 col-sm-12" >
    <button class="btn btn-primary" ng-click="addProject()"> Додати проект</button>
</div>
<?php }?>
<div class="row studentProject" ng-repeat="project in projects">

        <div class="col-md-2 col-sm-2 ">
                <strong>Проект:</strong>
        </div>
        <div class="col-md-5 col-sm-5" >
            <span ng-show="project.need_check != 1"><a href="{{baseProjectsUrl}}/{{project.id_student}}/{{project.title}}" target="_blank">{{project.title}}</a></span>
            <span ng-show="project.need_check == 1">{{project.title}}</span>
        </div>
    <?php if ($owner) {?>
        <div class="col-md-5 col-sm-5" style="">
            <span class="col-sm-4">
            <button class="btn btn-sm btn-primary" ng-click="editProject(project.id)">Змінити</button>
            </span>
            <span class="col-sm-1">
            <button class="btn btn-sm btn-success" ng-click="makeApproveRequest(project.id)">Запит на перевірку</button>
            </span>
        </div>
    <?php }?>

</div>