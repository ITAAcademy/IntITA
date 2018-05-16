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
                <b class="grey"><?php echo $lessonsCount . ' ' . Yii::t('module', '0216'); ?></b><br>
                <?php if ($lessonsCount != 0) {?>
                    <span class="colorP"><?php echo Yii::t('course', '0209'); ?></span>
                    -<b class="grey">
                        <?php echo $courseForTemplate->getApproximatelyDurationInMonths(); ?><?php echo Yii::t('course', '0664'); ?>
                    </b>
                    <?php
                } ?>
            </div>
        </div>
    </div>
    <br>
    <table id="schema">
        <tr>
            <td class="monthTitle-wrap"><div class="monthTitle">Навчальні <?php echo Course::getMessage($message, 'months') ?></div></td>
            <?php for ($i = 0; $i < $courseDuration; $i++) { ?>
                <td class="monthsCell"><?php echo $i + 1; ?></td>
            <?php } ?>
            <td class="end-line-wrap"><div class="end-line"></div></td>
        </tr>
        <?php
            $traineeCount = 0;
        ?>
        <?php for ($i = 0, $count = count($modules); $i < $count; $i++) {
            if($i == 0){?>
                <tr id="trainee-wrap">
                    <td class="trainee">
                        <p><?php echo Course::getMessage($message, 'trainee'); ?><span class="title-line"></span></p>
                        <img class="logo-module" src="<?php echo Config::getBaseUrl() ."/images/course/" .Course::getLogo($idCourse);?>">
                    </td>
                </tr>
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
                            echo "<tr id=\"$tr_number\">";
                        }
                 ?>
                <td class="hours">
                    <p><?php echo Module::getModuleName($modules[$i]['id_module'])?><span class="title-line"></span></p>
                <img class="logo-module" src="<?php echo Config::getBaseUrl(). "/images/module/" . Module::getModuleLogo($modules[$i]['id_module']); ?>">
                </td>
                <?php
                $firstColumnFlag = 0;
                $lastColumnFlag = 0;
                $countCells = count($tableCells[$i]) - 1;
                for ($j = 0; $j < $courseDuration; $j++) {
                    if ($tableCells[$i][$j] == 0 && $j!= $courseDuration-1) {
                        ?>
                        <td class="emptyMonthsCell"></td>
                    <?php } else {
                        $firstColumnFlag++;
                          if($firstColumnFlag == 1 && $countCells != 1) {
                              if($tableCells[$i][$j+1] == '0' || $tableCells[$i][$j+1] == NULL){
                          ?>
                            <td class="fullMonthsCell last-item first-item-without">
                                   <div class="item-data-wrap yellow-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць">
                                  <?php echo $tableCells[$i][$j]; ?>
                                      </div>
                              </td>
                              <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>">
                                    <p class="end"><?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip();?></p>
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
                            <td class="fullMonthsCell last-item first-item-without">
                                 <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць""><?php echo $tableCells[$i][$j]; ?></div>
                            </td>
                            <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>"'>

                                    <p class="end"><?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip();?></p>
                                </td>
                        <?php
                        }
                        else {
                            if($j == $countCells-1){?>
                                <td class="fullMonthsCell last-item">
                                   <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" data-placement="top" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць" style="padding-right: 10px;"> <?php echo $tableCells[$i][$j]; ?></div>
                                </td>
                                 <td class="examCell<?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeSymbol() ?>">
                                    <p class="end"><?php echo $modules[$i]->moduleInCourse->lastLecture()->lectureTypeTooltip();?></p>
                                </td>
                            <?php }else{ ?>
                                <?php if ($j!= $courseDuration-1){ ?>
                                    <td class="fullMonthsCell item">
                                <div class="item-data-wrap yellow-tooltip"  data-toggle="tooltip" title="<?php echo $tableCells[$i][$j]; ?> годин/місяць" style="padding-right: 10px;"> <?php echo $tableCells[$i][$j]; ?> </div>
                                    </td>
                                        </div>
                                <?php } ?>

                        <?php }
                        }
                    }
                }
                }
                ?>
            </tr>
        <?php } ?>
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
            for(var j=0; j<$(".last-item")[index].parentNode.id; j++){

                if($('[id=' + j + ']').children()[$(".last-item")[index].cellIndex] !== undefined){
                    $('[id=' + j + ']').children()[$(".last-item")[index].cellIndex].classList.add("border-right")
                }
            }
     })
    var traineeWrap = document.getElementById("trainee-wrap");
    var lastElement = 0;
    $("#1").children().each(function(index){
        if(this.className !== "hours" && this.className !== "examCellE"){
            traineeWrap.appendChild(this.cloneNode(false));
            var arrClass = this.className.split(" ");
            var count = 0;
            for(var i = 0; i < arrClass.length; i++){
                if (arrClass[i] == "last-item"){
                    lastElement = index;
                }
            }
        }
    });
    var lastElements = [];
    for(var i=0; i< $(".last-item").length; i++){
        lastElements.push($(".last-item")[i].cellIndex);
    }
    function compareNumeric(a, b) {
      if (a > b) return 1;
      if (a < b) return -1;
    }
    lastElements.sort(compareNumeric);
    var moduleClasses = 0;
        for (var i = 0; i < traineeWrap.childNodes.length; i++){
            if(traineeWrap.childNodes[i].className !== undefined){
                moduleClasses = (traineeWrap.childNodes[i].className.split(" "));
               for (var j=0; j<moduleClasses.length; j++){
                    if(moduleClasses[j] == "item" || moduleClasses[j] == "last-item" || moduleClasses[j] == "first-item"){
                        traineeWrap.childNodes[i].style.background = "none";
                    }
                }
            }
        }
        for(var j=$(".monthsCell")[ $(".monthsCell").length-1].innerText; j != lastElements[lastElements.length-1]; j--){
            if($("#trainee-wrap").children()[j] != undefined){
                $("#trainee-wrap").children()[j].remove();
            }
        }
     for(var i=0; i < ($(".monthsCell")[ $(".monthsCell").length-1].innerText - lastElements[lastElements.length-1]); i++){
                if(i==0){
                    $("#trainee-wrap").append("<td class='trainee-first-item'><div class='item-data-wrap yellow-tooltip' data-toggle='tooltip' data-placement='top' title='8 годин/місяць'> 8 </div></td>");
                }
                else if(i!==0 && i!==($(".monthsCell")[ $(".monthsCell").length-1].innerText - lastElements[lastElements.length-1])-1){
                    $("#trainee-wrap").append("<td class='trainee-item'><div class='item-data-wrap yellow-tooltip' data-toggle='tooltip' data-placement='top' title='8 годин/місяць'> 8 </div></td>");
                }
                else{
                    $("#trainee-wrap").append("<td class='trainee-last-item border-right-exam'><div class='trainee-last-item-text item-data-wrap yellow-tooltip' data-toggle='tooltip' data-placement='top' title='8 годин/місяць'> 8 </div></td>");
                }
            }
            for(var j=0; j<$("#trainee-wrap > .border-right").length; j++){
                $("#trainee-wrap > .border-right")[j].innerHTML += "<div class=\"item-data-wrap yellow-tooltip coub-tooltip\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"годин/місяць\"><div class='coub'></div></div>";
            }
            $("#trainee-wrap > .last-item")[0].innerHTML = "<div class=\"item-data-wrap yellow-tooltip coub-tooltip\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"годин/місяць\"><div class='coub'></div></div>";
                $(".trainee-last-item").append("<div class=\"item-data-wrap yellow-tooltip coub-tooltip\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Дипломний проект\"><div class='coub-exam'></div></div>");
            $(document).ready(function(){
                var examWrap = document.createElement("td");
                examWrap.classList.add("exam-wrap");
                examWrap.style.setProperty("background","none","!important");
                examWrap.innerHTML = "<p class='end'>Дипломний проект</p>";
                traineeWrap.appendChild(examWrap);
    });
            k=$(".coub").length+1;
    var arrTooltip = [];
    for(var i = 0; i < $(".coub").length; i++){
        arrTooltip[i] = "";
        for(var j = 1; j <= $("tr").length-1; j++){
            if ($("tr")[j].children[$(".coub")[i].parentElement.parentElement.cellIndex+1].innerText != "" && isNaN($("tr")[j].children[$(".coub")[i].parentElement.parentElement.cellIndex+1].innerText)){
                arrTooltip[i] += $("tr")[j].children[$(".coub")[i].parentElement.parentElement.cellIndex+1].innerText + " ";
            }
        }
    }
    for(var i = 0; i < $(".coub").length; i++){
        var title = arrTooltip[i].split("\n\n");
        title = title.join(" / ");
        title = title.slice(0,-1);
            $(".coub")[i].parentElement.setAttribute("title",title);
    }
</script>
<div class="item-data-wrap yellow-tooltip" data-toggle="tooltip" data-placement="top" title="годин/місяць">
          <?php echo $tableCells[$i][$j]; ?>
    </div>