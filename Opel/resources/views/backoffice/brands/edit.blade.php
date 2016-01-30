@extends('layouts.dashboard')

@section('page_heading')
Edit Brand '{{ $brand->name}}'
@stop 

@section('section')

<div>
    <a href="{{ action('BrandsController@index') }}"><span>Back</span></a>
</div>
<br><br>

 @include('errors.list')
 
<div class="col-sm-6"  >
{!! Form::model($brand, 
                ['method' => 'PATCH', 
                 'action' => ['BrandsController@update',$brand->id]]
                 ) !!}
     @include('backoffice.brands._form', ['submitButtonText' => 'Update Brand'  ])
{!! Form::close() !!}
</div>
 
 <div class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Models
            </h3>
        </div>

        <div class="col-sm-6"  >
            {!! Form::open(['url'   => 'models']) !!}
                @include('backoffice.brands._formModel',
                         [
                         'submitButtonText' => 'Add Model', 
                         'brand_id' => $brand->id
                         ])
            {!! Form::close() !!}
         </div>
        
        <div class="panel-body">
            <div class="">
                @include('backoffice.brands._Models_table', ['brandModels'=>$brandModels]) 
            </div>
        </div>
    </div>
</div>     
     
@stop
