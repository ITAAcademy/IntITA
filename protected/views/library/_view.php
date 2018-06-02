<?php
/* @var $this LibraryController */
/* @var $data Library */
?>
<?php
$category = "";
for ($i = 0; $i < count($data->libraryDependsBookCategories); $i++) {

    $category .= $data->libraryDependsBookCategories[$i]->idCategory->title_ua . ", ";
}
if (CHtml::encode($data->status) == Library::ACTIVE) {
    ?>
    <div class="view">
        <div class="logoBookWrap">
            <img class="logoBook" src="/files/library/<?php echo $data->id ?>/logo/<?php echo $data->logo ?>">
            <div class="starLevelIndex libraryStar">
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'star-half.png'); ?>"/>
            </div>
        </div>
        <br/>
        <span class="titleBook"><?php echo CHtml::encode($data->title); ?></span>
        <br/>
        Опис:
        <?php echo CHtml::encode($data->description); ?>
        <br/>
        Ціна:
        <b><?php echo CHtml::encode($data->price); ?>грн.</b>
        <br/>
        Автор:
        <?php echo CHtml::encode($data->author); ?>
        <br/>
        Мова:
        <?php echo CHtml::encode($data->language); ?>
        <br/>
        Категорія:
        <?php
        echo mb_substr($category, 0, -2, 'UTF-8');
        ?>
        <br/>
        <?php
            if (Yii::app()->user->isGuest){
                echo '<em>Для купівлі авторизуйся</em>';
            }else{
                echo $data->getPaymentButton();
            }
        ?>
    </div>
<?php } ?>
