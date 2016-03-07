
var Vue = require('Vue');

import FormText from './components/formtext.vue';
import articlesearch from './components/articleSearch.vue';

Vue.use(require('vue-resource'));

  new Vue({
      el: '#app',
      components: { textfield : FormText ,
                    articlesearch: articlesearch
                  },
      ready(){
        console.log('Vue Started ok!');
      }

  });
