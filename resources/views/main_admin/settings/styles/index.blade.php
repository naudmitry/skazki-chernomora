<div class="tab-pane" id="styles">
    <div class="tile">
        <h4 class="line-head">Оформление</h4>

        <form autocomplete="off" class="settings-general-form" method="post" action="{{ route('admin.settings.update', 'styles') }}">
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label" for="menu">Меню:</label>
                </div>
                <div class="col-md-9">
                    <select class="select2" id="menu" name="styles:menu">
                        @foreach (['colored', 'dark', 'light'] as $type)
                            <option
                                    @if ('style-' . $type == $administeredShowcase->config('styles:menu')) selected @endif
                                    value="style-{{ $type }}"
                            >{{ App\Classes\MenuStylesEnum::$labels[$type] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label" for="footer">Footer:</label>
                </div>
                <div class="col-md-9">
                    <select class="select2" id="footer" name="styles:footer">
                        @for ($i = 1; $i < 5; $i++)
                            <option
                                    @if ('style' . $i == $administeredShowcase->config('styles:footer')) selected @endif
                                    value="style{{ $i }}"
                            >Стиль {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label" for="color">Цвет:</label>
                </div>
                <div class="col-md-9">
                    <input type="color" id="color" name="styles:color" value="{{ $administeredShowcase->config('styles:color') ?? '#ff6600' }}">
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>