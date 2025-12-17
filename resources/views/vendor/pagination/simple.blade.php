@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Назад</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">Назад</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Вперед</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Вперед</span>
                </li>
            @endif
        </ul>

        <p class="text-center small text-muted mt-2">
            Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}
        </p>
    </nav>
@endif
