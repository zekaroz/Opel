<div class="searchBox">
  <div class="row">
      <div class="form-group col-sm-3">
        <label for="keyword">Keyword</label>
        <input id="keyword" class="form-control" v-model="searchText"> </input>
      </div>
      <div class="form-group col-sm-3">
        <label for="keyword">Marcas</label>
        {!! Form::select('brand_id' , $brandsList ,null ,['class' => 'form-control specialSelect']) !!}
      </div>
      <div class="form-group col-sm-3">
        <label for="keyword">Modelos</label>
        {!! Form::select('brand_model_id' , $modelsList ,null ,['class' => 'form-control specialSelect']) !!}
      </div>
      <div class="form-group col-sm-3">
        <label for="keyword">Tipo de Peça</label>
        {!! Form::select('part_type_id' , $partsList ,null ,['class' => 'form-control specialSelect']) !!}
      </div>
  </div>
  <div class="row">
    <div class="form-group col-sm-3">
        <div class="col-sm-6">
          <label for="public">Público</label>
          {!! Form::radio('public' , true ,['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
          <label for="private">Privado</label>
          {!! Form::radio('public' , false ,['class' => 'form-control']) !!}
        </div>
      </div>
    <button type="button" class="btn btn btn-primary" name="button"> Pequisar</button>
  </div>
</div>
<hr>

  @include('backoffice.articles.partials.articlesTable', ['articles' => $articles ])
