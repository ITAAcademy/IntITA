<?php
/* @var $model Invoice */
?>

<script>
    summa = "<?php echo $model->summa;?>";
    user = "<?php echo $model->user_created;?>";
</script>
<div id="account">
    <div id="accountTable">
        <br>
        <b>Отримувач коштів:</b> <?php echo $model->corporateEntity->title ?><br>
        <b>Банк: </b> <?php echo $model->checkingAccount->bank_name ?><br>
        <b>МФО: </b> <?php echo $model->checkingAccount->bank_code ?><br>
        <b>р/р: </b> <?php echo $model->checkingAccount->checking_account ?><br>
        <b>код ЄДРПОУ: </b> <?php echo $model->corporateEntity->EDPNOU ?>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-2">
                “<?php echo date("d"); ?>” <span id="month"><?php
                    if (isset($_GET['month'])) {
                        echo $_GET['month'];
                    } else {
                        echo date("F");
                    } ?></span> <?php echo " ".date("Y"); ?> р.
            </div>
            <div class="col-sm-5 text-center">
                <span id="accountTitle">РАХУНОК № <?php echo $model->number; ?></span>
                <br>
                <span>від <?=date("d.m.y", strtotime($model->payment_date));?> по договору №<?=$model->getAgreementNumber()?>
                    від <?=date("d.m.y", strtotime($model->agreement->create_date));?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"><b>Платник:</b></div>
        </div>
        <br>
    </div>
    <div class="table-responsive col-md-9" style="padding:0;">
        <table id="accountTable" class="table">
            <tr>
                <td class="info">№ п/п</td>
                <td class="info">Назва продукції (послуг)</td>
                <td class="info">Сума,
                    грн
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td style="text-align: left"><?php echo $model->corporateEntity->kved; ?> (<?php echo CHtml::encode(Invoice::getProductTitle($model)); ?>, <?php echo AbstractIntITAService::getServiceById($model->agreement->service->service_id)->getEducationForm()->title_ua; ?>)
                </td>
                <td><span id="summa"><?php echo number_format($model->summa, 2, ",","&nbsp;"); ?></span>
                </td>
            </tr>
            <tr style="border: none;">
                <td colspan="2" style="border: none;text-align: left">
                    Всього до сплати (прописом):
                    <br>
                    <b><span id="summaLetters"></span></b>
                </td>
                <td><?php echo number_format($model->summa, 2, ",", "&nbsp;"); ?></td>
            </tr>
        </table>
        <span>Рахунок дійсний протягом <?=Config::getExpirationTimeInterval();?> днів до <?=date("d.m.y", strtotime($model->expiration_date));?></span>
    </div>
</div>


