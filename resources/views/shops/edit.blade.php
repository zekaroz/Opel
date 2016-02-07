@extends('layouts.dashboard')

@section('page_heading')
Edit {{ $shop->name}}
@stop 

@section('section')

<div>
    <a href="{{ action('ShopsController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list');
 
<div class="col-sm-6"  >
{!! Form::model($shop, ['method' => 'PATCH', 'action' => ['ShopsController@update',$shop->id]]) !!}
    @include('shops._form', ['submitButtonText' => 'Update Shop Info' ])
{!! Form::close() !!}
</div>
       

@stop