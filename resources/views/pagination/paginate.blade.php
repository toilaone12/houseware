<div class="store-filter clearfix">
    <ul class="store-pagination">
        @if (!$paginator->onFirstPage())
        <li><a href="{{ $paginator->url(1) }}&id={{$id}}"><i class="fa fa-angle-left"></i></a></li>
        @endif
        @foreach ($elements as $element)

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="active"><a href="#" class="text-white">{{ $page }}</a></li>
        @else
        <li><a href="{{ $url }}&id={{$id}}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}&id={{$id}}"><i class="fa fa-angle-right"></i></a></li>
        @endif
    </ul>
</div>
