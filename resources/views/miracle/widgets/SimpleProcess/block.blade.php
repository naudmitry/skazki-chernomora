<div class="card">
    <div class="card-header collapse-header" id="heading-{{ $position }}">
        <h5 class="mb-0">
            <button
                    aria-controls="collapse-{{ $position }}"
                    aria-expanded="false"
                    class="btn btn-link"
                    data-target="#collapse-{{ $position }}"
                    data-toggle="collapse"
                    type="button"
            ><span class="widget-title">{{ $setting->title ?? 'Элемент' }}</span></button>
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
                            class="form-control widget-setting required"
                            data-setting="title"
                            id="title"
                            required
                            type="text"
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <input
                            class="form-control widget-setting required"
                            data-setting="subtitle"
                            id="subtitle"
                            required
                            type="text"
                            value="{{ $setting->subtitle ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Иконка:</label>
                <div class="col-md-8">
                    <select
                            class="form-control select2 widget-setting"
                            data-setting="icon"
                    >@include('miracle.widgets.SimpleProcess.select_icons', ['icon' => $setting->icon ?? ''])</select>
                </div>
            </div>
        </div>
    </div>
</div>
