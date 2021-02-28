<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

    @if($posts->currentPage() > 1 )
            <li class="page-item"><li class="page-item"><a class="page-link" class="page-link" href="{{ $posts->previousPageUrl() }}"> Prev </a></li>
    @endif


    @foreach($posts->getUrlRange($posts->currentPage()-1 , $posts->currentPage()+1) as $num => $link)
        @if($loop->first && $num >= 2)
                <li class="page-item"><li class="page-item"><a class="page-link" class="page-link" href="{{ $posts->url(1) }}"> {{ 1 }} </a></li>
        @endif

        @if($num >= 3 && $loop->first)
                <li class="page-item"> ... </li>
        @endif


        @if($num > 0 && $num <= $posts->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $link }}"> {{ $num }} </a>
        @endif


        @if($num == 2 && $loop->last)
            <li class="page-item"><a class="page-link" href="{{ $posts->url($posts->currentPage() + 2) }}"> {{ $posts->currentPage() + 2 }} </a>
        @endif

        @if($num+1 < $posts->lastPage() && $loop->last)
                <li class="page-item"> ... </li>
        @endif

        @if($loop->last && $num < $posts->lastPage())
            <li class="page-item"><a class="page-link" href="{{ $posts->url($posts->lastPage()) }}"> {{ $posts->lastPage()}} </a>
        @endif

    @endforeach
    @if($posts->currentPage() !== $posts->lastPage())
        <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}"> Next </a>
    @endif
    </ul>
</nav>

