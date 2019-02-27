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
                <label class="control-label col-md-4" for="title">Название:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            data-setting="title"
                            value="{{ $setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="image_link">Ссылка на картинку:</label>
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
                <label class="control-label col-md-4" for="category">Категория:</label>
                <div class="col-md-8">
                    <input
                            id="category"
                            data-setting="category"
                            type="text"
                            class="form-control widget-setting required"
                            required
                            value="{{ $setting->category ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
