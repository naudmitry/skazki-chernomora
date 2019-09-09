<div class="tab-pane" id="verification">
    <div class="tile">
        <h4 class="line-head">Verification</h4>

        <form autocomplete="off" class="settings-verification-form" method="post" action="{{ route('admin.seo-integrations.save') }}">
            <div class="form-group row">
                <label class="col-md-2" for="verification">Текст:</label>
                <div class="col-md-10">
                    <textarea
                            id="verification"
                            name="seo-integration:verification"
                            rows="10"
                            cols="5"
                            class="form-control"
                    >{{ $administeredShowcase->config('seo-integration:verification') }}</textarea>
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