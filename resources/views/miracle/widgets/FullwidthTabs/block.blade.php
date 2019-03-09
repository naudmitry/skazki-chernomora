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
            ><span class="widget-title">{{ $setting->title ?? 'Введите название' }}</span></button>
        </h5>

        <div class="mr-3">
            <a class="mr-3" href="javascript:;" data-action="move"><i class="fas fa-arrows-alt"></i></a>
            <a href="javascript:;" data-action="close"><i class="fas fa-times"></i></a>
        </div>
    </div>

    <div id="collapse-{{ $position }}" class="collapse" aria-labelledby="heading-{{ $position }}" data-parent="#accordionExample">
        <div class="card-body">
            <div class="form-group row">
                <label class="control-label col-md-4" for="title-{{ $position }}">Заголовок:</label>
                <div class="col-md-8">
                    <input
                            id="title-{{ $position }}"
                            data-setting="title"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="content-group">
                <textarea
                        id="textarea-{{ $position }}"
                        data-field-type="textarea-editor"
                        data-setting="text"
                        class="widget-setting required"
                        required
                >{{ $setting->text ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>