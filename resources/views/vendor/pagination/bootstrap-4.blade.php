<h3 class="heading uk-text-center">
	Mira más Noticias
</h3>

@if ($paginator->hasPages())
        <ul class="pagination uk-flex-center" uk-margin>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="pagination-item" aria-label="@lang('pagination.previous')">
                    <a class="uk-link-muted" href="#">
                        Previous
                    </a>
                </li> --}}
            @else
                <li class="pagination-item" aria-label="@lang('pagination.previous')">
                    <a class="uk-link-muted" href="{{ $paginator->previousPageUrl() }}" >
                        <span uk-pagination-previous></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a class="uk-link-muted" href="">{{ $element }}</a></li> 
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination-item pg-active">
                                <a class="uk-link-muted" href=""><span style="color:#43A1C4; font-weight: bold;">{{ $page }}</span></a>
                            </li>
                        @else
                            <li class="pagination-item pg-active">
                                <a class="uk-link-muted" href="{{ $url }}"><span>{{ $page }}</span></a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item" aria-label="@lang('pagination.next')">
                    <a class="uk-link-muted" href="{{ $paginator->nextPageUrl() }}">
                        <span uk-pagination-next></span>
                    </a>
                </li>
            {{-- @else
                <li class="pagination-item" aria-label="@lang('pagination.next')">
                    <a class="uk-link-muted" href="#">
                        Next
                    </a>
                </li> --}}
            @endif
        </ul>
@endif
