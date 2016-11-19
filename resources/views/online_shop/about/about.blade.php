@extends('online_shop.layouts.main_wide')

@section('page_Heading')
    Quem Somos
    <small>PcQar</small>
@stop

@section('section')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="/">Entrada</a>
                    </li>
                    <li class="active">Quem somos</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6" >
                <img class="img-responsive" src="Motor.jpg" alt="">
            </div>
            <div class="col-md-6">
                <p>A PcQar dedica-se ao recondicionamento de peças e veículos usados.
                  Prima pela honestidade e pela satisfação dos clientes.
                  Trabalhamos com todos o tipo de marcas, mas somos especialistas nas marcas Alemãs,
                  Japonesas e Norte Americanas. </p>

                   <div class="container content">
                       <div class="row">
                           <div class="col-md-6" style="padding:0px;">
                               <div class="testimonials">
                               	<div class="active item">
                                     <blockquote>A nossa missão é oferecer uma vasta
                                     opção de peças usadas de qualidade e colocar no mercado veículos
                                      usados revistos e fiáveis.
                                      <div class="carousel-info">
                                        <div class="pull-left">
                                          <span class="testimonials-name">Pedro Queirós</span>
                                          <span class="testimonials-post">CEO</span>
                                        </div>
                                      </div>
                                    </blockquote>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

            </div>
        </div>
        <!-- /.row -->
@stop
