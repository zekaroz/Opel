@extends('layouts.dashboard')

@section('page_heading')
Create new Brand
@stop 

@section('section')

<br><br>
 
    @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::open(['url'   => 'brands']) !!}
    @include('backoffice.brands._form', ['submitButtonText' => 'Create Brand' ])
{!! Form::close() !!}
</div>
       

@stop