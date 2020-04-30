<div class="pages">
    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            @isset($set)
                @if($set["paginator"]->lastPage() <= $set["limit"])
                    @for($i = $set["start"]; $i<= $set["end"]; $i++)
                        <li class="page-item">
                            <a href='/tienda?page={{$set["paginator"]->currentPage()}}&block={{$set["block"]}}'
                               class="page-link">{{$i}}
                            </a>
                        </li>
                    @endfor
                @else
                <li class="page-item">
                    @if($set["block"] == 1)
                        <a href="#" aria-label="Previous" class="page-link">
                    @else
                        <a href='/tienda?page={{$set["start"]-1}}&block={{$set["block"]-1}}' aria-label="Previous" class="page-link">
                    @endif
                        <span aria-hidden="true">«</span>
                        <span class="sr-only">Atrás</span>
                    </a>
                </li>
                @for($i=$set["start"]; $i<=$set["end"]; $i++)
                    <li class="page-item">
                        <a href='/tienda?page={{$i}}&block={{$set["block"]}}' class="page-link">{{$i}}
                        </a>
                    </li>
                @endfor
                <li class="page-item">
                    @if($set["block"] == $set["limit"])
                        <a href="#" aria-label="Next" class="page-link">
                    @else
                        <a href='/tienda?page={{$set["end"]+1}}&block={{$set["block"]+1}}' aria-label="Next" class="page-link">
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