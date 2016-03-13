<table class="table table-striped ">
  <thead>
    <th>
      Aticle Name
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
  </thead>
  <tbody>
@forelse( $articles as $article)
      <tr>
        <td>
            {{$article->name}}
        </td>
        <td>
              {{$article->reference}}
        </td>
        <td>
             {{$article->price}}
        </td>
        <td>
            {{$article->brand? $article->brand->name : ''}}
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
