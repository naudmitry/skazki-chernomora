@extends('miracle.layouts.master')

@section('slider')
    @include('miracle.vendor.breadcrumbs')
@endsection

@section('content')
    <div class="container">
        <div id="main">
            <div class="panel-group faqs" id="faqs">
                @foreach ($faqs as $faq)
                    <div class="panel">
                        <h3 class="panel-title">
                            <a class="collapsed" data-parent="#faqs" data-toggle="collapse" href="#faqs-{{ $loop->index }}"><span class="open-sub"></span>{{ $faq->name }}</a>
                        </h3>
                        <div class="panel-collapse collapse" id="faqs-{{ $loop->index }}">
                            <div class="panel-content">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection