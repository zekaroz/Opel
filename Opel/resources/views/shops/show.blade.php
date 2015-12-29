@extends('layouts.dashboard')

@section('page_heading')
{{$shop->name}}
@stop 

@section('section')

<div>
    <a href="{{ action('ShopsController@index') }}"><span>Back</span></a>
</div>
<br><br><br>
Shop Infomation: 

<table>
    <tr><td>
        {{$shop->name }}
        </td>
    </tr>
    <tr><td>
       {{$shop->shopDescription}}
        </td>
    </tr>
    <tr><td>
        {{$shop->contactNumber}}
        </td>
    </tr>
    <tr><td>
       {{$shop->email}}
        </td>
    </tr>
    <tr><td>
       {{$shop->location}}
        </td>
    </tr>
    <tr><td>
       {{$shop->created_at}}
        </td>
    </tr>
    <tr><td>
       {{$shop->updated_at}}
        </td>
    </tr>
</table>
   <a href="" ><h2> </h2></a>
   <span></span>
   <br>
   <span>email: {{ $shop->email}}
               </span>
        
@stop