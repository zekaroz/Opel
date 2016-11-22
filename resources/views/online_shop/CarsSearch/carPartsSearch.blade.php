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
    <th> Nome </th>
    <th> Referência </th>
    <th class="number"> Preço (€)  </th>
    </thead>
<tbody>
    @forelse( $articles as $article)
        <tr>
          <td>
              <a href="item/{{$article->id}}/show">
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
            <td colspan="5">
                Sem artigos a mostrar...
            </td>
        </tr>
    @endforelse
</tbody>
</table>

@stop
