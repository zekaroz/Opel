@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Procure facilmente nas peças que temos se encontrar o que pretende só terá de nos contactar.">
  <title>PcQar - Peças recicladas</title>
@stop


@section('page_Heading')
<i class="fa fa-cogs"></i>  Peças Recicladas
@stop


@section('section')

<table class="table table-striped search-table">
    <thead>
    <th></th>
    <th> Código </th>
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
                <!-- Show ribbon saying "Esgotado"-->
                <div class="sold-ribbon">
                  Esgotado!
                </div>
              @endif
            </a>
          </td>
          <td>{{ $article->getCode()  }}</td>
          <td>
              <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}">
                {{ $article->name}}
              </a>
              <div>
                <small>{{ $article->reference}}</small>
              </div>
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
