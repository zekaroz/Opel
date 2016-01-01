@extends('layouts.dashboard')

@section('page_heading')
Edit Part Type '{{ $partType->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('PartTypesController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list');
 
<div class="col-sm-6"  >
{!! Form::model($partType, ['method' => 'PATCH', 'action' => ['PartTypesController@update',$partType->id]]) !!}
     @include('backoffice.parttypes._form', ['submitButtonText' => 'Update Part Type'  ]);
{!! Form::close() !!}
</div>
       

@stop