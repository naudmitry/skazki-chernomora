@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'page' => 'Панель управления',
        'description' => 'A free and modular admin template'
    ])

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Features</h3>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Compatibility with frameworks</h3>
                <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to it's modular nature it's very easy to incorporate it into any front-end or back-end framework like Angular, React or Laravel.</p>
                <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more details about integrating this theme with various frameworks.</p>
                <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want to contribute to this theme pull requests are always welcome.</p>
            </div>
        </div>
    </div>
@endsection
