<div class="form-group row">
    <label class="control-label col-md-4">Город:</label>
    <div class="col-md-8">
        <select class="select2-with-search" name="city[]" data-field="general:geo-ip-city">
            <option value="">Все города</option>
            @foreach ($cities as $city)
                <option value="{{ $city->name }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
</div>