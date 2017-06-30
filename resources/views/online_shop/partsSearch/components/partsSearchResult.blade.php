<style media="screen">
  .pagination{
      margin-top: 0px;
  }
</style>

<div class="text-muted small col-md-3">
<strong>{{ $articles->total() }}</strong> Artigos encontrados...
</div>

<div class="text-right col-md-9">
  {{ $articles->links()  }}
</div>
<table class="table table-striped ">
  <tbody>
@forelse( $articles as $article)
      <tr>
        <td style="width:120px;">
          <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}" style="position:relative;">
            <img src="{{ route('getArticleThumbnailURL', $article->id) }}"
                  style="width:120px;"
                  alt="{{ $article->description }}"
                  class="img-rounded">
            @if( ! $article->isAvailable() )
              <!-- Show ribbon saying "Esgotado"-->
              <div class="sold-ribbon">
                {{$article->soldOutState() }}
              </div>
            @endif
          </a>
        </td>
        <td>
          <a href="{{ route('itemDisplayWithSlug', ['slug' => $article->slug]) }}" ><i class="fa fa-pencil-square-o fa-fw"></i>
              {{$article->name}}</a>
              <small>{{ '('.$article->reference.')'}}</small>
          <div class="text-muted">
              <small>{{$article->getCode()}}</small>
          </div>
        </td>
        <td>
          {{$article->brand? $article->brand->name : ''}}
          <small>{{$article->model? '('.$article->model->name.')' : ''}}</small>
        </td>
        <td class="text-right">
             {{$article->getPrice()}}
        </td>
      </tr>
@empty
    <tr>
        <td colspan="6">
            Não foram encontrados artigos para a pesquisa efectuada...
        </td>
    </tr>
@endforelse
</tbody>
</table>

<div class="text-right">
  {{ $articles->links()  }}
</div>
