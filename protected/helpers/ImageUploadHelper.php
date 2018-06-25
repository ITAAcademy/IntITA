<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 6/9/2018
 * Time: 12:44 PM
 */

class ImageUploadHelper
{
    public static function uploadImage($file,$folder,$primaryKey){
        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
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
                    $endAddress = date("jYgi") . basename($end_file_name);  // '21042018name.jpg'
                    $addressForFile = $folderAddress . $endAddress;   // "domains/Madagascar1/lists/21042018name.jpg"
                }
                copy($tmp_file_name, $addressForFile);
            }

        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        return $endAddress;
    }
}