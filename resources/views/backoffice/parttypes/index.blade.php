@extends('layouts.dashboard')

@section('page_heading')
Part Types
@stop 

@section('section')
 <div>
    <a href="{{ action('PartTypesController@create') }}"><span>New Part Type</span></a>
</div>

<table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Code </td>
    <th> Created at </td>
    </thead>

    @forelse( $partTypes as $partType) 
        <tr>
            <td>
              <a href="{{action('PartTypesController@edit',[$partType->id]) }}" > {{ $partType->id }}</a>
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
</table>
        
@stop