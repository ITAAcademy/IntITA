<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 2/23/2018
 * Time: 5:42 PM
 */
class VacationController extends TeacherCabinetController {
    public function hasRole() {
            return true;
    }
    public function actionDashboard() {
        $this->renderPartial('/vacation/_dashboard', array(), false, true);
    }
}