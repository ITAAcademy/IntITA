<?php
/**
 * @var $message UserMessages
 * @var $dialog Dialog
 * @var $forwarded UserMessages
 */
$url = Yii::app()->createUrl('/_teacher/messages/form');
?>

<div class="col-lg-12 message">
    <h3><?= $dialog->header; ?></h3>

    <div class="panel-group" id="accordion">
        <?php foreach ($dialog->messages() as $key => $message) {
            if (!$message->isDeleted($dialog->partner2)) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse<?= $message->id_message; ?>" id="messageBlock">
                            <?php if ($message->type() != MessagesType::PAYMENT) { ?>
                                <img src="<?= $message->message0->sender0->avatarPath(); ?>" id="avatar"
                                     style="height:24px"/>
                                <strong>
                                    <?= $message->message0->sender0->userName() . ", " . $message->message0->sender0->email; ?>
                                </strong>
                            <?php } else {?>
<!--                                <img src="--><?//= StaticFilesHelper::createImagePath('mainpage', 'Logo_small.png') ?><!--" id="avatar"-->
<!--                                     style="height:24px"/>-->
                                <strong>
                                    INTITA, no-reply@<?=Config::getBaseUrlWithoutSchema();?>
                                </strong>
                            <?php }?>
                            <em>
                                <div><?= $message->subject(); ?></div>
                            </em>
                        </a>
                        <div class="dialog">
                            <em><?= CommonHelper::formatMessageDate($message->message0->create_date); ?></em>
                            <?php if ($message->type() != MessagesType::PAYMENT) { ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                            data-toggle="dropdown">
                                        Відповісти
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#"
                                               onclick="loadForm('<?= $url; ?>', '<?= $dialog->partner1->id; ?>',
                                                   'Reply', '<?= $message->id_message ?>')">
                                                Відповісти</a>
                                        </li>
                                        <li><a href="#"
                                               onclick="loadForm('<?= $url; ?>', '<?= $dialog->partner1->id; ?>',
                                                   'Forward', '<?= $message->id_message ?>')">
                                                Переслати</a>
                                        </li>
                                        <?php if ($message->message0->sender0->id != $dialog->partner2->id) { ?>
                                            <li><a href="#" data-toggle="modal" data-target="#deleteModal"
                                                   data-message-id="<?= $message->id_message; ?>">Видалити це
                                                    повідомлення</a>
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
                    <div id="collapse<?= $message->id_message ?>"
                         class="panel-collapse collapse <?php if ($key == 0) echo 'in'; ?>">
                        <div class="panel-body">
                            <p>
                                <?= $message->text(); ?>
                                <br>
                                <?php
                                $forwarded = $message->message0->forwarded();
                                if (!is_null($forwarded)) {
                                    $this->renderPartial('_forwardedMessage', array(
                                        'message' => $message,
                                        'forwarded' => $forwarded));
                                } ?>
                            </p>
                            <div id="form<?= $message->id_message; ?>"></div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>

<?php $this->renderPartial('_deleteModal', array('user' => $dialog->partner2->id)); ?>
<?php $this->renderPartial('_deleteModalDialog', array(
    'partner1' => $dialog->partner1->id,
    'partner2' => $dialog->partner2->id
)); ?>
<link href="<?php echo StaticFilesHelper::fullPathTo('css', '_teacher/messages.css'); ?>" rel="stylesheet">
<script src="<?php echo StaticFilesHelper::fullPathTo('js', 'messages/dialog.js'); ?>"></script>
