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
                                 <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}">
                                   <img class="slide-image" src="{{ route('getArticleThumbnailURL', $article->id) }} " alt="{{ $article->name }}">
                                   <div class="carousel-legend">
                                        {{  $article->name  }}
                                   </div>
                                   @if( $article->hasPrice() )
                                     <div class="carousel-legend-price">
                                       <div class="price-tag">
                                           {{  $article->getPrice() }}
                                       </div>
                                     </div>
                                   @endif
                                 </a>
                             </div>
                       @endforeach
                   @endif
                </div>
               </div>
        </div>
