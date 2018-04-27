<?php
/**
 * @var $data Teacher
 */
$roles = $data->getRoles();
?>
<?php
    if($widget->dataProvider->pagination->currentPage == 0 && $index == 0)  {
?>
    <div class="teacherForm" id="minTeacherForm">
            <a id="joinTeamMinButton" data-toggle="modal" data-target="#joinTeamMin" class="buttonBeginInTeachers" href="#form">ПРИЄДНАТИСЯ ДО КОМАНДИ  /&gt;</a>

        <!-- Modal -->
        <div class="modal fade" id="joinTeamMin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Приєднатися до команди</h4>
                    </div>
                    
                        <?php $this->renderPartial('_ifYouTeachers', array('teacherletter'=>$teacherletter,'index'=>$index)); ?>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
<?php
    if($widget->dataProvider->pagination->currentPage == 0 && $index == 1)  {
?>
<div class="teacherForm" id="maxTeacherForm">
        <a id="joinTeamMaxButton" data-toggle="modal" data-target="#joinTeamMax" class="buttonBeginInTeachers" href="#form">ПРИЄДНАТИСЯ ДО КОМАНДИ  /&gt;</a>

        <!-- Modal -->
        <div class="modal fade" id="joinTeamMax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Приєднатися до команди</h4>
                    </div>
                    <?php $this->renderPartial('_ifYouTeachers', array('teacherletter'=>$teacherletter,'index'=>$index)); ?>
                </div>
            </div>
        </div>
</div>
<?php
    }
?>
<div class="teacherBlock">
    <div class="teacherTable">
        <div class="profileTeacher" >
            <div class="avatarsize">
                <img class='teacherAvatar' src="<?php echo StaticFilesHelper::createPath('image', 'avatars', $data->avatar());?>"/>
            </div>
            <a href="<?php echo Yii::app()->createUrl('profile/index',
                array('idTeacher' => $data->user_id));?>">
                <?php echo Yii::t('teachers', '0059'); ?>&#187;
            </a>
            <br>
            <a class="btnChat" href="<?php
            if (!Yii::app()->user->isGuest){
                echo Config::getChatPath(); echo $data->user_id; echo '" target="_blank';
            } else {
                echo '" onclick="openSignIn();';
            }
            ?>" data-toggle="tooltip" data-placement="left" title="<?=Yii::t('teacher', '0794');?>"><img src="<?php echo StaticFilesHelper::createPath('image', 'teachers', 'chat.png');?>"></a>
            <a class="btnChat" href="<?php
            if (!Yii::app()->user->isGuest) {
                echo Yii::app()->createUrl('/cabinet/#/newmessages/receiver/').$data->user_id;
            } else {
                echo '" onclick="openSignIn();';
            }?>" data-toggle="tooltip" data-placement="top" title="<?= Yii::t('teacher', '0795'); ?>"><img
                    src="<?php echo StaticFilesHelper::createPath('image', 'teachers', 'mail.png'); ?>"></a>
        </div>
        <div class="teacherName">
            <h2><?php echo $data->firstName(); ?>
                <?php echo $data->middleName(); ?>
                <?php echo $data->lastName(); ?></h2>
            <div><em><?php echo $roles ?></em></div>
        </div>
        <div class="teacherInfo">
            <div class="adaptiveTeacherName">
                <h2><?php echo $data->firstName(); ?>
                    <?php echo $data->middleName(); ?>
                    <?php echo $data->lastName(); ?></h2>

                <div>
                    <?php foreach ($data->teacherOrganizations as $item){
                            $rolesString=$item->getUserRoles();
                            echo $item->organization->name;
                            if ($rolesString)
                                echo ":<em> ".$rolesString."</em><br>";
                    }?>
                </div>
            </div>
            <?php echo $data->profile_text_short ?>
            <?php $modules = $data->modulesActive;
            if (!empty($modules)){?>
                <p>
                   <?php echo Yii::t('teachers', '0061'); ?>
                </p>
                <div class="TeacherProfilecourse">
                    <div class="teacherCourses">
                        <?php foreach ($data->teacherOrganizations as $item){?>
                            <?php if(!empty($item->getModules())){?>
                                <?php echo "<span class='orgName'>".$item->organization->name.":"."</span><br>";?>
                                <ul>
                                    <?php  foreach ($item->getModules() as $module){?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('module/index',
                                                array('idModule' => $module->module_ID)); ?>">
                                                <?php echo CHtml::encode($module->getTitle()) . ', ' . $module->language; ?>
                                            </a>
                                        </li>
                                    <?php }?>
                                </ul>
                            <?php }?>
                        <?php }?>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="aboutMore">
        <img src="<?php echo StaticFilesHelper::createPath('image', 'teachers', 'readMore.png');?>"/>
        <a href="<?php echo Yii::app()->createUrl('profile/index', array('idTeacher' => $data->user_id));?>">
            <?php echo Yii::t('teachers', '0062'); ?> &#187;
        </a>
        <br>
        <?php echo CommonHelper::getRating($data->rating); ?>
        <a href="<?php echo Yii::app()->createUrl('profile/index', array('idTeacher' => $data->user_id));?>">
            <?php echo Yii::t('teachers', '0063'); ?> &#187;
        </a>
    </div>
</div>