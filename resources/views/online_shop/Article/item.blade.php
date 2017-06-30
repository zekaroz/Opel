@extends('online_shop.layouts.main_wide')

@section('head_section')
<meta name="description" content="{{ $article->description }}">
<title>{{$article->name}} - Serviços Auto - PCQAR.PT</title>
@stop

@section('topSection')
  @if( isset( $lastRouteURL )  )
    <div class="text-left">
      <a href="{{ $lastRouteURL  }}" class="btn btn-primary">
        <i class="fa fa-search"></i>
         {{ 'Voltar a '.$lastRouteLabel }}
      </a>
    </div>
  @endif
@stop

@section('page_Heading')
    <div id="Article_Name" class="">
      <img src="{{ route('getArticleThumbnailURL', $article->id) }}" style="width:120px;" class="img-rounded" alt=""> {{$article->name}}
    </div>
    <small>{{$article->reference}}</small>
    <hr>
@stop


@section('section')
    <div class="container">
        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-8 minHeight article-description">
                <p> {{$article->description}}</p>
            </div>
            <fieldset class="pull-left col-md-3 col-xs-12" style="margin-bottom: 30px;">
              <legend>Informação do Artigo</legend>
              <div class="pull-left codigo-artigo col-md-11 col-sm-3 col-xs-11">
                <label>Código de Artigo</label>
                <h4>{{ $article->getCode() }}</h4>
              </div>
              <div class="pull-left codigo-artigo col-md-11 col-sm-3 col-xs-11">
                <label>Disponibilidade</label>
                @if( $article->isAvailable() )
                <div class="status-label font-big">
                  <i class="fa fa-circle Green" ></i>
                  Em Stock
                </div>
                @else
                <div class="status-label font-big">
                  <i class="fa fa-circle Red" ></i>
                  {{ $article->soldOutState() }}
                </div>
                @endif
              </div>
              <div class="pull-left text-center codigo-artigo col-md-11 col-sm-3 col-xs-11">
                <div id="{{ $article->hasPrice() ? 'Article_Price' : 'NoPrice' }}" class="price-tag">
                    {{ $article->getPrice() }}
                </div>
              </div>
            </fieldset>
        </div>
        <div class="row">
          <div class="col-md-12">
              @if ( count($articlePictures) )
                <fieldset>
                  <legend>Fotografias do Artigo</legend>
                  <div class="panel-body">
                      @include('fileentries.listPictures', ['pictures' => $articlePictures
                                                           ,'showOnly' => true
                                                           ,'altText'  => $article->name])
                    </div>
                </fieldset>
              @endif
        </div>
    </div>
        <!-- /.row -->


@stop
