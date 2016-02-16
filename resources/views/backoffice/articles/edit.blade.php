@extends('layouts.dashboard')

@section('page_heading')
Edit Article '{{ $article->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('ArticlesController@index') }}"><span>Back</span></a>
</div>
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
                                'dropId'  => 'myDropZone'])   
 
        @if ( isset($articlePictures) )
            <div class="panel-body">
                <hr>

                @include('fileentries.listPictures', ['pictures' => $articlePictures])
            </div>
        @endif
</div>
       
 
  <script >
    $(document).ready( function( $ ) {        
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
    });
</script>

@stop