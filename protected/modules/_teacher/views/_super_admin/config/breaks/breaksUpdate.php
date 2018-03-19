<div class="panel-body" ng-controller="breakCtrl">
    <div class="row">
        <div class="formMargin">
            <div class="col-lg-8">
                <form autocomplete="off" ng-submit="editBreak();" name="editBreakForm"  novalidate>
                    <div class="form-group">
                        <label>Назва українською*</label>
                        <input name="break" class="form-control" ng-model="break.description" required maxlength="128" size="50">
                        <div ng-cloak  class="clientValidationError" ng-show="editBreakForm['break.description'].$dirty && editBreakForm['break.description'].$invalid">
                            <span ng-show="editBreakForm['break.description'].$error.required"><?php echo Yii::t('error','0268') ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" ng-disabled="editBreakForm.$invalid">Зберегти
                        </button>
                        <a type="button" class="btn btn-default" ng-click='back()'>
                            Назад
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
