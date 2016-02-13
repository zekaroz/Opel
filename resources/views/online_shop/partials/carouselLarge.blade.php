        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                   @for ($i = 0; $i < $numberOfBanners ; $i++)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class="{{ ($i==0)?'active':'' }}"></li>
                   @endfor
                    
                </ol>
                <div class="carousel-inner">
                   @for ($i = 0; $i < $numberOfBanners ; $i++)
                        <div class="item {{ ($i==0)?'active':'' }}">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                   @endfor
                </div>
               </div>
        </div>