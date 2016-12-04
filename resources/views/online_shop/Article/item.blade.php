@extends('online_shop.layouts.main_wide')

@section('head_section')
<meta name="description" content="{{ $article->description }} - Serviços Auto - PCQAR.PT">
<title>{{$article->name}}</title>
@stop

@section('topSection')
  @if( isset( $lastRouteName )  )
    <div class="text-left">
      <a href="{{ route($lastRouteName) }}" class="btn btn-primary">
        <i class="fa fa-search"></i>
         {{ 'Voltar a '.$lastRouteLabel }}
      </a>
    </div>
  @endif
@stop

@section('page_Heading')
    <div id="Article_Name" class="">
      {{$article->name}}
    </div>
    <small>{{$article->reference}}</small>
    <hr>
@stop


@section('section')
    <div class="container">
        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-12">
                <p> {{$article->description}}</p>
                <div class="text-right">
                  <div id="{{ $article->hasPrice() ? 'Article_Price' : 'NoPrice' }}" class="price-tag">
                      {{ $article->getPrice() }}
                  </div>
                </div>
                <div class="text-left">
                  <div class="codigo-artigo">
                    <label>Código de Artigo</label>
                    <h4>{{ $article->getCode() }}</h4>
                  </div>
                </div>
            </div>

          <hr>
          <div class="col-md-12">
              @if ( count($articlePictures) )
                <h4>Fotografias</h4>
                <div class="panel-body">
                    @include('fileentries.listPictures', ['pictures' => $articlePictures
                                                         ,'showOnly' => true
                                                         ,'altText'  => $article->name])
                  </div>
              @endif
        </div>
    </div>
        <!-- /.row -->


@stop
