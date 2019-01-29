@if ($paginator->hasPages())
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a class="prev" href="javascript:;"><span class="fa fa-angle-left" aria-hidden="true"></span></a></li>
        @else
            <li><a class="prev" href="{{ $paginator->previousPageUrl() }}"><span class="fa fa-angle-left" aria-hidden="true"></span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="javascript:;" class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a class="next" href="{{ $paginator->nextPageUrl() }}"><span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
        @else
            <li><a class="next" href="javascript:;"><span class="fa fa-angle-right" aria-hidden="true"></span></a></li>
        @endif
    </ul>
@endif
