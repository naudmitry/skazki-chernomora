<div class="card">
    <div class="card-header" id="heading-{{ $position }}" style="display: flex; align-items: center; justify-content: space-between;">
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
                            maxlength="20"
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <input
                            id="subtitle"
                            data-setting="subtitle"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->subtitle ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_title">Надпись на кнопке:</label>
                <div class="col-md-8">
                    <input
                            id="button_title"
                            data-setting="button_title"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            maxlength="20"
                            value="{{ $setting->button_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="link">Ссылка:</label>
                <div class="col-md-8">
                    <input
                            id="link"
                            data-setting="link"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            maxlength="20"
                            value="{{ $setting->link ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="icon">Иконка:</label>
                <div class="col-md-8">
                    <select
                            id="icon"
                            data-setting="icon"
                            class="select widget-setting required"
                            required
                    >@include('miracle.widgets.FeaturesThree.select_icons', ['icon' => $setting->icon ?? ''])</select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_link">Задержка анимации:</label>
                <div class="col-md-8">
                    <input
                            id="animation_delay"
                            data-setting="animation_delay"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            maxlength="20"
                            value="{{ $setting->animation_delay ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
