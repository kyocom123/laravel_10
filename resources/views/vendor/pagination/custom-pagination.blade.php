@if ($paginator->hasPages())
<nav aria-label="{{ __('Pagination Navigation') }}">
    <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium font-weight-bold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium font-weight-bold">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium font-weight-bold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </div>
        </div>

        <div class="col-lg-6">
            <ul class="pagination pagination-info justify-content-center justify-content-lg-end">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">
                            <span aria-hidden="true"><i class="ni ni-bold-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                            <span aria-hidden="true"><i class="ni ni-bold-left" aria-hidden="true"></i></span>
                        </a>
                    </li>
                @endif

                @if($paginator->currentPage() > 3)
                    <li class="page-item hidden-xs"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @endif

                @if($paginator->currentPage() > 4)
                    <li class="page-item"><a class="page-link" href="javascript:;">...</a></li>
                @endif

                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="javascript:;">{{ $i }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endif
                @endforeach

                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li class="page-item"><a class="page-link" href="javascript:;">...</a></li>
                @endif

                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="page-item hidden-xs"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true"><i class="ni ni-bold-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="javascript:;">
                            <span aria-hidden="true"><i class="ni ni-bold-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>   
</nav>
@endif