@extends('main_admin.layouts.master')

@section('body-data') data-page="seo-integrations" @endsection

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Настройки',
        'page' => 'SEO & интеграция'
    ])

    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#robots" data-toggle="tab">
                            Robots
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#verification" data-toggle="tab">
                            Validation
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                @include('main_admin.seo_integrations.robots.index')
                @include('main_admin.seo_integrations.verification.index')
            </div>
        </div>
    </div>
@endsection
