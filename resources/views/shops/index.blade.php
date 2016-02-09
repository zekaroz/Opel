@extends('layouts.dashboard')

@section('page_heading')
Lojas
@stop 

@section('section')
 <div>
    <a href="{{ action('ShopsController@create') }}"><span>New Shop</span></a>
</div>

 <table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Descrição </td>
    <th> Email </td>
    </thead>
 @forelse( $shops as $shop) 
       <tr>
            <td>
              <a style="font-size:18px;"
            href="{{action('ShopsController@edit',[$shop->id]) }}" > {{$shop->id }} </a>
            </td>
            <td>
               {{ $shop->name}}
            </td>
            <td>
               {{ $shop->shopDescription}}
            </td>
            <td>
               {{ $shop->email }}
            </td>
        </tr>    
    @empty
        <tr>
            <td colspan="4">
                No records to show...
            </td>
        </tr>
    @endforelse
 



      

</table>
        
@stop