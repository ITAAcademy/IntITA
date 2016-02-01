<?php
/**
 * @var $deletedMessages array
 * @var $userMessage UserMessages
 * @var $user StudentReg
 */
?>
<div class="dataTable_wrapper" style="margin-top: 5px">
    <table class="table table-striped table-bordered table-hover" id="deletedMessages">
        <thead>
        <tr>
            <td style="width: 5%"><input type="checkbox" name="all" onclick="checkAll();"></td>
            <td style="width: 25%"><em>Від кого</em></td>
            <td style="width: 55%"><em>Тема</em></td>
            <td style="width: 15%"><em>Дата</em></td>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach($deletedMessages as $userMessage){
                ?>
                <tr class="odd gradeX"  style="cursor:pointer">
                    <td class="center">
                        <input type="checkbox" id="<?=$userMessage->id_message;?>">
                    </td>
                    <td onclick="load('<?= Yii::app()->createUrl("/_teacher/messages/dialog", array(
                        'user1' => 38, 'user2' => $user->id)) ?>')">
                        <?=$userMessage->message0->sender0->userName().", ".$userMessage->message0->sender0->email; ?>
                    </td>
                    <td onclick="load('<?= Yii::app()->createUrl("/_teacher/messages/dialog", array(
                        'user1' => 38, 'user2' => $user->id)) ?>')">
                        <em><?=$userMessage->subject; ?></em>
                    </td>
                    <td class="center"><?=CommonHelper::formatMessageDate($userMessage->message0->create_date); ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
