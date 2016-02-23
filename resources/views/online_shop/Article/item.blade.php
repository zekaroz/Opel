@extends('online_shop.layouts.main')

@section('page_Heading')
    {{$article->name}}
@stop

 
@section('section')       
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li> 
                        <small>{{$article->reference}}</small>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-12">
                <h4>Descrição do Artigo</h4>
                <hr>
                <p> {{$article->description}}</p>
            </div>
            <div class="col-md-12">
                <h4>Fotografias</h4>
                <hr>
                @if ( isset($article->pictures) )
                    <div class="panel-body">
                        @include('fileentries.listPictures', ['pictures' => $article->pictures
                                                             ,'showOnly' => true])
                    </div>
                @endif
            </div>
        </div>
        <!-- /.row -->

        
@stop