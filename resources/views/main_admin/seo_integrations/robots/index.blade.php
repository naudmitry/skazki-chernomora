<div class="tab-pane active" id="robots">
    <div class="tile">
        <h4 class="line-head">Robots</h4>

        <form autocomplete="off" class="settings-robots-form" method="post" action="{{ route('admin.seo-integrations.save') }}">

            <div class="form-group row">
                <label class="col-md-2" for="robots-text">Текст:</label>
                <div class="col-md-10">
                    <textarea id="robots-text" name="seo-integration:robots-text" rows="10" cols="5" class="form-control" required>{{ $administeredShowcase->config('seo-integration:robots-text') }}</textarea>
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