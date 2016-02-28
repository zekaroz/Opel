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
    <th></th>
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
             <td>
            <a  href="#" class="deleteLink btn btn-default" data-id="{{$brand->id}}">
                       <span><i class="fa fa-trash-o fa-fw"></i>  </span>
           </a>
            </td>
        </tr>    
    @empty
        <tr>
            <td colspan="5">
                No records to show...
            </td>
        </tr>
    @endforelse
</tbody>
</table>


<script >
    $(document).ready( function( $ ) {        
        $( '.deleteLink' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = '/brands/'+link.attr('data-id');

                    $.ajax({
                        url: postUrl,
                        type: 'post',
                        data: {_method: 'delete'},
                        success:function(msg) {
                            link.closest('tr').animate({'line-height':0},1000).hide(1);
                         },
                        error:function(msg) {
                           alert('Something wrong...');
                        }
                    });
        });
    });
</script>
        
@stop