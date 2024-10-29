<div class="cars-pagination">
    @if ($cars->lastPage() > 1)
        @if ($cars->currentPage() != 1)
            <a href="#" class="prev-btn" data-page="{{ $cars->currentPage() - 1 }}">
                <button><i class="fa-solid fa-chevron-left"></i></button>
            </a>
        @else
            <span class="prev-btn hidden">
                <button><i class="fa-solid fa-chevron-left"></i></button>
            </span>
        @endif
        @for ($i = 1; $i <= $cars->lastPage(); $i++)
            <a href="#" class="pagination-pages {{ ($cars->currentPage() == $i) ? 'pg-active' : '' }}" data-page="{{ $i }}">
                <button>{{ $i }}</button>
            </a>
        @endfor
        @if ($cars->currentPage() != $cars->lastPage())
            <a href="#" class="next-btn" data-page="{{ $cars->currentPage() + 1 }}">
                <button><i class="fa-solid fa-chevron-right"></i></button>
            </a>
        @else
            <span class="next-btn hidden">
                <button><i class="fa-solid fa-chevron-right"></i></button>
            </span>
        @endif
    @endif
</div>
