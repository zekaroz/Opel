@extends('online_shop.layouts.main')

@section('page_Heading')
    {{$article->name}}
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
               {{ $article->reference}}
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