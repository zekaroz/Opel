@extends('layouts.dashboard')

@section('page_heading')
Article Types
@stop 

@section('page_title_buttons')
    <a class ="btn btn-primary" href="{{ action('ArticleTypesController@create') }}">
        <i class="fa fa-plus-square fa-fw"></i>
        <span>New Article Type</span>
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
    @forelse( $articleTypes as $articleType) 
        <tr>
            <td>
              <a href="{{action('ArticleTypesController@edit',[$articleType->id]) }}" > <i class="fa fa-pencil-square-o fa-fw"></i> 
                  {{ $articleType->id }}</a>
            </td>
            <td>
               {{ $articleType->name}}
            </td>
            <td>
               {{ $articleType->code}}
            </td>
            <td>
               {{ $articleType->created_at}}
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