@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Serviços auto de confiança. Na PcQar pode manter, reparar, vender ou restaurar o seu automóvel.">
  <title>PcQar - Entrada</title>
@stop

@section('page_Heading')
    Bem vindo
@stop

@section('section')
                <div class="row carousel-holder">

                @include('online_shop.partials.carouselLarge', [
                                                                'numberOfBanners' => 5,
                                                                'articles' => $carrousselArticle
                                                                ] )
                </div>

                <div class="row">
                    @if( isset($articles) )
                        @foreach( $articles as $article)
                            @include('online_shop.partials.squareDisplay',
                                                         [
                                                            'numberOfStars'=> 0 ,
                                                            'numberOfReviews'=> (0),
                                                            'itemURL' =>  route('itemDisplayWithSlug', ['slug' => $article->slug]) ,
                                                            'itemName'=> $article->name,
                                                            'itemDescription'=> $article->description,
                                                            'itemPrice' => $article->price,
                                                            'picture_filename' => (count($article->pictures)>0)?($article->pictures()->orderBy('position', 'asc')->first()->filename):''
                                                         ])
                        @endforeach
                    @endif
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Gostou deste sítio?</a>
                        </h4>
                        <p>Se gosta desta página veja <a target="_blank" href="https://www.facebook.com/pcqar/">a nossa página no Facebook</a></p>
                        <a class="btn btn-primary" target="_blank" href="https://www.facebook.com/pcqar/">Ir para Facebook</a>
                    </div>

                </div>
@stop
