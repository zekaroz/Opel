
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
        {!! Form::submit($submitButtonText ,  ['id' => $buttonId, 'class' => 'btn btn-primary ladda-button ladda-progress', 'data-style' => 'expand-left']) !!}
        or <a href="Javascript: $('#addModel').show(); $('#modelForm').hide('slide'); "
              class="btn btn-default ladda-button"
              data-style="expand-left" >
              Cancel
           </a>
    </div>
