<template>
      <div class="row justify-content-center">
          <div class="col-md-11">
              <div class="card card-default border-secondary bg-dark">
                  <div class="card-header d-flex align-items-baseline text-white">
                      <span @click="toggleEditing">
                          I'm a Content list !
                      </span>
                      <small class="ml-auto">
                          Listing : {{ 2+2 }} contents
                      </small>
                  </div>
                  <ul class="list-group list-group-flush">
                      <content-list-item
                          v-for="(content, index) in contents"
                          :key="content.id"
                          :index="index"
                          :content="content"
                          :active="selected === index"
                          class="list-group-item">
                      </content-list-item>
                  </ul>
              </div>
          </div>
      </div>
</template>

<script>
import { ContentsEventsBus } from './ContentsEventsBus.js';
let apiUrl = 'http://localhost:8000/api/contents';

export default {
  props: ['contents'],
  data: function() {
    return {
      selected: 0,
      editing: false,
    };
  },
  methods: {
    toggleEditing: function() {
      this.editing = !this.editing;
    },
    displayEditContent: function(index) {
      this.selected = index;
      this.editing = true;
    },
    displayEditedContent: function(content) {
      // this.contents[this.selected] = { ...content };
      this.editing = false;
    },
  },
  mounted() {  
    console.log('Content-List Component mounted.');
  },
  created(){
    let handlerAux = content =>{
      this.contents.find((el,index) => {
        if(el.id === content.id){
          this.selected = index;
          return;
        }
      })
    };

    ContentsEventsBus.handleDisplayContent( content => {
      handlerAux(content)
    });
    ContentsEventsBus.handleDisplayEditContent( content => {
      handlerAux(content)
    })

  }
};
</script>
