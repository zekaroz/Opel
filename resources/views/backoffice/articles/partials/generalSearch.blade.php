<div class="searchBox">
      <form id="searchForm" action="javascript: makeSearch();">
          <div class="row">
              <div class="form-group col-sm-3">
                <label for="keyword">Pesquisa</label>
                {!! Form::text('keyword' , null , ['class' => 'form-control']) !!}
              </div>
              <div class="form-group col-sm-3">
                <label for="keyword">Marcas</label>
                {!! Form::select('brand_id' , $brandsList ,null ,['class' => 'form-control specialSelect brand_select']) !!}
              </div>
              <div class="form-group col-sm-3">
                <label for="keyword">Modelos</label>
                {!! Form::select('brand_model_id' , $modelsList ,null ,['class' => 'form-control specialSelect model_select' ]) !!}
              </div>
              <div class="form-group col-sm-3">
                <label for="keyword">Tipo de Peça</label>
                {!! Form::select('part_type_id' , $partsList ,null ,['class' => 'form-control specialSelect']) !!}
              </div>
          </div>

          <div class="row">
            <div class="form-group col-sm-3">
              <label for="keyword">Tipo de Artigo</label>
              {!! Form::select('article_type_id' , $articleTypeList ,null ,['class' => 'form-control specialSelect']) !!}
            </div>
            <div class="form-group col-sm-3" style="margin-top: 20px;">
                <div class="col-sm-4">
                  <label for="public">Público</label>
                  {!! Form::radio('public' , true, false, ['id' => 'public', 'class' => '']) !!}
                </div>
                <div class="col-sm-4">
                  <label for="private">Privado</label>
                  {!! Form::radio('public' , false, false, ['id' => 'private', 'class' => '']) !!}
                </div>
                <div class="col-sm-4">
                  <label for="all_items">Todos</label>
                  {!! Form::radio('public' , 'all', false, ['id' => 'all_items', 'class' => '']) !!}
                </div>
              </div>
              <div class="form-group col-sm-3" style="margin-top: 20px;">
                <label for="check_sold">Esconder Vendidos</label>
                {!! Form::checkbox('hide_sold_ones', null, false , ['id' => 'check_sold', 'class' => '']) !!}
              </div>
              <div style="margin-top: 20px;">
              <button id="search" type="submit" style="width:100px;" class="btn btn btn-primary ladda-button" data-style="zoom-out" name="search"> Search</button>
              <button id="reset" type="submit" style="width:100px;" class="btn btn-default btn-outline ladda-button" data-style="zoom-out"  data-spinner-color="#337ab7" name="reset"> Reset</button>
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
        form_post(postData, '/articles/all' , refreshElement, callbackButtonFeedbackFactory);

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

      function deleteArticle(articleId) {
              var link = $('#deleteLink_' + articleId) ;
              var postUrl = '/articles/'+articleId;

              var l = link.ladda();

              l.ladda('start');

              $.ajax({
                  url: postUrl,
                  type: 'post',
                  data: {_method: 'delete'},
                  success:function(response) {
                      link.closest('tr').hide(100);
                      swal({
                         title: "Artigo removido com sucesso" ,
                         text: response.feedback,
                         timer: 5000,
                         showConfirmButton: true,
                         type: "success"
                       });
                       l.ladda('stop');
                   },
                  error:function(response) {
                    swal({
                       title: "Ocorreu um erro a apagar o artigo" ,
                       text: 'Aconteceu um erro inesperado, por favor tira um print-screen e envia-me sff. :)',
                       timer: 15000,
                       showConfirmButton: true,
                       type: "error"
                     });
                     l.ladda('stop');
                  }
              });
      }

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

</script>
