<?php
/* @var $library array
 */
?>
<?php
    $param = Yii::app()->session["lg"] ? "title_" . Yii::app()->session["lg"] : "title_ua";
?>
<div class="courseData" ng-controller="libraryCtrl">
    <?php foreach ($library as $data){ ?>
        <div class="bookColumn">
            <img class="logoBook" style="max-width: 100px" src="<?php echo $data->library->logo ? '/files/library/' . $data->library->id . '/logo/' . $data->library->logo : StaticFilesHelper::fullPathTo('css', 'images/books.png') ?>">
        </div>
        <div class="bookColumn">
            <br/>
            <span class="titleBook"><?php echo CHtml::encode($data->library->title); ?></span>
            <br/>
            Опис:
            <?php echo CHtml::encode($data->library->description); ?>
            <?php if ($data->library->paper_price) { ?>
                <br/>
                Ціна за паперовий примірник:
                <b><?php echo CHtml::encode($data->library->paper_price); ?>грн.</b>
            <?php } ?>
            <br/>
            Ціна за електронний примірник:
            <b><?php echo CHtml::encode($data->library->price); ?>грн.</b>
            <br/>
            Автор:
            <?php echo CHtml::encode($data->library->author); ?>
            <br/>
            Мова:
            <?php echo CHtml::encode($data->library->language); ?>
            <br/>
            Категорії:
            <?php foreach ($data->library->libraryDependsBookCategories as $category) { ?>
                <span class="label label-info" style="margin-right: 2px">
                <?php echo $category->idCategory->$param; ?>
            </span>
            <?php } ?>
            <br/>
            <a href="/library/getBook?id=<?php echo $data->library->id ?>">Завантажити</a>
        </div>
    <?php } ?>
</div>
