<?php
/**
 * @var $message UserMessages
 * @var $dialog Dialog
 * @var $forwarded UserMessages
 */
$url = Yii::app()->createUrl('/_teacher/messages/form');
?>

<div class="col-lg-12 message">
    <a href="javascript:void(0)" onclick="window.open('/profile/<?=$dialog[0]->sender?>')">
    <h3><?= $dialog[0]->userSender->userNameWithEmail(); ?></h3>
        </a>
    <div class="panel-group" id="accordion">
        <?php foreach ($dialog as $key => $message) {
            if (!$message->sender_delete_date && !$message->receiver_delete_date) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="" data-toggle="collapse" ng-click="collapse('#collapse<?= $message->id; ?>')" id="messageBlock">
                                <img src="<?= $message->userSender->avatarPath(); ?>" id="avatar"
                                     style="height:24px"/>
                                <strong>
                                    <?= $message->userSender->userName() . ", " . $message->userSender->email; ?>
                                </strong>
                            <div>
                                <em>
                                    <?= CHtml::encode($message->subject); ?>
                                </em>
                            </div>
                        </a>
                        <div class="dialog">
                            <em><?= CommonHelper::formatMessageDate($message->create_date); ?></em>
                            <?php if ($message->type == Messages::USER_MESSAGE) { ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="dropdown">
                                        Відповісти
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href=""
                                               ng-click="loadForm('<?= $url; ?>', '<?= $message->sender; ?>',
                                                   'Reply', '<?= $message->id ?>',
                                                   '<?=addslashes($message->subject)?>')">
                                                Відповісти</a>
                                        </li>
                                        <li><a href=""
                                               ng-click="loadForm('<?= $url; ?>', '<?= $message->sender; ?>',
                                                   'Forward', '<?= $message->id ?>',
                                                   '<?=addslashes($message->subject)?>')">
                                                Переслати</a>
                                        </li>
                                        <?php if ($message->sender != $message->receiver) { ?>
                                            <li>
                                                <a href="" ng-click="deleteMessage('<?= $message->id; ?>',
                                            '<?=Yii::app()->createUrl("/_teacher/messages/delete");?>','<?=$message->id;?>')">
                                                    Видалити це повідомлення
                                                </a>
                                            </li>
                                        <?php } ?>
                                        <!--                                    <li class="divider"></li>-->
                                        <!--                                    <li><a href="#" data-toggle="modal" data-target="#deleteDialog">Видалити діалог</a>-->
                                        <!--                                    </li>-->
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="collapse<?= $message->id ?>"
                         class="panel-collapse collapse <?php if ($key == 0) echo 'in'; ?>">
                        <div class="panel-body">
                            <p>
                                <?php
                                if($message->type == Messages::USER_MESSAGE){
                                    echo preg_replace_callback('~'.Config::getBaseUrl().'/(module|)(r|R)evision/preview(Lecture|Module|Course)Revision/\?idRevision=\d+~',function ($matches){
                                        return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
                                    },CHtml::encode($message->message_text));
                                } else {
                                    echo $message->message_text;
                                }
                                ?>
                                <br>
                            </p>
                            <div id="form<?= $message->id; ?>"></div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>


