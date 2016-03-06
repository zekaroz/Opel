<template id="formText-template">
  <div class="form-group" v-bind:class="{'has-error': error}" >
      <label for="{{label}}">{{label}}</label>
      <input v-model="content" class="form-control" name="{{name}}" type="text">
  </div>
</template>

<script>
export default {
             template: '#formText-template',
             props:  ['label',
                      'name',
                      'mandatory',
                      'content'],
             data() {
                return {

                };
             },
             methods: {
             },
             computed:{
                error(){
                    return this.content=='' && this.mandatory;
                }
             }
       }
</script>
