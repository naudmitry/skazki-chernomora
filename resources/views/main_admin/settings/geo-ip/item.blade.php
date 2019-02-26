<div class="card">
    <div class="card-header collapse-header" id="heading-{{ $position }}">
        <h5 class="mb-0">
            <button
                    class="btn btn-link"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapse-{{ $position }}"
                    aria-expanded="false"
                    aria-controls="collapse-{{ $position }}"
            ><span class="geo-ip-panel-title"></span></button>
        </h5>
        <a href="javascript:;" class="mr-3" data-action="close"><i class="fas fa-times"></i></a>
    </div>

    <div id="collapse-{{ $position }}" class="collapse" aria-labelledby="heading-{{ $position }}" data-parent="#accordionExample">
        <div class="card-body">
            <div class="form-group row">
                <label class="control-label col-md-4">Состояние:</label>
                <div class="col-md-8">
                    <select class="select2" name="condition[]">
                        @foreach (\App\Classes\GeoIpConditionsEnum::lists() as $condition)
                            <option
                                    value="{{ $condition }}"
                                    @if (isset($item['condition']) && $condition == $item['condition']) selected @endif
                            >{{ \App\Classes\GeoIpConditionsEnum::$labels[$condition] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Страна:</label>
                <div class="col-md-8">
                    <select
                            class="select2-with-search"
                            name="country[]"
                            data-field="general:geo-ip-country"
                            href="{{ route('admin.settings.regions') }}"
                    >
                        <option value="">Все страны</option>
                        @foreach (\App\Models\Country::all() as $country)
                            <option
                                    data-country-id="{{ $country->id ?? '' }}"
                                    value="{{ $country->name }}"
                                    @if (isset($item['country']) && $country->name == $item['country']) selected @endif
                            >{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Регион:</label>
                <div class="col-md-8 region-select-block">
                    <select
                            class="select2-with-search"
                            name="region[]"
                            data-field="general:geo-ip-region"
                            href="{{ route('admin.settings.cities') }}"
                    >
                        <option value="">Все регионы</option>
                        @if (isset($item['country']))
                            @php $regions = app(\App\Http\Controllers\Admin\SettingController::class)->getListRegionsByCountry($item['country']) @endphp
                            @foreach ($regions as $region)
                                <option
                                        @if (isset($item['region']) && $region->code == $item['region']) selected @endif
                                        data-region-id="{{ $region->id }}"
                                        data-value-name="{{ $region->name }}"
                                        value="{{ $region->code }}"
                                >{{ $region->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Город:</label>
                <div class="col-md-8">
                    <select
                            class="select2-with-search"
                            name="city[]"
                            data-field="general:geo-ip-city"
                    >
                        <option value="">Все города</option>

                        @if (isset($item['country']))
                            @php $cities = app(\App\Http\Controllers\Admin\SettingController::class)->getListCitiesByCountryAndRegion($item['country'], $item['region']) @endphp
                            @foreach ($cities as $city)
                                <option
                                        @if (isset($item['city']) && $city->name == $item['city']) selected @endif
                                        value="{{ $city->name }}"
                                >{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Ссылка перенаправления:</label>
                <div class="col-md-8 input-group">
                    <input name="redirect[]" class="form-control geo-ip-redirect-link" type="text" value="{{ $item['redirect'] ?? '' }}">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <a href="javascript:;" target="_blank" class="link-open">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
