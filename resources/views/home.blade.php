@extends('layouts.dashboard')

@section('body')
<div class="container spark-screen" style="margin-top: 80px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                   @if (Auth::guest())
                        <div class="panel-heading">Bem Vindo à ReciOpel</div>
                        <div class="panel-body">
                            Bem vindo à loja onde encontra tudo relacionado com a marca Opel. 
                            <br>
                            Ainda não está autenticado, pode fazer <a href="{{ url('/login') }}">login aqui</a>                        
                        </div>
                       @else
                            @include('partials._homepage', ['username' => Auth::user()->name
                                                           , 'articleCount' => $articleCount 
                                                           , 'partTypeCount' => $partTypeCount
                                                           , 'brandsCount' => $brandsCount 
                                                           , 'modelCount' => $modelCount ])
                       @endif
            </div>
        </div>
    </div>
</div>
@endsection
