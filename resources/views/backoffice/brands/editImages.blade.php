
    @if ( isset($brandPictures) )
      <div id="picturesContainer">
        <div class="panel-body" style="margin-top:175px;">
            <hr>
            <h4>Brand Sample Pictures</h4>
            @include('fileentries.listPictures', ['pictures' => $brandPictures,
                                                  'showOnly' => false ])
        </div>

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
    @endif
