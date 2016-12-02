@extends('online_shop.layouts.main_wide')

@section('head_section')
<meta name="description" content="{{ $article->description }}">
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
  {{$article->name}}
    <small>{{$article->reference}}</small>
@stop


@section('section')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li> <h6>Código:{{ $article->getCode() }}</h6> </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-12">
                <p> {{$article->description}}</p>
                <div class="text-right">
                  <div class="price-tag">
                      {{ $article->getPrice() }}
                  </div>
                </div>
            </div>


            <div class="col-md-12">
                @if ( count($articlePictures) )
                  <h4>Fotografias</h4>
                    <hr>

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
