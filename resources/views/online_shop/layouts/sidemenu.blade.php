<p class="lead">A nossa Oferta:</p>
<div class="list-group">
    <a href="/pecas" class="list-group-item {{ Request::path() == 'pecas' ? 'page-selected' : '' }}">
        <i class="fa fa-cogs "></i>
        <span>
             Peças recicladas
        </span>
    </a>
    <a href="/carros" class="list-group-item {{ Request::path() == 'carros' ? 'page-selected' : '' }}">
        <i class="fa fa-car"></i>
        <span>
            Veículos usados
        </span>
    </a>
    <a href="/carros_para_pecas" class="list-group-item {{ Request::path() == 'carros_para_pecas' ? 'page-selected' : '' }}">
        <i class="fa fa-wrench"></i>
        <span>
            Veículos para Peças
        </span>
    </a>

</div>
