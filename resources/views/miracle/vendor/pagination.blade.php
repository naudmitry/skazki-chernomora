@if ($paginator->hasPages())
    <div class="post-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="javascript:;" class="nav-prev disabled"></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="nav-prev"></a>
        @endif

        <div class="page-links">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" data-page-num="{{ $page }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="nav-next"></a>
        @else
            <a href="javascript:;" class="nav-next disabled"></a>
        @endif
    </div>
@endif
