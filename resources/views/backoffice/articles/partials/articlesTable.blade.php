<div class="text-muted small col-md-6">
  Foram encontrados um total de <strong>{{ $articles->total() }}</strong> artigos para pesquisa realizada
</div>

<div class="text-right col-md-6">
  {{ $articles->links()  }}
</div>
<table class="table table-striped ">
  <thead>
    <th>
      Código
    </th>
    <th>
      Artigo
    </th>
    <th>
      Marca
    </th>
    <th>
      Stock
    </th>
    <th>
      Preço
    </th>
    <th colspan="2">
      Estado
    </th>
    <th>
    </th>
  </thead>
  <tbody>
@forelse( $articles as $article)
      <tr>
        <td>{{$article->getCode()}}</td>
        <td>
          <a href="{{action('ArticlesController@edit',[$article->id]) }}" ><i class="fa fa-pencil-square-o fa-fw"></i>
              {{$article->name}}</a>
              <small>{{ '('.$article->reference.')'}}</small>
        </td>
        <td>
          {{$article->brand? $article->brand->name : ''}}
          <small>{{$article->model? '('.$article->model->name.')' : ''}}</small>
        </td>
        <td>
                {{   $article->quantity  }} un.
        </td>
        <td>
             {{$article->getPrice()}}
        </td>
        <td>
            @if($article->public )
               <span  title="It appears on the website">
                 <i class="fa fa-globe "></i>
                  Público
               </span>
            @else
              <span title="This is a private article, only owner can see">
                <i class="fa fa-lock "></i>
                 Privado
              </span>
            @endif
        </td>
        <td>
            <div class="pull-right">
              @if( $article->isAvailable())
                  <div class="status-label font-small success">
                    Disponível
                  </div>
              @else
                  <div class="status-label font-small danger">
                    Esgotado!
                  </div>
              @endif
            </div>

        </td>
        <td>
        <a id="deleteLink_{{  $article->id  }}"
            href="Javascript: deleteArticle(  {{  $article->id  }} );"
            class="deleteLink btn btn-default ladda-button"
            data-style="zoom-out"
            data-spinner-color="#337ab7"
            data-id="{{$article->id}}">
                   <span><i class="fa fa-trash-o fa-fw"></i>  </span>
       </a>
        </td>
      </tr>
@empty
    <tr>
        <td colspan="6">
            No records to show...
        </td>
    </tr>
@endforelse
</tbody>
</table>

<div class="text-right">
  {{ $articles->links()  }}
</div>
