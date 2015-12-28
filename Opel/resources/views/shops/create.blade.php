@extends('layouts.dashboard')

@section('page_heading')
Create new Shop
@stop 

@section('section')

<div>
    <a href="{{ action('ShopsController@index') }}"><span>Back</span></a>
</div>
<br><br>

{!! Form::open(['url' => 'Shops']) !!}
    <div class='form-group'>
        {!! Form::label('Shop Name' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Shop Description' ) !!}
        {!! Form::textarea('shopDescription' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Location' ) !!}
        {!! Form::text('location' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Contact Number' ) !!}
        {!! Form::text('contactNumber' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Shop e-mail' ) !!}
        {!! Form::text('email' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Create Shop' ,  ['class' => 'btn btn-primary form-control']) !!} 
    </div>
    

{!! Form::close() !!}
        
@stop