@extends('layouts.dashboard')

@section('page_heading')
Users
@stop 

@section('section')

 <table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Email  </td>
    <th> Created at</td>
    </thead>
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
 



      

</table>
        
@stop