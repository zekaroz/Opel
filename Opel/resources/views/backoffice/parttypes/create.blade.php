@extends('layouts.dashboard')

@section('page_heading')
Create new Part Type
@stop 

@section('section')

<div>
    <a href="{{ action('PartTypesController@index') }}"><span>Back</span></a>
</div>
<br><br>
 
    @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::open(['url' => 'part_types']) !!}
    @include('backoffice.parttypes._form', ['submitButtonText' => 'Create Part Type' ])
{!! Form::close() !!}
</div>
       

@stop