 <div class="row">
        <ul class="thumbnails">
 @forelse($pictures as $picture)
            <div class="col-md-2">
                <div class="thumbnail">
                    <img src="{{route('getentry', $picture->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$picture->filename}}</p>
                    </div>
                </div>
            </div>
  @empty
        <div>No images to show...</div>
 @endforelse
 
 </ul>
 </div>
