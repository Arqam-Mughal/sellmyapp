@if ($paginator->hasPages()) 
<div class="sma-pagination" id="pagination-container" >

        @if (!$paginator->onFirstPage()) 

          <a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" data-page="1"><span class="ic ic-caret-left"></span></a>

        @endif 
  
        @foreach ($elements as $element) 
        @if (is_string($element)) 
        <li class="page-item disabled">{{ $element }}</li> 
        @endif 
  
        @if (is_array($element)) 
        @foreach ($element as $page => $url) 
        @if ($page == $paginator->currentPage()) 
        
        <span aria-current="page" class="page-numbers current">{{ $page }}</span>

        @else
 
        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>

        @endif 
        @endforeach 
        @endif 
        @endforeach 
  
        @if ($paginator->hasMorePages()) 

        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" data-page="3">Next <span class="ic ic-caret-right"></span></a>

        @endif 
    
    </div>
    @endif 