@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop

@section('page_title_buttons')

@stop

@section('section')

  @include('backoffice.articles.partials.generalSearch', ['articles' => $articles ,
                                                          'modelsList' => $modelsList,
                                                          'brandsList' => $brandsList,
                                                          'partsList' => $partsList
                                                          ])

@stop
