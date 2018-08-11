<?php
/**
 * Created by PhpStorm.
 * User: Viacheslav
 * Date: 6/4/2018
 * Time: 3:52 PM
 */

class BannersForGraduatesController extends TeacherCabinetController
{
    public function hasRole(){
        return Yii::app()->user->model->isSuperAdmin();
    }

    public function actionIndex(){
        return $this->renderPartial('index');
    }
    public function actionList(){
        $criteria = new CDbCriteria();
        $criteria->order = 'slide_position ASC';
        $adapter = new NgTableAdapter(BannersForGraduates::class, $_GET);
        $adapter->mergeCriteriaWith($criteria);
        return $this->renderJSON($adapter->getData());
    }

    public function actionAddBannerImage($bannerId = 0){
        $bannerModel = $this->loadModel($bannerId);
        if (!$bannerModel){
            $bannerModel = new BannersForGraduates();
            $sql = "SELECT * FROM banners_for_graduates ORDER BY banners_for_graduates.id DESC LIMIT 1";
            $lastElement = Yii::app()->db->createCommand($sql)->queryAll();
            if (!empty($lastElement)){
                $bannerModel->slide_position = $lastElement[0]["slide_position"] + 1;
            }
            else{
                $bannerModel->slide_position = 1;
            }
        }
        else{
            $bannerModel->deleteImageFile();
        }
        return $this->renderJSON(['data'=>$bannerModel->uploadBanner()]);
    }

    public function actionSetAttribute(){
        $bannerId = Yii::app()->request->getPost('id');
        $banner = $this->loadModel((int)$bannerId);
        if($banner){
            $attribute = Yii::app()->request->getPost('attribute');
            $value = Yii::app()->request->getPost('value');
            $banner->$attribute = $value;
            return $this->renderJSON(['data'=>$banner->save(),'message'=>$banner->getError($attribute)]);
        }
        return $this->renderJSON(['data'=>false,'message'=>'Некорректні дані!']);
    }

    public function actionSetTitle(){
        $bannerId = Yii::app()->request->getPost('id');
        $banner = $this->loadModel((int)$bannerId);
        if($banner){
            $attribute = Yii::app()->request->getPost('attribute');
            $value = Yii::app()->request->getPost('value');
            $banner->$attribute = $value;
            return $this->renderJSON(['data'=>$banner->save(),'message'=>$banner->getError($attribute)]);
        }
        return $this->renderJSON(['data'=>false,'message'=>'Некорректні дані!']);
    }

    public function actionDeleteBanner(){
        $bannerId = Yii::app()->request->getPost('id');
        $banner = $this->loadModel((int)$bannerId);
        if ($banner){
            $result =  $banner->delete();
        }
        return $this->renderJSON(['data'=>$result]);
    }

    public function actionChangeBannerPosition(){
        $bannerId = Yii::app()->request->getPost('id');
        $position = Yii::app()->request->getPost('position');
        $banner = $this->loadModel((int)$bannerId);
        if ($banner){
            $result =  $banner->changePosition($position);
        }
        return $this->renderJSON(['data'=>$result]);
    }

    protected function loadModel($id){
        return BannersForGraduates::model()->findByPk((int)$id);
    }
}