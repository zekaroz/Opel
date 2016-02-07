@extends('layouts.dashboard')

@section('page_heading')
Brands
@stop 

@section('section')
 <div>
    <a href="{{ action('BrandsController@create') }}"><span>New Brand</span></a>
</div>

<table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Code </td>
    <th> Created at </td>
    </thead>

    @forelse( $brands as $brand) 
        <tr>
            <td>
              <a href="{{action('BrandsController@edit',[$brand->id]) }}" > {{ $brand->id }}</a>
            </td>
            <td>
               {{ $brand->name}}
            </td>
            <td>
               {{ $brand->code}}
            </td>
            <td>
               {{ $brand->created_at}}
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