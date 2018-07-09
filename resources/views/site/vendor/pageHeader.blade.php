<section class="page-title text-center" style="background-image:url({{ url('/images/background/3.jpg') }});">
    <div class="container">
        <div class="title-text">
            <h1>{{ $page }}</h1>
            <ul class="title-menu clearfix">
                <li>
                    <a href="{{ route('front.index') }}">Главная &nbsp;/</a>
                </li>
                <li style="text-transform: none;">{{ $page }}</li>
            </ul>
        </div>
    </div>
</section>