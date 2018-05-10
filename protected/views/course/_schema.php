<?php
/* @var $courseDuration array
 * @var $tableCells array
 */

?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo StaticFilesHelper::fullPathTo('css', 'images/favicon.ico'); ?>"/>
    <link rel="stylesheet" href="<?=Config::getBaseUrl()?>/css/courseSchema.css"/>
    <link rel="stylesheet" href="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
</head>
<style>
    .item-data-wrap{
    cursor: pointer;
    color: white;
    }
    .logo-course-wrap{
        float: left;
    }
    .title-course{
        display: inline-block;
        margin-bottom: 0;
    }
    .courseLevelIndex{
        display: inline-block;
    }
    .logo-module{
        max-width: 50%;
    }
    .monthsCell{
        background: #4b75a4;
        color: white;
        border: 1px solid grey;
    }
    /*#schema td{*/
        /*border: none !important;*/
    /*}*/
    .fullMonthsCell{
        background: none;
    }
    .examCellE{
        background: none;
    }
    .lastCell{
        background: none;
    }
    .item{
        background: url(../../images/module/5.png);
        background-repeat: no-repeat;
        background-position-y: center;
        /*background-position-x: -6px;*/
        background-position-x: -7px;
    }
    .first-item{
        width: 45px;
        background: url(../../images/module/2.png);
        background-repeat: no-repeat;
        background-position-y: center;
        /*background-position-x: 0px;*/
        background-position-x: -2px;
    }
    .last-item{
        background: url(../../images/module/last-item.png);
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: -6px;
        border-right: 1px solid rebeccapurple;
    }
    .first-item-without{
        background: url(../../images/module/first-item-without.png);
        background-repeat: no-repeat;
        background-position-y: center;
        /*background-position-x: 0px;*/
            background-position-x: -2px;
    }
    .wrap-info{
        margin-left: 124px;
        margin-top: -9px;
        margin-bottom: 9px;
    }
    .yellow-tooltip + .tooltip > .tooltip-inner {background-color: #fff59d;color: black;}
    /*.yellow-tooltip + .tooltip.bottom > .tooltip-arrow { border-bottom: 1px solid #fff59d; }*/
    /*.yellow-tooltip + .tooltip.top > .tooltip-arrow { border-bottom: 1px solid #fff59d; }*/
    /*.yellow-tooltip + .tooltip.top > .tooltip-arrow {*/
      /*border-top: 5px solid #ccc;*/
      /*background: red;*/
    /*}*/

  .tooltip-inner {
    border: solid 1px #ccc;
}
/*.red-tooltip + .tooltip > .tooltip-arrow { border-bottom-color: #ccc; }*/
    /*.tooltip.bottom .tooltip-arrow {*/
      /*top: 0;*/
      /*left: 50%;*/
      /*margin-left: -5px;*/
      /*border-bottom-color: #fff59d; !* black *!*/
      /*background: #fff59d;*/
      /*border-width: 0 5px 5px;*/
    /*}*/
    .border-right{
        border-right: 1px solid rebeccapurple;
    }
    .end{
        width: 10px;
        color: #273241;
        font-size: 12px;
    }
    .last-item-off-background{
        background: none;
    }
    .trainee-item{
        background: url(../../images/module/6.png);
        background-repeat-y: no-repeat;
        background-position-y: center;
        background-position-x: -7px;
    }
    .trainee-first-item{
        background: url(../../images/module/trainee-item.png);
        background-repeat: no-repeat;
        background-position-y: center;
    }
    .trainee-last-item{
        background: url(../../images/module/trainee-item-trainee.png);
        background-repeat: no-repeat;
        background-position-y: center;
        background-position-x: -6px;
    }
</style>
<?php //var_dump($courseForTemplate->level());?>
<?php $tr_number=0;?>
<div id="courseSchema">
    <br>
    <?php if (isset($messages) ? $message = $messages : $message = null) ; ?>
    <div class="logo-course-wrap"><img src="<?php echo Config::getBaseUrl() ."/images/course/" .Course::getLogo($idCourse);?>"></div>
    <div class="wrap-info">
        <h3 class="title-course"><?php echo Course::printTitle($idCourse, $message); ?></h3>
        <div class="courseLevelBox">
            <?php echo Yii::t('courses', '0068'); ?>
            <div class='courseLevelIndex'>
                <?php
                $rate = $courseForTemplate->getRate();
                for ($i = 0; $i < $rate; $i++) {
                    ?><span class="courseLevelImage">
                    <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'ratIco1.png'); ?>">
                    </span><?php
                }
                for ($i = $rate; $i < Course::MAX_LEVEL; $i++) {
                    ?><span class="courseLevelImage">
                    <img src="<?php echo StaticFilesHelper::createPath('image', 'common', 'ratIco0.png'); ?>">
                    </span><?php
                }
                ?>
            </div>
        </div>
        <div class="courseDetail">
            <div>
                <span class="colorP"><?php echo Yii::t('course', '0194'); ?></span>
                <b><?php echo $lessonsCount . ' ' . Yii::t('module', '0216'); ?></b><br>
                <?php if ($lessonsCount != 0) {
                    echo Yii::t('course', '0209'); ?>
                    -<b>
                        <?php echo $courseForTemplate->getApproximatelyDurationInMonths(); ?><?php echo Yii::t('course', '0664'); ?>
                    </b>
                    <?php
                } ?>
            </div>
        </div>
    </div>
    <br>
    <table id="schema">
