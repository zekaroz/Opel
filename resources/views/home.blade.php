@extends('layouts.dashboard')

@section('body')
<div class="container spark-screen" style="margin-top: 80px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-body">
                @include('partials._homepage', ['username' => Auth::user()->name
                                               , 'articleCount' => $articleCount
                                               , 'partTypeCount' => $partTypeCount
                                               , 'brandsCount' => $brandsCount
                                               , 'modelCount' => $modelCount ])
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
