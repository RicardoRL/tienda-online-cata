<div class="pages">
  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
    <ul class="pagination">
      @isset($set)
        @if($set["paginator"]->lastPage() <= $set["limit_blocks"])
          @for($i = $set["start"]; $i<= $set["end"]; $i++)
            <li class="page-item">
              <a href='/tienda?block={{$set["block"]}}&page={{$set["paginator"]->currentPage()}}'
                class="page-link">{{$i}}
              </a>
            </li>
          @endfor
        @else
          <li class="page-item">
            @if($set["block"] == 1)
              <a href="#" aria-label="Previous" class="page-link">
            @else
              <a href='/tienda?block={{$set["block"]-1}}&page={{$set["start"]-1}}' aria-label="Previous" class="page-link">
            @endif
              <span aria-hidden="true">«</span>
              <span class="sr-only">Atrás</span>
            </a>
          </li>
          @for($i=$set["start"]; $i<=$set["end"]; $i++)
            @if($set["paginator"]->currentPage() == $i)
              <li class="page-item active">
            @else
              <li class="page-item">
            @endif
              <a href='/tienda?block={{$set["block"]}}&page={{$i}}' class="page-link">{{$i}}
              </a>
            </li>
          @endfor
          <li class="page-item">
            @if($set["block"] == $set["limit_blocks"])
              <a href="#" aria-label="Next" class="page-link">
            @else
              <a href='/tienda?block={{$set["block"]+1}}&page={{$set["end"]+1}}' aria-label="Next" class="page-link">
            @endif
              <span aria-hidden="true">»</span>
              <span class="sr-only">Siguiente</span>
            </a>
          </li>
        @endif
      @endisset
    </ul>
  </nav>
</div>