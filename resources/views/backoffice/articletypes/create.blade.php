@extends('layouts.dashboard')

@section('page_heading')
Create new Article Type
@stop 

@section('section')

<br><br>
 
    @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::open(['url' => 'article_types']) !!}
    @include('backoffice.articletypes._form', ['submitButtonText' => 'Create Article Type' ])
{!! Form::close() !!}
</div> 
       

@stop