<!--        --><?php //$tr_number++;?>
        <tr>
            <td class="monthTitle"><?php echo Course::getMessage($message, 'months') ?></td>
            <?php for ($i = 0; $i < $courseDuration; $i++) { ?>
                <td class="monthsCell"><?php echo $i + 1; ?></td>
            <?php } ?>
        </tr>
<!--        <tr>-->
<!--            <td class="monthTitle">--><?php //echo Course::getMessage($message, 'module') ?><!--</td>-->
<!--            <td class="monthTitle" colspan="--><?php //echo $courseDuration - 5; ?><!--"></td>-->
<!--            <td colspan="5" id="courseName">-->
<!--                --><?php //echo Course::getCourseName($idCourse); ?>
<!--            </td>-->
<!--        </tr>-->
        <?php
            $traineeCount = 0;
            echo "<pre>";
//            var_dump(($modules));die;
        ?>
        <?php for ($i = 0, $count = count($modules); $i < $count; $i++) {
            if($i == 0){?>
                <tr id="trainee-wrap">
                    <td class="trainee"><?php echo Course::getMessage($message, 'trainee'); ?></td>
                </tr>
<!--                --><?php //for($k = $courseDuration; $k >= 0; $k--){?>
<!--                    --><?php //$traineeCount++;
//                        if(4 >= $courseDuration - $traineeCount){?>
<!--                        <td class="last-item"></td>-->
<!--                    --><?php //}else{ ?>
<!--                        <td class="last-item last-item-off-background"></td>-->
<!--                    --><?php //} ?>
<!---->
<!--                --><?php //} ?>
            <?php } ?>
            <?php
            if (Module::getLessonsCount($modules[$i]['id_module']) > 0) {
                ?>
                <?php if ($tr_number % 2 == 0) {
                            $tr_number++;
                            echo "<tr id=\"$tr_number\">";
                        }
                        else{
                            $tr_number++;
                            echo "<tr id=\"$tr_number\" style='background:#f5f5f5;'>";
                        }
                 ?>
                <td class="hours">
                    <p><?php echo Module::getModuleName($modules[$i]['id_module'])?></p>
                <img class="logo-module" src="<?php echo Config::getBaseUrl(). "/images/module/" . Module::getModuleLogo($modules[$i]['id_module']); ?>">
                </td>
                <?php
                $firstColumnFlag = 0;
                $lastColumnFlag = 0;
                $countCells = count($tableCells[$i]) - 1;
                for ($j = 0; $j < $courseDuration; $j++) {
                    if ($tableCells[$i][$j] == 0 ) {
                        ?>
                        <td class="emptyMonthsCell"></td>
                    <?php } else {
                        $firstColumnFlag++;
                          if($firstColumnFlag == 1 && $countCells != 1) {
                              if($tableCells[$i][$j+1] == '0' || $tableCells[$i][$j+1] == NULL){
                          ?>
<!--                              <td class="fullMonthsCell first-item-without">-->
                            <td class="fullMonthsCell last-item first-item-without">
                                   <div class="item-data-wrap yellow-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць">
                                  <?php echo $tableCells[$i][$j]; ?>
                                      </div>
                              </td>


                              <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>"
                                    title='<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip() ?>'>
                <!--                    --><?php //echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>
                                    <p class="end"><?php echo($modules[$i]->moduleInCourse->lastLecture()->title_ua);?></p>
                                </td>






                                  <?php } else{ ?>

                            <td class="fullMonthsCell first-item">
                                 <div class="item-data-wrap yellow-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць"><?php echo $tableCells[$i][$j]; ?></div>
                            </td>







                            <?php
                              }
                        }
                        elseif(($firstColumnFlag == 1 && $countCells == 1)){
                            ?>
<!--                            <td class="fullMonthsCell first-item-without">-->
                            <td class="fullMonthsCell last-item first-item-without">
                                 <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць""><?php echo $tableCells[$i][$j]; ?></div>
                            </td>






                            <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>"
                                    title='<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip() ?>'>
                <!--                    --><?php //echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>
                                    <p class="end"><?php echo($modules[$i]->moduleInCourse->lastLecture()->title_ua);?></p>
                                </td>




                        <?php
                        }
                        else {
                            if($j == $countCells-1){?>
                                <td class="fullMonthsCell last-item">
                                   <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць" style="padding-right: 10px;"> <?php echo $tableCells[$i][$j]; ?></div>
                                </td>






                                 <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>"
                                    title='<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip() ?>'>
                <!--                    --><?php //echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>
                                    <p class="end"><?php echo($modules[$i]->moduleInCourse->lastLecture()->title_ua);?></p>
                                </td>
                            <?php }else{ ?>

                            <td class="fullMonthsCell item">
                                <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць" style="padding-right: 10px;"> <?php echo $tableCells[$i][$j]; ?> </div>
                            </td>
                                </div>
                        <?php }
                        }
                    }
                }
                ?>
<!--                <td class="examCell--><?php //echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?><!--"-->
<!--                    title='--><?php //echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip() ?><!--'>-->
<!--<!--                    -->--><?php ////echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>
<!--                    <p class="end">--><?php //echo($modules[$i]->moduleInCourse->lastLecture()->title_ua);?><!--</p>-->
<!--                </td>-->
                <?php
//                if (Course::getCourseDuration($tableCells) == $j) {
//                    ?>
<!--                    <td class="trainee" colspan="4">--><?php //echo Course::getMessage($message, 'trainee'); ?><!--</td>-->
<!--                --><?php
//                } else {
//                    for (; $j < $courseDuration - 1; $j++) {
//                        ?>
<!--                        <td class="lastCell"></td>-->
<!--                    --><?php
//                    }
//                }
            }
            ?>
            </tr>
        <?php } ?>
        <tr>
            <td class="monthTitle"><?php echo Course::getMessage($message, 'months'); ?></td>
            <?php for ($i = 0; $i < $courseDuration; $i++) { ?>
                <td class="monthsCell"><?php echo $i + 1; ?></td>
            <?php } ?>
        </tr>
    </table>
    <?php if (!$save) { ?>
        <br>
        <br>
        <button id="saveButton" ><?php echo Course::getMessage($message, 'save'); ?></button>
        <br>
        <br>
        <br>
    <?php } ?>
