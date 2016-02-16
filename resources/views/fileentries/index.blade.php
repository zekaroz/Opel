@extends('layouts.dashboard')

@section('page_heading')
Pictures Uploaded

 @stop

@section('section')
       
@include('fileentries.dropZone', [
                                    'postURL' => 'apply/upload',
                                    'dropId'  => 'myDropZone'])     
      
@if ( isset($entries) )
    <div class="panel-body" style="margin-top:175px;">
        <hr>
        <h4>Global Sample Pictures</h4>
        @include('fileentries.listPictures', ['pictures' => $entries])
    </div>
@endif
 
  
 <script >
    $(document).ready( function( $ ) {        
        $( '.thumbnail .deleteImage' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = 'fileentry/'+link.attr('data-id');

                    $.ajax({
                        url: postUrl,
                        type: 'post',
                        data: {_method: 'delete'},
                        success:function(msg) {
                            link.closest('.thumbnail').toggle( "explode" );
                         },
                        error:function(data) {

                             alert('somethings wrong...' );
                        }
                    });
        });
    });
</script>

 
 
@stop