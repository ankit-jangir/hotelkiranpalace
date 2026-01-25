@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $pagesToShow = [];
            
            if ($lastPage <= 4) {
                // If 4 or fewer pages, show all
                $pagesToShow = range(1, $lastPage);
            } elseif ($currentPage == 1) {
                // On first page: show 1, 2, and last
                $pagesToShow = [1, 2, $lastPage];
            } elseif ($currentPage == $lastPage) {
                // On last page: show first, second-to-last, and last
                $pagesToShow = [1, $lastPage - 1, $lastPage];
            } elseif ($currentPage == 2) {
                // On second page: show 1, 2, 3, and last
                $pagesToShow = [1, 2, 3, $lastPage];
            } elseif ($currentPage == $lastPage - 1) {
                // On second-to-last page: show first, current-1, current, and last
                $pagesToShow = [1, $currentPage - 1, $currentPage, $lastPage];
            } else {
                // On middle pages: show first, current-1, current, current+1, and last
                $pagesToShow = [1, $currentPage - 1, $currentPage, $currentPage + 1, $lastPage];
            }
            
            // Remove duplicates and sort
            $pagesToShow = array_unique($pagesToShow);
            sort($pagesToShow);
        @endphp

        @foreach ($pagesToShow as $index => $page)
            @if ($index > 0 && $page - $pagesToShow[$index - 1] > 1)
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">...</span>
                </li>
            @endif
            
            @if ($page == $currentPage)
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
