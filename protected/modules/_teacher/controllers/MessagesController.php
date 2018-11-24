<?php

class MessagesController extends TeacherCabinetController
{
    public function hasRole(){
        return !Yii::app()->user->isGuest;
    }

    public function actionGetUserSentMessages(){
        $criteria = new CDbCriteria();
        $params =$_GET;
        if (isset($params['filter']['name']))
        {
            $criteria->addSearchCondition('userReceiver.email',urldecode($params['filter']['name']),true,'AND');
            $criteria->addSearchCondition('userReceiver.firstName',urldecode($params['filter']['name']),true,'OR');
            $criteria->addSearchCondition('userReceiver.secondName',urldecode($params['filter']['name']),true,'OR');
            unset($params['filter']['name']);
        }
        $criteria->compare('sender',Yii::app()->user->getId(),false,'AND');
        $criteria->with = ['userReceiver'];
        $adapter = new NgTableAdapter('Messages',$params);
        $adapter->mergeCriteriaWith($criteria);
        echo  json_encode($adapter->getData());
    }

    public function actionGetUserReceiverMessages(){
        $params = $_GET;
        $criteria = new CDbCriteria();

        if (isset($params['filter']['name']))
        {
            $criteria->addSearchCondition('userSender.email',urldecode($params['filter']['name']),true,'AND');
            $criteria->addSearchCondition('userSender.firstName',urldecode($params['filter']['name']),true,'OR');
            $criteria->addSearchCondition('userSender.secondName',urldecode($params['filter']['name']),true,'OR');
            unset($params['filter']['name']);
        }
        if (isset($params['filter']['subject']))
        {
            $criteria->addSearchCondition('subject',urldecode($params['filter']['subject']),true,'AND');
            unset($params['filter']['subject']);
        }
        $criteria->compare('receiver',Yii::app()->user->getId(),false,'AND');
        $criteria->addCondition('receiver_delete_date IS NULL');
        $criteria->with = ['userSender'];
        $adapter = new NgTableAdapter('Messages',$params);
        $adapter->mergeCriteriaWith($criteria);
        echo  json_encode($adapter->getData());
    }

    public function actionGetUserDeletedMessages(){
        $params =$_GET;
        $criteria = new CDbCriteria();
        if (isset($params['filter']['name']))
        {
            $criteria->addSearchCondition('userSender.email',urldecode($params['filter']['name']),true,'AND');
            $criteria->addSearchCondition('userSender.firstName',urldecode($params['filter']['name']),true,'OR');
            $criteria->addSearchCondition('userSender.secondName',urldecode($params['filter']['name']),true,'OR');
            unset($params['filter']['name']);
        }
        if (isset($params['filter']['subject']))
        {
            $criteria->addSearchCondition('subject',urldecode($params['filter']['subject']),true,'AND');
            unset($params['filter']['subject']);
        }
        $criteria->addCondition('(receiver = :user AND receiver_delete_date IS NOT NULL ) 
                                           OR (sender = :user AND sender_delete_date IS NOT NULL)');        $criteria->with = ['userSender'];
        $criteria->params = ['user' => Yii::app()->user->getId()];

        $adapter = new NgTableAdapter('Messages',$params);
        $adapter->mergeCriteriaWith($criteria);
        echo  json_encode($adapter->getData());
    }

    public function actionIndex()
    {

       $this->renderPartial('indexNg');

    }

    public function actionWrite($id, $receiver = 0)
    {
        if($receiver != 0) {
            $scenario = 'mailTo';
            $receiverModel = StudentReg::model()->findByPk($receiver);
        } else {
            $scenario = '';
            $receiverModel = null;
        }

        $this->renderPartial('_newMessage', array(
            'user' => $id,
            'receiver' => $receiverModel,
            'scenario' => $scenario,
        ), false, true);
    }

    public function actionDialog($messageId)
    {
        $message = Messages::model()->with(['userSender','userReceiver'])->find((int)$messageId);
        if($message){
         $dialog = $message->buildDialog();
         $this->renderPartial('_dialogTree', array(
             'dialog' => $dialog,
         ), false, true);
        }

    }

    public function actionForm()
    {
        $jsonObj = json_decode($_POST["form"]);

        $this->renderPartial('_form' . $jsonObj->scenario, array(
            'user' => $jsonObj->user,
            'receiver' => $jsonObj->receiver,
            'message' => $jsonObj->message,
            'subject' => $jsonObj->subject
        ));
    }

    public function actionDelete()
    {
        $jsonObj = json_decode($_POST['data']);
        if (isset($jsonObj->messages)) {
            foreach ($jsonObj->messages as $item) {
                    $message = Messages::model()->findByPk($item);
                    $message->delete();

            }
            echo 'success';
        }
        else {
            $message = Messages::model()->findByPk($jsonObj->message);
            if ($message->delete())
                echo 'success';
            else
                echo 'error';
        }
    }

    public function actionDeleteDialog()
    {
        $jsonObj = json_decode($_POST['data']);

        $partner1 = StudentReg::model()->findByPk($jsonObj->partner1);
        $partner2 = StudentReg::model()->findByPk($jsonObj->partner2);
        $dialog = new Dialog($partner1, $partner2);
        $dialog->deleteDialog();
    }

    public function actionSendUserMessage()
    {
        $subject = Yii::app()->request->getPost('subject', '');
        $text = Yii::app()->request->getPost('text', '');
        $receiver = Yii::app()->request->getPost('receiver', '0');
        $message = new Messages();
        if($message->sendMessage($receiver,$subject,$text)){
         $message->notify('_newMessage',[$message->userSender]);
         echo "success";
         Yii::app()->end();
        }
        throw new \application\components\Exceptions\IntItaException(500, "Повідомлення не вдалося надіслати.");

    }

    public function actionUsersByQuery($query, $id)
    {
        if ($query) {
            $users = StudentReg::allUsers($query, $id);
            echo $users;
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionMessage($id)
    {
        $message =Messages::model()->with(['userSender'])->findByPk($id);
        $deleted = $message->isDeleted();

        if (!$message->isRead())
            $message->read();

        $this->renderPartial('_viewMessage', array(
            'message' => $message, 'deleted'=>$deleted
        ), false, true);
    }

    public function actionReply()
    {

     $subject = Yii::app()->request->getPost('subject', '');
     $text = Yii::app()->request->getPost('text', '');
     $receiver = Yii::app()->request->getPost('receiver', '0');
     $parentId = Yii::app()->request->getPost('parent', 0);
     $message = new Messages();
     if($message->sendMessage($receiver,$subject,$text,$parentId)){
      echo "success";
      Yii::app()->end();
     }
     throw new \application\components\Exceptions\IntItaException(500, "Повідомлення не вдалося надіслати.");

    }

    public function actionForward()
    {
        $parentId = Yii::app()->request->getPost('parent', 0);
        $forwardToId = Yii::app()->request->getPost('forwardToId', 0);
        $subject = Yii::app()->request->getPost('subject', '');
        $text = Yii::app()->request->getPost('text', '');
        $message = new Messages();
        if($message->sendMessage($forwardToId,$subject,$text,$parentId)){
          echo "success";
          Yii::app()->end();
        }
        throw new \application\components\Exceptions\IntItaException(500, "Повідомлення не вдалося надіслати.");

    }
}