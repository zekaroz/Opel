@extends('layouts.dashboard')

@section('page_heading')
Create new Shop
@stop

@section('section')

<div>
    <a href="{{ action('ShopsController@index') }}"><span>Back</span></a>
</div>
<br><br>

    @include('errors.list')

<div class="col-sm-6"  >
{!! Form::open(['url' => 'shops']) !!}
    @include('shops._form', ['submitButtonText' => 'Create Shop' ])
{!! Form::close() !!}
</div>

@stop
