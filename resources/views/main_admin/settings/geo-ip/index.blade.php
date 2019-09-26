<div class="tab-pane fade geo-ip-tab" id="geo-ip">
    <div class="tile">
        <h4 class="line-head">Местоположение</h4>

        <form autocomplete="off" class="settings-general-form" method="post" action="{{ route('admin.settings.update', 'geo-ip') }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">Использовать настройки местоположения:</label>
                </div>
                <div class="col-md-8 toggle-flip">
                    <label>
                        <input
                                name="general:is-use-geo-ip"
                                class="checkbox"
                                type="checkbox"
                                @if ($administeredShowcase->config('general:is-use-geo-ip')) checked @endif
                        ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
                    </label>
                </div>
            </div>

            <div id="accordionExample" class="accordion" data-field="general:geo-ip-items">
                @if ($settings = $administeredShowcase->config('general:geo-ip'))
                    @foreach ($settings['items'] as $item)
                        @include('main_admin.settings.geo-ip.item', ['position' => $loop->iteration])
                    @endforeach
                @endif
            </div>

            <div class="tile-footer">
                <button type="button" href="{{ route('admin.settings.createGeoIpRule') }}" class="btn btn-primary" data-field="general:create-geo-ip-rule">
                    <i class="fas fa-plus-circle mr-2"></i>Добавить
                </button>
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
