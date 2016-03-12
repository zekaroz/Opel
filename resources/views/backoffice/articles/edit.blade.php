@extends('layouts.dashboard')

@section('page_heading')
Edit Article '{{ $article->name}}'
@stop

@section('section')

<br><br>

 @include('errors.list')

<div class="col-sm-6"  >
{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update',$article->id]]) !!}
     @include('backoffice.articles._form', ['submitButtonText' => 'Update Article'  ])
{!! Form::close() !!}
</div>

 <div class="col-sm-6"  >
                 <h4>Fotografias</h4>
        @include('fileentries.dropZone', [
                                'postURL' => 'ArticlePictureUpload/'.$article->id,
                                'dropId'  => 'filedrop'])

        <div id="picturesContainer">

            @if ( isset($articlePictures) )
              <div class="panel-body">
                  <hr>
                  @include('fileentries.listPictures', ['pictures' => $articlePictures,
                                                        'showOnly' => false            ])
              </div>
            @endif


            <script type="text/javascript">
                  $( '.thumbnail .deleteImage' ).on( 'click', function(e) {
                              e.preventDefault();
                              var link = $(this);
                              var postUrl = '/ArticlePictureUpload/'+link.attr('data-id')+'/article/'+{{$article->id}};

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

<script>

// when using file Entries partial the function with the name
// reloadPictures will be called after changes in the
// images like, adding pictures
function reloadPictures(){
  // reload the content of the pictures for this page
      $( "#picturesContainer" ).load( "/articles/{{$article->id}}/loadImages" , function( response, status, xhr ) {
          if ( status == "error" ) {
            var msg = "Sorry but there was an error: ";
            alert( msg + xhr.status + " " + xhr.statusText );
          }
      })
}

</script>

@stop
