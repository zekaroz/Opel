@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Veículos Usados PcQar. Temos os automóveis ao preços que precisa com a nossa garantia.">
  <title>PcQar - Veículos Usados</title>
@stop


@section('page_Heading')
<i class="fa fa-car"></i> Veículos Usados 3
@stop


@section('section')

<table class="table table-striped search-table">
    <thead>
    <th>  </th>
    <th> Nome </th>
    <th class="number"> Preço (€)  </th>
    </thead>
<tbody>
    @forelse( $articles as $article)
        <tr>
          <td style="width:130px;">
            <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}" style="position:relative;">
              <img src="{{ route('getArticleThumbnailURL', $article->id) }}" style="width:120px;" alt="">
              @if( ! $article->isAvailable() )
                <!-- Show ribbon saying "Vendido"-->
                <div class="sold-ribbon">
                    {{ $article->soldOutState() }}
                </div>
              @endif
            </a>
          </td>
          <td>
              <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}">
                {{ $article->name}}
                <div>
                  <small>{{ $article->reference}}</small>
                </div>
              </a>
          </td>
          <td class="number">
            {{ $article->getPrice() }}
          </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">
                Sem artigos a mostrar...
            </td>
        </tr>
    @endforelse
</tbody>
</table>

@stop
