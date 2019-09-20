<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 14.12.2015
 * Time: 14:43
 *
 * @var $plainTask PlainTaskAnswer
 * @var $mark PlainTaskMarks
 */
$mark = $plainTask->mark();
?>

<div ng-controller="teacherConsultantTasksCtrl">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Оцінка простої задачі</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <input type="text" id="plainTaskId" hidden="hidden" value="<?php echo $plainTask->id; ?>">
                <input type="text" id="userId" hidden="hidden" value="<?php echo $plainTask->id_student; ?>">
                <div class="form-group">
                    <label for="fromWho">Від кого</label>
                    <input type="text" class="form-control" id="fromWho"
                           placeholder="<?php echo $plainTask->getStudentName() ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="condition">Умова задачі</label>
                    <div class="form-control" name="condition" id="textareaSettingsbyId"
                              readonly><?php echo $plainTask->getCondition() ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="answer">Відповідь</label>
                    <textarea class="form-control" name="answer" id="textareaSettingsbyId"
                              readonly><?php echo str_replace('}}','} }',str_replace('{{', '{ {', $plainTask->answer)); ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="mark">Оцінка</label>
                    <select class="form-control" id="mark">
                        <option value="0">не зараховано</option>
                        <option value="1" <?php if($mark['mark'] == "1") echo "selected";?>>зараховано</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Коментар до задачі</label>
                    <textarea class="form-control" name="comment" id="textareaSettingsbyId"><?=$mark['comment'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <button ng-click="markTask()" class="btn btn-primary"><?php echo ($mark['mark'])?'Змінити оцінку':'Оцінити';?>
                </button>
                <a href="" type="button" class="btn btn-default" ng-click="back()">
                    Назад
                </a>
            </div>
        </div>
    </div>
</div>