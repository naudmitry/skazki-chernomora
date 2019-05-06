<div class="tab-pane active" id="general">
    <div class="tile">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="widget-small warning"><i class="icon fas fa-handshake"></i>
                    <div class="info">
                        <h4>Стоимость</h4>
                        <p><b>{{ $order->cost ?? 0 }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-small primary"><i class="icon fas fa-thumbs-up"></i>
                    <div class="info">
                        <h4>Оплачено</h4>
                        <p><b>{{ $order->paid ?? 0 }}</b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="widget-small danger"><i class="icon fas fa-thumbs-down"></i>
                    <div class="info">
                        <h4>Задолженность</h4>
                        <p><b>{{ $order->debt ?? 0 }}</b></p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="line-head">Общая информация</h4>

        <form autocomplete="off" class="order-general-form" method="post" action="{{ route('admin.order.save', $order) }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Номер заказа:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    name="number"
                                    class="form-control"
                                    type="text"
                                    value="{{ $order->number}}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Администратор:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="manager_id">
                                @foreach ($employees as $employee)
                                    <option
                                            @if ($employee->id == $order->manager_id) selected @endif
                                    value="{{ $employee->id }}"
                                    >{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Исполняющий:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="executant_id">
                                @foreach ($employees as $employee)
                                    <option
                                            @if ($employee->id == $order->executant_id) selected @endif
                                    value="{{ $employee->id }}"
                                    >{{ $employee->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Клиент:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="buyer_id">
                                @foreach ($buyers as $buyer)
                                    <option
                                            @if ($buyer->id == $order->buyer_id) selected @endif
                                    value="{{ $buyer->id }}"
                                    >{{ $buyer->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Статус:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="status">
                                @foreach (\App\Classes\OrderStatus::lists() as $orderStatus)
                                    <option
                                            @if ($orderStatus == $order->status) selected @endif
                                    value="{{ $orderStatus }}"
                                    >{{ trans('order_status.' . $orderStatus) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Оплата:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="payment_type">
                                @foreach (\App\Classes\PaymentType::lists() as $paymentType)
                                    <option
                                            @if ($paymentType == $order->payment_type) selected @endif
                                    value="{{ $paymentType }}"
                                    >{{ trans('payment_type.' . $paymentType) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Статус оплаты:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="payment_status">
                                @foreach (\App\Classes\PaymentStatus::lists() as $paymentStatus)
                                    <option
                                            @if ($paymentStatus == $order->payment_status) selected @endif
                                    value="{{ $paymentStatus }}"
                                    >{{ trans('payment_status.' . $paymentStatus) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Соляная пещера:</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" name="salt_cave_id">
                                @foreach ($saltCaves as $saltCave)
                                    <option
                                            @if ($saltCave->id == $order->salt_cave_id) selected @endif
                                    value="{{ $saltCave->id }}"
                                    >{{ $saltCave->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="line-head">Сроки</h4>

            <div class="row">
                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Дата начала:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    name="begin_at"
                                    class="form-control"
                                    type="text"
                                    value="{{ $order->begin_at ? $order->begin_at->format('d.m.Y') : '' }}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Количество сеансов:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    name="amount_sessions"
                                    class="form-control"
                                    type="text"
                                    value="{{ $order->amount_sessions }}">
                        </div>
                    </div>
                </div>

                <div class="column col-md-6">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Дата окончания:</label>
                        </div>
                        <div class="col-md-8">
                            <input
                                    name="end_at"
                                    class="form-control"
                                    type="text"
                                    value="{{ $order->end_at ? $order->end_at->format('d.m.Y') : '' }}">
                        </div>
                    </div>
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