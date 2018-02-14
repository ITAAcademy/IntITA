<div class="spoilerLinks" data-toggle="collapse" data-target="#spoilerBody">
                <span class="spoilerClick" data-toggle="tooltip" title="Зміст розділу"><span class="spoilerTitle">
                    </span><div class="spoilerTriangle"
                                id="spoilerTriangle">(<span><?php echo Yii::t('lecture', '0080') ?>
                        </span>
                        <span id='trg'>&#9660;</span>)
                    </div>
                </span>
</div>
<div class="spoilerBody col-md-12 collapse" id="spoilerBody">
    <p ng-repeat="page in pageData">
        <a
                ng-class="{pageAccess: page.isDone || editMode || isAdmin}"
                ui-sref="{{(page.isDone || editMode || isAdmin) ? 'page({page: $index+1})' : '.'}}"
        >
            <?php echo Yii::t('lecture', '0615') . ' ' ?>{{($index+1)+'. '+page.title}}
        </a>
    </p>
</div>