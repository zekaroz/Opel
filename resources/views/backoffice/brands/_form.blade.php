
<div class='form-group'>
        {!! Form::label('Name' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Code' ) !!}
        {!! Form::text('code' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group col-xs-12' >
        <button type="submit" class="btn btn-primary ladda-button ladda-progress"
                 name="save"
                 data-style="zoom-out">{{ $submitButtonText }}</button>
         <a href='{{url('brands')}}' class="btn btn-default ladda-button ladda-progress"   data-spinner-color="#337ab7" data-style="zoom-out"> Cancel</a>
    </div>
