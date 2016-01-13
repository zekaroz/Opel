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

                    @for ($i = 0; $i < 6; $i++)
                        @include('online_shop.partials.squareDisplay',
                             [
                                'numberOfStars'=> 3 ,
                                'numberOfReviews'=> (12-$i),
                                'itemName'=> ($i+1) . 'º Dynamic Product',
                                'itemDescription'=> 'this is a description' ,
                                'itemPrice' => '€ 15.99',
                                'itemImageURL' => 'http://placehold.it/320x150'
                             ])
                    @endfor                    

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this page?</a>
                        </h4>
                        <p>If you like this page, then check out <a target="_blank" href="https://www.facebook.com/reciopel/">a nossa página no Facebook</a></p>
                        <a class="btn btn-primary" target="_blank" href="https://www.facebook.com/reciopel/">Ir para Facebook</a>
                    </div>

                </div>
@stop