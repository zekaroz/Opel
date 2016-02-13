
        {{ Form::hidden('brand_id', $brand->id) }}

<div class='form-group'>
        {!! Form::label('Name' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Code' ) !!}
        {!! Form::text('code' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit($submitButtonText ,  ['class' => 'btn btn-primary']) !!} 
        or <a href='{{url('brands/' . $brand_id . '/edit')}}' class="btn btn-default" > Cancel</a>
    </div>