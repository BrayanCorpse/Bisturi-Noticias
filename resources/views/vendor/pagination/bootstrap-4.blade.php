@if ($paginator->hasPages())
        <ul class="uk-pagination uk-flex-center" uk-margin>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-label="@lang('pagination.previous')">
                    <a href="#">
                    </a>
                </li>
            @else
                <li aria-label="@lang('pagination.previous')">
                    <a href="{{ $paginator->previousPageUrl() }}" >
                        <span uk-pagination-previous></span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><a href="">{{ $element }}</a></li> 
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="uk-active">
                                <a href=""><span>{{ $page }}</span></a>
                            </li>
                        @else
                            <li class="uk-active">
                                <a href="{{ $url }}"><span>{{ $page }}</span></a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li aria-label="@lang('pagination.next')">
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span uk-pagination-next></span>
                    </a>
                </li>
            @else
                <li aria-label="@lang('pagination.next')">
                    <a href="#">
                        
                    </a>
                </li>
            @endif
        </ul>
@endif
