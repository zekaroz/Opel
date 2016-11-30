<table class="table table-striped ">
  <thead>
    <th>
      Article Name
    </th>
    <th>
      Reference
    </th>
    <th>
      Price
    </th>
    <th>
      Brand
    </th>
    <th>
      Is Public
    </th>
    <th>
    </th>
  </thead>
  <tbody>
@forelse( $articles as $article)
      <tr>
        <td>
          <a href="{{action('ArticlesController@edit',[$article->id]) }}" ><i class="fa fa-pencil-square-o fa-fw"></i>
              {{$article->name}}</a>
        </td>
        <td>
              {{$article->reference}}
        </td>
        <td>
             {{$article->price}}
        </td>
        <td>
            {{$article->brand? $article->brand->name : ''}}
            <small>{{$article->model? '('.$article->model->name.')' : ''}}</small>
        </td>
        <td>

            @if($article->public )
               <span  title="It appears on the website">
                 <i class="fa fa-globe "></i>
                  Public
               </span>
            @else
              <span title="This is a private article, only owner can see">
                <i class="fa fa-lock "></i>
                 Private
              </span>
            @endif
        </td>
        <td>
        <a id="deleteLink_{{  $article->id  }}"  href="Javascript: deleteArticle(  {{  $article->id  }} );" class="deleteLink btn btn-default" data-id="{{$article->id}}">
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
