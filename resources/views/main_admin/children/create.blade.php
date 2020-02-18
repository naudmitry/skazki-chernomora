@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Дети',
        'page' => 'Редактирование сведений о ребенке'
    ])

    <div class="row">
        <div class="col-md-12 child-item">
            <div class="tile">
                <h4 class="line-head">Сведения о ребенке</h4>

                <form autocomplete="off" class="children-form" method="{{ $child->id ? 'patch' : 'post' }}"
                      action="{{ $child->id ? route('admin.children.update', $child) : route('admin.children.store') }}">

                    {{ csrf_field() }}
                    <input hidden name="buyer_id" value="{{ $buyer->id }}"/>

                    <div class="row">
                        <div class="column col-md-6">
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