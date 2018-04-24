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
            @foreach ($regions as $region)
                <option
                        data-region-id="{{ $region->id }}"
                        data-value-name="{{ $region->name }}"
                        value="{{ $region->code }}"
                >{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
</div>