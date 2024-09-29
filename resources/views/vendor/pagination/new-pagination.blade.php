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
                <li><a href="#" class="disabled">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @php
                    $pageLimit = 2; // Número de páginas visibles a cada lado de la página actual
                @endphp

                @foreach ($element as $page => $url)
                    @if ($page == 1 || $page == $paginator->lastPage() ||
                        ($page >= $paginator->currentPage() - $pageLimit && $page <= $paginator->currentPage() + $pageLimit))

                        @if ($page == $paginator->currentPage())
                            <li><a href="#" class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @elseif ($page == 2 || $page == $paginator->lastPage() - 1)
                        {{-- Mostrar separadores "..." --}}
                        <li><a href="#" class="disabled">...</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}} 
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li><a href="#" class="disabled">Next</a></li>
        @endif
    </ul>
@endif
