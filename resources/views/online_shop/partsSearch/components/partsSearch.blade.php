<div class="searchBox">
      <form id="searchForm" action="javascript: makeSearch();">
          <div class="row">
              <div class="form-group col-sm-6">
                <label for="keyword">Pesquisa</label>
                {!! Form::text('keyword' , null , ['class' => 'form-control']) !!}
              </div>
          </div>
          <div class="row">
              <div class="form-group col-sm-6">
                <label for="keyword">Marcas</label>
                {!! Form::select('brand_id' , $brandsList ,null ,['class' => 'form-control specialSelect']) !!}
              </div>
              <div class="form-group col-sm-6">
                <label for="keyword">Modelos</label>
                {!! Form::select('brand_model_id' , $modelsList ,null ,['class' => 'form-control specialSelect']) !!}
              </div>
              <div class="form-group col-sm-6">
                <label for="keyword">Tipo de Peça</label>
                {!! Form::select('part_type_id' , $partsList ,null ,['class' => 'form-control specialSelect']) !!}
              </div>
              <div class="form-group col-sm-6">
                <label for="keyword">Tipo de Artigo</label>
                {!! Form::select('article_type_id' , $articleTypeList ,null ,['class' => 'form-control specialSelect']) !!}
              </div>
              <div style="margin-top: 20px;" class="form-group col-sm-6">
                  <button id="search" type="submit" style="width:100px;" class="btn btn btn-primary ladda-button" data-style="zoom-out" name="search"> Pesquisar</button>
                  <button id="reset" type="submit" style="width:100px;" class="btn btn-default btn-outline ladda-button" data-style="zoom-out"  data-spinner-color="#337ab7" name="reset"> Limpar</button>
              </div>
          </div>

    </form>
</div>
<hr>

<div id="searchResult">

</div>

<script type="text/javascript">
      $(window).on('hashchange', function() {
         if (window.location.hash) {
             var page = window.location.hash.replace('#', '');
             if (page == Number.NaN || page <= 0) {
                 return false;
             } else {
                 makeSearch(null, page);
             }
         }
      });

      function makeSearch(buttonUsed, page){
        var page = page || 1;
        var postData = $('#searchForm').serialize() + '&page='+ page;
        var refreshElement = $('#searchResult');

        var l = $( buttonUsed ).ladda();
        // Start loading

        var callbackButtonFeedbackFactory = function(action){
            return function (){
                    l.ladda( action );
            };
        };
        // this is a post method to the articles/all route
        form_post(postData, '/partsSearch/all' , refreshElement, callbackButtonFeedbackFactory);

        return false;
      }

      $(document).ready(function(){

          $(document).on('click', '.pagination a', function (e) {
              makeSearch(null, $(this).attr('href').split('page=')[1]);
              console.log('search triggered!');
              e.preventDefault();
          });

          $('#search').on('click', function(e){
            e.preventDefault();

            makeSearch(this);
          });

          $('#reset').on('click', function(e){
            e.preventDefault();

            clearForm('#searchForm');

            makeSearch(this);
          });

          // this initializes the list for this screen;
          makeSearch();
      });



</script>
