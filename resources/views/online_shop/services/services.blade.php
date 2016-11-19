@extends('online_shop.layouts.main_wide')

@section('page_Heading')
    Serviços
@stop

@section('section')

    <!-- Page Content -->
    <div class="container">
        <div class="row">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
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
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Services Panels</h2>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>MANUTENÇÃO</h4>
                        <p>Fazemos toda a manutenção do seu veículo conforme as especificações
                          do fabricante, de forma a manter o seu carro seguro e fiável.
                          Mudança de óleo, travões, correias de distribuição, pneus, entre outros.
                          Usamos óleos e peças de qualidade de forma a assegurar a fiabilidade e
                          longevidade da sua viatura.</p>
                          <p>Levamos o seu carro à Inspecção Periódica Obrigatória, sem lhe causar transtorno.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>REPARAÇÃO</h4>
                        <p>Qualquer avaria, seja ela mecânica ou eléctrica, será reparada por nós, garantindo um resultado eficaz e duradouro. Turbos, bombas injectoras,  EGRs, filtros de partículas, imobilizadores, centralinas, são uns dos problemas mais frequentes hoje em dia. Todos serão resolvidos por nós, garantindo a sua resolução.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>RESTAURO</h4>
                        <p>Tem um veículo clássico ou pré-clássico e gostaria de o ver com todo o seu esplendor?
                        <p>Somos a solução!</p>
                        <p>Fazemos restauros de A a Z ou fazemos apenas o necessário para manter a melhor qualidade num veículo “sobrevivente” mantendo assim ao máximo o seu estado original.
                        </p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.container -->

@stop
