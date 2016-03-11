
var Vue = require('Vue');

import FormText from './components/formtext.vue';
import articlesearch from './components/articleSearch.vue';


Vue.directive('select', {
  twoWay: true,
  priority: 1000,

  params: ['options'],

  bind: function () {
    var self = this
    $(this.el)
      .select2({
        data: this.params.options,
        width: '100%'
      })
      .on('change', function () {
        self.set(this.value);
        $(self.el).click();
      })
  },
  update: function (value) {
    $(this.el).val(value).trigger('change');
    $(this.el).change();
  },
  unbind: function () {
    $(this.el).off().select2('destroy')
  }
});


// So this filter is to apply to any array when passing it o select tags
// in this case a every record must have a text and and Id
Vue.filter('combobox', function (records, id_name, text_name) {
    if (records.length == 0) {
        return [];
    }

    var recordsList = [     ];       // { id : 0, text : "Item One" }, // example

    $.each( records, function( key, record ) {
        var option = { id : record[id_name], text : record[text_name] };
        recordsList.push(option);
    });

    return recordsList;
});


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
