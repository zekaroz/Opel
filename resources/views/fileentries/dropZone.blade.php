{!! Form::open(['url'=>$postURL,'method'=>'POST', 'files'=>true, 'id'=>$dropId,'class'=>'dropzone']) !!}

@if( isset($hiddenFieldName) )
    {{  Form::hidden($hiddenFieldName, $hiddenFieldValue) }}
@endif

{!! Form::close() !!}
