@extends('medic.layouts.master')

@section('header__meta')
    <meta name="description" content="{{ $staticPage->meta_description ?? '' }}"/>
    <meta name="keywords" content="{{ $staticPage->meta_keywords ?? '' }}"/>
    <title>{{ $staticPage->meta_title ?: 'Новости' }} {{ ($faqs->currentPage() > 1) ? 'Страница' . $faqs->currentPage() : ''  }}</title>

    <link rel="page" data="{{ $faqs->currentPage() }}">

    @if ($faqs->hasPages())
        @if (!$faqs->onFirstPage())
            <link rel="prev" href="{{ $faqs->previousPageUrl() }}">
        @endif
        @if ($faqs->hasMorePages())
            <link rel="next" href="{{ $faqs->nextPageUrl() }}">
        @endif
    @endif
@endsection

@section('content')
    @include('medic.vendor.navigation', [
        'page' => $staticPage->breadcrumbs ?? 'Вопросы и ответы',
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
                                    <p>{{ $faq->trim(300) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('medic.faq.right_side')
            </div>

            <div class="styled-pagination">
                {{ $faqs->links('medic.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
