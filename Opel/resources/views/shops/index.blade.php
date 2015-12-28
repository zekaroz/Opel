@extends('layouts.dashboard')

@section('page_heading')
Shops
@stop 

@section('section')
 <div>
    <a href="{{ action('ShopsController@create') }}"><span>New Shop</span></a>
</div>
@foreach( $shops as $shop) 
   <a href="{{action('ShopsController@show',[$shop->id]) }}" >
       <h4> {{$shop->name }}</h4>
   </a>
   <span>{{$shop->shopDescription}}</span>
   <br>
   <span>email: {{ $shop->email}}
               </span>
 @endforeach
        
@stop