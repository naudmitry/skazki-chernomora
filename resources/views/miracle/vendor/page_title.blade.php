<div class="page-title-container" @if ($link) style="background: url({{ $link }})" @endif>
    <div class="page-title">
        <div class="container">
            <h1 @if ($color) style="color: {{ $color }}" @endif class="entry-title">{{ $title }}</h1>
        </div>
    </div>
</div>