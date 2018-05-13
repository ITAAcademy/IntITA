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
            <img class="logoBook" src="<?php echo CHtml::encode($data->logo); ?>">
            <div class="starLevelIndex libraryStar">
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'starFull.png'); ?>"/>
                <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'star-half.png'); ?>"/>
            </div>
        </div>
        <br/>
        <a class="titleBook"
           href="<?php echo CHtml::encode($data->link); ?>"><?php echo CHtml::encode($data->title); ?></a>
        <br/>
        Опис:
        <?php echo CHtml::encode($data->description); ?>
        <br/>
        Ціна:
        <b><?php echo CHtml::encode($data->price); ?>$</b>
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
        <section class="widget form-widget" id="coffee_block">
            <h3>Купить мне кофе</h3>
            <form class="form-callback" id="coffee_forms" method="POST"  action="/IntITA/library/buy_coffee_form" accept-charset="utf-8">
                <div class="form-group">
                    <input class="input-field" type="text" name="coffee_email" id="coffee_email" placeholder="Введите ваш email">
                </div>
                <div class="form-group child">
                    <input class="input-field" type="text" name="coffee_sum" id="coffee_sum" placeholder="25 грн.">
                </div>
                <button class="btn-detail open_popup_coffee">УГОСТИТЬ</button>
            </form>
        </section>
    </div>
<?php } ?>

<script>
    $('.open_popup_co1ffee').on('click', function () {
//order - массив данных из формы: №заказа, услуга/продукт, ФИО и т.д.
//         ajaxData = {
//             action: 'addOrder',
//             data: JSON.stringify(1)
//         };
        $.ajax({
            url: '/IntITA/library/buy_coffee_form',
            success: function (msg) {
                // декодируем нашу форму из JSON
                // var conv = JSON.parse(msg);
                // if (parseInt(conv.status) > 0) {
                //     // и добавим ее в заранее подготовленный контейнер
                //     $('#lpay_form').empty().html(conv.form);
                //     $('#lpay_form form').submit();
                //     // пошлем юзера на LiqPay для оплаты
                // }
            }
        });

    });
</script>
