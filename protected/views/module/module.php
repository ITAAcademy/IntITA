<!-- Module style -->
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/module.css" />
<!-- Module style -->
<!-- BD -))) -->
<?php
$this->pageTitle = 'INTITA';
$post=Module::model()->findByPk(1);
?>
<!-- BD -))) -->
<?php
$this->breadcrumbs=array(
    Yii::t('breadcrumbs', '0050')=>Yii::app()->request->baseUrl."/courses",'Програмування для чайників'=>Yii::app()->request->baseUrl."/course",'Основи PHP',
);
?>
<?php
    $moduleName="<b>Мова програмування PhP</b>";
    $moduleNumber=33;
    $moduleDuration=313;
    $arrayNameLessons = array(
                        "Основи PHP",
                        "Семантичне ядро ​​сайту","Зовнішні ресурси в просуванні","Запити HTTP, URL параметри і форми HTML котрі допомога ють справному програмісту","Cookies Урок і сесії",
                        "Робота з файлами","Робота з базою даних","Основи PHP","Семантичне ядро ​​сайту",
                        "Зовнішні ресурси в просуванні","Запити HTTP, URL параметри і форми HTML","Запити HTTP, URL параметри і форми HTML котрі допомо- гають справному програмісту","Робота з файлами",
                        "Робота з базою даних","Робота з файлами","Робота з файлами", "Основи PHP",
        "Семантичне ядро ​​сайту","Зовнішні ресурси в просуванні","Запити HTTP, URL параметри і форми HTML котрі допомога ють справному програмісту","Cookies Урок і сесії",
        "Робота з файлами","Робота з базою даних","Основи PHP","Семантичне ядро ​​сайту",
        "Зовнішні ресурси в просуванні","Запити HTTP, URL параметри і форми HTML","Запити HTTP, URL параметри і форми HTML котрі допомо- гають справному програмісту","Робота з файлами",
        "Робота з базою даних","Робота з файлами","Робота з файлами", "Семантичне ядро ​​сайту","Зовнішні ресурси в просуванні",
    );
    $teacherLastName="Орест Остапович"; $teacherFirstName="Бендер";
    $teacherEmail="orest@intita.org, orest@gmail.com";
    $teacherEmail="orest@intita.org, orest@gmail.com";
    $teacherPhone1="/067/ 56-569-56"; $teacherPhone2="/093/ 123-45-67";
    $teacherSkype="orest.ostapovich";
?>

<div class="ModuleBlock">


    <div class="leftModule">
        <div class="headerLeftModule">
            <table>
                <tr>
                    <td>
                        <img class="moduleImg" src="<?php echo Yii::app()->request->baseUrl.$post->module_img ?>" />
                    </td>
                    <td style="padding-left: 15px;">
                        <span id="titleModule"><?php echo 'Модуль: '?></span>
                         <?php echo $moduleName;?>
                        <div>
                            <span
                                id="titleModule"><?php echo "Рівень модуля: " ?></span> <?php echo "сильний початківець" ?>
                            <span style="padding-left: 20px;">
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                                ?>
                                <img style="padding-bottom: 3px;"
                                     src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/ratIco1.png"/>
                            <?php
                            }
                            for ($i = 0; $i < 2; $i++) {
                                ?>
                                <img style="padding-bottom: 3px;"
                                     src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/ratIco0.png"/>
                            <?php
                            }
                            ?>
                            </span>
                        </div>
                        <div>
                            <span id="titleModule"><?php echo "Тривалість: "?></span>
                            <?php echo "<b>25 занять</b>, орієнтовно - <b>1 міс.</b> (3 год./день, 3 дні/тиждень)"?>
                        </div>
                        <div>
                            <span id="titleModule"><?php echo "Вартість модуля: "?></span>
                            <span id="oldPrice"><?php echo "3000.00 грн. "?></span>
                            <?php echo "<b> 1500.00 грн.</b> (в межах курсу)"?>
                        </div>
                        <div style="padding: 20px 0px;">
                            <div >
                                <span id="titleModule"><?php echo "Оцінка: "?></span>
                                <?php
                                for ($i = 0; $i < 9; $i++) {
                                    ?><span>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/starFull.png">
                                    </span><?php
                                }
                                for ($i = 0; $i < 1; $i++) {
                                    ?><span>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/starEmpty.png">
                                    </span><?php
                                }
                                ?>
                            </div>

                        </div>
                        <table>
                            <tr>
                                <td>
                                    <div id="enter_button_2" href="#" ><?php echo "Почати модуль"; ?></div>
                                </td>
                                <td style="padding-left: 100px;">
                                    <div id="enter_button_2" href="#" ><?php echo "Почати курс"; ?></div>
                                </td>
                            </tr>
                        </table>


                    </td>
                </tr>
            </table>

         <div class="lessonModule">
                 <h2><?php echo "Заняття модуля"?></h2>

             <?php
             for ($i = 0; $i < $moduleNumber; $i++) {
                 ?>
                    <div>
                        <table>
                            <tr>
                                <td style="width: 80px;">
                                    <?php echo "Заняття ",$i+1,"."; ?>
                                </td>
                                <td>
                                    <span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/lesson"><?php echo $arrayNameLessons[$i] ;?></a> </span>
                                </td>
                            </tr>
                        </table>
                    </div>
             <?php
             }
             ?>
         </div>
        </div>
    </div>

    <div class="rightModule">
        <?php
        for ($i = 1; $i <= 4; $i++) {
            ?>
            <div class="teacherBox">
                <table>
                    <tr>
                        <td class="teacherBoxLeft">
                            <img  src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/teacher2.jpg"/>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/profile"><?php echo "персональна сторінка"; ?> &#187;</a>
                        </td>
                        <td  class="teacherBoxRight" ">
                        <h2><?php echo "Викладач:"?></h2>
                        <div style="line-height: 1.2;">
                            <?php echo $teacherLastName,$teacherFirstName;?>
                            <?php echo $teacherEmail;?>
                            <?php echo $teacherPhone1, $teacherPhone2;?>
                            <?php echo $teacherSkype;?>
                        </div>
                        </td>
                    </tr>
                </table>
            </div>
        <?php
        }
        ?>
    </div>

</div>