@if ($paginator->hasPages())
    <div class="pagination-bar">
        @if ($paginator->onFirstPage())
            <span class="page-link disabled">&laquo; Prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">&laquo; Prev</a>
        @endif

        <span class="page-info">Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">Next &raquo;</a>
        @else
            <span class="page-link disabled">Next &raquo;</span>
        @endif
    </div>
@endif
