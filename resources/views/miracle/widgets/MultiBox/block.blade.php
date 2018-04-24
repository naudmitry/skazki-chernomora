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
            ><span class="widget-title">{{ $setting->title ?? 'Введите заголовок' }}</span></button>
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
                            maxlength="25"
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="input-group col-md-8">
                    <input
                            id="subtitle"
                            data-setting="subtitle"
                            class="form-control widget-setting"
                            type="text"
                            maxlength="180"
                            value="{{ $setting->subtitle ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="transition">Иконка:</label>
                <div class="col-md-8">
                    <select
                            data-setting="icon"
                            class="form-control select2 widget-setting"
                    >@include('miracle.widgets.MultiBox.select_icons', ['icon' => $setting->icon ?? ''])</select>
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="link">Ссылка:</label>
                <div class="input-group col-md-8">
                    <input
                            id="link"
                            data-setting="link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $setting->link ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
