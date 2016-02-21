@extends('layouts.dashboard')

@section('page_heading')
Part Types 
@stop 

@section('page_title_buttons')
     <a class ="btn btn-primary" href="{{ action('PartTypesController@create') }}">
         <i class="fa fa-plus-square fa-fw"></i>
         <span>New Part Type</span>
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
    @forelse( $partTypes as $partType) 
        <tr>
            <td>
              <a href="{{action('PartTypesController@edit',[$partType->id]) }}" > <i class="fa fa-pencil-square-o fa-fw"></i> 
                  {{ $partType->id }}</a>
            </td>
            <td>
               {{ $partType->name}}
            </td>
            <td>
               {{ $partType->code}}
            </td>
            <td>
               {{ $partType->created_at}}
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