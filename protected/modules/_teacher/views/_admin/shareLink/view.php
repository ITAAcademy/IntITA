<?php
/* @var $this ShareLinkController */
/* @var $model ShareLink */
?>
<ul class="list-inline">
    <li>
        <button type="button" class="btn btn-primary"
                onclick="load('<?php echo Yii::app()->createUrl('_teacher/_admin/shareLink/index'); ?>',
                    'Посилання на ресурси')">
            Всі посилання
        </button>
    </li>
    <li>
        <button type="button" class="btn btn-primary"
                onclick="load('<?php echo Yii::app()->createUrl('_teacher/_admin/shareLink/update', array('id' => $model->id)); ?>',
                    'Посилання на ресурси')">
            Редагувати посилання
        </button>
    </li>
</ul>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-12">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td width="30%"><strong>Назва</strong></td>
                        <td><?= CHtml::encode($model->name); ?></td>
                    </tr>
                    <tr>
                        <td width="30%"><strong>Посилання</strong></td>
                        <td>
                            <a href="<?= $model->link ?>">
                                <?= CHtml::encode($model->link); ?>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

