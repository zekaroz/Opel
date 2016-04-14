@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop

@section('page_title_buttons')
<a class ="btn btn-primary" href="{{ action('ArticlesController@create') }}">
    <i class="fa fa-plus-square fa-fw"></i>
    <span>New Article</span>
</a>
@stop

@section('section')

@include('backoffice.articles.partials.generalSearch', ['articles' => $articles ,
                                                        'modelsList' => $modelsList,
                                                        'brandsList' => $brandsList,
                                                        'partsList' => $partsList
                                                        ])

@stop
