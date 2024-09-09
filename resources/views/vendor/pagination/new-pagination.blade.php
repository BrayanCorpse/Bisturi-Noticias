@if ($paginator->hasPages())
    <ul class="new-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a href="#" class="disabled" hidden>Previous</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><a href="#">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a href="#" class="active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li><a href="#" class="disabled" hidden>Next</a></li>
        @endif
    </ul>
@endif
