<template id="search-template">
      <div class="searchBox">
          <div class="form-group col-sm-3">
            <label for="keyword">Keyword</label>
            <input id="keyword" class="form-control" v-model="searchText"> </input>
          </div>
          <div class="form-group col-sm-3">
            <label for="keyword">Marcas</label>
              <select v-select="filters.brandid" :options="brands | combobox 'id' 'name'" @click="getModels">
                 <option value="0">(all)</option>
               </select>
            <pre>
              selected: {{    filters.brandid     }}
            </pre>
          </div>
          <div class="form-group col-sm-3">
            <label for="keyword">Modelos</label>
            <select v-select="filters.modelid" :options="brandModels | combobox 'id' 'name'">
               <option value="0">(all)</option>
             </select>
             <pre>
               selected: {{     filters.modelid     }}
             </pre>
          </div>
          <div class="form-group col-sm-3">
            <label for="keyword">Tipo de Peça</label>
            <select v-select="filters.partid" :options="parts | combobox 'id' 'name'">
               <option value="0">(all)</option>
             </select>
             <pre>
               selected: {{   filters.partid   }}
             </pre>
          </div>
          <div class="form-group col-sm-3">
              <div class="col-sm-6">
                <label for="public">Público</label>
                <input type="radio" id="public" value="true" v-model="public">
              </div>
              <div class="col-sm-6">
                <label for="private">Privado</label>
                <input type="radio" id="private" value="false" v-model="public">
              </div>
            </div>
          <button type="button" class="btn btn btn-primary" name="button"> Pequisar</button>
      </div>
      <hr>

      <pre>
          {{ $data.filters | json}}
      </pre>

      <table class="table table-striped ">
        <thead>
          <th>
            Aticle Name
          </th>
          <th>
            Reference
          </th>
          <th>
            Price
          </th>
          <th>
            Brand
          </th>
          <th>
            Is Public
          </th>
        </thead>
      <tbody>
        <tr v-for="article of list">
          <td>
              {{article.name}}
          </td>
          <td>
                {{article.reference}}
          </td>
          <td>
               {{article.price}}
          </td>
          <td>
              {{article.brand? article.brand.name : ''}}
          </td>
          <td>
                 <span v-if="article.public==1" title="It appears on the website">
                   <i class="fa fa-globe "></i>
                    Public
                 </span>

                <span v-else title="This is a private article, only owner can see">
                  <i class="fa fa-lock "></i>
                   Private
                </span>

          </td>
        </tr>
    </tbody>
    </table>
</template>


  <script>
  export default('al',{
      template : "#search-template",
      props: {
          models:[],
          parts:[],
          brands: []
      },
      data(){
          return {
                  list: [],
                  searchText: '',
                  public: null,
                  filters: {
                       brandid: null,
                       modelid: null,
                       partid: null
                  },
                  brandModels:[]
          }
      },
      created: function(){
          this.fetchArticles();
          this.brandModels = this.models;
      },
      methods:{
          getModels: function(){
                  this.$http.get('articleModels/'+this.filters.brandid,function(data){
                          this.$set('models', data);
                  }.bind(this));
          },
          fetchArticles: function(){
              var resource = this.$resource('articles/all/{id}')

               resource.get(function(data){
                     this.$set('list', data);
                }.bind(this));

          //    this.$http.get('articles/all',function(data){
          //        this.$set('list', data);
          //    }.bind(this));
          },
          deleteArticle: function(article){
              this.list.$remove(article);
          }
      }
  });
  </script>
