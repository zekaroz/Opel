@extends('layouts.dashboard')

@section('page_heading')
Brands
@stop 

@section('page_title_buttons')
    <a class ="btn btn-primary" href="{{ action('BrandsController@create') }}">
        <i class="fa fa-plus-square fa-fw"></i>
        <span>New Brand</span>
    </a> 
@stop

@section('section')
<table class="table table-striped search-table">
    <thead>
    <th> Id </th>
    <th> Name </th>
    <th> Code </th>
    <th> Created at </th>
    </thead>
<tbody>
    @forelse( $brands as $brand) 
        <tr>
            <td>
              <a href="{{action('BrandsController@edit',[$brand->id]) }}" ><i class="fa fa-pencil-square-o fa-fw"></i> 
                   {{ $brand->id }}</a>
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
</tbody>
</table>
        
@stop