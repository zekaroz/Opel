@extends('layouts.dashboard')

@section('page_heading')
Create New Article
@stop

@section('section')

    @include('errors.list')

<div class="col-sm-6"  >
{!! Form::open(['url' => 'articles']) !!}
    @include('backoffice.articles._form', ['submitButtonText' => 'Create Article', 'article' => null ])
{!! Form::close() !!}
</div>


@stop
