@extends('main_theme.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $currentCategory->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $currentCategory->meta_keywords ?? '' }}"/>
    <title>{{ $currentCategory->meta_title ?? 'Категория' }}</title>
@endsection

@section('content')
    @include('main_theme.vendor.navigation', [
        'page' => 'Вопросы и ответы',
    ])

    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @foreach ($faqs as $faq)
                            <div class="item-holder">
                                <div class="content-text">
                                    <a href="{{ $faq->getRoute() }}">
                                        <h6>{{ $faq->name }}</h6>
                                    </a>
                                    <span>{{ $faq->updater->full_name }} / {{ $faq->updated_at->format('d-m-Y H:i') }}</span>
                                    <p>{{ $faq->reduction($faq->answer, 300) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('main_theme.faq.right_side')
            </div>

            <div class="styled-pagination">
                {{ $faqs->links('main_theme.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
