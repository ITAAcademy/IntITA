<div class="forum">
    <div id="discussionHeader" ><?php echo Yii::t('lecture', '0617'); ?></div>
    <div id="discussion"></div>
</div>

<?php //if(1){ ?>
<?php if($lecture->module->checkPaidAccess(Yii::app()->user->getId())){ ?>
    <div class="consultations">
    </div>
<?php } ?>
<!--navigation vertical-->
<script>
    $("#send-message").click(function (e) {
        var mibewMessage = $('[name="message"]');
        mibewMessage.val($.trim(mibewMessage.val()));
    });
</script>