</div>
<script type="text/javascript" src="<?php echo StaticFilesHelper::fullPathTo('js', 'jquery.min.js'); ?>"></script>
<script src="<?php echo StaticFilesHelper::fullPathTo('css', 'bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
    $(".last-item").each(function (index) {
         // console.log($(".last-item")[index].parentNode.id);
         //    console.log($(".last-item")[index].cellIndex);
         //    console.log($(".last-item")[index]);

            for(var j=0; j<$(".last-item")[index].parentNode.id; j++){
                // console.log(($("[id =' + parentsId +]")));
                // console.log($('[id=' + j + ']').children()[$(".last-item")[index].cellIndex]);
                if($('[id=' + j + ']').children()[$(".last-item")[index].cellIndex] !== undefined){
                    console.log($('[id=' + j + ']').children()[$(".last-item")[index].cellIndex].classList.add("border-right"));
                    // $('[id=' + j + ']').find("td")[$(".last-item")[index].cellIndex].addClass("border-right");
                }
            }
            // $(".last-item")[index].parentNode.id.each(function(index2) {
            //   console.log($("tr")[index2]);
            // })
            // for(var j=0; j<$(".last-item")[i].parentNode.id; j++){
            //      console.log($("tr")[j+1]);
            // }
     })
    // for(var i=0; i< $(".last-item").length; i++){
    //     console.log($(".last-item")[i].parentNode.id);
    //     console.log($(".last-item")[i].cellIndex);
    //     for(var j=0; j<$(".last-item")[i].parentNode.id; j++){
    //         console.log($("tr")[j+1]);
    //     }
    // }
    // $("#1").clone().appendTo("#trainee-wrap");\


    // console.log( $("#1").children());
    // console.log($(".monthsCell")[ $(".monthsCell").length-1].innerText);
    var traineeWrap = document.getElementById("trainee-wrap");
    var lastElement = 0;
    console.log($("#1").children());
    $("#1").children().each(function(index){
        console.log('index');
        console.log(index);
        // console.log($("#1").children().length);
        // for(var i=0; i < $(".monthsCell")[ $(".monthsCell").length-1].innerText - $("#1").children().length; i++){
        //     //    console.log($("#1").children());
        //     // console.log(this);
        //         $("#1").children().add("<td class='new'></td>");
        //     }
        //     console.log( $("#1").children());

        if(this.className !== "hours" && this.className !== "examCellE"){
            console.log("this: ");
            console.log(this);
            // if(this.className == "fullMonthsCell first-item" || this.className == "fullMonthsCell item" || this.className == "fullMonthsCell last-item"){
            //     this.style.background = "none";
            // }
            traineeWrap.appendChild(this.cloneNode(false));

            var arrClass = this.className.split(" ");
            var count = 0;
            for(var i = 0; i < arrClass.length; i++){
                if (arrClass[i] == "last-item"){
                    lastElement = index;
                }
                // if(count == arrClass.length){
                //     traineeWrap.appendChild(this.cloneNode(false));
                // }
            }
        }
    })
    console.log("traineeWrap: ");
    console.log(traineeWrap);
    console.log(traineeWrap.childNodes);
    console.log(traineeWrap.childNodes.length);
    console.log("lastElement: ");
    console.log(lastElement);
    console.log($(".last-item"));
    var lastElements = [];
    for(var i=0; i< $(".last-item").length; i++){
        console.log("PUSH");
        lastElements.push($(".last-item")[i].cellIndex);
    }
    function compareNumeric(a, b) {
      if (a > b) return 1;
      if (a < b) return -1;
    }
    console.log(console.log("lastElements.length"));
    console.log(lastElements);
    lastElements.sort(compareNumeric);
    console.log(console.log("lastElements.length"));
    console.log(lastElements[length-1]);
    console.log('month:');
    console.log($(".monthsCell")[ $(".monthsCell").length-1].innerText);
    console.log("last element:");
    console.log(lastElements[lastElements.length-1]);
    var moduleClasses = 0;


        for (var i = 0; i < traineeWrap.childNodes.length; i++){
            console.log(traineeWrap.childNodes[i].className);
            if(traineeWrap.childNodes[i].className !== undefined){
                moduleClasses = (traineeWrap.childNodes[i].className.split(" "));
                console.log(moduleClasses);
               for (var j=0; j<moduleClasses.length; j++){
                    if(moduleClasses[j] == "item" || moduleClasses[j] == "last-item" || moduleClasses[j] == "first-item"){
                        traineeWrap.childNodes[i].style.background = "none";
                    }
                }
            }
        }





        console.log("Module classes: ");
        console.log(moduleClasses);
        console.log($(".monthsCell")[ $(".monthsCell").length-1].innerText);
        console.log($("#trainee-wrap").children());

        for(var j=$(".monthsCell")[ $(".monthsCell").length-1].innerText; j != lastElements[lastElements.length-1]; j--){
            console.log("j:" + j);
            $("#trainee-wrap").children()[j].remove();
        }
        console.log($(".monthsCell")[ $(".monthsCell").length-1].innerText);
     for(var i=0; i < ($(".monthsCell")[ $(".monthsCell").length-1].innerText - lastElements[lastElements.length-1]); i++){
                console.log(i);
                if(i==0){
                    $("#trainee-wrap").append("<td class='trainee-first-item'></td>");
                }
                else if(i!==0 && i!==($(".monthsCell")[ $(".monthsCell").length-1].innerText - lastElements[lastElements.length-1])-1){
                    $("#trainee-wrap").append("<td class='trainee-item'></td>");
                }
                else{
                    $("#trainee-wrap").append("<td class='trainee-last-item'></td>");
                }
            }
</script>