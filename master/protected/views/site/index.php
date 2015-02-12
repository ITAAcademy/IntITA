<?php
/* @var $this SiteController */
/* @var model AboutUs */

$this->pageTitle=Yii::app()->name;
?>

<div class="slider-box">
  <div class="slider">
    
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/1.jpg"/>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/2.jpg"/>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/3.jpg"/>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/4.jpg"/>

  </div>
</div>
<?php
$model = new AboutUs(Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image1.png','Про що мрієш ти?','Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль?
                        Закордонні подорожі, можливо, до екзотичних країн?','https://www.google.com.ua/');
$headerText = 'Про нас';
$subheaderText = 'дещо, що Вам потрібно знати про наші курси';
$subLineImage= Yii::app()->request->baseUrl.'/css/images/line1.png';
$linkName="детальніше »";
$objAbout1=new AboutUS(Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image1.png','Про що мрієш ти?','Спробуємо вгадати: власна квартира чи навіть будинок? Гарний автомобіль?
                        Закордонні подорожі, можливо, до екзотичних країн?','https://www.google.com.ua/');
$objAbout2=new AboutUs (Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image2.png','Що очікується від тебе','Програмування – Програмування – це не так складно, як ти можеш уявляти.
                        Безумовно, щоб стати хорошим програмістом, потрібен час та зусилля.','https://www.google.com.ua/');
$objAbout3=new AboutUs(Yii::app()->request->baseUrl.'/css/images/line2.png',Yii::app()->request->baseUrl.'/css/images/image3.png','Три кити Академії  Програмування ІНТІТА','Самостійний графік навчання.
                        Лише 100% необхідні знання. Засвоєння 100% знаннь!','https://www.google.com.ua/');
$massAbout=array($objAbout1,$objAbout2,$objAbout3);
?>

<div class="mainAbout">
    <div class="header">

        <?php echo $headerText; ?>

        <p>
            <?php echo $subheaderText; ?>
        </p>
    </div>

    <div class="line1">
        <img src="<?php echo $subLineImage;?>">
    </div>

    <?php
    foreach ($massAbout as $val)

    {?>
        <div class="block">
            <ul>
                <li>
                    <div class="line2">
                        <img src="<?php echo $val->line2Image;?>">
                    </div>
                    <div class="icon">
                        <img src="<?php echo $val->iconImage;?>">
                    </div>
                    <div class="title">
                        <?php echo $val->titleText; ?>
                        <p>
                            <?php echo $val->textAbout; ?>
                        </p>
                    </div>
                        <a href="<?php echo $val->linkAdress ?>">
                        <?php echo $linkName; ?>
                        </a>
                </li>
            </ul>
        </div>

    <?php

    }
    ?>

</div>
<! Ініціалізація екземплярів класу>
<?php

$stepHeader = 'Як проводиться навчання?';
$stepSubheader = 'далі пояснення як ви будете вчитися крок за кроком';
$stepSize='540px';
$stepsContainerSize='960px';

$step1=new Step(Yii::app()->request->baseUrl.'/css/images/step1.jpg','Реєстрація на сайті','Щоб Ви отримали доступ до переліку курсів та пройти пробні безкоштовні модулі і заняття зареєструйтесь на сайті.','1','крок');
$step2=new Step(Yii::app()->request->baseUrl.'/css/images/step2.jpg','Вибір курсу чи модуля','Щоб стати спеціалістом певного напрямку та рівня виберіть для проходження відповідний курс. Якщо Вас цікавить виключно поглиблення знань в певному напрямку IT, то виберіть відповідний модуль.','2','крок');
$step3=new Step(Yii::app()->request->baseUrl.'/css/images/step3.jpg','Проплата','Щоб розпочати проходження курсу чи модуля виберіть зручну схему оплати (схему оплати курсу чи модуля можна змінювати, також можлива помісячна оплата в кредит) та здійсніть оплату зручним Вам способом.','3','крок');
$step4=new Step(Yii::app()->request->baseUrl.'/css/images/step4.jpg','Освоєння матеріалу','Вивчення матеріалу можливе шляхом читання тексту чи/і перегляду відео, які підготовлені для кожного заняття. Для цього на сторінці заняття виберіть спосіб, який Вам зручніший чи використовуйте обидва. Протягом освоєння матеріалу заняття виконуйте Проміжні тестові завдання. По завершенню кожного заняття виконуйте Підсумкове тестове завдання. Кожен модуль завершується Індивідуальним проектом чи Екзаменом, який приймають викладачі. Можна замовити індивідуальну консультацію викладача по темам та завданням чи обговорювати питання на тематичному форумі чи форумі групи.','4','крок');
$step5=new Step(Yii::app()->request->baseUrl.'/css/images/step5.jpg','Завершення курсу','Підсумком курсу є Командний дипломний проект, який виконується разом із іншими студентами (склад команди формуєте самостійно чи рекомендує керівник, який затверджує тему і технічне завдання та асистенти проекту). Здача проекту передбачає передзахист та захист в он-лайн режимі із представленням технічної документації. Після захисту видається диплом та рекомендація для працевлаштування.','5','крок');

$stepsArray=array($step1,$step2,$step3,$step4,$step5);
?>



<! Верстка за допомогою масиву з екземплярами класу>

<div class="steps" style="width:<?php echo $stepsContainerSize; ?>" >

    <div class="stepHeader">
        <h3><?php echo $stepHeader; ?></h3>
        <h5><?php echo $stepSubheader; ?></h5>
    </div>

    <?php
    foreach ($stepsArray as $stepValue)
    {
        if ($stepValue->stepNumber % 2 <> 0)
        {
            ?>
            <div class="stepLeft" 	style="width:<?php echo $stepSize; ?>" >
                <div class="stepUrl">
                    <img src="<?php echo $stepValue->stepImage; ?>">
                </div>
                <div class="line">
                </div>

                <img class="hexagon" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/hexagon.png">
                <div class="stepArticle">
                    <p class="stepNumber"><?php echo $stepValue->stepNumber; ?></p>
                    <p class="stepName"><?php echo $stepValue->stepName; ?></p>
                </div>
                <div class="stepInfo" style="min-height:<?php echo $stepSize*0.23 . 'px';?> ">
                    <h4><?php echo $stepValue->stepTitle; ?></h4>
                    <p><?php echo $stepValue->stepText; ?></p>
                </div>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="stepRight" style="width:<?php echo $stepSize; ?>" >
                <div class="stepUrl">
                    <img src="<?php echo $stepValue->stepImage; ?>">
                </div>
                <div class="line">
                </div>
                <img class="hexagon" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/hexagon.png">
                <div class="stepArticle">
                    <p class="stepNumber"><?php echo $stepValue->stepNumber; ?></p>
                    <p class="stepName"><?php echo $stepValue->stepName; ?></p>
                </div>
                <div class="stepInfo" style="min-height:<?php echo $stepSize*0.23 . 'px';?> ">
                    <h4><?php echo $stepValue->stepTitle; ?></h4>
                    <p><?php echo $stepValue->stepText; ?></p>
                </div>
            </div>
        <?php
        }
    }
    ?>
</div>

