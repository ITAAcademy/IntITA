<?php
/**
 * @var $model Course
 * @var $modules array
 * @var $item CourseModules
 * @var $scenario string
 */ ?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php if ($scenario == "update") { ?>
                <ul class="list-inline">
                    <li>
                        <a href="<?= Yii::app()->createUrl("course/index", array('id' => $model->course_ID)); ?>"
                           class="btn btn-outline btn-primary">
                            Редагувати список модулів</a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-outline btn-primary"
                                onclick="load('<?php echo Yii::app()->createUrl('/_teacher/_admin/coursemanage/addExistModule', array(
                                    'id' => $model->course_ID
                                )); ?>', '<?= "Додати модуль до курса " . $model->getTitle() ?>')">
                            Додати існуючий модуль до курса
                        </button>
                    </li>
                </ul>
            <?php } ?>

            <div class="col-md-12">
                <div class="row">
                    <?php if (!empty($modules)) { ?>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="modulesListTable">
                                <thead>
                                <tr>
                                    <th>Модуль</th>
                                    <th width="10%">Порядок</th>
                                    <th width="15%">Ціна у курсі</th>
                                    <th width="20%">Попередній модуль</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($modules as $item) { ?>
                                <tr>
                                    <td>
                                        <a href="<?= Yii::app()->createUrl('module/index', array('idModule' => $item["id_module"])); ?>"
                                           target="_blank">
                                            <?= $item->moduleInCourse->getTitle(); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $item["order"]; ?>
                                    </td>
                                    <td>
                                        <?= $item["price_in_course"]; ?>
                                    </td>
                                    <td>
                                        <?= $item["mandatory_modules"]; ?>
                                    </td>
                                    <?php
                                    } ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } else {
                        echo "Модулів у даному курсі ще немає.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

