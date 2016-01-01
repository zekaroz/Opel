@extends('layouts.dashboard')

@section('page_heading')
Edit Brand '{{ $brand->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('BrandsController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list');
 
<div class="col-sm-6"  >
{!! Form::model($brand, ['method' => 'PATCH', 'action' => ['BrandsController@update',$brand->id]]) !!}
     @include('backoffice.brands._form', ['submitButtonText' => 'Update Brand'  ])
{!! Form::close() !!}
</div>
       

@stop