@if ($paginator->hasPages())
    <div class="pagination-container">
        <p class="pagination">
            {{-- Előző link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-disabled"><span><i class="bi bi-caret-left-fill"></i></span></span>
            @else
                <span><a href="{{ $paginator->previousPageUrl() }}" rel="pagination-prev"><i class="bi bi-caret-left-fill"></i></a></span>
            @endif

            {{-- Oldalszámok --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-disabled"><span>{{ $element }}</span></span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination-active"><span>{{ $page }}</span></span>
                        @else
                            <span><a href="{{ $url }}">{{ $page }}</a></span>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Következő link --}}
            @if ($paginator->hasMorePages())
                <span><a href="{{ $paginator->nextPageUrl() }}" rel="pagination-next"><i class="bi bi-caret-right-fill"></i></a></span>
            @else
                <span class="pagination-disabled"><span><i class="bi bi-caret-right-fill"></i></span></span>
            @endif
        </p>
    </div>
@endif
