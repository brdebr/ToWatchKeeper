<template>
    <div class="container">
        <contents-display/>
        <contents-list :contents="contents"/>
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
    ContentsEventsBus.$on('contentDestroyed', id => {
      this.contents.find((el,index)=>{
        if(el.id === id){
          this.contents.splice(index, 1);
          return;
        }
      })
    });
    ContentsEventsBus.$on('contentUpdated', content => {
      this.contents.find((el,index) => {
        if(el.id === content.id){
          this.selected = index;
          this.contents[index] = content;
          return;
        }
      })
    });
  }
};
</script>
