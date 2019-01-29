@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $faq->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $faq->meta_keywords ?? '' }}"/>
    <title>{{ $faq->meta_title ?? 'Новости' }}</title>
@endsection

@section('content')
    @include('medic.vendor.navigation', [
        'page' => 'Вопросы и ответы',
    ])

    <section class="blog-section section style-four style-five">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        <div class="item-holder">
                            <div class="content-text">
                                <a href="javascript:;">
                                    <h5>{{ $faq->name }}</h5>
                                </a>
                                <span>{{ $faq->updater->full_name }} / {{ $faq->updated_at->format('d-m-Y H:i') }}</span>
                                <p>{{ $faq->answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @include('medic.faq.right_side')
            </div>
        </div>
    </section>
@endsection
