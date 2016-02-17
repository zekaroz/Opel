@extends('layouts.dashboard')

@section('page_heading')
Articles
@stop 

@section('section')       
<div>
    <a href="{{ action('ArticlesController@create') }}"><span>New Article</span></a>
</div>

<table class="table table-striped">
    <thead>
    <th> Id </td>
    <th> Name </td>
    <th> Reference </td>
    <th class="number"> Price   </td>
    <th class="date"> Created at </td>
    </thead>

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
               {{ $article->created_at}}
            </td>
        </tr>    
    @empty
        <tr>
            <td colspan="5">
                No records to show...
            </td>
        </tr>
    @endforelse
</table>
        
@stop