@extends('online_shop.layouts.main')

@section('page_Heading')
    Peças para venda
@stop

 
@section('section')       

<table class="table table-striped search-table">
    <thead>
    <th> Referência </th>
    <th> Nome </th>
    <th class="number"> Preço (€)  </th>
    </thead>
<tbody>
    @forelse( $articles as $article) 
        <tr>
           <td>
               <a href="item/{{$article->id}}/show">
                    {{ $article->reference}}
               </a>
            </td>
            <td>
               {{ $article->name}}
            </td>
            <td class="number">
               {{ $article->price}} €
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