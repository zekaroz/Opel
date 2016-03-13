<div class="searchBox">
  <div class="row">
      <div class="form-group col-sm-3">
        <label for="keyword">Keyword</label>
        <input type="text" id="keyword" class="form-control"> </input>
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
    <button id="search" type="button" class="btn btn btn-primary" name="button"> Pequisar</button>
  </div>
</div>
<hr>

<div id="searchResult">
  @include('backoffice.articles.partials.articlesTable', ['articles' => $articles ])
</div>

<script type="text/javascript">
      $(document).ready(function(){

          $('#search').on('click', function(e){
            var postData = 'keyword='+ $('#keyword')[0].value;
            var refreshElement = $('#searchResult');

            console.log('Calling the function form_post...');

            // this is a post method to the articles/all route
            form_post(postData, '/articles/all' , refreshElement);

            console.log('post end...');
          });
      });

</script>
