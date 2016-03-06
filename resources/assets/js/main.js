
var Vue = require('Vue');

import FormText from './components/formtext.vue';

  new Vue({
      el: '#app',
      components: { textfield : FormText },
      ready(){
       console.log('Vue Started ok!');
      }

  });
