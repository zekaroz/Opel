@extends('online_shop.layouts.main_wide')

@section('head_section')
  <meta name="description" content="Serviços Auto de qualidade.">
  <title>PcQar - Serviços</title>
@stop



@section('page_Heading')
    Serviços
@stop

@section('section')

    <!-- Page Content -->
    <div class="container">
        <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Entrada</a>
                    </li>
                    <li class="active">Serviços</li>
                </ol>
            </div>

        <!-- /.row -->

        <!-- Image Header -->
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="Services.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->

        <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center services">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Manutenção</h4>
                        <p>Fazemos toda a manutenção do seu veículo conforme as especificações
                          do fabricante, de forma a manter o seu carro seguro e fiável.
                          Mudança de óleo, travões, correias de distribuição, pneus, entre outros.
                          Usamos óleos e peças de qualidade de forma a assegurar a fiabilidade e
                          longevidade da sua viatura.</p>
                          <p>Levamos o seu carro à Inspecção Periódica Obrigatória, sem lhe causar transtorno.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center services">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-wrench fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Reparação</h4>
                        <p>Qualquer avaria, seja ela mecânica ou eléctrica, será reparada por nós, garantindo um resultado eficaz e duradouro. Turbos, bombas injectoras,  EGRs, filtros de partículas, imobilizadores, centralinas, são uns dos problemas mais frequentes hoje em dia. Todos serão resolvidos por nós, garantindo a sua resolução.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center services">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-eur fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Venda o seu carro</h4>
                        <p>Quer vender o seu carro e não sabe como ou não tem tempo?</p>
                        <p>Fale connosco. Avaliamos o seu carro, colocamos à venda, negociamos
                          pelo melhor valor e tratamos de toda a documentação.
                          Sem se preocupar ou perder tempo…</p>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center services">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Restauro</h4>
                        <p>Tem um veículo clássico ou pré-clássico e gostaria de o ver com todo o seu esplendor?
                        <p>Somos a solução!</p>
                        <p>Fazemos restauros de A a Z ou fazemos apenas o necessário para manter a melhor qualidade num veículo “sobrevivente” mantendo assim ao máximo o seu estado original.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
  <hr>
    </div>
    <!-- /.container -->

@stop
