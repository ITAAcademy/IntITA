<?php
/* @var $message UserMessages*/
$url = Yii::app()->createUrl('/_teacher/messages/form');
?>
<div class="panel panel-default" ng-controller="messagesCtrl" xmlns="http://www.w3.org/1999/html">
    <div class="panel-heading">
        <a href="javascript:void(0)" onclick="window.open('/profile/<?=$message->userSender->id?>')">
        <img src="<?= $message->userSender->avatarPath(); ?>" id="avatar"
             style="height:24px"/>
        <strong><?= $message->userSender->userName(); ?></strong> </a>
        <a data-toggle="collapse" href="javascript:void(0)" ng-click="collapse('#collapse<?= $message->id; ?>')" id="messageBlock">
            <em><?= CHtml::encode($message->subject()); ?></em>
        </a>
        <div class="pull-right">
            <em><?= CommonHelper::formatMessageDate($message->create_date);?></em>
            <?php if (!$deleted) { ?>
            <div class="btn-group" ng-show="isDeleted()">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                        data-toggle="dropdown">
                    Дії
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href=""
                           ng-click="changeView('dialog/<?= $message->id;?>')">
                            Показати діалог</a>
                    </li>
                    <?php if ($message->type == Messages::USER_MESSAGE) {?>
                    <li><a href=""
                           ng-click="loadForm('<?= $url; ?>', '<?= $message->userSender->id; ?>',
                                                   'Reply', '<?= $message->id ?>',
                                                   '<?=addslashes($message->subject())?>')">
                            Відповісти</a>
                    </li>
                    <li><a href=""
                           ng-click="loadForm('<?= $url; ?>', '<?= $message->userSender->id; ?>',
                                                   'Forward', '<?= $message->id ?>',
                                                   '<?=addslashes($message->subject())?>')">
                            Переслати</a>
                    </li>
                    <?php }?>
                    <?php 
                        //$receiver = Yii::app()->db->createCommand()->select("id_receiver")->from("message_receiver")->where("id_message=:id_message",array(":id_message"=>$message->id_message))->queryAll();
                    ?>
                    <li>
                        <a href="" ng-click="deleteMessage('<?= $message->id; ?>',
                                        '<?=Yii::app()->createUrl("/_teacher/messages/delete");?>','<?= $message->id; ?>')">
                            Видалити це повідомлення
                        </a>
                    </li>
                    <!--                                    <li class="divider"></li>-->
                    <!--                                    <li><a href="#" data-toggle="modal" data-target="#deleteDialog">Видалити діалог</a>-->
                    <!--                                    </li>-->
                </ul>
            </div>

            <?php }?>
        </div>

    </div>
    <div id="collapse<?= $message->id ?>" class="panel-collapse collapse in">
        <div class="panel-body">
            <p>
                <?php if ($message->type == Messages::USER_MESSAGE) {?>
                <?=preg_replace_callback('~'.Config::getBaseUrl().'/(module|)(r|R)evision/preview(Lecture|Module|Course)Revision/\?idRevision=\d+~',function ($matches){
                        return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
                    },CHtml::encode($message->message_text));?>
                <?php }else {?>
                    <?=$message->message_text;?>
                <?php }?>
                <br>
<!--                --><?php
//                $forwarded = $message->;
//                if(!is_null($forwarded)){
//                    $this->renderPartial('_forwardedMessage', array(
//                        'message' => $message,
//                        'forwarded' => $forwarded));
//                }?>
            </p>
            <div id="form<?= $message->id; ?>"></div>
        </div>
    </div>
</div>