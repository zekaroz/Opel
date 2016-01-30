@extends('layouts.dashboard')

@section('page_heading')
Shops
@stop 

@section('section')
 <div>
    <a href="{{ action('ShopsController@create') }}"><span>New Shop</span></a>
</div>
@foreach( $shops as $shop) 
     @include('shops._listShopItem',
     [
        'shopId'=> $shop->id ,
        'shopName'=> $shop->name ,
        'shopDescription'=> $shop->shopDescription ,
        'shopEmail'=> $shop->email 
     ])
 @endforeach
        
@stop