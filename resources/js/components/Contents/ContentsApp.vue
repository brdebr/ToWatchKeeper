<template>
    <div class="container">
        <contents-display/>
        <contents-list :contents="contents"/>
        <content-create/>
    </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents';
import { ContentsEventsBus } from './ContentsEventsBus';
import store from '../../store/store.js'

export default {
  computed:{
    contents(){
      return this.$store.getters.contents;
    }
  },
  store,
  mounted() {
    this.$store.dispatch('fetch_contents').then( response =>{
      console.log('Action fetch_contents completed successfully');
    }).catch(err => {
      console.log('Something went wrong :/',err);
    });
    console.log('Content-List Component mounted.');
  },
  created(){
    ContentsEventsBus.handleContentDestroyed( id => {
      this.contents.find((el,index)=>{
        if(el.id === id){
          this.contents.splice(index, 1);
          return el.id;
        }
      })
    });
    ContentsEventsBus.handleContentUpdated(content => {
      this.contents.find((el,index) => {
        if(el.id === content.id){
          this.selected = index;
          this.contents[index] = content;
          return el.id;
        }
      })
    });
  }
};
</script>
<style lang="scss">
  .overflow-h-border-bottom{
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
  }
</style>