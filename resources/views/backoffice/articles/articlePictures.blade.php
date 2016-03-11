@if ( isset($articlePictures) )
  <div id="picturesContainer">
    <div class="panel-body">
        <hr>

        @include('fileentries.listPictures', ['pictures' => $articlePictures,
                                              'showOnly' => false            ])
    </div>

    <script >
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

@endif
