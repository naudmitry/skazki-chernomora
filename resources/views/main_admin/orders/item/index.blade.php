@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Абонементы',
        'page' => 'Основная информация'
    ])

    @php $tabs = [] @endphp
    @php $tabs[] = ['name' => 'general', 'title' => 'Общая информация', 'view' => 'general'] @endphp

    @if ($order->id)
        @php $tabs[] = ['name' => 'family', 'title' => 'Семья', 'view' => 'family'] @endphp
        @php $tabs[] = ['name' => 'history', 'title' => 'Посещения', 'view' => 'history'] @endphp
        @php $tabs[] = ['name' => 'payments', 'title' => 'Оплата', 'view' => 'payments'] @endphp
    @endif

    <div class="row user order-item">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    @foreach($tabs as $tab)
                        <li class="nav-item">
                            <a class="nav-link{{ $loop->first ? ' active' : '' }}" href="#{{ $tab['name'] }}"
                               data-toggle="tab">{{ $tab['title'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @foreach($tabs as $tab)
                    @include('main_admin.orders.item.tabs.' . $tab['view'])
                @endforeach
            </div>
        </div>
    </div>

    <div class="div-for-modal"></div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection