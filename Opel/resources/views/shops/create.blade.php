@extends('layouts.dashboard')

@section('page_heading')
Create new Shop
@stop 

@section('section')

<div>
    <a href="{{ action('ShopsController@index') }}"><span>Back</span></a>
</div>
<br><br>

{{!! Form::open() !!}
    
    
{{!! Form::close() !!}
        
@stop