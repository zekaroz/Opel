
<div class="row">
<div class="container picturesHolder" style="width:100%;">
    @forelse($pictures as $picture)
               <div data-id="{{ $picture->id }}" class="col-lg-4 col-md-6 col-xs-6 thumb">
                   <div class="thumbnail">
                            <img id="img{{$picture->id}}" src="{{route('getentry', $picture->filename)}}" alt="{{ isset($altText) ? $altText : '' }}" class="img-responsive thumbs jbox-img" />
                  @if(isset($showOnly))
                    @if(!$showOnly)
                       <div class="caption">
                           <div style="text-align: right;">

                                    <a  href="#" class="deleteImage btn btn-default" data-id="{{$picture->id}}">
                                        <span><i class="fa fa-trash-o fa-fw"></i>  </span>
                                    </a>
                           </div>
                       </div>
                     @endif
                   @endif
                   </div>
               </div>
     @empty
           <div> </div>
    @endforelse
</div>
 </div>

     <div class="jbox-container">
        <div class="img-alt-text"></div>
        <div style="background-color: white;">
            <img src="" />
        </div>
             <svg version="1.1" class="jbox-prev" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 306 306" xml:space="preserve">
            <g>
                <g id="chevron-right">
                    <polygon points="211.7,306 247.4,270.3 130.1,153 247.4,35.7 211.7,0 58.7,153" />
                </g>
            </g>
        </svg>
        <svg version="1.1" class="jbox-next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 306 306" xml:space="preserve">
            <g>
                <g id="chevron-right">
                    <polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153" />
                </g>
            </g>
        </svg>
        <svg version="1.1" class="jbox-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
            <path d="M512,51.75L460.25,0L256,204.25L51.75,0L0,51.75L204.25,256L0,460.25L51.75,512L256,307.75L460.25,512L512,460.25
	L307.75,256L512,51.75z" />
        </svg>

    </div>

      @if(   count($pictures)  >  0)
           <script>
              $(document).ready(function() {
                   var gallery = new jBox();
              } );
          </script>
      @endif
@section('afterBody')
    <script src="{{ asset("js/jBox.js") }} " type="text/javascript"></script>
@stop
