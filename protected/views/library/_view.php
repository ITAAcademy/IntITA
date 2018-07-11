<?php
/* @var $this VacationController */
/* @var $data Library */
?>
<?php
$param = Yii::app()->session["lg"] ? "title_" . Yii::app()->session["lg"] : "title_ua";
?>
<div class="view" ng-controller="libraryCtrl">
    <div class="bookColumn">
        <img class="logoBook"
             src="<?php echo $data->logo ? '/files/library/' . $data->id . '/logo/' . $data->logo : StaticFilesHelper::fullPathTo('css', 'images/books.png') ?>">
    </div>
    <div class="bookColumn">
        <br/>
        <span class="titleBook"><?php echo CHtml::encode($data->title); ?></span>
        <br/>
        Опис:
        <?php echo CHtml::encode($data->description); ?>
        <?php if ($data->paper_price) { ?>
            <br/>
            Ціна за паперовий примірник:
            <b><?php echo CHtml::encode($data->paper_price); ?>грн.</b>
        <?php } ?>
        <br/>
        Ціна за електронний примірник:
        <b><?php echo CHtml::encode($data->price); ?>грн.</b>
        <br/>
        Автор:
        <?php echo CHtml::encode($data->author); ?>
        <br/>
        Мова:
        <?php echo CHtml::encode($data->language); ?>
        <br/>
        Категорії:
        <?php foreach ($data->libraryDependsBookCategories as $category) { ?>
            <span class="label label-info" style="margin-right: 2px">
            <?php echo $category->idCategory->$param; ?>
        </span>
        <?php } ?>
        <br/>
        <?php if ($data->demo_link) { ?>
            Демо версія:
            <a href="" ng-click="getDocument('<?php echo $data->id ?>')">переглянути</a>
        <?php } ?>
        <br/>
        <?php
        if (Yii::app()->user->isGuest) {
            echo '<em>Для купівлі авторизуйся</em>';
        } else {
            echo $data->getPaymentButton();
        }
        ?>
    </div>
</div>
