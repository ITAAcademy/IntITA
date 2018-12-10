<?php


class RequestController extends TeacherCabinetController
{
    public function hasRole()
    {
        return Yii::app()->user->model->isAdmin() || Yii::app()->user->model->isContentManager();
    }

    public function actionIndex()
    {
        $this->renderPartial('index', array(), false, true);
    }

    public function actionRequest($message)
    {
        $requestModel = Request::model()->find('id=:requestId AND organization=:organization',
            ['requestId' => $message, 'organization' => Yii::app()->user->model->getCurrentOrganization()->id]);

        $model = RequestFactory::getInstance($requestModel);
        if ($model) {
            $this->renderPartial('request', array(
                'model' => $model
            ), false, true);
        } else {
            throw new \application\components\Exceptions\IntItaException(400);
        }
    }

    public function actionGetActiveRequestsList()
    {
        $adapter = new NgTableRequestsAdapter(NgTableRequestsAdapter::NEWREQUESTS);
        echo $adapter->getData();
    }

    public function actionGetApprovedRequestsList()
    {
        $adapter = new NgTableRequestsAdapter(NgTableRequestsAdapter::APPROWEDREQUESTS);
        echo $adapter->getData();
    }

    public function actionGetDeletedRequestsList()
    {
        $adapter = new NgTableRequestsAdapter(NgTableRequestsAdapter::DELETEDREQUESTS);
        echo $adapter->getData();
        //echo RequestsList::listAllDeletedRequests();
    }

    public function actionGetRejectedRevisionRequestsList()
    {
        $adapter = new NgTableRequestsAdapter(NgTableRequestsAdapter::REJECTEDEQUESTS);
        echo $adapter->getData();
        //echo RequestsList::listAllRejectedRevisionRequests();
    }

    public function actionApprove()
    {
        $message = Yii::app()->request->getPost('message');
        $user = Yii::app()->request->getPost('user');

        $messageModel = Request::model()->findByPk($message);
        $model = RequestFactory::getInstance($messageModel);
        $userModel = StudentReg::model()->findByPk($user);

        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            if ($model && $userModel) {
                if (!$model->isApproved()) {
                    $model->approve($userModel);
                } else {
                    throw new Exception('Запит вже підтверджено. Ви не можете підтвердити запит двічі.');
                }
            } else {
                throw new Exception('Операцію не вдалося виконати.');
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionCancel()
    {
        $message = Yii::app()->request->getPost('message');
        $user = Yii::app()->request->getPost('user');

        $messageModel = Request::model()->findByPk($message);
        $model = RequestFactory::getInstance($messageModel);

        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            if ($model) {
                if (!$model->isDeleted()) {
                    $model->setDeleted($user);
                } else {
                    throw new Exception('Запит вже скасований.');
                }
            } else {
                throw new Exception('Операцію не вдалося виконати.');
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionReject()
    {
        $message = Yii::app()->request->getPost('message');
        $user = Yii::app()->request->getPost('user');
        $comment = Yii::app()->request->getPost('comment');

        $messageModel = Request::model()->findByPk($message);
        $model = RequestFactory::getInstance($messageModel);
        $userModel = StudentReg::model()->findByPk($user);

        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            if ($model && $userModel) {
                if (!$model->isRejected()) {
                    $model->reject($comment);
                } else {
                    throw new Exception('Запит вже відхилений. Ви не можете відхилити запит двічі.');
                }
            } else {
                throw new Exception('Операцію не вдалося виконати.');
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }

        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }

    public function actionDelete()
    {
        $message = Yii::app()->request->getPost('message');
        $user = Yii::app()->request->getPost('user');

        $messageModel = Request::model()->findByPk($message);
        $model = RequestFactory::getInstance($messageModel);
        $userModel = StudentReg::model()->findByPk($user);

        $result = ['message' => 'OK'];
        $statusCode = 201;
        try {
            if ($model && $userModel) {
                if (!$model->isDeleted()) {
                    $model->delete();
                } else {
                    throw new Exception('Запит вже видалений. Ви не можете видалити запит двічі.');
                }
            } else {
                throw new Exception('Операцію не вдалося виконати.');
            }
        } catch (Exception $error) {
            $statusCode = 500;
            $result = ['message' => 'error', 'reason' => $error->getMessage()];
        }
        $this->renderPartial('//ajax/json', ['statusCode' => $statusCode, 'body' => json_encode($result)]);
    }
}