@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Оплата',
        'page' => 'Проведение оплаты'
    ])

    <div class="row">
        <div class="col-md-6 child-item">
            <div class="tile">
                <h4 class="line-head">Сведения об оплате</h4>

                <form autocomplete="off" class="payment-form" method="{{ $payment->id ? 'patch' : 'post' }}"
                      action="{{ $payment->id ? route('admin.children.update', $payment) : route('admin.children.store') }}">

                    {{ csrf_field() }}
                    <input hidden name="buyer_id" value="{{ $buyer->id }}"/>

                    <div class="row">
                        <div class="column col-md-12">
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label class="control-label" for="fullName">Полное имя:</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="fullName" name="full_name" class="form-control" type="text"
                                           value="{{ $child->full_name ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label" for="birthday">Дата рождения:</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="birthday" name="birthday" class="form-control" type="text"
                                           value="{{ $child->birthday ? $child->birthday->format('d.m.Y') : '' }}">
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