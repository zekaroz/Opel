@extends('online_shop.layouts.main')

@section('page_Heading')
    Bem vindo
@stop

@section('section')
                <div class="row carousel-holder">

                @include('online_shop.partials.carouselLarge', [
                                                                'numberOfBanners' => 5
                                                                ] )
                </div>

                <div class="row">                    
                    @if( isset($articles) )
                        @foreach( $articles as $article) 
                            @include('online_shop.partials.squareDisplay',
                                                         [
                                                            'numberOfStars'=> 0 ,
                                                            'numberOfReviews'=> (0),
                                                            'itemName'=> $article->name,
                                                            'itemDescription'=> $article->description,
                                                            'itemPrice' => $article->price.'€',
                                                            'picture_filename' => (count($article->pictures)>0)?($article->pictures->first()->filename):''
                                                         ])
                        @endforeach
                    @endif
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this page?</a>
                        </h4>
                        <p>If you like this page, then check out <a target="_blank" href="https://www.facebook.com/reciopel/">a nossa página no Facebook</a></p>
                        <a class="btn btn-primary" target="_blank" href="https://www.facebook.com/reciopel/">Ir para Facebook</a>
                    </div>

                </div>
@stop