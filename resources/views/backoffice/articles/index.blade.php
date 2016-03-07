@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop

@section('page_title_buttons')
<a class ="btn btn-primary" href="{{ action('ArticlesController@create') }}">
    <i class="fa fa-plus-square fa-fw"></i>
    <span>New Article</span>
</a>
@stop

@section('section')

<table class="table table-striped search-table">
    <thead>
    <th> Id </th>
    <th> Name </th>
    <th> Reference </th>
    <th class="number"> Price   </th>
    <th class="date"> Privacy </th>
    <th></th>
    </thead>
<tbody>
    @forelse( $articles as $article)
        <tr>
            <td>
              <a href="{{action('ArticlesController@edit',[$article->id]) }}" ><i class="fa fa-pencil-square-o fa-fw"></i>
                   {{ $article->id }}</a>
            </td>
            <td>
               {{ $article->name}}
            </td>
            <td>
               {{ $article->reference}}
            </td>
            <td class="number">
               {{ $article->price}} €
            </td>
            <td class="date">
                  @if($article->public)
                     <span title="It appears on the website">
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
            <a  href="#" class="deleteLink btn btn-default" data-id="{{$article->id}}">
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

<script >
    $(document).ready( function( $ ) {
        $( '.deleteLink' ).on( 'click', function(e) {
                    e.preventDefault();
                    var link = $(this);
                    var postUrl = '/articles/'+link.attr('data-id');

                    $.ajax({
                        url: postUrl,
                        type: 'post',
                        data: {_method: 'delete'},
                        success:function(msg) {
                            link.closest('tr').hide(100);
                         },
                        error:function(msg) {
                           alert('Something wrong...');
                        }
                    });
        });
    });
</script>

@stop
