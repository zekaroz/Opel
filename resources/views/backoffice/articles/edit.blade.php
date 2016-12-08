@extends('layouts.dashboard')

@section('page_heading')
Edit Article '{{ $article->name}}'
<div id="statusLabel" class="pull-right">
  @if( $article->sold)
    <div class="status-label font-big danger">
      Vendido
    </div>
  @else
    <button type="submit" id="MarkAsSoldButton" class="btn btn-success" >
      Marcar como Vendido
    </button>
  @endif
</div>
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

                  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                  <hr>
                  @include('fileentries.listPictures', ['pictures' => $articlePictures,
                                                        'showOnly' => false            ])
              </div>
            @endif


            <script type="text/javascript">

                  var serialize = function(obj) {
                                  var str = [];
                                  for(var p in obj)
                                    if (obj.hasOwnProperty(p)) {
                                      str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                    }
                                  return str.join("&");
                                };

                   var init_page_scripts = function(){
                    $(function(){
                       // to make images sortable only in this page
                        $('.picturesHolder').sortable({
                          start: function(e, ui) {
                              // creates a temporary attribute on the element with the old index
                              $(this).attr('data-previndex', ui.item.index());
                          },
                          update: function(e, ui) {
                              // gets the new and old index then removes the temporary attribute
                              var payload = {};

                              // fills the object to send
                              payload.newIndex = ui.item.index();
                              payload.oldIndex = $(this).attr('data-previndex');
                              payload.image_id =  ui.item.attr('data-id');

                              $(this).removeAttr('data-previndex');

                              $.ajax({
                                  url: '/article/'+{{ $article->id }}+'/imagesOrder',
                                  type: 'post',
                                  data: serialize(payload) , // serialize the object to send
                                  dataType: 'json',
                                  success:function(response) {
                                      console.log(response);
                                   },
                                  error:function(data) {
                                       console.error('Save didn\'t work...' );
                                  }
                              });
                          }
                       });
                     });

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

                    $('.thumbnail a.starImage' ).on( 'click', function(e) {
                                e.preventDefault();


                                var link = $(this);
                                var postUrl = '/starImage/'+link.attr('data-id')+'/article/'+{{$article->id}};

                                console.log(postUrl);
                                $.ajax({
                                    url: postUrl,
                                    type: 'post',
                                    success:function(response) {
                                        var oldClass = response.is_starred ? 'fa-star-o': 'fa-star';
                                        var newClass = response.is_starred ? 'fa-star': 'fa-star-o';
                                        $(e.target).removeClass(oldClass).addClass(newClass);
                                     },
                                    error:function(response) {
                                         console.error(response );
                                    }
                                });
                    });

                    $('#MarkAsSoldButton').on('click', function(e){
                          e.preventDefault();

                          var postUrl = '/articles/sold';

                          $.ajax({
                              url:   postUrl,
                              type: 'post',
                              data: 'article={{ $article->id }}',
                              success:function(response) {
                                            if (response.error) {
                                              swal({
                                                 title: "Ocorreu um erro a marcar Artigo como Vendido" ,
                                                 text: 'Aconteceu um erro inesperado, por favor tira um print-screen e envia-me sff. :)',
                                                 timer: 15000,
                                                 showConfirmButton: true,
                                                 type: "error"
                                               });
                                            }else {
                                              swal({
                                                 title: "Artigo está agora Vendido!" ,
                                                 text: 'Artigo apresenta agora a marca de vendido, poderás ou não remover o artigo do site tornando-o privado.',
                                                 timer: 15000,
                                                 showConfirmButton: true,
                                                 type: "success"
                                               });

                                               $('#statusLabel').html('<div class="status-label font-big danger"> Vendido </div>');
                                             }
                                    },
                              error:function(data) {

                              }
                          });
                    });

                  };

                  // executes the script to initialization of the page
                  init_page_scripts();

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
          else {
            init_page_scripts();
          }
      });
}

</script>

@stop
