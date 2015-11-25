<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 06.11.2015
 * Time: 16:01
 */

class QuizFactory  {


    public static function factory($arr)
    {
        switch($arr['type'])
        {
            case 'plain_task' :
                $id_block = LectureElement::addNewPlainTask($arr['lecture'], $arr['block_element']);
                if($id_block){
                    $arr['block'] = $id_block;
                    $taskObj = new PlainTask();
                    $taskObj->addTask($arr);
                    return true;
                }
                else return false;
            break;
            case 'tests' :
                if ($lectureElementId = LectureElement::addNewTestBlock($arr['lecture'], $arr['condition'])) {
                    $tests = new Tests();
                    $arr['lectureElementId'] = $lectureElementId;
                    if($tests->addTask($arr))
                    return true;
                    else return false;
                }
                break;
            case 'task' :
                if ($lectureElementId = LectureElement::addNewTaskBlock($arr['lecture'] , $arr['condition'])) {
                    $arr['lectureElementId'] = $lectureElementId;
                    $task = new Task();
                    if ($task->addTask($arr))
                        return true;
                    else return false;

                }
            break;
            case 'skip_task' :

                $conditionId = LectureElement::addNewSkipTaskBlock($arr['lecture'] , $arr['condition']);
                $questionId = LectureElement::addNewSkipTaskBlock($arr['lecture'] , $arr['question']);
                $arr['questionString'] = $arr['question'];

                if ($questionId && $conditionId) {
                    $arr['condition'] = $conditionId;
                    $arr['question'] = $questionId;

                    $task = new SkipTask();
                    if ($task->addTask($arr))
                        return true;
                    else return false;
                }
            break;
        }
    }
}