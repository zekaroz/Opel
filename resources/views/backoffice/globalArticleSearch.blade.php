@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop

@section('page_title_buttons')

@stop

@section('section')

<div id="articlesList">
    <articlesearch :brands="{{  $brandsList  }}" :models="{{  $modelsList  }}" :parts="{{  $partsList  }}" >
    </articlesearch>

</div>

@stop
