@extends('layouts.dashboard')

@section('page_heading')
Article Types
@stop 

@section('section')       
<div>
    <a href="{{ action('ArticleTypesController@create') }}"><span>New Article Type</span></a>
</div>

<table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Code </td>
    <th> Created at </td>
    </thead>

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
</table>
        
@stop