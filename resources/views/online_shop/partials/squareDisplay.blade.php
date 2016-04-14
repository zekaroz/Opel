    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="{{ ($picture_filename!='')?route('getThumb', $picture_filename) :"http://placehold.it/320x150"}} " alt="">
            <div class="caption">
                <h4 class="pull-right">
                    @if( $itemPrice > 0 )
                      {{$itemPrice}} €
                    @endif
                  </h4>
                <h4><a href="{{$itemURL}}">{{$itemName}}</a>
                </h4>
                <p>
                    {{ $itemDescription}}
                </p>
            </div>
            <div class="ratings">
                <p class="pull-right">{{$numberOfReviews}} reviews</p>
                <p>
                    @for ($i = 0; $i < $numberOfStars; $i++)
                        <span class="glyphicon glyphicon-star"></span>
                    @endfor
                    @for ($i = 0; $i < 5-$numberOfStars; $i++)
                        <span class="glyphicon glyphicon-star-empty"></span>
                    @endfor
                </p>
            </div>
        </div>
    </div>
