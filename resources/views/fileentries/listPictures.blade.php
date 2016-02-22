 <div class="row">
  <ul class="thumbnails">
    @forelse($pictures as $picture)
               <div class="col-md-4">
                   <div class="thumbnail">
                       <a id='{{$picture->id}}' href="#" class="popupLink"> 
                           <img id="img{{$picture->id}}" src="{{route('getThumb', $picture->filename)}}" alt="ALT NAME" class="img-responsive thumbs" />
                       </a>
                       <div class="caption">
                           <div style="text-align: right;">
                               <a  href="#" class="deleteImage btn btn-default" data-id="{{$picture->id}}">
                                   <span><i class="fa fa-trash-o fa-fw"></i>  </span>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
     @empty
           <div>No images to show...</div>
    @endforelse
  </ul>
 </div>

    <!-- Creates the bootstrap modal where the image will appear -->
   <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
           <h4 class="modal-title" id="myModalLabel">Image</h4>
         </div>
         <div class="modal-body">
           <img src="" id="imagepreview" style="width: 400px; height: 700px;" >
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>

 
 @section('afterBody')
 
    <script type="text/javascript" >
        $(document).ready(function() {
               $('.popupLink').on('click', function() {
                 $('#imagepreview').attr('src', $('.thumbs','#'+this.id).attr('src'))
                         .width($('.thumbs','#'+this.id).width()*2)  // here asign the image to the modal when the user click the enlarge link
                         .height($('.thumbs','#'+this.id).height()*2);
                $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
              });
           });
    </script>    
@stop    
    
 
 

