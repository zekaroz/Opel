        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  @if( isset($articles) )
                    @foreach( $articles as $index => $article)
                            <li data-target="#carousel-example-generic" data-slide-to="{{ $index }}" class="{{ ( $index == 0 ) ? 'active' : '' }}"></li>
                     @endforeach
                  @endif
                </ol>
                <div class="carousel-inner">
                   @if( isset($articles) )
                       @foreach( $articles as $index => $article)
                             <div class="item {{ ( $index==0)?'active':'' }}">
                                 <img class="slide-image" src="{{  ( count($article->pictures) > 0 ) ? route('getThumb', $article->pictures->first()->filename) : "http://placehold.it/640x300" }} " alt="">
                             </div>
                       @endforeach
                   @endif
                </div>
               </div>
        </div>
