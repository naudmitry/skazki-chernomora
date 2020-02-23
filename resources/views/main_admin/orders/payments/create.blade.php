@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Оплата',
        'page' => 'Проведение оплаты'
    ])

    <div class="row">
        <div class="col-md-6 payment-item">
            <div class="tile">
                <h4 class="line-head">Сведения об оплате</h4>

                <form autocomplete="off" class="payment-form" method="{{ $payment->id ? 'patch' : 'post' }}"
                      action="{{ $payment->id ? route('admin.orders.payments.update', $payment) : route('admin.orders.payments.store', $order) }}">

                    {{ csrf_field() }}
                    <input hidden name="buyer_id" value="{{ $buyer->id }}"/>

                    <div class="row">
                        <div class="column col-md-12">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label" for="amount">Сумма оплаты:</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="amount" name="amount" class="form-control" type="text" value="">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label" for="type">Тип оплаты:</label>
                                </div>
                                <div class="col-md-8">
                                    <select id="type" class="select2" name="type">
                                        @foreach (\App\Classes\PaymentType::lists() as $paymentType)
                                            <option
                                                    @if ($paymentType == $payment->type) selected @endif
                                                    value="{{ $paymentType }}"
                                            >{{ \App\Classes\PaymentType::$labels[$paymentType] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label" for="birthday">Задолженность:</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="birthday" name="birthday" class="form-control" type="text" readonly
                                           value="{{ $order->debt ?? '' }}">
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
    </div>
@endsection