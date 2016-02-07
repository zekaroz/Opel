@extends('layouts.dashboard')

@section('page_heading')
Edit Article Type '{{ $articleType->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('ArticleTypesController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::model($articleType, ['method' => 'PATCH', 'action' => ['ArticleTypesController@update',$articleType->id]]) !!}
     @include('backoffice.articletypes._form', ['submitButtonText' => 'Update Part Type'  ]) 
{!! Form::close() !!}
</div>
       

@stop