
    <div class='form-group required'>
        {!! Form::label('article_type_id','Article Type' ) !!}
        {!! Form::select('article_type_id' , $articleTypesList ,null ,['class' => 'form-control specialSelect']) !!}
    </div>
<div class='form-group required'>
        {!! Form::label('Name', 'Name' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group required'>
        {!! Form::label('Reference' , 'Reference') !!}
        {!! Form::text('reference' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group required'>
        {!! Form::label('','Article Description') !!}
        {!! Form::textarea('description' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group required'>{!! Form::label('Price' ) !!}
        <div class="form-group input-group">
            <span class="input-group-addon"><i class="fa fa-eur"></i></span>
            {!! Form::text('price' , null , ['class' => 'form-control decimal', 'placeholder'=>'Place the price here']) !!}
        </div>
    </div>

    <div class='form-group'>
        {!! Form::label('Part Type' ) !!}
        {!! Form::select('part_type_id' , $partsList ,null ,['class' => 'form-control specialSelect']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Brand' ) !!}
        {!! Form::select('brand_id' , $brandsList ,null ,['class' => 'form-control specialSelect']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Model' ) !!}
        {!! Form::select('model_id' , $modelsList , null ,['class' => 'form-control specialSelect']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('publicid','Is Public' ) !!}
        {{ Form::checkbox('public', 1, null, ['class' => 'field']) }}
    </div>

    <div class='form-group'>

        {!! Form::submit($submitButtonText ,  ['class' => 'btn btn-primary']) !!}
        or <a href='{{url('articles')}}' class="btn btn-default" > Cancel</a>
    </div>
