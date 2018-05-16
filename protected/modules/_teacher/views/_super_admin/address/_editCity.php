<div class="panel-body">
    <a type="button" class="btn btn-primary" ng-href="#/address" style="margin-bottom: 10px;">
        Країни, міста
    </a>
    <div class="row">
        <div class="formMargin">
            <div class="col-lg-8">
                <form role="form" name="addCityForm" ng-submit="editCity();">
                    <div class="form-group">
                        <label>Країна</label>
                        <input
                            id="typeahead"
                            type="text"
                            class="typeahead form-control"
                            name="countryName"
                            value="<?php echo $model->country0->title_ua ?>"
                            size="90"
                            required
                            disabled
                        >
                    </div>
                    <input
                        type="hidden"
                        name="id"
                        ng-init="cityForm.id = '<?php echo $model->id ?>'"
                        ng-model="cityForm.id"
                    >
                    <div class="form-group">
                        <?php echo $model->title_ua ?>
                        <label for="titleUa">Назва українською</label>
                        <input
                            id="titleUa"
                            name="title_ua"
                            class="form-control"
                            ng-init="cityForm.title_ua =  '<?php echo $model->title_ua ?>'"
                            required
                            maxlength="50"
                            size="50"
                            ng-pattern="regex.titleUa"
                            ng-model="cityForm.title_ua"
                        >
                        <city-validation
                            pattern-error="addCityForm.title_ua.$error.pattern"
                            dirty-required-error="addCityForm.title_ua.$dirty && addCityForm.title_ua.$error.required"
                        ></city-validation>
                    </div>

                    <div class="form-group">
                        <label for="titleRu">Назва російською</label>
                        <input
                            id="titleRu"
                            name="title_ru"
                            class="form-control"
                            ng-init="cityForm.title_ru = '<?php echo $model->title_ru ?>'"
                            required
                            maxlength="50"
                            size="50"
                            ng-pattern="regex.titleRu"
                            ng-model="cityForm.title_ru"
                        >
                        <city-validation
                            pattern-error="addCityForm.title_ru.$error.pattern"
                            dirty-required-error="addCityForm.title_ru.$dirty && addCityForm.title_ru.$error.required"
                        ></city-validation>
                    </div>

                    <div class="form-group">
                        <label for="titleEn">Назва англійською</label>
                        <input
                            id="titleEn"
                            name="title_en"
                            class="form-control"
                            ng-init="cityForm.title_en = '<?php echo $model->title_en ?>'"
                            required
                            maxlength="50"
                            size="50"
                            ng-pattern="regex.titleEn"
                            ng-model="cityForm.title_en"
                        >
                        <city-validation
                            pattern-error="addCityForm.title_en.$error.pattern"
                            dirty-required-error="addCityForm.title_en.$dirty && addCityForm.title_en.$error.required"
                        ></city-validation>
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-primary"
                            ng-disabled="addCityForm.$invalid"
                        >Відредагувати</button>
                        <a type="button" class="btn btn-outline btn-default" ng-href="#/address">
                            Скасувати
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
