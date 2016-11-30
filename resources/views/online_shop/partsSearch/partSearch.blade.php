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
    <th> Nome </th>
    <th> Referência </th>
    <th class="number"> Preço (€)  </th>
    </thead>
<tbody>
    @forelse( $articles as $article)
        <tr>
          <td style="width:130px;">
            <img src="{{ route('getArticleThumbnailURL', $article->id) }}" style="width:120px;" alt="">
          </td>
          <td><a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}">
             {{ $article->name}}
                </a>
          </td>
           <td>
             {{ $article->reference}}
           </td>
            <td class="number">
              {{ $article->price == 0 ? 'Sob Consulta'  : $article->price.' €' }}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">
                Sem artigos a mostrar...
            </td>
        </tr>
    @endforelse
</tbody>
</table>

@stop
