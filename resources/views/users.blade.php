@extends('layouts.dashboard')

@section('page_heading')
Users
@stop 

@section('section')

 <table class="table table-striped">
    <thead>
    <th> Id </th>
    <th> Name </th>
    <th> Email  </th>
    <th> Created at</th>
    </thead>
<tbody>
    @forelse( $users as $user) 
       <tr>
            <td>
              <i class="fa fa-pencil-square-o fa-fw"></i> 
                  {{$user->id }} 
            </td>
            <td>
               {{ $user->name}}
            </td>
            <td>
               {{ $user->email}}
            </td>
            <td>
               {{ $user->created_at }}
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