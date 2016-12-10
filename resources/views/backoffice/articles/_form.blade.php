
  <div class="">
    <div class='form-group'>
      <div class="row">
        {!! Form::label('article_type_id','Tipo de Artigo' ,['id' => 'label1']) !!}
      </div>

        <ul class="radioButtons">
            @foreach( $articleTypesList as $type)
            <li>
              <label id="article_type_label_{{  $type->id  }}"
                      for="{{ 'article_type_id'.$type->id }}"
                      @if(isset($article))
                          class="{{ ( $article->articleType->code == $type->code)? ' selected' : '' }}"
                     @endif
              >

                  {{  $type->name  }}
              </label>
              {!! Form::radio('article_type_id' ,$type->id ,false ,
                  [   'id'      =>  'article_type_id'.$type->id,
                      'class'   =>  'articleType '.$type->code ]) !!}
            </li>
              @endforeach
        </ul>
      </div>
    </div>
<div class='form-group required' style="margin-top:50px;">
        {!! Form::label('Name', 'Nome do Artigo' ) !!}
        {!! Form::text('name' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
        {!! Form::label('Reference OEM' , 'Referência') !!}
        {!! Form::text('reference' , null , ['class' => 'form-control']) !!}
    </div>
    <div class='form-group'>
      <div class="">
        <label for="publicBox">Visibilidade</label>
      </div>
       {{ Form::checkbox('public', 1, isset($article) ? $article->public : 1 , [
                   'class' => 'field'
                   ,'data-toggle'  =>  'toggle'
                   ,'data-style'   => 'ios'
                   ,'data-on'      => '<i class="fa fa-eye"></i> Público'
                   ,'data-onstyle' => 'success'
                   ,'data-off'     => '<i class="fa fa-lock"></i> Privado'
                   ,'data-offstyle'=> 'danger'
                   ,'data-width'   => '100'
                   ,'data-height'  => '35'
       ]) }}

    </div>
    <div class='form-group '>
        {!! Form::label('','Descrição do Artigo') !!}
        {!! Form::textarea('description' , null , ['class' => 'form-control']) !!}
    </div>
    <div class="row">
      <div class='form-group col-md-6 col-sd-9'>{!! Form::label('Preço' ) !!}
          <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-eur"></i></span>
              {!! Form::text('price' , null , ['class' => 'form-control decimal', 'placeholder'=>'Place the price here']) !!}
          </div>
      </div>
        @if( isset($article) )
          <div class="form-group quantity col-md-6 col-sd-3  {{  ( $article->articleType->code == 'P' ? '' : 'hidden' )}}">
        @else
          <div class="form-group quantity col-md-6 col-sd-3">
        @endif
          {!! Form::label('Quantidade' ) !!}
          {!! Form::number('quantity' , null, [
                'class' => 'form-control ',
                'placeholder'=>'Qtd']) !!}
      </div>
    </div>
    <fieldset>
      <legend>Características do Artigo</legend>
      <div class="row">
        <div class="col-md-12">
          <div class='form-group col-md-6 col-sd-3'>
              {!! Form::label('Marca' ) !!}
              {!! Form::select('brand_id' , $brandsList ,null ,['class' => 'form-control specialSelect brand_select']) !!}
          </div>
          <div class='form-group col-md-6 col-sd-3'>
              {!! Form::label('Modelo' ) !!}
              {!! Form::select('model_id' , $modelsList , null ,['class' => 'form-control specialSelect model_select']) !!}
          </div>
        </div>
        <div class="col-md-12">
          @if( isset($article) )
            <div class="form-group col-md-6 partType {{  ( $article->articleType->code == 'P' ? '' : 'hidden' )}}">
          @else
            <div class='form-group col-md-6 partType'>
          @endif
              {!! Form::label('Tipo de Peça' ) !!}
              {!! Form::select('part_type_id' , $partsList ,null ,['class' => 'form-control specialSelect']) !!}
          </div>
        </div>
      </div>

    </fieldset>
    <div class='form-group' style="margin-top: 25px;">

        {!! Form::submit($submitButtonText ,  ['class' => 'btn btn-primary']) !!}
        or <a href='{{url('articles')}}' class="btn btn-default" > Cancel</a>
    </div>

    <script type="text/javascript">
    $(document).ready(function()
    {

      $(".articleType").change(function(){
          if($(this).hasClass('P')){
            $('.quantity').removeClass('hidden');
            $('.partType').removeClass('hidden');
          }
          else {
            $('.quantity').addClass('hidden');
            $('.partType').addClass('hidden');
          }

          $('.selected').removeClass('selected');
          $('#article_type_label_'+$(this).val()).addClass('selected');
      });

      $(".brand_select").change(function()
      {
        var id=$(this).val();
        var dataString = 'brand_id='+id ;

        $.ajax
        ({
          type: "POST",
          url: "{{ route('getModelsByBrand') }}",
          data: dataString,
          success: function(html)
          {
            $(".model_select").html(html);
            $(".model_select").select2();
          }
        });

      });

    });
    </script>
