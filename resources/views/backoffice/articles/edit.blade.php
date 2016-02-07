@extends('layouts.dashboard')

@section('page_heading')
Edit Article '{{ $article->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('ArticlesController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update',$article->id]]) !!}
     @include('backoffice.articles._form', ['submitButtonText' => 'Update Article'  ])
{!! Form::close() !!}
</div>
       

@stop