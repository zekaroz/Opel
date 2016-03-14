<div class="searchBox">
      <form id="searchForm" action="javascript: makeSearch();">
          <div class="row">
              <div class="form-group col-sm-3">
                <label for="keyword">Keyword</label>
                {!! Form::text('keyword' , null , ['class' => 'form-control']) !!}
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
                  <label for="">Público</label>
                  {!! Form::radio('public' , true ,['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                  <label for="">Privado</label>
                  {!! Form::radio('public' , false ,['class' => 'form-control']) !!}
                </div>
              </div>
            <button id="search" type="button" class="btn btn btn-primary" name="search"> Search</button>
            <button id="reset" type="button" class="btn btn-default btn-outline" name="reset"> Reset</button>
          </div>
    </form>
</div>
<hr>

<div id="searchResult">

</div>

<script type="text/javascript">
      $(document).ready(function(){

          function makeSearch(){
            var postData = $('#searchForm').serialize();
            var refreshElement = $('#searchResult');

            // this is a post method to the articles/all route
            form_post(postData, '/articles/all' , refreshElement);

            return false;
          }

          $('#search').on('click', function(e){

            e.preventDefault();

            makeSearch();
          });

          $('#reset').on('click', function(e){

            e.preventDefault();

            clearForm('#searchForm');

            makeSearch();
          });

          // this initializes the list for this screen;
          makeSearch();
      });

</script>
