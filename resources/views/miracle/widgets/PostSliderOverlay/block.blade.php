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
            ><span class="widget-title">{{ $setting->title ?? 'Введите наименование' }}</span></button>
        </h5>

        <div class="mr-3">
            <a class="mr-3" href="javascript:;" data-action="move"><i class="fas fa-arrows-alt"></i></a>
            <a href="javascript:;" data-action="close"><i class="fas fa-times"></i></a>
        </div>
    </div>

    <div id="collapse-{{ $position }}" class="collapse" aria-labelledby="heading-{{ $position }}" data-parent="#accordionExample">
        <div class="card-body">
            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Заголовок:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            data-setting="title"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <textarea
                            id="subtitle"
                            name="subtitle"
                            data-setting="subtitle"
                            class="form-control widget-setting"
                            type="text"
                            rows="3"
                    >{{ $setting->subtitle ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="image_link">Ссылка на картинку (770x415):</label>
                <div class="col-md-8">
                    <input
                            id="image_link"
                            data-setting="image_link"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->image_link ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="is_button_show">Показывать кнопку:</label>
                <div class="col-md-8">
                    <div class="toggle-flip">
                        <label class="mb-0">
                            <input
                                    id="is_button_show"
                                    data-setting="is_button_show"
                                    @if ($setting->is_button_show ?? false) checked @endif
                                    type="checkbox"
                                    class="widget-setting checkbox entity-availability"
                            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_text">Текст на кнопке:</label>
                <div class="col-md-8">
                    <input
                            id="button_text"
                            data-setting="button_text"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->button_text ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_link">Ссылка для кнопки:</label>
                <div class="col-md-8">
                    <input
                            id="button_link"
                            data-setting="button_link"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->button_link ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
