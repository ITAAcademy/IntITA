<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 6/9/2018
 * Time: 12:44 PM
 */

class CrmImageUploadHelper
{
    public static function uploadImage($oldLink,$folder,$primaryKey){
        $link = null;
        $addressForFile = "";
        if (!empty($_FILES)) {
            $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
            $folderAddress = Yii::app()->basePath .'/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema() . "/" . $folder ."/";
            if (!file_exists($folderAddress)) {
                mkdir($folderAddress, 0777, true);
            }
            if ($oldLink && file_exists($folderAddress . $oldLink)) {
                unlink($folderAddress . $oldLink);
            }

            $end_file_name = $_FILES["$primaryKey"]["name"];
            $tmp_file_name = $_FILES["$primaryKey"]["tmp_name"];
            if (getimagesize($tmp_file_name)) {
                $link = date("jYgi") . basename($end_file_name);
                $addressForFile = $folderAddress . $link;
            }
            copy($tmp_file_name, $addressForFile);
        }

        return $link;
    }

    public static function copyImageFromMainToSubdomain($oldLink, $image, $folder){
        $subdomain = Subdomains::model()->findByAttributes(array('organization' => Yii::app()->user->model->getCurrentOrganizationId()));
        $folderAddress = Yii::app()->basePath .'/../domains/' . $subdomain->domain_name . '.' . Config::getBaseUrlWithoutSchema() . "/" . $folder ."/";
        if (!file_exists($folderAddress)) {
            mkdir($folderAddress, 0777, true);
        }

        if ($oldLink && file_exists($folderAddress . $oldLink)) {
            unlink($folderAddress . $oldLink);
        }

        copy(Yii::app()->basePath .'/../domains/'.$image, $folderAddress.$image);

        return $image;
    }
}