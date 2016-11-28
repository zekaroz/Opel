@extends('online_shop.layouts.main_wide')

@section('head_section')
  <meta name="description" content="Acerca da PcQar.">
  <title>Não encontramos o que procura</title>
@stop

@section('page_Heading')
    Não encontramos o que procura
@stop

@section('section')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="/">Entrada</a>
                    </li>
                    <li class="active">Não encontramos o que procura</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
    <div class="row">
      Não conseguimos encontar a página que procura.
      De qualquer forma pesquise no nosso portal seleccionando uma das três categorias abaixo.
    </div>
        <!-- Intro Content -->
        <div class="row">
            <h3>O que pretente encontrar?</h3>
            <div class="col-sd-3 col-md-3 top-buffer" >
              <a href="/pecas" class="list-group-item {{ Request::path() == 'pecas' ? 'page-selected' : '' }}">
                  <i class="fa fa-cogs "></i>
                  <span>
                       Peças recicladas
                  </span>
                  <br/>
                  <small>Procure dezenas de peças para toda a variedade de veículos.</small>
              </a>
            </div>
            <div class="col-sd-3 col-md-3 top-buffer" >
              <a href="/carros" class="list-group-item {{ Request::path() == 'carros' ? 'page-selected' : '' }}">
                  <i class="fa fa-car"></i>
                  <span>
                      Veículos usados
                  </span><br/>
                  <small>Encontre aqui veículos em boas condições a preços bastante acessíveis. Estão prontos a arrancar.</small>
              </a>
            </div>
            <div class="col-md-3 col-md-3 top-buffer" >
              <a href="/carros_para_pecas" class="list-group-item {{ Request::path() == 'carros_para_pecas' ? 'page-selected' : '' }}">
                  <i class="fa fa-wrench"></i>
                  <span>
                      Veículos para Peças
                  </span><br/>
                  <small>Viaturas que já não andam ou não estão em condições para tal. O seu valor reside nos seus acessórios e componentes, fale conosco se tiver interesse.</small>
              </a>
            </div>
        </div>
        <!-- /.row -->
@stop
