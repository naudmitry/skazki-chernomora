<div class="col-lg-6 modal" id="history-modal">
    <div class="bs-component">
        <div class="modal custom-modal">
            <div class="modal-dialog" role="document">
                <form autocomplete="off" class="modal-content add-history-form" method="post" action="{{ route('admin.order.history.save', $order) }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Добавить</h5>
                        <button
                                class="close"
                                type="button"
                                data-dismiss="modal"
                                aria-label="Close"
                        ><span aria-hidden="true">×</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="tile-body mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-small primary coloured-icon">
                                        <div class="circle-icon">
                                            <i class="far fa-file-alt"></i>
                                        </div>
                                        <div class="info">
                                            <p class="sites-count"><b>0</b></p>
                                            <p>пользователей</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input class="form-control form-control-sm history-search-modal" placeholder="Введите и нажмите Enter..." />
                                </div>
                            </div>
                        </div>

                        <div class="tile-body datatable-scroll-lg">
                            <table class="table table-hover" id="orderHistoriesTableModal" data-href="{{ route('admin.order.history.buyer', $order) }}" width="100%">
                                <thead>
                                <tr>
                                    <th>Пользователь</th>
                                    <th>Паспорт</th>
                                    <th>Телефон</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default" type="submit" disabled>
                            <i class="fas fa-check-circle mr-2"></i>Сохранить
                        </button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            <i class="fas fa-ban mr-2"></i>Отменить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>