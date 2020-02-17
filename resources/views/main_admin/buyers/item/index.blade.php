@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Клиенты',
        'page' => 'Настройка клиента'
    ])

    @php $tabs = [] @endphp
    @php $tabs[] =['name' => 'general', 'title' => 'Карточка клиента', 'view' => 'general'] @endphp
    @php $tabs[] =['name' => 'orders', 'title' => 'Абонементы', 'view' => 'orders'] @endphp
    @php $tabs[] =['name' => 'admins', 'title' => 'Администраторы', 'view' => 'admins'] @endphp
    @php $tabs[] =['name' => 'children', 'title' => 'Дети', 'view' => 'children'] @endphp

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    @foreach($tabs as $tab)
                        <li class="nav-item">
                            <a class="nav-link{{ $loop->first ? ' active' : '' }}" href="#{{ $tab['name'] }}" data-toggle="tab">
                                {{ $tab['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @foreach($tabs as $tab)
                    @include('main_admin.buyers.item.tabs.' . $tab['view'])
                @endforeach
            </div>
        </div>
    </div>

    <script type="text/template" class="loading-template">
        @include('main_admin.includes.loading')
    </script>
@endsection