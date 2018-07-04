<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 6/9/2018
 * Time: 12:44 PM
 */

class CrmImageUploadHelper
{
    public static function uploadImage($file,$folder,$primaryKey){
        $endAddress = null;
        $addressForFile = "";
        $previousImage = isset($file) ? $file : null;
        if (isset($_FILES) && !empty($_FILES)) {
            $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
            $path_domain = Yii::app()->basePath .'/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema();
            $folderAddress = $path_domain . "/" . $folder ."/";
            if (!file_exists($folderAddress)) {
                mkdir($folderAddress, 0777, true);
            }
            if ($previousImage && file_exists($folderAddress . $previousImage)) {
                unlink($folderAddress . $previousImage);
            }

            $end_file_name = $_FILES["$primaryKey"]["name"];
            $tmp_file_name = $_FILES["$primaryKey"]["tmp_name"];
            if (getimagesize($tmp_file_name)) {
                $endAddress = date("jYgi") . basename($end_file_name);
                $addressForFile = $folderAddress . $endAddress;
            }
            copy($tmp_file_name, $addressForFile);
        }

        return $endAddress;
    }
}