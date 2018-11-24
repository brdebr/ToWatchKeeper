<template>
    <div class="container">
        <contents-display/>
        <contents-list :contents="contents"/>
    </div>
</template>

<script>
let apiUrl = 'http://localhost:8000/api/contents';
import { ContentsEventsBus } from './ContentsEventsBus.js';

export default {
  data: function() {
    return {
      contents: [],
    };
  },
  mounted() {
    axios
      .get(apiUrl)
      .then(result => {
        console.log('Get contents : Success!');
        this.contents = [...result.data.data];
        ContentsEventsBus.$emit('displayContent',this.contents[0]);
      })
      .catch(err => {
        console.log('Get contents : Failed!');
        console.log(err);
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
