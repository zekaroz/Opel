    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <a href="{{$itemURL}}">
              <img src="{{ route('getArticleThumbnailURL', $article->id) }}" alt="">
            </a>
            <div class="caption">
                <h4 class="pull-right">
                    @if( $itemPrice > 0 )
                      {{$itemPrice}}
                    @endif
                  </h4>
                <h4><a href="{{$itemURL}}">{{$itemName}}</a>
                </h4>
                <p>
                    {{ $itemDescription}}
                </p>
                <p></p>
            </div>
            <div class="article-code">
                <p class="text-right">
                  <span class="">{{ $itemCode }}</span>
                </p>
            </div>
        </div>
    </div>
