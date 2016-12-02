@extends('online_shop.layouts.main')

@section('head_section')
  <meta name="description" content="Veículos para Peças, procura veículos baratos para desmontar e aproveitar peças? Fale connosco!">
  <title>PcQar - Veículos para Peças</title>
@stop


@section('page_Heading')
<i class="fa fa-wrench"></i>  Veículos para Peças
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
            <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}">
              <img src="{{ route('getArticleThumbnailURL', $article->id) }}" style="width:120px;" alt="">
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
