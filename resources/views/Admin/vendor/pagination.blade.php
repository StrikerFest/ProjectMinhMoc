<nav aria-label="Page navigation example">
    @if($paginator->hasPages())
        <ul class="pagination">

            @if($paginator->onFirstPage())
                <li class="page-item"><a class="page-link" href="javascript:;">Previous</a></li>
            @else
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">←
                        Previous</a></li>
            @endif



            @foreach($elements as $element)

                @if(is_string($element))
                    <li class="page-item"><a class="page-link" href="javascript:;">{{ $element }}</a></li>
                @endif



                @if(is_array($element))
                    @foreach($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link" href="javascript:;">{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if($paginator->hasMorePages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next
                        →</a></li>
            @else
                <li class="page-item"><a class="page-link" href="javascript:;">Next</a>
            @endif
        </ul>
    @endif
</nav>
