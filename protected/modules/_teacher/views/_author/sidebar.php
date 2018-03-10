<li>
    <a href="#/author" class="show_elem">
        <i class="fa fa-pencil fa-fw"></i> Автор
    </a>
    <a href="#/author" uib-tooltip="Автор" tooltip-placement="right" class="hid" style="display: none">
        <i class="fa fa-pencil fa-fw"></i>
    </a>
</li>
<?php if(
    Yii::app()->user->model->isAdmin()
    || Yii::app()->user->model->isSuperAdmin()
    || Yii::app()->user->model->isContentManager()
    || Yii::app()->user->model->isSuperVisor()
) {?>
    <li>
        <a href="#/library" class="show_elem">
            <i class="fa fa-book fa-fw"></i> Бібліотека
        </a>
        <a href="#/library" uib-tooltip="Бібліотека" tooltip-placement="right" class="hid" style="display: none">
            <i class="fa fa-book fa-fw"></i>
        </a>
    </li>
<?php }?>