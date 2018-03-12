<?php
$this->breadcrumbs = array(
    'Модуль' => Yii::app()->createUrl("module/index", array("idModule" => $moduleRevision->id_module)),
    'Ревізії модуля' => Yii::app()->createUrl('/moduleRevision/moduleRevisions', array('idModule'=>$moduleRevision->id_module)),
    'Ревізія даного модуля',
);
?>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/module_revision_app/controllers/moduleRevisionCtrl.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('angular', 'js/module_revision_app/services/moduleRevisionsActions.js'); ?>"></script>
<script>
    idRevision = '<?php echo $moduleRevision->id_module_revision;?>';
    idModule = '<?php echo $moduleRevision->id_module;?>';
    basePath='<?php echo  Config::getBaseUrl(); ?>';
</script>
<div ng-controller="moduleRevisionCtrl">
    <div ng-cloak id="revisionMainBox">
        <?php
            $this->renderPartial('_moduleRevisionInfo', array('moduleRevision' => $moduleRevision));
        ?>
        <button class="btn btn-primary" ng-click="checkModuleRevision();">Наявність конфліктів</button>
        <?php if($author) { ?>
            <div>
                <a href="" ng-click="isOpenLecture = !isOpenLecture">Створити ревізію нового заняття</a>
            </div>
            <div ng-show="isOpenLecture">
                <?php $this->renderPartial('/revision/_addLessonForm', array('idModule'=>$moduleRevision->id_module)); ?>
            </div>
        <?php } ?>
        <h3>Доступні ревізії занять:</h3>
        <div class="revisionTable">
            <label>Доступні ревізії занять данного модуля(запропоновані до релізу, в релізі, затверджені):</label>
            <div class="form-group">
                <label>
                    <input type="checkbox" ng-init="current.proposed_to_release=true" ng-model="current.proposed_to_release">Запропоновані до релізу
                </label>
                <label>
                    <input type="checkbox" ng-model="current.released">В релізі
                </label>
                <label>
                    <input type="checkbox" ng-model="current.approved">Затверджені
                </label>
                <label>
                    <input type="text" class="form-control" placeholder="пошук" ng-model="searchCurrent">
                </label>
            </div>
            <div class="revisionsList">
                <div ng-if="current.proposed_to_release" ng-repeat="revision in approvedLecture.current.proposed_to_release | filter:searchCurrent track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromCurrentList(revision.id_revision, $index, revisionProposedToRelease)">+</span>
                </div>
                <div ng-if="current.released" ng-repeat="revision in approvedLecture.current.released | filter:searchCurrent track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromCurrentList(revision.id_revision, $index, revisionReleased)">+</span>
                </div>
                <div ng-if="current.approved" ng-repeat="revision in approvedLecture.current.approved | filter:searchCurrent track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromCurrentList(revision.id_revision, $index, revisionApproved)">+</span>
                </div>
            </div>
        </div>
        <div class="revisionTable">
            <label>Доступні ревізії занять інших модулів(запропоновані до релізу, в релізі, затверджені):</label>
            <div class="form-group">
                <label>
                    <input type="checkbox" ng-init="foreign.proposed_to_release=true" ng-model="foreign.proposed_to_release">Запропоновані до релізу
                </label>
                <label>
                    <input type="checkbox" ng-model="foreign.released">В релізі
                </label>
                <label>
                    <input type="checkbox" ng-model="foreign.approved">Затверджені
                </label>
                <label>
                    <input type="text" class="form-control" placeholder="пошук" ng-model="searchForeign">
                </label>
            </div>
            <div class="revisionsList">
                <div ng-if="foreign.proposed_to_release" ng-repeat="revision in approvedLecture.foreign.proposed_to_release | filter:searchForeign track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromForeignList(revision.id_revision, $index, revisionProposedToRelease)">+</span>
                </div>
                <div ng-if="foreign.released" ng-repeat="revision in approvedLecture.foreign.released | filter:searchForeign track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromForeignList(revision.id_revision, $index, revisionReleased)">+</span>
                </div>
                <div ng-if="foreign.approved" ng-repeat="revision in approvedLecture.foreign.approved | filter:searchForeign track by $index">
                    <a ng-href="{{revision.link}}" target="_blank" ng-class="{notActive: !revision.author}">
                        Ревізія №{{revision.id_lecture_revision}} {{revision.title}}
                    </a>
                    <span class='ico' ng-click="addRevisionToModuleFromForeignList(revision.id_revision, $index, revisionApproved)">+</span>
                </div>
            </div>
        </div>
        <br>
        <label>Перелік ревізій занять: </label>
        <div class="container">
            <div class="row">
                <div class="panel-body wrap-tabel-module">
                    <div class="panel panel-info">
                        <div class="panel-heading header-list">
                            <div class="col-md-2 col-xs-2">Номер ревізії</div>
                            <div class="col-md-6 col-xs-6">Назва</div>
                            <div class="col-md-2 col-xs-2">Порядок</div>
                            <div class="col-md-2 col-xs-2"></div>
                        </div>
                    </div>
                    <ul class="list-group" dnd-list dnd-drop="callback({targetList: model, targetIndex: index})"
                    >
                        <li class="list-group-item" ng-repeat="item in model track by $index"
                            dnd-draggable="null" dnd-callback="onDrop(model, $index, targetList, targetIndex)">
                            <div class="col-md-2 col-xs-2">
                                {{item.id_lecture_revision}}
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <a ng-href="<?php echo Yii::app()->createUrl("revision/previewLectureRevision", array('idRevision'=>'')) ?>{{item.id_lecture_revision}}" >{{item.title}}</a>
                            </div>
                            <div class="col-md-2 col-xs-2">
                                {{item.module_order}}
                            </div>
                            <div class="col-md-2 col-xs-2">
                                <img src="<?php echo StaticFilesHelper::createPath('image', 'editor', 'delete.png');?>" class="editIco" ng-click="removeRevisionFromModule(item.labelFunc($index)[1].id, $index);">
                            </div>
                        </li>
                    </ul>
                    <br>
                </div>
                <button class="btn btn-primary" ng-click="editModuleRevision(model)">Зберегти зміни</button>
            </div>
        </div>
        <br>
    </div>
    <br>
</div>