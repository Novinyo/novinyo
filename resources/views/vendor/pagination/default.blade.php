@if ($paginator->hasPages())
    <div class="pagination-wrapper">
      <nav class="pagination is-centered">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous" disabled>&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev">&laquo;</a>
        @endif
        <ul class="pagination-list">
          {{-- Pagination Elements --}}
          @foreach ($elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li><span class="pagination-ellipsis">&hellip;</span></li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $paginator->currentPage())
                          <li>
                            <a class="pagination-link is-current">{{ $page }}</a>
                          </li>
                      @else
                          <li><a href="{{ $url }}">{{ $page }}</a></li>
                      @endif
                  @endforeach
              @endif
          @endforeach
        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" rel="next">&raquo;</a>
        @else
            <a class="pagination-next disabled"><span>&raquo;</span></a>
        @endif
      </nav>
    </div>
@endif
