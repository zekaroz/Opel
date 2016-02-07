
<div class='form-group'>
        {!! Form::label('Shop Name' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Shop Description' ) !!}
        {!! Form::textarea('shopDescription' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Location' ) !!}
        {!! Form::text('location' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Contact Number' ) !!}
        {!! Form::text('contactNumber' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Opening Date' ) !!}
        {!! Form::input('date', 'OpeningDate' , date('Y-m-d') , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Shop e-mail' ) !!}
        {!! Form::text('email' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit($submitButtonText ,  ['class' => 'btn btn-primary']) !!}  
        or <a href='{{url('shops')}}' class="btn btn-default" > Cancel</a>
    </div>