@extends('site.layouts.master')

@section('content')
    @include('site.vendor.pageHeader', [
        'page' => 'FAQ',
    ])

    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @foreach ($faqs as $faq)
                            <div class="item-holder">
                                <div class="content-text">
                                    <a href="{{ $faq->getShowcaseUrl() }}">
                                        <h6>{{ $faq->name }}</h6>
                                    </a>
                                    <span>{{ $faq->author->surname }} {{ $faq->author->name }} / {{ $faq->updated_at }}</span>
                                    <p>{{ $faq->reduction($faq->answer, 300) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('site.faq.right_side')
            </div>

            <div class="styled-pagination">
                {{ $faqs->links('site.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
