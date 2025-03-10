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
                            maxlength="32"
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
                            maxlength="180"
                            value="{{ $setting->subtitle ?? '' }}">
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
                            value="{{ $setting->link ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Иконка:</label>
                <div class="col-md-8">
                    <select
                            data-setting="icon"
                            class="form-control select2 widget-setting"
                    >@include('miracle.widgets.FeaturesThree.select_icons', ['icon' => $setting->icon ?? ''])</select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="animation_delay">Задержка анимации:</label>
                <div class="col-md-8">
                    <input
                            id="animation_delay"
                            data-setting="animation_delay"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->animation_delay ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
