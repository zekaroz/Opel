@extends('layouts.dashboard')

@section('page_heading')
Edit Brand '{{ $brand->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('BrandsController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::model($brand, 
                ['method' => 'PATCH', 
                 'action' => ['BrandsController@update',$brand->id]]
                 ) !!}
     @include('backoffice.brands._form', ['submitButtonText' => 'Update Brand'  ])
{!! Form::close() !!}

  <div class="col-sm-12" style="margin-top:40px;">
            @include('fileentries.dropZone', [
                                    'postURL' => 'BrandPictureUpload/'.$brand->id,
                                    'dropId'  => 'myDropZone'])   
        </div>
        
        @if ( isset($brandPictures) )
            <div class="panel-body" style="margin-top:175px;">
                <hr>
                <h4>Brand Sample Pictures</h4>
                @include('fileentries.listPictures', ['pictures' => $brandPictures])
            </div>
        @endif
</div>
 
 <div class="col-sm-6" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Models
            </h3>
        </div>

        <div class="col-sm-6"  >
            {!! Form::open(['url'   => 'models']) !!}
                @include('backoffice.brands._formModel',
                         [
                         'submitButtonText' => 'Add Model', 
                         'brand_id' => $brand->id
                         ])
            {!! Form::close() !!}
         </div>
        
        <div class="panel-body">
            <div class="">
                @include('backoffice.brands._Models_table', ['brandModels'=>$brandModels]) 
            </div>
        </div>
        
        <hr>
    </div>    
</div>
 
 
 <script >
    $(document).ready( function( $ ) {        
        $( '.thumbnail .deleteImage' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = '/BrandPictureUpload/'+link.attr('data-id')+'/brand/'+{{$brand->id}};

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
