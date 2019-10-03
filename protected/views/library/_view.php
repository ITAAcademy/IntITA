<?php
/* @var $this LibraryController */
/* @var $data Library */
?>
<?php
$param = Yii::app()->session["lg"] ? "title_" . Yii::app()->session["lg"] : "title_ua";
?>
<div class="view">
    <div>
        <img class="logoBook"
             src="<?php echo $data->logo ? '/files/library/' . $data->id . '/logo/' . $data->logo : StaticFilesHelper::fullPathTo('css', 'images/books.png') ?>">
    </div>
    <div class="bookColumn">
        <br/>
        <span class="titleBook"><?php echo CHtml::encode($data->title); ?></span>
        <br/>
        <?php echo Yii::t('library', '0991'); ?>&#58;
        <?php echo CHtml::encode($data->description); ?>
        <?php if ($data->paper_price) { ?>
            <br/>
            <?php echo Yii::t('library', '0992'); ?>&#58;
            <b><?php echo CHtml::encode($data->paper_price); ?><?php echo Yii::t('profile', '0259'); ?>&#46;</b>
        <?php } ?>
        <br/>
        <?php echo Yii::t('library', '0993'); ?>&#58;
        <b><?php echo CHtml::encode($data->price); ?><?php echo Yii::t('profile', '0259'); ?>&#46;</b>
        <br/>
        <?php echo Yii::t('lecture', '0775'); ?>&#58;
        <?php echo CHtml::encode($data->author); ?>
        <br/>
        <?php echo Yii::t('course', '0400'); ?>&#58;
        <?php echo CHtml::encode($data->language); ?>
        <br/>
        <?php echo Yii::t('library', '0994'); ?>&#58;
        <?php foreach ($data->libraryDependsBookCategories as $category) { ?>
            <span class="label label-info" style="margin-right: 2px">
            <?php echo $category->idCategory->$param; ?>
        </span>
        <?php } ?>
        <br/>
        <?php if ($data->demo_link) { ?>
            <?php echo Yii::t('library', '0995'); ?>&#58;
            <a href="" ng-click="getDocument('<?php echo $data->id ?>')"><?php echo Yii::t('library', '0996'); ?></a>
        <?php } ?>
        <div>
            <a data-toggle="collapse" href="#collapse<?php echo $data->id ?>">Реквізити для оплати:</a>
            <div id="collapse<?php echo $data->id ?>" class="collapse">
                <p>Здійсніть оплату по реквізитах наданих нижче. Після чого з Вами зв'яжуться або нададуть доступ в автоматичному режимі:</p>
                ФОП 23445345353
            </div>
        </div>
        <?php
        if (Yii::app()->user->isGuest) {
            echo "<em>".Yii::t('library', '0997')."</em>";
        } else {
            echo $data->getPaymentButton();
        }
        ?>
    </div>
</div>
