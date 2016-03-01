@extends('layouts.dashboard')

@section('page_heading')
Lojas
@stop

@section('section')
 <div>
    <a href="{{ action('ShopsController@create') }}"><span>New Shop</span></a>
</div>


<script >
    $(document).ready( function( $ ) {
        $( '.deleteLink' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = '/shops/'+link.attr('data-id');

                    $.ajax({
                        url: postUrl,
                        type: 'post',
                        data: {_method: 'delete'},
                        success:function(msg) {
                            link.closest('tr').hide(100);
                         },
                        error:function(msg) {
                           alert('Something wrong...');
                        }
                    });
        });
    });
</script>


<table class="table table-striped search-table">
    <thead>
        <th> Id </th>
        <th> Name </th>
        <th> Descrição </th>
        <th> Email </th>
        <th></th>
    </thead>
    <tbody>
    @forelse( $shops as $shop)
        <tr>
             <td>
               <a style=""
             href="{{action('ShopsController@edit',[$shop->id]) }}" >
                   <i class="fa fa-pencil-square-o fa-fw"></i>
                   {{$shop->id }} </a>
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
             <td>
              <div>
                <a  href="#" class="btn btn-default  deleteLink" data-id="{{$shop->id}}"><span><i class="fa fa-trash-o fa-fw"></i></span></a>
            </div>
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





</table>

@stop
