@extends('layouts.dashboard')

@section('page_heading')
Edit Brand '{{ $brand->name}}'
@stop

@section('section')

@include('errors.list')

<div class="col-sm-6">
{!! Form::model($brand,
                ['method' => 'PATCH',
                 'action' => ['BrandsController@update',$brand->id]]
                 ) !!}
     @include('backoffice.brands._form', ['submitButtonText' => 'Update Brand'  ])
{!! Form::close() !!}

  <div class="col-sm-12" style="margin-top:40px;">
            @include('fileentries.dropZone', [
                                    'postURL' => 'BrandPictureUpload/'.$brand->id,
                                    'dropId'  => 'filedrop'])
  </div>


      <div id="picturesContainer">
        @if ( isset($brandPictures) )
          <div class="panel-body" style="margin-top:175px;">
              <hr>
              <h4>Brand Sample Pictures</h4>
              @include('fileentries.listPictures', ['pictures' => $brandPictures,
                                                    'showOnly' => false ])
          </div>
        @endif
        <script type="text/javascript">
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
        </script>

     </div>

</div>

 <div class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading" style="height:35px;">
               <div class="col-sm-9">
                  <h3 class="panel-title"> Models </h3>
               </div>
               <div class="col-sm-3" style="text-align: right;">
                    <a id="addModel" class="btn btn btn-default btn-xs" href="Javascript:  $(this).hide(); $('#modelForm').show('slide');">
                        Add Model
                    </a>
               </div>
         </div>


        <div id="modelForm" class="col-sm-12" style='display:none; padding:40px;'  >
            {!! Form::open(['url'   => 'models']) !!}
                @include('backoffice.brands._formModel',
                         [
                         'submitButtonText' => 'Add Model',
                         'brand_id' => $brand->id,
                         'buttonId' => 'brandModelSave'
                         ])
            {!! Form::close() !!}
         </div>

        <div id="#brandModels" class="panel-body">
            <div class="">
                @include('backoffice.brands._Models_table', ['brandModels'=>$brandModels])
            </div>
        </div>
    </div>
</div>

<script>

// when using file Entries partial the function with the name
// reloadPictures will be called after changes in the
// images like, adding pictures
function reloadPictures(){
  // reload the content of the pictures for this page
      $( "#picturesContainer" ).load( "/brands/{{$brand->id}}/loadImages" , function( response, status, xhr ) {
          if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            alert( msg + xhr.status + " " + xhr.statusText );
          }
      });
} 
</script>

@stop
