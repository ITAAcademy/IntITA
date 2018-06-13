<div class="panel-body">
    <a type="button" class="btn btn-primary" ng-href="#/address" style="margin-bottom: 10px;">
        Країни, міста
    </a>
    <div class="row">
        <div class="formMargin">
            <div class="col-lg-8">
                <form role="form" name="addCityForm" ng-submit="addCity();">
                    <div class="form-group">
                        <label for="typeahead">Країна</label>
                        <input id="typeahead" type="text" class="typeahead form-control" name="country"
                               placeholder="Введіть назву країни"
                               size="90" required>
                        <input type="number" hidden="hidden" id="country" value="0"/>
                    </div>

                    <div class="form-group">
                        <label for="titleUa">Назва українською</label>
                        <input
                            id="titleUa"
                            name="title_ua"
                            class="form-control"
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
                        <button type="submit" class="btn btn-primary" ng-disabled="addCityForm.$invalid">Зберегти</button>
                        <a type="reset" class="btn btn-outline btn-default" ng-href="#/address">
                            Скасувати
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var countries = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: basePath + '/_teacher/_super_admin/address/countriesByQuery?query=%QUERY',
            wildcard: '%QUERY',
            filter: function (countries) {
                return $jq.map(countries.results, function (country) {
                    return {
                        id: country.id,
                        titleUa: country.titleUa,
                        titleRu: country.titleRu,
                        titleEn: country.titleEn
                    };
                });
            }
        }
    });

    countries.initialize();

    $jq('#typeahead').on('typeahead:selected', function (e, item) {
        $jq("#country").val(item.id);
    });

    $jq('#typeahead').typeahead(null, {
        name: 'countries',
        display: 'titleUa',
        limit: 10,
        source: countries,
        templates: {
            empty: [
                '<div class="empty-message">',
                'не знайдено такої країни',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile("<div class='typeahead_wrapper'> <div class='typeahead_labels'><div class='typeahead_primary'>{{titleUa}}&nbsp;</div><div class='typeahead_secondary'>{{titleRu}}, {{titleEn}}</div></div></div>")
        }
    });
</script>
