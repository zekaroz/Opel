@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop

@section('page_title_buttons')

@stop

@section('section')

<div id="articlesList">
    <articlesearch brands="{{$brandsList}}" brands="{{$modelsList}}" brands="{{$partsList}}"> </articlesearch>

</div>

@stop
