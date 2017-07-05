@if ($paginator->hasPages())
    <div class="ui-page mt10" align="center" style="margin-left: 300px">
        <div class="ui-page-inner">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                    <a>{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="now_page">{{ $page }}</a>
                    @else
                       <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a>
        @else
            <a href="">下一页</a>
        @endif
        </div>
    </div>
@endif
