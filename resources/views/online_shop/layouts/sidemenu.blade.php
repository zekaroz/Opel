<p class="lead">A nossa Oferta:</p>
<div class="list-group">
    <a href="/pesquisa/P" class="list-group-item {{ Request::path() == 'pecas' ? 'page-selected' : '' }}">
        <i class="fa fa-cogs "></i>
        <span>
             Peças recicladas
        </span>
    </a>
    <a href="/pesquisa/C" class="list-group-item {{ Request::path() == 'carros' ? 'page-selected' : '' }}">
        <i class="fa fa-car"></i>
        <span>
            Veículos usados
        </span>
    </a>
    <a href="/pesquisa/VP" class="list-group-item {{ Request::path() == 'carros_para_pecas' ? 'page-selected' : '' }}">
        <i class="fa fa-wrench"></i>
        <span>
            Veículos para Peças
        </span>
    </a>

</div>
